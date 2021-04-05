<?php


namespace Rootsoft\IPFS\Traits;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Rootsoft\IPFS\Exceptions\IPFSException;

trait MakesHttpRequests
{
    /**
     * Make a GET request and return the response.
     *
     * @param string $uri
     * @param array $params
     * @return mixed
     * @throws IPFSException
     */
    protected function get(string $uri, array $params = [])
    {
        return $this->request('GET', $uri, $params);
    }

    /**
     * Make a POST request and return the response.
     *
     * @param string $uri
     * @param array $queryParams
     * @param array $payload
     * @param array $headers
     * @return mixed
     * @throws IPFSException
     */
    protected function post(string $uri, array $queryParams = [], array $payload = [], array $headers = [])
    {
        return $this->request('POST', $uri, $queryParams, $payload, $headers);
    }

    /**
     * Make a PUT request and return the response.
     *
     * @param string $uri
     * @param array $payload
     * @return mixed
     * @throws IPFSException
     */
    protected function put(string $uri, array $payload = [])
    {
        return $this->request('PUT', $uri, $payload);
    }

    /**
     * Make a DELETE request and return the response.
     *
     * @param string $uri
     * @param array $payload
     * @return mixed
     * @throws IPFSException
     */
    protected function delete(string $uri, array $payload = [])
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * Make request and return the response.
     *
     * @param string $verb
     * @param string $uri
     * @param array $queryParams
     * @param array $payload
     * @param array $headers
     * @return mixed
     * @throws IPFSException
     */
    protected function request(string $verb, string $uri, array $queryParams = [], array $payload = [], array $headers = [])
    {
        // Strip leading slashes - RFC 3986
        $uri = ltrim($uri, DIRECTORY_SEPARATOR);

        // Build the options
        $options = $this->buildOptions($verb, $queryParams, $payload, $headers);

        // Make the request
        try {
            $response = $this->client->request(
                $verb,
                $uri,
                $options,
            );
        } catch (GuzzleException $e) {
            throw new IPFSException($e->getMessage());
        }

        if ($response->getStatusCode() != 200) {
            $this->handleRequestError($response);
        }

        $responseBody = (string) $response->getBody()->getContents();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    /**
     * Handle the request error.
     *
     * @param ResponseInterface $response
     * @return void
     * @throws IPFSException
     */
    protected function handleRequestError(ResponseInterface $response)
    {
        $errorMessage = $response->getBody()->getContents();
        if ($response->getStatusCode() == 401 || $response->getStatusCode() == 403) {
            throw new IPFSException((string) $response->getBody());
        }

        if ($response->getStatusCode() == 404) {
            throw new IPFSException((string) $response->getBody());
        }

        throw new IPFSException((string) $response->getBody());
    }

    /**
     * @param string $method
     *
     * @param array $queryParams
     * @param array $payload
     * @param array $headers
     * @return array
     */
    private function buildOptions($method = 'get', array $queryParams = [], array $payload = [], array $headers = [])
    {
        $options = [
            'query' => [],
        ];

        // Add the query params
        $options['query'] = array_merge($options['query'], $queryParams);

        if ($method == 'POST') {
            if (! array_key_exists('body', $payload)) {
                // Body is given
                $options = array_merge($payload, $options);
            } else {
                // Body is given
                $options = array_merge($payload, $options);
            }
        }

        $options['http_errors'] = false;

        if (! empty($headers)) {
            $options['headers'] = $headers;
        }

        return $options;
    }
    
}

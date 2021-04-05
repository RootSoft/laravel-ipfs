<?php


namespace Rootsoft\IPFS\Tests\Feature;

use Orchestra\Testbench\TestCase;
use Rootsoft\IPFS\Clients\IPFSClient;

class IPFSTest extends TestCase
{

    public function testExample()
    {
        $client = new IPFSClient('127.0.0.1', 5001);
        //$response = $client->add(Utils::tryFopen('/Users/tomas/Downloads/algo_icon.png', 'r'), 'wow.png', ['pin' => true]);
        //$contents = $client->pin('QmNZdYefySKuzF37CWjR8vZ319gYToS61r3v3sRwApXgaY');
        $contents = $client->cat('QmNZdYefySKuzF37CWjR8vZ319gYToS61r3v3sRwApXgaY');
        dd($contents);
    }

}

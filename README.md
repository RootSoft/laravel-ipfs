<p align="center"> 
<img src="https://miro.medium.com/max/638/0*o30AAwcHRvsA840O.jpg">
</p>

# laravel-ipfs
[![Packagist][packagist-shield]][packagist-url]
[![Downloads][downloads-shield]][downloads-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]

The InterPlanetary File System is a peer-to-peer hypermedia protocol designed to make the web faster, safer, and more open.
IPFS uses content-addressing to uniquely identify each file in a global namespace connecting all computing devices.

It is an ideal solution for a decentralized storage for blockchain-based content and is optimized for the [Algorand blockchain](https://www.algorand.com/) .

## Introduction
laravel-ipfs is a simple wrapper around the IPFS HTTP API with an elegant approach to connect your application to the IPFS network so you can easily host and fetch content with just a few lines of code.

Once installed, you can simply connect your application to the network and add content:

```php
$ipfs->add(Utils::tryFopen('ipfs.png', 'r'), 'ipfs.png', ['pin' => true]);
```

or show IPFS object data:

```php
$contents = $ipfs->cat('QmNZdYefySKuzF37CWjR8vZ319gYToS61r3v3sRwApXgaY');
```

## Getting started

### Installation
> **Note**: laravel-ipfs requires PHP 7.4+

You can install the package via composer:

```bash
composer require rootsoft/laravel-ipfs
```

## Usage
Create an new ```IPFSClient``` and pass the IP address and port of your local (or [pinned](https://pinata.cloud/)) network.

```php
$ipfs = new IPFSClient('127.0.0.1', 5001);
```

**That's it!** We can now easily add new content on a decentralized network!

### Laravel :heart:
We've added special support to make the life of a Laravel developer even more easy!

Publish the ```ipfs.php``` config file using:
```
php artisan vendor:publish --provider="Rootsoft\IPFS\IPFSServiceProvider" --tag="config"
```

Open the ```config/ipfs.php``` file in your project and insert your credentials
```php
return [
    'ipfs' => [
        'base_url' => '127.0.0.1',
        'port' => 5001,
    ],
];
```

Now you can use the ```IPFS``` Facade!

```php
$fileHash = IPFS::add($collectible->get(), $fileName, ['only-hash' => true])['Hash'];
```

## Methods


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing & Pull Requests
Feel free to send pull requests.

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [Tomas Verhelst](https://github.com/rootsoft)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[packagist-shield]: https://img.shields.io/packagist/v/rootsoft/laravel-ipfs.svg?style=for-the-badge
[packagist-url]: https://packagist.org/packages/rootsoft/laravel-ipfs
[downloads-shield]: https://img.shields.io/packagist/dt/rootsoft/laravel-ipfs.svg?style=for-the-badge
[downloads-url]: https://packagist.org/packages/rootsoft/laravel-ipfs
[issues-shield]: https://img.shields.io/github/issues/rootsoft/laravel-ipfs.svg?style=for-the-badge
[issues-url]: https://github.com/rootsoft/laravel-ipfs/issues
[license-shield]: https://img.shields.io/github/license/rootsoft/laravel-ipfs.svg?style=for-the-badge
[license-url]: https://github.com/rootsoft/laravel-ipfs/blob/master/LICENSE.md
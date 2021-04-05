# This is my package IPFS

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rootsoft/laravel_ipfs.svg?style=flat-square)](https://packagist.org/packages/rootsoft/laravel_ipfs)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/rootsoft/laravel_ipfs/run-tests?label=tests)](https://github.com/rootsoft/laravel_ipfs/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/rootsoft/laravel_ipfs/Check%20&%20fix%20styling?label=code%20style)](https://github.com/rootsoft/laravel_ipfs/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/rootsoft/laravel_ipfs.svg?style=flat-square)](https://packagist.org/packages/rootsoft/laravel_ipfs)

[](delete) 1) manually replace `Tomas Verhelst, tverhelst, auhor@domain.com, rootsoft, rootsoft, Vendor Name, laravel-ipfs, laravel_ipfs, laravel_ipfs, IPFS, This is my package IPFS` with their correct values
[](delete) in `CHANGELOG.md, LICENSE.md, README.md, ExampleTest.php, ModelFactory.php, IPFS.php, IPFSCommand.php, IPFSFacade.php, IPFSServiceProvider.php, TestCase.php, composer.json, create_laravel_ipfs_table.php.stub`
[](delete) and delete `configure-laravel_ipfs.sh`

[](delete) 2) You can also run `./configure-laravel_ipfs.sh` to do this automatically.

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/package-laravel_ipfs-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/package-laravel_ipfs-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require rootsoft/laravel_ipfs
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Rootsoft\IPFS\IPFSServiceProvider" --tag="laravel_ipfs-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Rootsoft\IPFS\IPFSServiceProvider" --tag="laravel_ipfs-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$laravel_ipfs = new Rootsoft\IPFS();
echo $laravel_ipfs->echoPhrase('Hello, Spatie!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Tomas Verhelst](https://github.com/tverhelst)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

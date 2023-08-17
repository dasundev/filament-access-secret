![filament-access-secret](https://github.com/dasundev/filament-access-secret/assets/54996800/ab63eaa0-9df0-47a7-bddf-7dec12e05f49)


[![Latest Version on Packagist](https://img.shields.io/packagist/v/dasundev/filament-access-secret.svg?style=flat-square)](https://packagist.org/packages/dasundev/filament-access-secret)
[![Total Downloads](https://img.shields.io/packagist/dt/dasundev/filament-access-secret.svg?style=flat-square)](https://packagist.org/packages/dasundev/filament-access-secret)

# Filament Access Secret

This package provides a middleware for securing access to Filament by requiring a secret key to be provided in the URL.

## Installation

You can install the package via Composer:

 ```bash
 composer require dasundev/filament-access-secret
 ```
Optionally, you can publish the config file using:

```bash
php artisan vendor:publish --tag="filament-access-secret-config"
```
## Usage

After installing the package, open the .env file and add the following key with your secret key:

```dotenv
FILAMENT_ACCESS_SECRET_KEY=secret
```

To access Filament, append the secret key to the Filament URL like this:

```
https://my-website.com/admin/secret
```

Now, your Filament access is secured with the provided secret key. 🔒

> If you want to disable the secret access, simply keep the FILAMENT_ACCESS_SECRET_KEY value empty or delete the key from the .env file.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Buy Me A Coffee! :coffee:
If you find my plugin helpful or valuable, please consider supporting its development. Your contribution will enable me to dedicate more time and resources to enhance the plugin. [Buy me a coffee!](https://www.buymeacoffee.com/dasundev) Your support is greatly appreciated!

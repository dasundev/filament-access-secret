
![filament-access-secret](https://github.com/dasundev/filament-access-secret/assets/54996800/7730e1f6-d792-4b3e-ac87-ff5b9c8825f4)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dasundev/filament-access-secret.svg?style=flat-square)](https://packagist.org/packages/dasundev/filament-access-secret)
[![Total Downloads](https://img.shields.io/packagist/dt/dasundev/filament-access-secret.svg?style=flat-square)](https://packagist.org/packages/dasundev/filament-access-secret)

# Filament Access Secret

This package provides a middleware for securing access to Filament by requiring a secret key to be provided in the URL.

## Installation

You can install the package via composer:

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
FILAMENT_ACCESS_SECRET_KEY=my_secret_key
```

To access Filament, append the secret key to the Filament URL like this:

```
https://my-domain.com/admin/my_secret_key
```

Now, your Filament access is secured with the provided secret key. 🔒

> If you want to disable the secret access, simply keep the FILAMENT_ACCESS_SECRET_KEY value empty or delete the key from the .env file.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

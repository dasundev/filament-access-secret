![filament-access-secret](https://github.com/dasundev/filament-access-secret/assets/54996800/97cb0dd9-3e0d-42be-8f19-3f4ab66e37a1)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dasundev/filament-access-secret.svg?style=flat-square)](https://packagist.org/packages/dasundev/filament-access-secret)
[![Total Downloads](https://img.shields.io/packagist/dt/dasundev/filament-access-secret.svg?style=flat-square)](https://packagist.org/packages/dasundev/filament-access-secret)

# Filament Access Secret

This package provides a middleware for securing access to Filament by requiring a secret key to be provided in the URL.

## How it Works
Once you've set up and configured this package, it works by preventing access to `http://my-website.com/admin`. If you try to visit that link, you'll see a **"404"** message. But if you add the secret key at the end of the URL like this: `http://my-website.com/admin/secret`, you'll be able to access the admin panel.

This functionality is facilitated through a specific type of cookie working behind the scenes. This cookie validates whether you possess the authorization to access the Filament panel.

## Installation

You can install the package via Composer:

 ```bash
 composer require dasundev/filament-access-secret
 ```


If you're using Filament 2, please use this version:

 ```bash
 composer require dasundev/filament-access-secret:v1.*
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

#### For Filament 3: Updating Middleware Order

Open the `app/Providers/Filament/AdminPanelProvider.php` and right at the start of the list of middleware, add `VerifyAdminAccessSecret` middleware:

```php
use Dasundev\FilamentAccessSecret\Middleware\VerifyAdminAccessSecret;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ...
            ->middleware([
                VerifyAdminAccessSecret::class,
                // Other middlewares...
            ])
            ...;
    }
}
```

Now, your Filament access is secured with the provided secret key. 🔒

> If you want to disable the secret access, simply keep the FILAMENT_ACCESS_SECRET_KEY value empty or delete the key from the .env file.

## Enhance Security
To enhance security, you have the option to include your own cookie class through the configuration file.

```php
<?php

return [
 
    /*
    |--------------------------------------------------------------------------
    | Access Secret Cookie
    |--------------------------------------------------------------------------
    |
    | To use your own access secret cookie, set it here.
    |
    */

    'cookie' => MyAccessSecretCookie::class
];

```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Support Me

Is this plugin helpful to you? Your support will be helpful to maintain this plugin. Considering buying me a coffee.

<a href='https://ko-fi.com/M4M41O7P3' target='_blank'><img height='40' style='border:0px;height:40px;' src='https://storage.ko-fi.com/cdn/kofi3.png?v=3' border='0' alt='Buy Me a Coffee at ko-fi.com' /></a>
---
title: Multiple panel support
weight: 3
---

# Multiple panel support

The filament access secret is supports for multiple panels with different secret keys.

To enable it, you must publish the configuration file by running the following command.

```bash
php artisan vendor:publish --tag="filament-access-secret-config"
```

Then open the config file at `config/filament-access-secret.php` and add your new key with the env variable as follows.

```php
'keys' => [
    ...
    'app' => env('APP_FILAMENT_ACCESS_SECRET_KEY', ''), // "app" is the id of the panel
],
```

Now you can set a secret key for the new panel (in this case for the "app" panel).

```dotenv
APP_FILAMENT_ACCESS_SECRET_KEY=app123
```

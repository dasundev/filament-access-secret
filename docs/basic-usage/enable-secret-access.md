---
title: Enable secret access
weight: 1
---

# Enable secret access

After installing the package, open the .env file and add the following key with your secret key:

```dotenv
DEFAULT_FILAMENT_ACCESS_SECRET_KEY=default123
```

To access Filament, append the secret key to the Filament URL like this:

```
https://my-website.com/admin/secret
```

Open the `app/Providers/Filament/AdminPanelProvider.php` and right at the start of the list of middleware, add `VerifyAdminAccessSecret` middleware as follows.

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

Now, your Filament access is secured with the provided secret key.

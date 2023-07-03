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


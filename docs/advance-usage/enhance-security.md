---
title: Enhance security
weight: 1
---

# Enhance security

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

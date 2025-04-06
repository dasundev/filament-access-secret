---
title: How it works
weight: 2
---

# How it works

Once you set up and configure this package, it works by preventing access to `http://my-website.com/admin`. If you try to visit that link, you will see a "404" message. But if you add the secret key at the end of the URL like this: `http://my-website.com/admin/secret`, you will be able to access the admin panel.

This functionality is facilitated through a specific type of cookie working behind the scenes. This cookie validates whether you possess the authorization to access the Filament panel.

> [!IMPORTANT]
> The filament access secret key only works if your panel provider ID and path are the same.

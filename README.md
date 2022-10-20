# Statamic CP Resources

This addon provides a helpful 'Resources' page in the Control Panel for clients.

It's currently pretty specific to how we work at [Steadfast Collective](https://steadfastcollective.com). However, we may look at expanding it in the future to work for others.

## Features

This addon:

- Adds a page to the Control Panel allowing clients to watch [Loom](https://loom.com) videos on how to use the CMS
- Links to additional resources (such as guides & blog posts)
- Probably more in the future...

## How to Install

Run the following commands from your project root:

```bash
composer require steadfast-collective/statamic-cp-resources
php artisan vendor:publish --tag=statamic-cp-resources-config
```

## How to Use

By default, a 'Resources' page will be added to the Control Panel navigation. However, the page will be blank.

In the `config/statamic-client-dashboard.php` config file, you may configure the link to the Trello board, any Looms you wish to be displayed & any additional resources which should be linked.

You may also configure the titles used in the Control Panel navigation.

# Passport Plugin

[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/wintercms/wn-passport-plugin/blob/main/LICENSE)

Laravel Passport integration for WinterCMS.

## Installation

This plugin is available for installation via [Composer](http://getcomposer.org/).

**NOTE:** This is a WORK-IN-PROGRESS BETA plugin for integrating Laravel Passport with WinterCMS. It is not complete, and no guarantees are made in regards to it's working condition. Please test out and offer improvements / bug reports.

```bash
composer require winter/wn-passport-plugin
```

After installing the plugin you will need to run the migrations and (if you are using a [public folder](https://wintercms.com/docs/develop/docs/setup/configuration#using-a-public-folder)) [republish your public directory](https://wintercms.com/docs/develop/docs/console/setup-maintenance#mirror-public-files).

```bash
php artisan migrate
```

Following https://laravel.com/docs/10.x/passport#installation would have you run `php artisan passport:install`. Read https://laravel.com/docs/10.x/passport for more information on using Passport.

**NOTE:** The default backend user model is extended to work with Passport via the `Winter\Passport\Models\BackendUser` model, use that instead of `Backend\Models\User` when working with Passport.

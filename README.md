**NOTE:** This is a WORK-IN-PROGRESS BETA plugin for integrating Laravel Passport with WinterCMS. It is not complete, and no guarantees are made in regards to it's working condition. Please test out and offer improvements / bug reports.

# About
WORK-IN-PROGRESS Laravel Passport integration for WinterCMS

# Installation
Add the plugin to your application and then run `php artisan winter:up` to run the plugin's migrations. Following https://laravel.com/docs/10.x/passport#installation would have you run `php artisan passport:install`. Read https://laravel.com/docs/10.x/passport for more information on using Passport.

**NOTE:** The default backend user model is extended to work with Passport via the `LukeTowers\Passport\Models\BackendUser` model, use that instead of `Backend\Models\User` when working with Passport.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Step 1
Install new Laravel project:
```
laravel new blog-filament

cd blog-filament
```

### Step 2
Create the DB (i.e. blog_filament) and add the necessary credentials in the .env file.

### Step 3
Install Jetstream into your new Laravel project:
```
composer require laravel/jetstream
```
#### Install Jetstream With Livewire
```
php artisan jetstream:install livewire

npm install

npm run dev

php artisan migrate
```

### Step 4
```
php artisan config:cache
```

### Step 5: Install Filament

#### Requirements
Filament has a few requirements to run:
-   PHP 8.0+
-   Laravel v8.0+
-   Livewire v2.0+

This package is compatible with other Filament v2.x products. The  [form builder](https://filamentphp.com/docs/forms)  and  [table builder](https://filamentphp.com/docs/tables)  come pre-installed with the package, and no other installation steps are required to use them within the admin panel.

#### Installation

To get started with the admin panel, you can install it using the command:
```
composer  require  filament/filament
```
If you don't have one, you may create a new user account using:
```
php  artisan  make:filament-user
```

Visit your admin panel at  `/admin`  to sign in, and you're now ready to start  [building resources](https://filamentphp.com/docs/2.x/admin/resources)!

#### Publishing the configuration
If you wish, you may publish the configuration of the package using:
```
php  artisan  vendor:publish  --tag=filament-config
```
#### Publishing the views
```
php artisan vendor:publish --tag=filament-views
```
#### Publishing the translations
If you wish to translate the package, you may publish the language files using:
```
php  artisan  vendor:publish  --tag=filament-translations
```

### Step 6: Customize Dashboard
Create a new filament page
```
php artisan make:filament-page Dashboard
```
Edit/modify the Dashboard.php under App/Filament/Pages.
Then modify the filament configuration file config/filament.php
```php
	/*  
	|--------------------------------------------------------------------------  
	| Pages  
	|--------------------------------------------------------------------------  
	|  
	| This is the namespace and directory that Filament will automatically  
	| register pages from. You may also register pages here.  
	|  
	*/  
	  
	'pages' => [  
	  'namespace' => 'App\\Filament\\Pages',  
	  'path' => app_path('Filament/Pages'),  
	  'register' => [  
		 App\Filament\Pages\Dashboard::class,  		//<<<<<<<<< This line.
	  ],  
	],
```

### Step 7: Filament Theme Manager

Frontend Themes Manager for Filament Admin

#### Installation

You can install the package via composer:
```
composer require 3x1io/filament-themes
```
Run migration:
```
php artisan vendor:publish --provider="Spatie\LaravelSettings\LaravelSettingsServiceProvider" --tag="migrations"
php artisan migrate
```
Then publish the assets:
```
php artisan vendor:publish --tag="filament-themes"
```
Run migration:
```
php artisan migrate
```
Remove default route from routes/web.php
```
php artisan optimize
```
add to your composer.json
```
"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Database\\Factories\\": "database/factories/",
        "Database\\Seeders\\": "database/seeders/",
        "Themes\\": "resources/views/themes/"
    }
},
```

```
composer dump-autoload
```

### Step 8: Filament Translations

Manage your translation with DB and cache, you can scan your languages tags like  `trans()`,  `__()`, and get the string inside and translate them use UI.

this plugin is build in  [spatie/laravel-translation-loader](https://github.com/spatie/laravel-translation-loader)

#### Installation
You can install the package via composer:
```
composer require 3x1io/filament-translations
```
Run migration:
```
php artisan vendor:publish --tag="filament-translations"
php artisan vendor:publish --tag="filament-translations-config"
php artisan migrate
```
In  `config/app.php`  (Laravel) or  `bootstrap/app.php`  (Lumen) you should replace Laravel's translation service provider
```
Illuminate\Translation\TranslationServiceProvider::class,
```
by the one included in this package:
```
Spatie\TranslationLoader\TranslationServiceProvider::class,
```
#### Add Language Middleware

go to app/Http/Kernel.php and add new middleware to $middlewareGroups
```
    'web' => [
        //...
        \io3x1\FilamentTranslations\Http\Middleware\LanguageMiddleware::class,
    ],
```
go to config/filament.php and add middleware to middleware auth array
```
    'middleware' => [
        'auth' => [
            //...
            \io3x1\FilamentTranslations\Http\Middleware\LanguageMiddleware::class
        ],
        //...
    ];
```
and now clear cache
```
php artisan optimize:clear
```

### Step 8: Filament Translations

Manage your translation with DB and cache, you can scan your languages tags like  `trans()`,  `__()`, and get the string inside and translate them use UI.

this plugin is build in  [spatie/laravel-translation-loader](https://github.com/spatie/laravel-translation-loader)

#### Installation
You can install the package via composer:
```
composer require 3x1io/filament-translations
```
Run migration:
```
php artisan vendor:publish --tag="filament-translations"
php artisan vendor:publish --tag="filament-translations-config"
php artisan migrate
```
In  `config/app.php`  (Laravel) or  `bootstrap/app.php`  (Lumen) you should replace Laravel's translation service provider
```
Illuminate\Translation\TranslationServiceProvider::class,
```
by the one included in this package:
```
Spatie\TranslationLoader\TranslationServiceProvider::class,
```
#### Add Language Middleware

go to app/Http/Kernel.php and add new middleware to $middlewareGroups
```
    'web' => [
        //...
        \io3x1\FilamentTranslations\Http\Middleware\LanguageMiddleware::class,
    ],
```
go to config/filament.php and add middleware to middleware auth array
```
    'middleware' => [
        'auth' => [
            //...
            \io3x1\FilamentTranslations\Http\Middleware\LanguageMiddleware::class
        ],
        //...
    ];
```
and now clear cache
```
php artisan optimize:clear
```

### Step 9: [Filament Shield](https://github.com/bezhansalleh/filament-shield)

The easiest and most intuitive way to add access management to your Filament Admin:
-   🔥  **Resources**
-   🔥  **Pages**
-   🔥  **Widgets**
-   🔥  **Settings**  _New_

#### Installation

1.  Install the package via composer:
    ```
    composer require bezhansalleh/filament-shield
    ```
2.  Publish the config file with:
    ```
    php artisan vendor:publish --tag="filament-shield-config"
    ```
3.  Configure your options
    ```php
    <?php

    return [

    /*
     |--------------------------------------------------------------------------
     | Defualt Roles
     |--------------------------------------------------------------------------
     |
     | Permissions' generated will be assigned automatically to the following roles when enabled.
     | `filament_user` if enabled will help smoothly provide access to filament users
     | in production when implementing `FilamentUser` interface.
     */

        'super_admin' => [
            'enabled' => true,
            'role_name' => 'super_admin'
        ],

        'filament_user' => [
            'role_name' => 'filament_user',
            'enabled' => false
        ],

        /*
     |--------------------------------------------------------------------------
     | Default Prefixes
     |--------------------------------------------------------------------------
     |
     | When generating permissions for a `Resource` the resource `Model` will be prefixed with these.
     | Keep in mind the order since these will also be used in generating policies for the resources.
     |
     | When generating permission for a `Widget` or `Page` the widget or page name will be prefixed
     | with this.
     | But you are free to change these in to whatever works for you.
     */

        'prefixes' => [
            'resource' => [
                'view',
                'view_any',
                'create',
                'delete',
                'delete_any',
                'update',
                'export', // custom resource permission
            ],
            'page'  =>  'view',
            'widget' => 'view'
        ],

        /*
     |--------------------------------------------------------------------------
     | Entities Permission Generator
     |--------------------------------------------------------------------------
     | Enable the Entities for which you want the permissions or permissions and policies
     | to be auto generated when you run `php artisan shield:install` command.
     */

        'entities' => [
            'pages' => true,
            'widgets' => true,
            'resources' => true,
            'custom_permissions' => false,
        ],
        
        /*
     |--------------------------------------------------------------------------
     | Resources Generator Option
     |--------------------------------------------------------------------------
     | Here you may define the "generator" option for resources.
     | Sometimes it's beneficial to generate policies once locally, in case the production server
     | does not allow you to regenerate them (Laravel Vapor) or you have updated the policies.
     | Choose the option the fits best your use case.
     |
     | Supported options: "policies_and_permissions", "policies", "permissions"
     */

        'resources_generator_option' => 'policies_and_permissions',
        /*
     |--------------------------------------------------------------------------
     | Exclude
     |--------------------------------------------------------------------------
     | When enabled Exclude entites listed here during permission generation.
     |
     */

        'exclude' => [
            'enabled' => true,
            'pages' => [
                'Dashboard'
            ],
            'widgets' => [
                'AccountWidget',
                'FilamentInfoWidget'
            ],
            'resources' => [],
        ],

        /**
     * Register `RolePolicy` for `RoleResource`
     */
        'register_role_policy' => true,
    ];
    ```
4.  Add the  `Spatie\Permission\Traits\HasRoles`  trait to your User model(s):
    ```php
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Spatie\Permission\Traits\HasRoles;

    class User extends Authenticatable
    {
        use HasRoles;

        // ...
    }
    ```
5.  Now run the following command to setup everything:
    ```
    php artisan shield:install
    ```
Follow the prompts and enjoy!

### Step 10: [Filament Breezy](https://github.com/jeffgreco13/filament-breezy)
### A custom package for Filament with login flow, profile and teams support.
The missing toolkit from Filament Admin with Breeze-like functionality. Includes login, registration, password reset, password confirmation, email verification, and a my profile page. All using the TALL-stack, all very Filament-y.
#### Installation

1.  Install the package via composer:
    ```
    composer require jeffgreco13/filament-breezy
    ```
2.  Update the  `config/filament.php`  to point to the Breezy Login::class.
    ```php
    "auth" => [
        "guard" => env("FILAMENT_AUTH_GUARD", "web"),
        "pages" => [
            "login" =>
                \JeffGreco13\FilamentBreezy\Http\Livewire\Auth\Login::class,
        ],
    ],
    ```
Optionally, you can publish the Breezy config file for further customizations, such as Password rules, redirect after registration, and enable/disable the profile page.
```
php artisan vendor:publish --tag="filament-breezy-config"
```
Optionally, you can publish the views using:
```
php artisan vendor:publish --tag="filament-breezy-views"
```
#### [](https://github.com/jeffgreco13/filament-breezy#enable-two-factor-authentication-2fa)Enable Two Factor Authentication (2FA)

By default, 2FA is disabled. To enable it Two Factor Authentication in your app:

1.  Set  `enable_2fa => true`  in the filament-breezy config:
    ```php
    /*
    |--------------------------------------------------------------------------
    | Enable Two-Factor Authentication (2FA).
    */
    "enable_2fa" => true,
    ```
_NOTE:_  if you are using a table other than  `users`, you can update the table name in the filament-breezy config or modify the published migration.

2.  Publish and run the migrations:
    ```
    php artisan vendor:publish --tag="filament-breezy-migrations"
    php artisan migrate
    ```
3.  Add  `JeffGreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable`  to your Authenticatable model:
    ```php
    use JeffGreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;

    class User extends Authenticatable
    {
        use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;
        ...
    ```
#### [](https://github.com/jeffgreco13/filament-breezy#usage)Usage

#### [](https://github.com/jeffgreco13/filament-breezy#email-verification)Email Verification

Uses the  [Laravel Email Verification](https://laravel.com/docs/8.x/verification)  service. Implement  `MustVerifyEmail`  on your User model:
```php
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
```
Then you can add the  `verified`  middleware to any of your routes:
```php
Route::get("/profile", function () {
    // Only verified users may access this route...
})->middleware("verified");
```
Or, force verified emails on your entire Filament Admin by adding the  `EnsureEmailIsVerified`  class to the auth middleware in  `config/filament.php`:
```php
"middleware" => [
    "auth" => [
        Authenticate::class,
        Illuminate\Auth\Middleware\EnsureEmailIsVerified::class
    ],
    ....
```

### Step 11: [Filament Excel](https://github.com/3x1io/filament-excel)

Excel Export for Resources

#### Installation

You can install the package via composer:
```
composer require 3x1io/filament-excel
```
and now clear cache
```
php artisan optimize:clear
```
#### Usage

it's very easy to generate export just use this command
```
php artisan filament:export UserResource User
```
where  `UserResource`  is a Resource name and  `User`  is a Model.

### Step 12: [Filament User](https://github.com/3x1io/filament-user)

User Resource For Filament Admin

#### Installation

Before install looking for this packages and install it

-   [filament-shield](https://github.com/bezhansalleh/filament-shield)
-   [filament-breezy](https://github.com/jeffgreco13/filament-breezy)
-   [filament-excel](https://github.com/3x1io/filament-excel)

You can install the package via composer:
```
composer require 3x1io/filament-user -W
```
and now clear cache
```
php artisan optimize:clear
```


### Step 13: [Filament Browser](https://github.com/3x1io/filament-browser)

File & Folders & Media Browser With Code Editor

#### Features

-   File Browser
-   Code Editor with highlights
-   Media Viewer
-   .Env Editor

#### Installation

You can install the package via composer:
```
composer require 3x1io/filament-browser
```
Then publish the assets:
```
php artisan vendor:publish --tag="filament-browser-js"
```
and now clear cache
```
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
```

### Step 14: [Filament Menus](https://github.com/3x1io/filament-menus)

Menu View Generator Using Livewire

#### Installation

You can install the package via composer:
```
composer require 3x1io/filament-menus
```
load livewire component
```
php artisan livewire:discover
```
load migrations
```
php artisan migrate
```
and now clear cache
```
php artisan optimize:clear
```
#### Usage

go to route  `admin/menus`  and create a new menu and you will get the code of livewire component

you can build a menu just by using this command as a livewire component
```php
@livewire('menu', ['key' => "header"])
```
where  `header`  is a key of menu and you will get the code ready on the Table list of menus

you can use custome view ex:
```php
@livewire('menu', ['key' => "header", 'view'=> "livewire.menu"])
```
by default we use Tailwind as a main view with this code
```php
@foreach ($menu as $item)
<a class="text-gray-500" href="{{ $item['url'] }}" @if($item['blank']) target="_blank" @endif>
    <span class="flex justify-between">
        @if(isset($item['icon']) && !empty($item['icon']))
        <x-icon class="w-4 h-4 mx-2" name="{{ $item['icon'] }}"></x-icon>
        @endif
        {{ $item['title'] }}
    </span>
</a>
@endforeach
```

### Step 15: [Filament Sitemap](https://github.com/3x1io/filament-sitemap)
Site Settings Like title, description, profile and Sitemap Generator

#### Installation

Before install looking for this packages and install it

-   [spatie-laravel-settings-plugin](https://filamentphp.com/docs/2.x/spatie-laravel-settings-plugin/installation)
-   [laravel-sitemap](https://github.com/spatie/laravel-sitemap)
-   [filament-themes](https://github.com/3x1io/filament-themes)

You can install the package via composer:
```
composer require 3x1io/filament-sitemap
```
don't forget to migrate the settings table form  [spatie-laravel-settings-plugin](https://filamentphp.com/docs/2.x/spatie-laravel-settings-plugin/installation)

run migration
```
php artisan migrate
```
and now clear cache
```
php artisan optimize:clear
```

### Step 16: [Filament Artisan Commands GUI](https://github.com/3x1io/filament-commands#installation)

Simple but yet powerful library for running some  [artisan](https://laravel.com/docs/8.x/artisan)  commands. this packages is a frok of  [artisan-gui](https://github.com/infureal/artisan-gui)  with some custome for filament UI

#### Installation

You can install the package via composer:
```
composer require 3x1io/filament-commands
```
By default package has predefined config and inline styles and scripts. Since version  `1.4`  you can publish vendors like css and js files in  `vendor/artisan-gui`:
```
php artisan vendor:publish --provider="io3x1\FilamentCommands\FilamentCommandsProvider"
```
Publish only config:
```
php artisan vendor:publish --tag="artisan-gui-config"
```
Publish only styles and scripts:
```
php artisan vendor:publish --tag="artisan-gui-css-js"
```
#### Running command

By default, you can access this page only in local environment. If you wish you can change  `local`  key in config.

Simply go to  `http://you-domain.com/admin/artisan`  and here we go! Select needed command from list, fill arguments and options/flags and hit  `run`  button.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

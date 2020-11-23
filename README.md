# Lite Admin Package
---
lite admin package create your dashboard with users, roles and settings with only one line.

#### Installation
```bash
composer require alqudiry/lite-admin
```

#### Publish 
```bash
php artisan vendor:publish --provider="Alqudiry\LiteAdmin\LiteAdminServiceProvider"
```

### Configuration
Update your "App\Http\Kernel.php" to include appMiddleware class:
```php
'appMiddleware' => \App\Http\Middleware\AppMiddleware::class,
```

Update your "routes\web.php" to include this routes:
```php
Route::group(['middleware' => 'appMiddleware'], function () {
    
    Route::get('/', function () {
        return view('index');
    })->name('home');

    Auth::routes();
    

    Route::group(['middleware' => 'auth'], function () {
    
        Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {

            Route::group(['prefix' => 'core', 'as' => 'core.'], function () {

                Route::get('statistics', [\App\Http\Controllers\Dashboard\Core\StatisticsController::class, 'index'])->name('statistics.index');
                
                Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {

                    Route::resource('general', \App\Http\Controllers\Dashboard\Core\Settings\GeneralController::class)->only('index', 'store');
                    Route::resource('mail', \App\Http\Controllers\Dashboard\Core\Settings\MailController::class)->only('index', 'store');
    
                });

                Route::resource('roles', \App\Http\Controllers\Dashboard\Core\RolesController::class);
                Route::resource('users', \App\Http\Controllers\Dashboard\Core\UsersController::class);
            
            });

        });

    });

});
```


### You Are Ready ..

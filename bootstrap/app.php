<?php

require_once __DIR__.'/../vendor/autoload.php';

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
*/

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->singleton(
    Illuminate\Http\Request::class,
    function () {
        return Illuminate\Http\Request::capture();
    }
);

$app->withFacades();
$app->withEloquent();

$app->singleton(FakerGenerator::class, function () {
    return FakerFactory::create('pt_BR'); // ou 'en_US' se preferir
});

$app->singleton(EloquentFactory::class, function ($app) {
    return EloquentFactory::construct(
        $app->make(Faker\Generator::class),
        database_path('migrations')
    );
});

/*
|--------------------------------------------------------------------------
| Register Config Files
|--------------------------------------------------------------------------
*/

$app->configure('app');
$app->configure('database');
$app->configure('view');
$app->configure('session');

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
*/

$app->register(Illuminate\Session\SessionServiceProvider::class);
$app->register(Illuminate\View\ViewServiceProvider::class);
$app->register(Illuminate\Routing\RoutingServiceProvider::class);
$app->register(Barryvdh\DomPDF\ServiceProvider::class);


// Aliases
$app->alias('session', Illuminate\Session\Store::class);
$app->alias('view', Illuminate\View\Factory::class);
$app->alias('redirect', Illuminate\Routing\Redirector::class);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
*/

$app->middleware([
    Illuminate\Session\Middleware\StartSession::class,
    App\Http\Middleware\StartNativeSession::class, // Se necessário
]);

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

/*
|--------------------------------------------------------------------------
| Helper Functions
|--------------------------------------------------------------------------
*/

if (!function_exists('resource_path')) {
    function resource_path($path = '')
    {
        return app()->basePath() . '/resources' . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('session')) {
    function session($key = null, $default = null) {
        $session = app('session');
        if (is_null($key)) {
            return $session;
        }
        return $session->get($key, $default);
    }
}

if (!function_exists('old')) {
    function old($key, $default = null)
    {
        return app('request')->old($key, $default);
    }
}

return $app;

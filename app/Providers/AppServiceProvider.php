<?php

namespace App\Providers;

use App\Models\Passport\Client;
use Illuminate\Support\ServiceProvider;
use Carbon\CarbonInterval;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Passport::ignoreRoutes();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::useClientModel(Client::class);
        Passport::tokensExpireIn(CarbonInterval::days(15));
        Passport::refreshTokensExpireIn(CarbonInterval::days(30));
        Passport::personalAccessTokensExpireIn(CarbonInterval::months(6));

        Passport::tokensCan([
            'students:read' => 'Recibir informacion de todos los estudiantes',
            'teachers:read' => 'Recibir informacion de todos los profesores',
            'developers:read' => 'Recibir informacion de todos los desarrolladores/admins',
            'user' => 'Brindar informacion de todo usuario sin incluir correo electronico',
            'email' => 'Brindar correo electronico',
        ]);

        // By providing a view name...
        Passport::authorizationView('auth.oauth.authorize');

        // // By providing a closure...
        // Passport::authorizationView(
        //     fn($parameters) => Blade::render('Auth/OAuth/Authorize', [
        //         'request' => $parameters['request'],
        //         'authToken' => $parameters['authToken'],
        //         'client' => $parameters['client'],
        //         'user' => $parameters['user'],
        //         'scopes' => $parameters['scopes'],
        //     ])
        // );
    }
}

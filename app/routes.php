<?php
    
    use App\Middleware\GuestMiddleware;
    
    // use App\Middleware\AuthMiddleware;
    
    // $app->group('', function () {
    //     $this->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
    //     $this->post('/auth/signup', 'AuthController:postSignUp');
    //
    //     $this->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
    //     $this->post('/auth/signin', 'AuthController:postSignIn');
    // })->add(new GuestMiddleware($container));
    //
    //
    // $app->group('', function () {
    //     $this->get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');
    //
    //     $this->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');
    //     $this->post('/auth/password/change', 'PasswordController:postChangePassword');
    // })->add(new AuthMiddleware($container));
    //
    //
    $app->group('/api', function ($container) {
        $this->group('/v1', function ($container) {
            
            $this->get('{a:/{0,1}}', 'HomeController:index')->setName('home');
            
            $this->group('', function ($container) {
                $this->map(['GET', 'POST'], '/publish', 'PubController:pub')->setName('pub');
            })->add(new GuestMiddleware($container));
        });
    });
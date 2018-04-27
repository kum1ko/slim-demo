<?php
    
    $_SERVER['SCRIPT_NAME'] = "/index.php";
    error_reporting(E_ALL || ~E_NOTICE);
    header("Content-Type:application/json; charset=utf-8");
    require __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/database.php';
    
    try {
        $dotenv = (new \Dotenv\Dotenv(__DIR__ . '/../'))->load();
    } catch (\Dotenv\Exception\InvalidPathException $e) {
    }
    
    
    use Respect\Validation\Validator as v;
    use Slim\Middleware\TokenAuthentication;
    use App\Extend\ResponseExtend as Response;
    
    
    // instantiate the App object
    $app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ],
    ]);
    
    $container = $app->getContainer();
    //
    // $container['db'] = function ($container) use ($capsule) {
    //     return $capsule;
    // };
    //
    // $container['auth'] = function ($container) {
    //     return new \App\Auth\Auth;
    // };
    //
    // $container['flash'] = function ($container) {
    //     return new \Slim\Flash\Messages;
    // };
    //
    // $container['view'] = function ($container) {
    //     $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views/', [
    //         'cache' => false,
    //     ]);
    //
    //     $view->addExtension(new \Slim\Views\TwigExtension(
    //         $container->router,
    //         $container->request->getUri()
    //     ));
    //
    //     $view->getEnvironment()->addGlobal('auth', [
    //         'check' => $container->auth->check(),
    //         'user'  => $container->auth->user()
    //     ]);
    //
    //     $view->getEnvironment()->addGlobal('flash', $container->flash);
    //
    //     return $view;
    // };
    //
    
    $container['cache'] = function () {
        return new \Slim\HttpCache\CacheProvider();
    };
    $container['validator'] = function ($container) {
        return new App\Validation\Validator;
    };
    $container['HomeController'] = function ($container) {
        return new \App\Controllers\HomeController($container);
    };

    $container['UserController'] = function ($container) {
        return new \App\Controllers\UserController($container);
    };
    $container['InvitationController'] = function ($container) {
        return new \App\Controllers\System\InvitationController($container);
    };
    $container['TestController'] = function ($container) {
        return new \App\Controllers\TestController($container);
    };
    $container['FileController'] = function ($container) {
        return new \App\Controllers\FileController($container);
    };
    $container['PubController'] = function ($container) {
        return new \App\Controllers\PubController($container);
    };
    $container['response'] = function ($container) {
        return new Response;
    };
    
    $container['notAllowedHandler'] = function ($container) {
        return function ($request, $response, $methods) use ($container) {
            return $container['response']
                ->withJson([
                    "response" => [
                        "uri"    => $_SERVER['REQUEST_URI'],
                        "method" => $request->getMethod(),
                        // "exception" => $exception->getMessage(),
                        // "name"      => $class[count($class) - 1]
                    ],
                    "msg"      => 'Method must be one of: ' . implode(', ', $methods),
                    "code"     => 405
                ], 405);
            
            // return $c['response']
            //     ->withStatus(405)
            //     ->withHeader('Allow', implode(', ', $methods))
            //     ->withHeader('Content-type', 'text/html')
            //     ->write('Method must be one of: ' . implode(', ', $methods));
        };
    };
    $container['errorHandler'] = function ($container) {
        return function ($request, $response, $exception) use ($container) {
            $class = get_class($exception);
            $class = explode("\\", $class);
            
            if (!empty($_COOKIE[getenv('DEV_MARK_NAME')]) && $_COOKIE[getenv('DEV_MARK_NAME')] === getenv('DEV_MARK_VALUE')) {
                return $container['response']
                    // ->withStatus(404)
                    ->withJson([
                        "response" => [
                            "uri"       => $_SERVER['REQUEST_URI'],
                            "method"    => $request->getMethod(),
                            "exception" => $exception->getMessage(),
                            "name"      => $class[count($class) - 1]
                        ],
                        "msg"      => "Internal Server Error",
                        "code"     => 500
                    ], 500);
            } else {
                return $container['response']
                    // ->withStatus(404)
                    ->withJson([
                        "response" => "",
                        "msg"      => "Internal Server Error",
                        "code"     => 500
                    ], 500);
            }
        };
    };
    
    
    $container['notFoundHandler'] = function ($container) {
        return function ($request, $response) use ($container) {
            return $container['response']
                // ->withStatus(404)
                ->withJson([
                    "response" => [
                        "uri"    => $_SERVER['REQUEST_URI'],
                        "method" => $request->getMethod()
                    ],
                    "msg"      => "request uri does not exist",
                    "code"     => 404
                ], 200);
            // ->withHeader('Content-Type', 'text/html')
            // ->write('Page not found');
        };
    };
    
    $container['csrf'] = function ($container) {
        return new \Slim\Csrf\Guard;
    };
    
    
    v::with('App\\Validation\\Rules\\');
    
    $authenticator = function ($request, TokenAuthentication $tokenAuth) {
        
        # Search for token on header, parameter, cookie or attribute
        $token = $tokenAuth->findToken($request);
        
        # Your method to make token validation
        // $user = User::auth_token($token);
        # If occured ok authentication continue to route
        # before end you can storage the user informations or whatever
        
    };
    
    
    require __DIR__ . '/../app/routes.php';

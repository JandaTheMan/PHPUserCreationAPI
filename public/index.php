<?php

use Application\UserApplicationService;
use Controllers\UserController;
use Domain\UserDomainService;
use Infrastructure\RedisRepository;
use Predis\Client;
use Slim\Http\Request;
use Slim\Http\Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

//$app->post('/users/create',UserController::class.':createUser');
$app->post('/users/create',function($req, $res, $args){
    $redis = new Client(array(
        "scheme" => "tcp",
        "host" => "localhost",
        "port" => "6379",
        "password” => “"));
    $redisRepository = new RedisRepository($redis);
    $domainUserService = new UserDomainService($redisRepository);
    $userApplicationService = new UserApplicationService($domainUserService);
    $userController = new UserController($userApplicationService);
    $jsonUser = $userController->createUser($req, $res, $args);
    return $jsonUser;
});

$app->get('/users/{id}',function($req, $res, $args){
    $redis = new Client(array(
        "scheme" => "tcp",
        "host" => "localhost",
        "port" => "6379",
        "password” => “"));
    $redisRepository = new RedisRepository($redis);
    $domainUserService = new UserDomainService($redisRepository);
    $userApplicationService = new UserApplicationService($domainUserService);
    $userController = new UserController($userApplicationService);
    $jsonUser = $userController->retrieveUser($req, $res, $args);
    return $jsonUser;

});

$app->run();

/*if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});
// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();*/
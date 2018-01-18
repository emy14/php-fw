<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';

use Metinet\Core\Connexion\Password;
use Metinet\Core\Connexion\Session;
use Metinet\Core\Connexion\UserAccount;
use Metinet\Core\Connexion\UserCollection;
use Metinet\Core\Connexion\UserConnexion;
use Metinet\Core\Http\Request;
use Metinet\Core\Http\Response;
use Metinet\Core\Routing\RouteUrlMatcher;
use Metinet\Core\Routing\RouteNotFound;
use Metinet\Core\Config\JsonFileLoader;
use Metinet\Core\Config\ChainLoader;
use Metinet\Core\Controller\ControllerResolver;
use Metinet\Core\Config\Configuration;
use Metinet\Domain\Event\Email;

$request = Request::createFromGlobals();

$loader = new ChainLoader([
    new JsonFileLoader([__DIR__ . '/../conf/app.json']),
]);

$config = new Configuration($loader);
$logger = $config->getLogger();

$users = new UserCollection();

//inscription
$user1 = new UserAccount(new Email("noemiemais@gmail.com"), new Password("password1D"));
$user2 = new UserAccount(new Email("boisard@gmail.com"), new Password("password1D3"));
$user3 = new UserAccount(new Email("noemiemais@gmail.com"), new Password("password1D"));


$users->add($user1);
$users->add($user2);
//$users->add($user3);

$connexion = new UserConnexion(new Email("noemiemais@gmail.com"), "password1D");
$session = new Session($connexion);
$session->connect($users);


try {
    $controllerResolver = new ControllerResolver(new RouteUrlMatcher($config->getRoutes()));
    $callableAction = $controllerResolver->resolve($request);
    $response = call_user_func($callableAction, $request);
} catch (RouteNotFound $e) {
    $logger->log($e->getMessage(), ['url' => $request->getPath()]);
    $response = new Response('Page not found', 404);
} catch (Throwable $e) {
    $logger->log($e->getMessage(), ['url' => $request->getPath()]);
    $response = new Response(sprintf('<p>Error: %s</p>', $e->getMessage()), 500);
}

$response->send();

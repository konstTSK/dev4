<?php
if( !session_id() ) {
    session_start();
}

require __DIR__.'/../vendor/autoload.php';

use App\QueryBuilder;
use function \Tamtamchik\SimpleFlash\flash;

    flash()->message('HOT!');

$output = flash()->display();

echo $output;



$db = new QueryBuilder();

//d($db);

//d($GLOBALS); // or simply use d() as a shorthand

// Create new Plates instance
$templates = new League\Plates\Engine('../app/views');
// Render a template
echo $templates->render('homepage', ['name' => 'Jonathan']);

/////////////////////////////
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\ConfigureRoutes $r) {
    $r->addRoute('GET', '/users', 'get_all_users_handler');
    // {id} must be a number (\d+)
    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    // The /{title} suffix is optional
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        break;
}
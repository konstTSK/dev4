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

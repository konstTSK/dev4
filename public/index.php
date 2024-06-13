<?php

require __DIR__.'/../vendor/autoload.php';

use App\QueryBuilder;

$db = new QueryBuilder();

var_dump($db->getAll('user'));


//use Aura\SqlQuery\QueryFactory;


//$pdo = new PDO("mysql:host=localhost;dbname=diplom","root","root");
//
//$queryFactory = new QueryFactory('mysql');
//$select = $queryFactory->newSelect();
//
// $select->cols(['*'])->from('user');
//$d  = $select->getStatement();
//
//
//
//$stmt = $pdo->prepare($d);
//$stmt->execute($select->getBindValues());
//
//$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//
//
//echo '<pre>';
//var_dump($result);

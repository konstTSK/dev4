<?php

namespace App;

use PDO;

class QueryBuilder {

    private $pdo;

    function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=diplom","root","root");


     }

    public function getAll($table){

     //   return $this->pdo;

     return $table;
    }
}
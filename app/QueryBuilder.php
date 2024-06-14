<?php

namespace App;

use PDO;
use Aura\SqlQuery\QueryFactory;

class QueryBuilder {

    private $pdo;
    private $queryFactory;

    function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=diplom","root","root");
        $this->queryFactory = new QueryFactory('mysql');
     }

    public function getAll($table){
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])->from($table);
        $stmt = $this->pdo->prepare($select->getStatement());
        $stmt->execute($select->getBindValues());
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert($data,$table){
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)
            ->cols($data);
        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());
    }

    public function update($data,$id,$table){
        $update = $this->queryFactory->newUpdate();
        $update->table($table)
        ->cols($data)
        ->where('id = :id')
        ->bindValue('id',$id);

        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());

    }

    public function delete($id,$table)
    {
        $delete = $this->queryFactory->newDelete();
        $delete
            ->from($table)
            ->where('id = :id')
            ->bindValue('id',$id);;

        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());
    }
}
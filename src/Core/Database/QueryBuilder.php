<?php

namespace PAW\Core\DataBase;

use PDO;
use Monolog\Logger;

class QueryBuilder
{
  public function __construct(PDO $pdo, Logger $logger = null)
  {
    $this->pdo = $pdo;
    $this->logger = $logger;
  }

  public function select($table)
  {
    /*$where = " 1 = 1 ";
    if (isset($params['id'])) {
      $where = " id = :id ";
    }*/
    $query = "SELECT * FROM {$table}";
    $sentencia = $this->pdo->prepare($query);
    /*if (isset($params['id'])) {
      $sentencia->bindValue(":id", $params['id']);
    }*/
    $sentencia->setFetchMode(PDO::FETCH_ASSOC);
    $sentencia->execute();
    return $sentencia->fetchAll();
  }

  public function insert($table, $params = [], $columns = [])
  {
    $placeholders = rtrim(str_repeat('?, ', count($columns)), ', ');
    $columnString = implode(', ', $columns);
    $query = "INSERT INTO {$table} ({$columnString}) VALUES ({$placeholders})";
    $sentencia = $this->pdo->prepare($query);
    $i = 1;
    foreach ($params as $param) {
        $sentencia->bindValue($i, $param);
        $i++;
    }
    $sentencia->setFetchMode(PDO::FETCH_ASSOC);
    $sentencia->execute();
  }

  public function update()
  {

  }

  public function delete()
  {

  }
}

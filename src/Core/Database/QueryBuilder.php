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
    //WHERE id = 1 AND nombre = 'pepe AND email = '...' ;
    //WHERE id = ?
    //WHERE id = :id (flag)
    /*$where = " 1 = 1 ";
    if (isset($params['id'])) {
      $where = " id = :id ";
    }*/
    try {
      $query = "SELECT * FROM {$table}";
      $sentencia = $this->pdo->prepare($query);
      /*if (isset($params['id'])) {
        $sentencia->bindValue(":id", $params['id']);
      }*/
      $sentencia->setFetchMode(PDO::FETCH_ASSOC);
      $sentencia->execute();
      return $sentencia->fetchAll();
    } catch (PDOException $e) {
      $this -> logger -> getLogger() -> info(
        "Error al ejecutar la consulta: " . $e->getMessage(),
        [
            "Operation" => 'SELECT',
            "Table" => $table,
        ]
      );
    }
  }

  public function selectByColumn($table, $column, $value){
    try {

    $query = "SELECT * FROM {$table} WHERE {$column} = :value";
    $sentencia = $this->pdo->prepare($query);
    $sentencia->bindParam(':value', $value);
    $sentencia->execute();
    return $sentencia -> fetchAll();
    } catch (PDOException $e) {
      $this -> logger -> getLogger() -> info(
        "Error al ejecutar la consulta: " . $e->getMessage(),
        [
            "Operation" => 'SELECT',
            "Table" => $table,
            "Column" => $column
        ]
      );
    }
  }

  public function insert($table, $data)
  {
    try {
      $columns = implode(", ", array_keys($data));
      $placeholders = ":" . implode(", :", array_keys($data));
      $query = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
      $sentencia = $this->pdo->prepare($query);
      foreach ($data as $column => $value) {
        $sentencia->bindValue(':' . $column, $value);
      }
      $result = $sentencia->execute();
      if($result != true) {
        throw new PDOException($sentencia->errorInfo()[2]);
      }
    } catch (PDOException $e) {
      $this -> logger -> getLogger() -> info(
        "Error al ejecutar la consulta: " . $e->getMessage(),
        [
            "Operation" => 'INSERT',
            "Table" => $table
        ]
      );
    }
  }
  public function update()
  {

  }
  public function delete()
  {

  }
}

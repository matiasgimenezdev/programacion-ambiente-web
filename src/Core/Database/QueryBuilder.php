<?php

namespace PAW\Core\DataBase;

use PDO;
use Monolog\Logger;
use PAW\Core\Traits\Loggable;
class QueryBuilder
{
  use Loggable;

  public function __construct(PDO $pdo, Logger $logger = null)
  {
    $this->pdo = $pdo;
    $this->logger = $logger;
  }

  public function select($table)
  {

    try {
      $query = "SELECT * FROM {$table}";
      $sentencia = $this->pdo->prepare($query);

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

  public function selectByColumnWithFilter($table, $column, $filter){
    try {
      $query = "SELECT * FROM {$table} WHERE {$column} LIKE :filter";
      $sentencia = $this->pdo->prepare($query);
      $sentencia->bindValue(':filter', "%$filter%", PDO::PARAM_STR);
      $result = $sentencia->execute();
      $sentencia->setFetchMode(PDO::FETCH_ASSOC);
      // echo "<pre>";
      // var_dump($sentencia->fetchAll());
      // die;
      return $sentencia->fetchAll();
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

  public function update($table, $data)
  {
    try {
      $setValues = [];
      foreach ($data as $column => $value) {
          $setValues[] = $column . ' = :' . $column;
      }
      $setClause = implode(", ", $setValues);
      $query = "UPDATE {$table} SET {$setClause} WHERE id_paciente = :id";
      $sentencia = $this->pdo->prepare($query);

      foreach ($data as $column => $value) {
          $sentencia->bindValue(':' . $column, $value);
      }
      $sentencia->bindValue(':id', $data["id_paciente"]);
      $result = $sentencia->execute();
      if ($result != true) {
          throw new PDOException($sentencia->errorInfo()[2]);
      }
  } catch (PDOException $e) {
      $this->logger->getLogger()->info(
          "Error al ejecutar la consulta: " . $e->getMessage(),
          [
              "Operation" => 'UPDATE',
              "Table" => $table
          ]
      );
  }
  }

  public function deleteById($table, $column, $id)
  {
    $query = "DELETE FROM {$table} WHERE {$column} = {$id}";
    $sentencia = $this->pdo->prepare($query);
    $result = $sentencia->execute();
    if ($result != true) {
        throw new PDOException($sentencia->errorInfo()[2]);
    }
  }

  public function join($tables, $conditions, $columns)
  {
    try {
      $query = "SELECT {$columns}
            FROM {$tables[0]}
            INNER JOIN {$tables[1]} ON {$tables[0]}.{$conditions[0]} = {$tables[1]}.{$conditions[1]}";

      $firstTable = array_shift($tables);
      $antCondition = array_shift($conditions);

      foreach($tables as $table){
        $antTable = array_shift($tables);
        $antCondition = array_shift($conditions);
        $antCondition = array_shift($conditions);
        if(count($tables) > 0) {
          $query = $query . " INNER JOIN {$tables[0]} ON {$firstTable}.{$antCondition} = {$tables[0]}.{$conditions[0]}";
        } else {
          break;
        }
      }


      $sentencia = $this->pdo->prepare($query);

      $result = $sentencia->execute();
      if ($result != true) {
          throw new PDOException($sentencia->errorInfo()[2]);
      }
      return $sentencia -> fetchAll();
    } catch (PDOException $e) {
      $this->logger->getLogger()->info(
          "Error al ejecutar la consulta: " . $e->getMessage(),
          [
              "Operation" => 'JOIN',
              "Table 1" => $table1,
              "Table 2" => $table2
          ]
      );
    }
  }
}

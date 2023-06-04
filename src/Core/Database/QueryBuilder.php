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

  public function join($tables, $conditions, $columns, $email)
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

      $query = $query . " WHERE turno.email = '{$email}'";

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


  // Este metodo se ejecuta una unica vez para cargar datos de prueba en la BDD.
  public function loadData() {
    $this -> insert('obra_social', [
      "name" => "Swiss Medical",
      "img" => "assets/images/obras-sociales/SwissMedical.svg" 
    ]);
    $this -> insert('obra_social', [
      "name" => "Jerarquicos Salud",
      "img" => "assets/images/obras-sociales/JerarquicosSalud.png"
    ]);
    $this -> insert('obra_social', [
      "name" => "IOMA - Instituto Obra Médico Asistencial",
      "img" => "assets/images/obras-sociales/IOMA.png" 
    ]);
    $this -> insert('obra_social', [
      "name" => "OSDE - Organización de Servicios Directos Empresarios",
      "img" => "assets/images/obras-sociales/OSDE.png"
    ]);
    $this -> insert('obra_social', [
      "name" => "Medife",
      "img" => "assets/images/obras-sociales/Medife.jpg",
    ]);

    $this -> insert('especialidad', [
      "name" => "Odontologia",
      "description" => "Descripcion Odontologia",
    ]);

    $this -> insert('especialidad', [
      "name" => "Cardiologia",
      "description" => "Descripcion Cardiologia",
    ]);

    $this -> insert('especialidad', [
      "name" => "Dermatologia",
      "description" => "Descripcion Dermatologia",
    ]);

    $this -> insert('profesional', [
      "matricula" => 3737,
      "id_especialidad" => 1,
      "name" => "Tekito",
      "lastname" => "Lakarie",
      "hora_inicio" => "09:00",
      "hora_fin" => "12:00",
      "duracion_turno" => 20,
      "description" => "Descripcion Tekito Lakarie",
    ]);

    $this -> insert('profesional', [
      "matricula" => 2222,
      "id_especialidad" => 2,
      "name" => "Tarayado",
      "lastname" => "Tukoko",
      "hora_inicio" => "13:00",
      "hora_fin" => "18:00",
      "duracion_turno" => 30,
      "description" => "Descripcion Tarayado Tukoko",
    ]);

    $this -> insert('profesional', [
      "matricula" => 9595,
      "id_especialidad" => 3,
      "name" => "Isee",
      "lastname" => "Deadpeople",
      "hora_inicio" => "15:00",
      "hora_fin" => "18:00",
      "duracion_turno" => 10,
      "description" => "Descripcion Isee Deadpeople",
    ]);
  }
}

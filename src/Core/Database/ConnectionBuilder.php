<?php

namespace PAW\Core\DataBase;

use PDO;
use PDOException;
use PAW\Core\Config;
use PAW\Core\Traits\Loggable;

class ConnectionBuilder 
{
  use Loggable;

  public function make(Config $config):PDO
  {
      $adapter = $config->getConfig('DB_ADAPTER');
      $hostname = $config->getConfig('DB_HOST');
      $dbName = $config->getConfig('DB_NAME');
      $port = $config->getConfig('DB_PORT');
      $charset = $config->getConfig('DB_CHARSET');

      return new PDO(
        "{$adapter}:host={$hostname};dbname={$dbName};
          port={$port};charset={$charset}",
        $config->getConfig('DB_USER'),
        $config->getConfig('DB_PASS'),
        [
          'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ]
        ]
      );
  }
}
?>

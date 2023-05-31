<?php

namespace PAW\Core;

use PAW\Core\DataBase\QueryBuilder;
use PAW\Core\Traits\Loggable;

class Model 
{
  use Loggable;


  public function setQueryBuilder(QueryBuilder $qb){
    $this->queryBuilder = $qb;
  }
}
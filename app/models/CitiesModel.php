<?php 
namespace models;

class cities extends baseModel{
public int $cities_id;
public string $cities_name;

public function __construct(){
parent::__construct();
}

public function show($name_cities)
{
  
    $query = "SELECT * FROM families INNER JOIN cities city_id=cities_id WHERE city_id=$name_cities";
    $stmt = $this->connection->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function id_city($name_cities)
{
  
    $query = "SELECT cities_id FROM cities  WHERE cities_name=$name_cities";
    $stmt = $this->connection->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



}





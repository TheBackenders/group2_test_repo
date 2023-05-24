<?php 

namespace models;



class Family extends baseModel{
public int $id;
public string $full_name;
public string $job;
public string $family_number;

public string $phone;

public string $city_id;
public function __construct(){
parent::__construct();
}






}





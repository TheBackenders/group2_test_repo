<?php

namespace app\controllers;


class base_controllers {

protected $model;
public function __construct(){
 
}


public function  load_view ($view,$args){
    require('C:\xampp\htdocs\darrbeni\PartTow\mvc\views'.'\\'.$view.'.html');
}


}
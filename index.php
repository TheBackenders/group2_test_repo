<?php

define('BASE_PATH','/group2_test_repo-master/');
$req=$_SERVER['REQUEST_URI'];
use app\baseController\BaseController;
switch ($req)
{
    case BASE_PATH:
        require_once __DIR__ . '\app\controllers\baseController.php';
        $controller=new BaseController();
        $controller->load_view('index',[]);
        break;
    case BASE_PATH . 'signup':
        require_once __DIR__ . '\app\controllers\FamilyController.php';
        $controller=new FamilyController();
        $con
        $controller->load_view('signup',[]);
        $controller->add();
        break;
    case BASE_PATH . 'show':
        require_once __DIR__ . '\app\controllers\FamilyController.php';
        $controller=new FamilyController();
        $controller=$controller->show();
        break;
    case BASE_PATH . 'showAddress':
        require_once __DIR__ . '\app\controllers\FamilyController.php';
        $controller=new FamilyController();
        $controller=$controller->show_family();
        break;
}
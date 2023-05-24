<?php
require_once __DIR__ . '\baseController.php';
use app\baseController\BaseController;

class FamilyController extends BaseController
{
    public function add()
    {
        if($_SERVER['REQUEST_METHOD']=='post')
        {
            $this->model->full_name=validString($_POST['full-name']);
            $this->model->job=$_POST['job'];
            $this->model->family_number=$_POST['num'];
            $this->model->phone=$_POST['phone'];
        }
    }
}


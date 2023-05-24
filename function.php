<?php
function validString($variable)
{
    return trim(filter_var($variable,FILTER_SANITIZE_STRING));
}
function validEmail($variable)
{
    return trim(filter_var($variable,FILTER_SANITIZE_EMAIL));
}

function validImg($a)
{
    $res=[];
    $error="";
    $tar="../images/";
    $path=uniqid($tar) . basename($a['name']);
    $q=1;
    $ext = strtolower(pathinfo($path,PATHINFO_EXTENSION));

    $check = getimagesize($a['tmp_name']);
    if($check===false)
    {
        $error="this is not an img";
        $q=0;
    }
    if(file_exists($path))
    {
        $error="this file already exist";
        $q=0;
    }
    if($a['size']>10000000)
    {
        $error="this img is too larg";
        $q=0;
    }
    if($ext!="jpg" && $ext!="png" && $ext!="jpeg")
    {
        $error="we dont support this ext" . " $ext";
        $q=0;
    }
    if(!$q)
        $res=[$q,$error];
    else
    {
        if(!move_uploaded_file($a['tmp_name'],$path))
        {
            $error="some thing went wrong";
            $q=0;
            $res=[$q,$error,$path];
        }
        else
            $res=[$q,$path];
    }
    return $res;     
}

spl_autoload_register('autoLoader');

function autoLoader($className)
{
    //$path="mvcDesignSignup&Login/";
    $path="";
    $ext=".class.php";
    $classNameLower=$className;
    $fullPath=$path.$classNameLower.$ext;
    if(file_exists($fullPath))
        include_once $fullPath;
}

function destroySession()
{
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}
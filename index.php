<?php
session_start();
require_once "vendor/autoload.php";
/* 
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
 */

$protocole = $_SERVER['REQUEST_SCHEME'];

$domaine = $_SERVER['SERVER_NAME'];

$projet = str_replace("index.php", "", $_SERVER['PHP_SELF']);

define("URL", $protocole . "://" . $domaine . $projet);

if (isset($_GET['p'])) {
    require "Core/Controller.php";
    require "Core/Model.php";
    require "Core/Config.php";
    require "Core/Model2.php";
    
    $params = explode("/", trim($_GET['p'], "/"));

    $controller = strtolower(isset($params[0]) && !empty($params[0]) ? $params[0] : "acceuil");
    $methode = strtolower(isset($params[1]) && !empty($params[1]) ? $params[1] : "index");
    $controller_file = "Controller/" . ucfirst($controller) . "Controller.php";
    if (file_exists($controller_file)) {
        
        require $controller_file;
        $controllerName = ucfirst($controller) . "Controller";

        $c = new $controllerName();
        if (method_exists($c, $methode)) {
            $params2 = array_slice($params, 2);
            call_user_func_array([$c, $methode], $params2);
        } else {
            header("location:404.php");
            die();
        }
    } else {
        header("location:404.php");
        die();
    }
}
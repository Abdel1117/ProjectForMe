<?php

function chargerClass($class){
    require dirname(__DIR__) . "\\Models\\$class.php";
}

spl_autoload_register("chargerClass");


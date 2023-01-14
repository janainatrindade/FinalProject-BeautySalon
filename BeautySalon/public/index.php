<?php 
//initializing session
session_start();
//calling the init 
require "../app/core/init.php";

DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0); //display errors

$app = new App;
$app->loadController();

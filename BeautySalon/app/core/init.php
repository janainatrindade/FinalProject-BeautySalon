<?php 

//auto load the classes that will be used in the system during all the proccess

spl_autoload_register(function($classname){

	require $filename = "../app/models/".ucfirst($classname).".php"; //accessing the classes in model
});

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';

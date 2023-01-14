<?php

class Auth{ //authentication of user 

	static function validate(){
		if(!isset($_SESSION) || $_SESSION['logged'] != true){ //if is not logged redirect to login
			redirect('login');
		}
	}
	public static function logout(){
		if(isset($_SESSION['USER'])){
			unset($_SESSION['USER']);
		}
	}

	public static function user(){
		if(isset($_SESSION['USER'])){
			return $_SESSION['USER']->use_email;
		}
		return false;
	}
}
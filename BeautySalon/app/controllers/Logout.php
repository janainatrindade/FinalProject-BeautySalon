<?php

/** logout controller
 */ 
class Logout{
	use Controller;

	function index()
	{
		Auth::logout();
		$this->view('login');

	}
}

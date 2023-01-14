<?php 

//a page in case the user try to enter in a page that does not exist
class _404
{
	use Controller;
	
	public function index()
	{
		echo "404 Page not found controller";
	}
}

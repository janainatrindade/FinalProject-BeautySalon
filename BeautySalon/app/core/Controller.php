<?php 


Trait Controller
{

	public function view($name, $data = [])
	{
		if(!empty($data)){
			extract($data);
		}
		$filename = "../app/views/".$name.".view.php"; //load the view of the page
		if(file_exists($filename))
		{
			require $filename;
		}else{

			$filename = "../app/views/404.view.php";
			require $filename;
		}
	}
}
<?php 


function redirect($path) //function to redirect to pages
{
	header("Location: " . ROOT."/".$path);
	die;
}
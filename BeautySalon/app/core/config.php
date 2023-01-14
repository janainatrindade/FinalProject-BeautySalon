<?php 
//configuring the variable to connect in the database
if($_SERVER['SERVER_NAME'] == 'localhost')
{
	/** database config **/
	define('DBNAME', 'beautySalon');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');
	
	define('ROOT', 'http://localhost/BeautySalon/public');

}else
{
	/** database config **/
	define('DBNAME', 'beautySalon');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');

	define('ROOT', 'http://localhost/BeautySalon/public');

}

define('APP_NAME', "Beauty Salon");
define('APP_DESC', "Beauty Salon website for bookings");

/** true means show errors **/
define('DEBUG', true);

<?php 

/**
 * Admin class
 * Haidresser = ser_ID= 6, 9, 10
 * Nail designer = ser_ID = 5 and 8
 * eyebrow designer = 7
 */
class AdminBookings
{
	use Controller; //using the controller to open the view
	use Database; //using  database to get connection

	public function index()
	{
		Auth::validate(); //validating user

		$con = new AdminBookings();
		$con = $con->connect();
		$data = [];
		
		$where = [];
		$booking = new BookingModel();
		$service = new Service();
		$user = $_SESSION['USER']; //getting the user logged
		$findCustomer = ["use_ID" => $user->ID]; //getting the user id


		$sql = "SELECT service.ser_name, booking.boo_date, booking.boo_time, professional.pro_name, customer.cus_name FROM booking INNER JOIN service ON service.ID = booking.ser_ID INNER JOIN professional ON professional.ID = service.pro_ID INNER JOIN customer ON customer.ID = booking.cus_ID WHERE ID_use = $user->ID ORDER BY booking.boo_date DESC";
		$stmt = $con->prepare($sql); //preparing the query
		$check = $stmt->execute(); //executing query

		if($check) //if it is returned results
		{
			$result = $stmt->fetchAll(PDO::FETCH_OBJ); //returns an array containing all rows in the result. 
			if(is_array($result) && count($result)) //if is an array and how many
			{	
				$data['bookings'] = $result; //atributting the results to data
			}
		}
		if($_SERVER['REQUEST_METHOD'] == "POST"){ //if the form in view was requested

			$date1 = $_POST['date1']; //getting the input from the form
			$date2 = $_POST['date2'];


			$sql2 = "SELECT service.ser_name, booking.boo_date, booking.boo_time, professional.pro_name, customer.cus_name FROM booking INNER JOIN service ON service.ID = booking.ser_ID INNER JOIN professional ON professional.ID = service.pro_ID INNER JOIN customer ON customer.ID = booking.cus_ID WHERE ID_use = $user->ID AND booking.boo_date BETWEEN '$date1' AND '$date2' ORDER BY booking.boo_date DESC";
			$stmt2 = $con->prepare($sql2);
			$check2 = $stmt2->execute();

			if($check2)
			{
				$result2 = $stmt2->fetchAll(PDO::FETCH_OBJ);
				if(is_array($result2) && count($result2))
				{	
					$data['bookings2'] = $result2;
					
				}
			}
		}


		$this->view('adminBookings', $data); //redirecting to view
	}

	public function searchBookings(){ //function to show result of the search
		echo 'oi';
		if($_SERVER['REQUEST_METHOD'] == "POST"){ 

			$date1 = $_POST['date1'];
			$date2 = $_POST['date2'];

			$con = new AdminBookings();
			$con = $con->connect();
			$data = [];
			
			$where = [];
			$booking = new BookingModel();
			$service = new Service();
			$user = $_SESSION['USER'];
			$findCustomer = ["use_ID" => $user->ID];


			$sql = "SELECT service.ser_name, booking.boo_date, booking.boo_time, professional.pro_name, customer.cus_name FROM booking INNER JOIN service ON service.ID = booking.ser_ID INNER JOIN professional ON professional.ID = service.pro_ID INNER JOIN customer ON customer.ID = booking.cus_ID WHERE ID_use = $user->ID AND booking.boo_date BETWEEN '$date1' AND '$date2' ORDER BY booking.boo_date DESC";
			$stmt = $con->prepare($sql);
			$check = $stmt->execute();

			if($check)
			{
				$result = $stmt->fetchAll(PDO::FETCH_OBJ);
				if(is_array($result) && count($result))
				{	
					$data['bookings'] = $result;
					print_r($data);
				}
			}
		}
	}

}
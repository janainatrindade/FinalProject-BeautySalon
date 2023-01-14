<?php 

/**
 * booking class
 */
class Booking
{
	use Controller; //using the controller to open the view

	public function index()
	{
		Auth::validate(); //validating user
		$data = [];
		$service = new Service();
		$rows = $service->findAll(); //looking in the db all services
		$data['services'] = $rows; //saving in data

		if($_SERVER['REQUEST_METHOD'] == "POST"){  //if the form in view was requested

			$service = $_POST['service']; //getting the input from the form
			$date = $_POST['date'];
			$time = $_POST['time'];
			$where = [
				"boo_date" => $date, //how the comparison in the query has to be
				"boo_time" => $time,
				"ser_ID" => $service,
			];

			$booking = new BookingModel();
			$rows = $booking->where($where); //function to do a select with where clause
			$data['bookings'] = $rows;
			if($rows){ //if returns a row it means that the service is already booked in this date and time
				$data['error'] = 'This date and time is not available';
				$this->view('booking', $data); //redirect to booking page
			}
			else{ //if there is any booking
				$customer = new Customer();
				$user = $_SESSION['USER'];
				$findCustomer = ["use_ID" => $user->ID];
				$customersData = $customer->findCustomer($findCustomer); //function to find the customer with this id
				$customerID = $customersData[0]->ID; //saving the customer id
				$where['cus_ID'] = $customerID;
				$rows = $booking->insert($where); //function to insert the booking in the db
				$data['success'] = 'Booking done!';
				redirect('history'); //redirect to history page
			}

		}
		$this->view('booking', $data);

	}

}



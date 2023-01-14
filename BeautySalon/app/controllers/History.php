<?php 

/**
 * history class
 */
class History
{
	use Controller;

	public function index()
	{
		Auth::validate();
		$data = [];
		$where = [];
		$booking = new BookingModel();
		$customer = new Customer();
		$user = $_SESSION['USER']; //getting the user logges
		$findCustomer = ["use_ID" => $user->ID];
		$customersData = $customer->findCustomer($findCustomer); //getting the customer id
		$customerID = $customersData[0]->ID;
		$where['cus_ID'] = $customerID; 

		$rows = $booking->where($where); //function to select all bookings made by this customer
		$data['bookings'] = $rows;

		$this->view('history', $data);
	}

}
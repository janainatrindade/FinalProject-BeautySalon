<?php 

/**
 * register class
 */
class Register
{
	use Controller; 
	use Database;

	public function index()
	{
		$con = new Register();
		$con = $con->connect();
		$data = [];
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$user = new User;
			$customer = new Customer;
			$address = new Address;
			if($user->validate($_POST) and $customer->validate($_POST) and $address->validate($_POST)){ //validanting the inputs
				try{
					//address insertion
					$sql1 = "insert into address(add_number, add_street, add_city, add_county) values (:number, :street, :city, :county)";
				
					//register address
					$stmt = $con->prepare($sql1);
					$result = $stmt->execute(array(':number'=>$_POST['number'], ':street'=>$_POST['street'], ':city'=>$_POST['city'], ':county'=>$_POST['county']));

					//reccovering last id inserted
					$add_ID = $con->lastInsertID();

					//user insertion
					$priority = 1;
					$sql2 = "insert into user(use_email, use_password, use_priority) values (:email, :password, $priority)";
					

					$stmt = $con->prepare($sql2);
					$result = $stmt->execute(array(':email'=>$_POST['email'], ':password'=>$_POST['password']));

					//reccovering last id inserted
					$use_ID = $con->lastInsertID();

					
					//register client
					$sql3 = "insert into customer(cus_name, cus_phone, add_ID, use_ID) values (:name, :phone, $add_ID, $use_ID)";

					$stmt = $con->prepare($sql3);
					$result = $stmt->execute(array(':name'=>$_POST['name'], ':phone'=>$_POST['phone']));

					$data['success'] = 'Register done!';

					

				} catch(PDOException $e) {
			  		echo $sql . "<br>" . $e->getMessage();
				}
				redirect('login');
			}
			$data['$errors'] = $user->errors;
		}
		$this->view('register', $data);

	}

}
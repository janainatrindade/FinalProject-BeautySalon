<?php 

/**
 * login class
 */
class Login
{
	use Controller;

	public function index()
	{
		$data = [];
		if($_SERVER['REQUEST_METHOD'] == "POST"){ //when the user send the data from form
			$user = new User;
			$arr['use_email'] = $_POST['input_user']; 
			$row = $user->first($arr); //checking if this email is in db

			if($row){ //if yes
				if($row->use_password === $_POST['input_pass']){ //get the password to check if it is the right password 
					$_SESSION['USER'] = $row;
					$_SESSION['logged'] = true; //variable to show that the user is logged
					$user_priority = $row->use_priority; //checking with type of user is logged
					if($user_priority == 1){ //if is 1 is a customer and redirect to booking
						redirect('booking');
					}if($user_priority == 2){ //if is 2 is an admin and redirect to admin bookings
						redirect('adminBookings');
					}
					
				}

			}
			$user->errors['input_user'] = "wrong email or password";
			
			$data['errors'] = $user->errors;
		}

		$this->view('login', $data);
	}

}
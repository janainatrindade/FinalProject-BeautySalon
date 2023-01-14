<?php 

/**
 * Customer class
 */
class Customer
{
	
	use Model;

	protected $table = 'customer';

	protected $allowedColumns = [

		'name',
		'phone',

	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['name']))
		{
			$this->errors['name'] = "Name is required";
		}
		
		if(empty($data['phone']))
		{
			$this->errors['phone'] = "Phone is required";
		}

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}
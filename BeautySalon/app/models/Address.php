<?php 


/**
 * Address class
 */
class Address
{
	
	use Model;

	protected $table = 'address';

	protected $allowedColumns = [

		'number',
		'street',
		'city',
		'county',
	];

	public function validate($data) //validating data in input
	{
		$this->errors = [];

		if(empty($data['number']))
		{
			$this->errors['number'] = "Number is required";
		}
		
		if(empty($data['street']))
		{
			$this->errors['street'] = "Street is required";
		}

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}
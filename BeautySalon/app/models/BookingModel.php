<?php 


/**
 * Booking class
 */
class BookingModel
{
	
	use Model;

	protected $table = 'booking';

	protected $allowedColumns = [

		'service',
		'date',
		'time',
	];
	
}
<?php 

/**
 * Main Model trait
 */
Trait Model
{
	use Database;
	//organizing the way of display the data
	protected $limit 		= 10;
	protected $offset 		= 0;
	protected $order_type 	= "desc";
	protected $order_column = "id";
	public $errors 		= [];

	public function findAll() //fucntion to execute selects queries
	{
	 
		$query = "select * from $this->table order by $this->order_column $this->order_type limit $this->limit offset $this->offset";

		return $this->query($query);
	}
	
	public function findCustomer($data){ //function to find customer

		$keys = array_keys($data);
		$query = "select ID from $this->table where ";

		foreach ($keys as $key) { //for each data in the array to add in the query
			$query .= $key . " = :". $key . " && ";
		}

		$query = trim($query," && "); //take off the && of the end of the query

		$query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
		$data = array_merge($data); //merges one or more arrays into one array
		return $this->query($query, $data);
	}

	public function where($data) //function to select with where queries
	{
		$keys = array_keys($data);
		$query = "select * from $this->table where ";

		foreach ($keys as $key) {
			$query .= $key . " = :". $key . " && ";
		}

		$query = trim($query," && ");

		$query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
		$data = array_merge($data);
		return $this->query($query, $data);
	}

	public function first($data)
	{
		$keys = array_keys($data);
		$query = "select * from $this->table where ";

		foreach ($keys as $key) {
			$query .= $key . " = :". $key . " && ";
		}

		
		$query = trim($query," && ");

		$query .= " limit $this->limit offset $this->offset";
		$data = array_merge($data);
		
		$result = $this->query($query, $data);
		if($result)
			return $result[0];

		return false;
	}

	public function insert($data) //function to insert data  
	{

		$keys = array_keys($data);

		$query = "insert into $this->table (".implode(",", $keys).") values (:".implode(",:", $keys).")";
		$this->query($query, $data);
		return false;
	}

	public function update($id, $data, $id_column = 'id') //function to update 
	{

		/** remove unwanted data **/
		if(!empty($this->allowedColumns))
		{
			foreach ($data as $key => $value) {
				
				if(!in_array($key, $this->allowedColumns))
				{
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);
		$query = "update $this->table set ";

		foreach ($keys as $key) {
			$query .= $key . " = :". $key . ", ";
		}

		$query = trim($query,", ");

		$query .= " where $id_column = :$id_column ";

		$data[$id_column] = $id;

		$this->query($query, $data);
		return false;

	}

	public function delete($id, $id_column = 'id') //function to delete
	{

		$data[$id_column] = $id;
		$query = "delete from $this->table where $id_column = :$id_column ";
		$this->query($query, $data);

		return false;

	}

	
}
<?php

//Project Barhop
//Mike Ghen and Jared Culp
// 7/5/12
// This is the BH_List model which models a Listing of data

class BH_list extends CI_Model {
	
	function __construct() 
	//POST: A new BH_List is created with no data
	{
		// Call the Model constructor
		parent::__construct();
		
		// Load the database
		$this->load->database();
	}
	
	function getItems($type, $num=1, $sql)
	//PRE:  $type is either: food, drink, food_special or drink_special
	//		$num is the number of items to get of $type
	//      $sql is SQL starting with 'WHERE ' and is a valid SQL statment
	//POST: $num  items fetched using a simple select from table $type with $sql added 
	//      are stored in $this->list_items which is row results 
	{
		switch( $type )
		{
			case 'food':										// pull from the food table
				$sql = 'SELECT * FROM food ' . $sql;
				break;
			case 'drink':										// pull from the drink table
				$sql = 'SELECT * FROM drink ' . $sql;
				break;
			case 'food_special':								// pull from the food_special table
				$sql = 'SELECT * FROM food_special ' . $sql;
				break;
			case 'drink_special':								// pull from the drink_special table
				$sql = 'SELECT * FROM drink_special ' . $sql;
				break;
		}
		
		$sql .= " LIMIT {$num}";								// limit the number of results

		$query = $this->db->query($sql);						// query the database
		
		$result = $query->result_array();
		
		return $result;
	}

}
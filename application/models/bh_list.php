<?php

//Project Barhop
//Mike Ghen and Jared Culp
// 7/5/12
// This is the BH_List model which models a Listing of data

class Bh_list extends CI_Model {
	
	function __construct() 
	//POST: A new BH_List is created with no data
	{
		// Call the Model constructor
		parent::__construct();
		
		// Load the database
		$this->load->database();
	}
	
	//TODO: Add the ability to select only certain fields
	function getItems($type, $num=1, $sql) 
	//PRE:  $type is either: food, drink, food_special, drink_special, or location (the name of a table)
	//		$num is the number of items to get of $type
	//      $sql is SQL starting with 'WHERE ' and is a valid SQL statment
	//POST: $num  items fetched using a simple select from table $type with $sql added 
	//		are returned as row results        
	{	
		$sql = 'SELECT * FROM '.$type.' ' . $sql;
		
		$sql .= " LIMIT {$num}";								// limit the number of results

		$query = $this->db->query($sql);						// query the database
		
		$result = $query->result_array();						// get the results in array format
		return $result;
	}
	
	function getPlaceInfo($id)
	// PRE:  $id is the location id we are pulling information about
	// POST: all data in the database for this location to be used on the templated view
	{
		$sql = "SELECT * FROM location WHERE location_id = $id";	// build the SQL 
		$query = $this->db->query($sql);							// query the database
		
		$result = $query->row();									// get the results in row format
		
		return $result;
		
	}
	
	function getFilteredResults($type, $filter)
	// PRE:  $type is the kind of results page we are on (food, drink, etc.)
	//		 $filter is the raw text input in the search field that needs to be converted to SQL
	// POST: a listing of matching results from the database as row results
	{
		// remove case sensitivities and build the query below
		$filter = strtoupper($filter);
		
		$filter = "upper(name) LIKE '%". $filter ."%' OR upper(description) LIKE '%". $filter ."%'";
		
		// build the SQL
		$sql = "SELECT * FROM $type WHERE $filter";

		// query the databse
		$query = $this->db->query($sql);

		// get the results in array format
		$result = $query->result_array();
		return $result;
	}
	
	function deleteItem($id, $type)
	// PRE:  $id is the identifier of the item we are deleting (drink_id, food_id, etc)
	//		 $type is the type of item we are deleting (drink, food, location, etc) and is the name of the table
	// POST: TRUE or FALSE if the query affects any rows in the table
	{
		switch( $type )
		{
			case 'food':												// delete from the food table
				$sql = 'DELETE FROM food WHERE food_id = $id';
				break;
			case 'drink':												// delete from the drink table
				$sql = 'DELETE FROM drink WHERE drink_id = $id';
				break;
			case 'food_special':										// delete from the food_special table
				$sql = 'DELETE FROM food_special WHERE fs_id = $id';
				break;
			case 'drink_special':										// delete from the drink_special table
				$sql = 'DELETE FROM drink_special WHERE ds_id = $id';
				break;
			case 'location':											// delete from the location table
				$sql = 'DELETE FROM location WHERE location_id = $id';
				break;
		}
		
		$query = $this->db->query($sql);
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;			// CI Hack
	}
}
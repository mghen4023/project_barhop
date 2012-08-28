<?php

// Project Barhop
// Mike Ghen and Jared Culp
// 7/3/12
// This is the model for a food
// Foods are stored in the 'food' table of the database 

class Food extends CI_Model 
{
	function __construct()
	{
		// load the parent constructor
		parent::__construct();

		// initialize database
		$this->load->database();
	}
	
	function insert()
	// POST: a successful or failed insert into the foods database
	{
		// pull information from the form POST
		$data = array(
			'name' 			=> $this->input->post('name'),
			'description' 	=> $this->input->post('description'),
			'price'			=> $this->input->post('price')
		);
		
		// perform the database insert
		return $this->db->insert('food', $data);
	}
	
	function delete($id)
	// PRE:  $id is the food_id to be removed
	// POST: a successful or failed deletion from the foods database
	{
		$sql = 'DELETE FROM food WHERE food_id = $id';
		
		$query = $this->db->query($sql);
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;			// CI Hack
	}
	
	function get($id)
	// PRE:  $id is the food_id to be retrieved
	// POST: if found, a database row is returned
	{
		$sql = 'SELECT * FROM food WHERE food_id = $id';
		
		$query = $this->db->query($sql);
		
		return $query->row();
	}
}

?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
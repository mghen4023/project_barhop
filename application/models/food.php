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
		parent::__construct();											// load the parent constructor
		$this->load->database();										// initialize database
	}
	
	function insert()
	// POST: a successful or failed insert into the foods database
	{
		$data = array(													// pull information from the form POST
			'name' 			=> $this->input->post('name'),
			'description' 	=> $this->input->post('description'),
			'price'			=> $this->input->post('price')
		);
		
		return $this->db->insert('food', $data);						// perform the database insert
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
		
		return $query->row();									// assuming id is unique
	}
}

?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
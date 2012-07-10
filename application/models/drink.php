<?php

// Project Barhop
// Mike Ghen and Jared Culp
// 7/3/12
// This is the model for a drink
// Drinks are stored in the 'drink' table of the database 

class Drink extends CI_Model 
{
	function __construct()
	{
		parent::__construct();											// load the parent constructor
		$this->load->database();										// initialize database
	}
	
	function insert()
	// POST: a successful or failed insert into the drinks database
	{
		$data = array(													// pull information from the form POST
			'name' 			=> $this->input->post('name'),
			'description' 	=> $this->input->post('description'),
			'price'			=> $this->input->post('price')
		);
		
		return $this->db->insert('drink', $data);						// perform the database insert
	}
}

?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
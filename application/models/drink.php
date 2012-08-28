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
		// load the parent constructor
		parent::__construct();

		// initialize database
		$this->load->database();
	}
	
	function insert()
	// POST: a successful or failed insert into the drinks database
	{
		// pull information from the form POST
		$data = array(
			'name' 			=> $this->input->post('name'),
			'description' 	=> $this->input->post('description'),
			'price'			=> $this->input->post('price')
		);
		
		// perform the database insert
		return $this->db->insert('drink', $data);
	}
	
	function delete($id)
	// PRE:  $id is the drink_id to be removed
	// POST: a successful or failed deletion from the drinks database
	{
		$sql = 'DELETE FROM drink WHERE drink_id = $id';
		
		$query = $this->db->query($sql);
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;			// CI Hack
	}
	
	function get($id)
	// PRE:  $id is the drink_id to be retrieved
	// POST: if found, a database row is returned
	{
		$sql = 'SELECT * FROM drink WHERE drink_id = $id';
		
		$query = $this->db->query($sql);
		
		return $query->row();
	}
}

?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
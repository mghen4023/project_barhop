<?php

// Project Barhop
// Mike Ghen and Jared Culp
// 7/3/12
// This is the model for a drink
// Drinks are stored in the 'drink' table of the database 

class Drink extends CI_Model 
{
	var $id;                 //The id of this drink in the database (drink.drink_id)
	var $name        = '';   //The name of this drink (drink.name)
	var $description = '';   //The description of this drink (drink.description)
	var $price       = 0.00; //The price of this drink in dollars (drink.price)
	var $location_id;        //The id of the location this drink is offered at

	function __construct($id = -1)
	//PRE:  $id is a valid drink_id from the database
	//POST: A new Drink model is created with variables $name, $description, and $price 
	// set to the values that $id corresponds to in the database
	{
		// Call the Model constructor
        parent::__construct();
		
		// Load the database
		$this->load->database();
	
		if($id != -1) {                                                      //This is a drink that already exists
		
			$query = $this->db->get_where('drink', array('drink_id' => $id)); //Query for some data
			
			$result = $query->result();                                       //Unpack it
			
			$this->name        = $result->name;                               //Populate data
			$this->description = $result->description;
			$this->date        = $reuslt->price;
			$this->location_id = $result->location_id;
		}
		
	}
	
	function save()
	//POST: The current values of $name, $description, $price, and $location_id are saved at $id
	{
		if( !isset( $id ) ) {                         //if this drink has an no $id, 
			$data = array(                            //then we must make a new drink
			   'name' => $this->name,                 //So we construct our data
			   'description' => $this->description ,
			   'price' => $this->price,
			   'location_id' => $this->location_id
			);

			$this->db->insert('food', $data); //We perform the insert
		}
		else {                                        //Otherwise update the database
			$data = array(                            //So we construct our data
			   'name' => $this->name,                 
			   'description' => $this->description ,
			   'price' => $this->price,
			   'location_id' => $this->location_id
			);

			$this->db->where('id', $id);              //And we preform the update
			$this->db->update('food', $data); 
		}
	}
	
	function render()
	//POST: FCTVAL == a string that will render an HTML representation of this drink 
	{
		//Start to create that string 
		//$html = '';
		//return $html
	}
}

?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
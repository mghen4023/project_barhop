<?php

// Project Barhop
// Mike Ghen and Jared Culp
// 7/3/12
// This is the model for a food
// Foods are stored in the 'food' table of the database 

class Food extends CI_Model 
{
	var $id;                 //The id of this drink in the database (food.food_id)
	var $name        = '';   //The name of this drink (food.name)
	var $description = '';   //The description of this drink (food.dexcription)
	var $price       = 0.00; //The price of this drink in dollars (food.price)
	var $location_id;        //The id of the location this food is offered at
	
	function __construct($id)
	//PRE:  $id is a valid food_id from the database
	//POST: A new food model is created with variables $name, $description, and $price 
	// set to the values that $id corresponds to in the database
	{
		// Call the Model constructor
        parent::__construct();
		
		// Load the database
		$this->load->database();
		
		$query = $this->db->get_where('food', array('food_id' => $id)); //Query for some data
		
		$result = $query->result();                                      //Unpack it
		
		$this->name        = $result->name;                              //Populate data
		$this->description = $result->description;
		$this->price       = $reuslt->price;
		$this->location_id = $result->location_id;
	
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
	
	function toHtml()
	//POST: FCTVAL == a string that will render an HTML representation of this food 
	{
		$html;  //The string we will build our html in
		
		$html = "<div id=\"food-special\">";
		$html.= "   <div class=\"name\">"        . $this->name        . "</div>";
		$html.= "   <div class=\"description\">" . $this->description . "</div>";
		$html.= "   <div class=\"price\">"       . $this->price       . "</div>";
		$html.= "   <div class=\"location_id\">" . $this->location_id . "</div>";
		$html.= "</div>";
		
		return $html;
	}
}

?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
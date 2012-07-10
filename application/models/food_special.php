<?php

// Project Barhop
// Mike Ghen and Jared Culp
// 7/3/12
// This is the model for a food special
// food specials are stored in the 'food_special' table of the database 

class Food_Special extends CI_Model 
{
	private var $id;         //The id of this drink in the database (food_special.fs_id)
	var $name        = '';   //The name of this drink (food_special.special)
	var $description = '';   //The description of this drink (food_special.description)
	var $date;  			 //The date that this deal is offered
	var $time;               //The time that this deal is offered
	var $discount;			 //The discount in dollars or % of this special
	var $location_id;        //The id of the location this drink is offered at
	
	function __construct($id)
	//PRE:  $id is a valid fs_id from the database
	//POST: A new food special model is created with variables $name, $description, $date, $time, 
	//      $discount, $location_id all set to the values for food special with fs_id = $id
	{
		// Call the Model constructor
        parent::__construct();
		
		// Load the database
		$this->load->database();
		
		$query = $this->db->get_where('food_special', array('fs_id' => $id)); //Query for some data
		
		$result = $query->result();                                      //Unpack it
		
		$this->name        = $result->name;                              //Populate data
		$this->description = $result->description;
		$this->date        = $reuslt->date;
		$this->time        = $result->time;
		$this->discount    = $result->discount;
		$this->location_id = $result->location_id;
		$this->id          = $id;
		
	}
	
	function save()
	//POST: The current values of $name, $description, $date, $time, 
	//      $discount, $location_id  are saved at $id
	{
		if( !isset( $id ) ) {                         //if this drink has an no $id, 
			$data = array(                            //then we must make a new drink
			   'name' => $this->name,                 //So we construct our data
			   'description' => $this->description ,
			   'date' => $this->date,
			   'time' => $this->time,
			   'discount' => $this->discount,
			   'location_id' => $this->location_id
			);

			$this->db->insert('food_special', $data); //We perform the insert
		}
		else {                                        //Otherwise update the database
			$data = array(                            //So we construct our data
			   'name' => $this->name,	
			   'description' => $this->description,
			   'date' => $this->date,
			   'time' => $this->time,
			   'discount' => $this->discount,
			   'location_id' => $this->location_id
			);

			$this->db->where('id', $id);              //And we preform the update
			$this->db->update('food_special', $data); 
		}
	}
	
	function render()
	//POST: RETURN == a string that is a HTML representation of this food special
	{
		$html;  //The string we will build our html in
		
		$html = "<div id=\"food-special\">";
		$html.= "   <div class=\"name\">"        . $this->name        . "</div>";
		$html.= "   <div class=\"description\">" . $this->description . "</div>";
		$html.= "   <div class=\"date\">"        . $this->date        . "</div>";
		$html.= "   <div class=\"time\">"        . $this->time        . "</div>";
		$html.= "   <div class=\"discount\">"    . $this->discount    . "</div>";
		$html.= "   <div class=\"location_id\">" . $this->location_id . "</div>";
		$html.= "</div>";
		
		return $html;
		
	}

}

?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
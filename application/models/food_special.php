<?php

// Project Barhop
// Mike Ghen and Jared Culp
// 7/3/12
// This is the model for a food special
// food specials are stored in the 'food_special' table of the database 

class Food_special extends CI_Model 
{	
	function __construct($id)
	//PRE:  $id is a valid fs_id from the database
	//POST: A new food special model is created with variables $name, $description, $date, $time, 
	//      $discount, $location_id all set to the values for food special with fs_id = $id
	{
		// Call the Model constructor
        parent::__construct();
		
		// Load the database
		$this->load->database();
	}
	
	function save()
	//POST: The current values of $name, $description, $date, $time, 
	//      $discount, $location_id  are saved at $id
	{
		// if this drink has an no $id then we must make a new drink 
		if( !isset( $id ) ) {
			$data = array(
			   'name' => $this->name,
			   'description' => $this->description,
			   'date' => $this->date,
			   'time' => $this->time,
			   'discount' => $this->discount,
			   'location_id' => $this->location_id
			);

			// we perform the insert
			$this->db->insert('food_special', $data);
		}
		// otherwise update the database
		else {
			$data = array(
			   'name' => $this->name,	
			   'description' => $this->description,
			   'date' => $this->date,
			   'time' => $this->time,
			   'discount' => $this->discount,
			   'location_id' => $this->location_id
			);
			
			// and we preform the update
			$this->db->where('id', $id);
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
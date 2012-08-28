<?php

// Project Barhop
// Mike Ghen and Jared Culp
// 7/3/12
// This is the model for a drink special
// drink specials are stored in the 'drink_special' table of the database 

class Drink_special extends CI_Model 
{

	function __construct($id)
	//PRE:  $id is a valid ds_id from the database
	//POST: A new drink special model is created with variables $name, $description, $date, $time, 
	//      $discount, $location_id all set to the values for drink special with ds_id = $id
	{
		// call the Model constructor
        parent::__construct();
		
		// load the database
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
			   'description' => $this->description ,
			   'date' => $this->date,
			   'time' => $this->time,
			   'discount' => $this->discount,
			   'location_id' => $this->location_id
			);

			// we perform the insert
			$this->db->insert('drink_special', $data);
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
			$this->db->update('drink_special', $data); 
		}
	}
	
	function render()
	//POST: RETURN == a string that is a HTML representation of this drink special
	{
		$html;  //The string we will build our html in
		
		$html = "<div id=\"drink-special\">";
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
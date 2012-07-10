<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drinks extends CI_Controller {

	
	function index()
	//POST: A listing of all drinks
	{
		$this->load->view('header');
		$this->load->view('drink_create_form');
	}
	
	function create()
	//PRE: $_POST must have indexs name, description, and price
	//POST: A new drink is added to the database
	{		
		print_r($_POST['name']);
		//$this->load->model('Drink');                        // Load a model
		
		//$this->Drink->name        = $_POST['name'];         // Get the name,
		//$this->Drink->description = $_POST['description'];  // description
		//$this->Drink->price       = $_POST['price'];        // and price from $_POST
		
		//$this->Drink->save();                               // Save the drink in the db
	}
	
	
	function edit()
	//POST: A Drink is edited 
	{
	
	}
	
	function delete()
	//POST: A Drink is deleted from the database
	{
	
	}
}
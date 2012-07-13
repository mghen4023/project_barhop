<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drinks extends CI_Controller {
	
	function index()
	//PRE: The default view for drinks
	//POST: A listing of all drinks
	{
		$this->load->view('header');															// load the header file
		$this->loadDrinks();
		//$this->create();																		// call the create function to display a form
	}
	
	function loadDrinks()
	//POST: Rendered output displaying items
	{
		$this->load->model('bh_list');															// load the list model
		$data['items'] = $this->bh_list->getItems('drink', 4, 'ORDER BY price ASC');			// query for some data
		$this->load->view('item_view', $data);													// pass the query results to the view
	}
	
	function create()
	//PRE: $_POST must have name, description, and price
	//POST: A new drink is added to the database and a success message is displayed
	{	
		$this->load->helper('form');															// load the form helper
		$this->load->library('form_validation');												// load form validation library	and set rules below
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		
		if ($this->form_validation->run() === FALSE)											// if validation fails, display the form	
		{
			$data['title'] = 'Drink';
			$data['controller'] = 'drinks';
			$this->load->view('create_form', $data);			
		}
		else																					// otherwise, pass off form data to the model
		{
			$this->load->model('drink');
			$this->drink->insert();
		}
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
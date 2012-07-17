<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foods extends CI_Controller {

	function index()
	//PRE: The default view for foods
	//POST: A listing of all foods
	{
		$this->load->view('header');															// load the header file
		$this->loadFoods();
		//$this->create();																		// call the create function to display a 
		$this->load->view('footer');															// load the footer file
	}
	
	function loadFoods()
	//POST: Rendered output displaying items
	{
		$this->load->model('bh_list');															// load the list model
		$data['items'] = $this->bh_list->getItems('food', 4, 'ORDER BY price ASC');				// query for some data
		$this->load->view('item_view', $data);													// pass the query results to the view
	}
	
	function create()
	//PRE: $_POST must have name, description, and price
	//POST: A new food is added to the database and a success message is displayed
	{	
		$this->load->helper('form');															// load the form helper
		$this->load->library('form_validation');												// load form validation library	and set rules below
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		
		if ($this->form_validation->run() === FALSE)											// if validation fails, display the form	
		{
			$data['title'] = 'Food';
			$data['controller'] = 'foods';
			$this->load->view('create_form', $data);			
		}
		else																					// otherwise, pass off form data to the model
		{
			$this->load->model('food');
			$this->food->insert();
		}
	}
	
	function edit()
	//POST: A Food is edited 
	{
	
	}
	
	function delete($id)
	//POST: A Food is deleted from the database
	{
		$this->load->model('food');		// pass off to the model
		$this->food->delete($id);
	}
}
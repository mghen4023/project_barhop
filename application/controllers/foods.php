<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Foods extends CI_Controller {
	
	function __construct()
	{
		// call the parent constructor
		parent::__construct();

		// load the header on every page
		$this->load->view('header');

		// load the bh_list and food models
		$this->load->model('bh_list');
		$this->load->model('food');
	}

	function index()
	//PRE: The default view for foods
	//POST: A listing of all foods
	{

	}
	
	function loadFoods()
	//POST: Rendered output displaying items
	{
		// pass off to the bh_list model
		$data['items'] = $this->bh_list->getItems('food', 4, 'ORDER BY price ASC');

		// load the data into the item_view
		$this->load->view('item_view', $data);
	}
	
	function create()
	//PRE: $_POST must have name, description, and price
	//POST: A new food is added to the database and a success message is displayed
	{	
		// load form and form_validation libraries
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set some validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		
		// if the form has not been submitted successfully, show the create_form view
		if ($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'Food';
			$data['controller'] = 'foods';
			$this->load->view('create_form', $data);			
		}
		// otherwise pass off to the model and perform the database insert
		else
		{
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
		// pass off to the model to delete
		$this->food->delete($id);
	}
}
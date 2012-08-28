<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drinks extends CI_Controller {
	
	function __construct()
	{
		// call the parent constructor
		parent::__construct();

		// load the header on every page
		$this->load->view('header');

		// load the bh_list and drink models
		$this->load->model('bh_list');
		$this->load->model('drink');
	}

	function index()
	//PRE: The default view for drinks
	//POST: A listing of all drinks
	{

	}
	
	function loadDrinks()
	//POST: Rendered output displaying items
	{
		// pass off to the bh_list model
		$data['items'] = $this->bh_list->getItems('drink', 4, 'ORDER BY price ASC');

		// load the data into the item_view
		$this->load->view('item_view', $data);
	}
	
	function create()
	//PRE: $_POST must have name, description, and price
	//POST: A new drink is added to the database and a success message is displayed
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
			$data['title'] = 'Drink';
			$data['controller'] = 'drinks';
			$this->load->view('create_form', $data);			
		}
		// otherwise pass off to the model and perform the database insert
		else
		{
			$this->drink->insert();
		}
	}
	
	function edit()
	//POST: A Drink is edited 
	{
	
	}
	
	function delete($id)
	//POST: A Drink is deleted from the database
	{
		// pass off to the model to delete
		$this->drink->delete($id);
	}
}
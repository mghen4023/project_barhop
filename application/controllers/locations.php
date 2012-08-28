<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locations extends CI_Controller {

	function __construct()
	{
		// call the parent constructor
		parent::__construct();

		// load the header on every page
		$this->load->view('header');

		// load the bh_list model
		$this->load->model('bh_list');
	}

	public function index()
	//PRE:
	//POST: A listing of all locations organized by their ratings is diplayed 
	//      with links to their respective pages
	{
		// get locations from the bh_list model
		$data['details'] = $this->bh_list->getPlaceInfo(2);
		$data['locations'] = $this->bh_list->getItems('location', 10, 'ORDER BY `rating` DESC'); //TODO: FIX DB ERROR! 

		// load the location_listing_view
		$this->load->view('location_listing_view', $data);
		$this->load->view('footer');
	}
}
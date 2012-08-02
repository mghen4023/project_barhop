<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Mike Ghen and Jared Culp
//8/2/2012
//This is the locations controller which will take care of listing all locations, 
//displaying an individual location.

class Locations extends CI_Controller {

	public function index()
	//PRE:
	//POST: A listing of all locations organized by their ratings is diplayed 
	//      with links to their respective pages
	{
		$this->load->view('header');
		
		$this->load->model('bh_list');
		$data['details'] = $this->bh_list->getPlaceInfo(2);
		$data['locations'] = $this->bh_list->getItems('location', 10, 'ORDER BY `rating` DESC'); //TODO: FIX DB ERROR! 
		$this->load->view('location_listing_view', $data);
		$this->load->view('footer');
	}
}

/* Location: ./application/controllers/locations.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friends extends CI_Controller {

	function __construct()
	{
		// call the parent constructor
		parent::__construct();

		// load the header on every page
		$this->load->view('header');

		// load the bh_list and friends models
		$this->load->model('bh_list');
		$this->load->model('friends');
	}

	function index()
	{

	}

}
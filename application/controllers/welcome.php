<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		
		$this->load->model('bh_list');
		$data['details'] = $this->bh_list->getPlaceInfo(2);
		$data['drink'] = $this->bh_list->getItems('drink', 3, 'WHERE location_id = 0 ORDER BY price ASC');
		$data['food'] = $this->bh_list->getItems('food', 3, 'WHERE location_id = 0 ORDER BY price ASC');
		$this->load->view('location_view', $data);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
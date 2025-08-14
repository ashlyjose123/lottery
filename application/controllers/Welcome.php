<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 * 
	 * 
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('Addlot_model');
	}
	public function index()
	{
		$data['gets'] = $this->Addlot_model->get_datas();
		$shutdown_value = $this->db->get('useradmin')->row()->shutdown;
    	$data['shutdown_value'] = $shutdown_value;
        $this->load->view('welcome_message', $data);
	}
	public function insert()
    {
			$this->load->model('Addlot_model');
            $this->Addlot_model->insert_user();
			$this->load->view('add_entries'); 
    }
	public function fetchbydate()
	{
	$this->load->model('Addlot_model');
        $data['results'] =$this->Addlot_model->getDataByDate(); 
        $this->load->view('fetchbydate', $data);
    } 
}




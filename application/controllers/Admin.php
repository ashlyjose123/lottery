<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Admin extends CI_Controller {


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
		
	}
    public function useradmin(){
        $this->load->view('adminlogin');
    }
    public function adminlogin() {
        $this->form_validation->set_rules('name', 'User Name', 'required|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');  // You might want to add more rules for stronger password
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('adminlogin');
        } else {
            $name = $this->input->post('name');
            $password = $this->input->post('password');
            $this->db->where('username', $name);
            $query = $this->db->get('useradmin');
            if ($query->num_rows() > 0) {
                $row = $query->row();
    
                if ($name == $row->username && password_verify($password, $row->password)) {
                    redirect('add_entries');
                } else {
                    $this->session->set_flashdata('error', 'Invalid Username or Password');
                    redirect('add_entries');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect('adminlogin');
            }
        }
    }
    public function shutdown(){
        $shutdown_value = $this->input->post('shutdown');
        if ($shutdown_value === NULL) {
            $shutdown_value = 0;
        }
        $this->db->update('useradmin', ['shutdown' => $shutdown_value]); 
        redirect('');
    }
}
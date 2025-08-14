
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addlot_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Insert user data into the database
    public function insert_user()
    {
        $this->form_validation->set_rules('lotone', 'Lot One', 'required|alpha_numeric');
        $this->form_validation->set_rules('lottwo', 'Lot Two', 'required|alpha_numeric');
        $this->form_validation->set_rules('lotthree', 'Lot Three', 'required|alpha_numeric');
        $this->form_validation->set_rules('lotfour', 'Lot Four', 'required|alpha_numeric');
        $this->form_validation->set_rules('lotfive', 'Lot Five', 'required|alpha_numeric');
        $lhour = $this->input->post('hours');
        $lminute = $this->input->post('minutes');
        $ldivision = $this->input->post('division');
        $ltime = $lhour . ':' . $lminute . ' ' . $ldivision;
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('add_entries');
        } else {
            $data = array(
                'lot1' => $this->input->post('lotone'),
                'lot2' => $this->input->post('lottwo'),
                'lot3' => $this->input->post('lotthree'),
                'lot4' => $this->input->post('lotfour'),
                'lot5' => $this->input->post('lotfive'),
                'ldate' => $this->input->post('dates'),
                'lhour' => $this->input->post('hours'),
                'lminute' => $this->input->post('minutes'),
                'ldivision' => $this->input->post('division'),
                'ltime' => $ltime,
            );
            $this->db->where('lot1', $data['lot1']);
            $this->db->where('lot2', $data['lot2']);
            $this->db->where('lot3', $data['lot3']);
            $this->db->where('lot4', $data['lot4']);
            $this->db->where('lot5', $data['lot5']);
            $query = $this->db->get('lots');
            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('error', 'These entries already exist.');
                $this->load->view('add_entries');
            } else {
                $this->db->insert('lots', $data);
                $this->session->set_flashdata('success', 'Entry added successfully!');
                $this->load->view('add_entries');
            }
        }
    }
    public function get_datas(){
        if(function_exists('date_default_timezone_set')) {
            date_default_timezone_set("Asia/Kolkata");
        }
        $times = date("H:i A");
        $date = date("Y-m-d");
        $this->db->where('ltime <=', $times);
        $this->db->where('ldate', $date);
        $this->db->order_by('ltime', 'ASC');
        $query = $this->db->get('lots');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
    public function getDataByDate(){
        $selectedDate = $this->input->post('datepicker');
        $formattedDate = DateTime::createFromFormat('m/d/Y', $selectedDate)->format('Y-m-d');
        $this->db->where('ldate', $formattedDate);
        $this->db->order_by('ltime', 'ASC');
        $query = $this->db->get('lots');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
}

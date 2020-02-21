<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profiles extends CI_Controller
{
	public function index(){
		$data['title'] = 'SEPODO';
		$data['user'] = $this->db->get_where('user', ['phone' => $this->session->userdata('phone')])->row_array();

		$this->load->view('store/templates/header', $data);
		$this->load->view('store/templates/navbar',$data);
        $this->load->view('store/setting/profile',$data);
        $this->load->view('store/templates/footer');
	}

	public function adminProfile(){
		$data['title'] = 'SEPODO';
		$data['user'] = $this->db->get_where('user', ['phone' => $this->session->userdata('phone')])->row_array();
		$data['profile'] = $this->User_model->getUser();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/templates/topbar',$data);
        $this->load->view('admin/setting/profile',$data);
        $this->load->view('admin/templates/footer');
	}
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserAccess extends CI_Controller
{
	public function index()
	{
        $data['title'] = 'SEPODO';
		$data['user'] = $this->db->get_where('user', ['phone' => $this->session->userdata('phone')])->row_array();
		$data['allProduct'] = $this->Product_model->getAllProduct();

		$this->load->view('store/templates/header', $data);
        $this->load->view('store/templates/navbar',$data);
		$this->load->view('store/index',$data);
        $this->load->view('store/templates/footer');
	}
	
	public function admin()
	{
		$data['user'] = $this->db->get_where('user', ['phone' => $this->session->userdata('phone')])->row_array();

		$data['title'] = 'Pesanan';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/Transaction/Transaction');
        $this->load->view('admin/templates/footer');
	}

	public function owner()
	{
		$data['user'] = $this->db->get_where('user', ['phone' => $this->session->userdata('phone')])->row_array();

		$data['title'] = 'Dashboard';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/templates/footer');
	}

}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminMenu extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Menu Utama';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data ['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required', ['required' => 'Nama menu harus di isi']);

		if ($this->form_validation->run() == false){

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/templates/topbar');
        $this->load->view('admin/menu_management/menu', $data);
        $this->load->view('admin/templates/footer');	
		}else{
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">menu berhasil ditambah!</div>');
            redirect('adminMenu/index');
		}		
		
	}

	public function update($id)
	{
		$data['title'] = 'Menu Utama';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data ['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();
		

		$this->form_validation->set_rules('menu', 'Menu', 'required', ['required' => 'Nama menu harus di isi']);

		if ($this->form_validation->run() == false){

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/templates/topbar');
        $this->load->view('admin/menu_management/update_menu', $data);
        $this->load->view('admin/templates/footer');	
		}else{
			
		$data = [
        			'id' 		=> $this->input->post('id',true),
        			'menu'		=> $this->input->post('menu',true),
        	];
        $this->db->where('id', $id);
		$this->db->update('user_menu', $data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">menu berhasil ditambah!</div>');
        redirect('adminMenu/index');
		}		
	}
	public function delete($id)
	{
		$this->db->delete('user_menu', ['id' => $id]);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">menu berhasil dihapus!</div>');
        redirect('adminMenu/index');
	}
}
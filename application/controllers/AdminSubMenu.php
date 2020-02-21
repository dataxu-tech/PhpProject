<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminSubMenu extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Sub Menu';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data ['menu'] = $this->db->get('user_menu')->result_array();

		$data['subMenu'] = $this->Sub_Menu_model->getSubMenu();

		$this->form_validation->set_rules('menu_id', 'Menu', 'required', ['required' => 'menu harus di isi']);
		$this->form_validation->set_rules('title', 'Title', 'required', ['required' => 'judul harus di isi']);
		$this->form_validation->set_rules('url', 'Url', 'required', ['required' => 'url harus di isi']);
		$this->form_validation->set_rules('icon', 'Icon', 'required', ['required' => 'icon harus di isi']);

		if ($this->form_validation->run() == false){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/templates/topbar');
	        $this->load->view('admin/menu_management/submenu', $data);
	        $this->load->view('admin/templates/footer');
        }else{
        	$data = [
        			'menu_id' 	=> $this->input->post('menu_id'),
        			'title'		=> $this->input->post('title'),
        			'url'		=> $this->input->post('url'),
        			'icon'		=> $this->input->post('icon'),
        			'is_active'	=> $this->input->post('is_active')
        	];
        	$this->db->insert('user_sub_menu', $data);
        	$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu berhasil ditambah!</div>');
            redirect('adminSubMenu/index');
        }
	}

	public function update($id)
	{
		$data['title'] = 'Sub Menu';

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['Menu'] = $this->Sub_Menu_model->getSubMenu();
		$data['subMenu'] = $this->Sub_Menu_model->getSubMenuById($id);
		
		$this->form_validation->set_rules('menu_id', 'Menu_id', 'required', ['required' => 'menu harus di isi']);
		$this->form_validation->set_rules('title', 'Title', 'required', ['required' => 'judul harus di isi']);
		$this->form_validation->set_rules('url', 'Url', 'required', ['required' => 'url harus di isi']);
		$this->form_validation->set_rules('icon', 'Icon', 'required', ['required' => 'icon harus di isi']);

		if ($this->form_validation->run() == false){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/templates/topbar');
	        $this->load->view('admin/menu_management/update_submenu', $data);
	        $this->load->view('admin/templates/footer');
	        
        }else{


        	$this->Sub_Menu_model->update($id);
        	$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu berhasil diubah!</div>');
            redirect('adminSubMenu/index');
        }
	}

	public function delete($id)
	{
		$this->Sub_Menu_model->delete($id);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu berhasil dihapus!</div>');
        redirect('adminSubMenu/index');
	}
}
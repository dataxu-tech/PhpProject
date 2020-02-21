<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminProduct extends CI_Controller
{


	public function index()
	{
		$data['title'] = 'Produk';
		$data['user'] = $this->db->get_where('user', ['phone' => $this->session->userdata('phone')])->row_array();
		$data['product'] = $this->db->get('product')->result_array();				

		$this->form_validation->set_rules('name', 'Name', 'required', ['required' => 'nama harus di isi']);
        $this->form_validation->set_rules('visibility', 'Visibility', 'required', ['required' => 'ketersediaan harus di pilih']);
        $this->form_validation->set_rules('category', 'Category', 'required', ['required' => 'kategori harus di isi']);
        $this->form_validation->set_rules('description', 'Description', 'required', ['required' => 'deskripsi harus di isi']);
        $this->form_validation->set_rules('quantity', 'Quantity', 'required', ['required' => 'Banyak barang harus di isi']);
        $this->form_validation->set_rules('price', 'Price', 'required', ['required' => 'Harga harus di isi']);
        $this->form_validation->set_rules('old_price', 'Old_price', 'required', ['required' => 'Harga coret harus di isi']);
        $this->form_validation->set_rules('free_delivery', 'Free_delivery', 'required', ['required' => 'onkir harus di isi']);
        $this->form_validation->set_rules('weight', 'Weight', 'required', ['required' => 'berat barang harus di isi']);
        $this->form_validation->set_rules('in_slider', 'In_slider', 'required', ['required' => 'Di dlider harus di pilih']); 
               

        if ($this->form_validation->run() == false){
            $this->load->view('admin/templates/header', $data);
    		$this->load->view('admin/templates/sidebar');
    		$this->load->view('admin/templates/topbar');
            $this->load->view('admin/product/product', $data);
            $this->load->view('admin/templates/footer');  	
    	}else{

            $this->Product_model->add();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Submenu berhasil ditambah!</div>');
            redirect('adminProduct/index');
        }
	}

    public function singleProduct($id)
    {
        $data['title'] = 'Detail Produk';
        $data['user'] = $this->db->get_where('user', ['phone' => $this->session->userdata('phone')])->row_array();
        $data['product'] = $this->db->get_where('product', ['id' => $id] )->row_array();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/templates/topbar');
        $this->load->view('admin/product/single_product', $data);
        $this->load->view('admin/templates/footer');
    }

    public function update()
    {
        
    }

    public function delete($id)
    {
        $this->Product_model->delete($id);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">product berhasil dihapus!</div>');
        redirect('adminProduct/index');
    }


}
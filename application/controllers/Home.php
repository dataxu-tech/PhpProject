<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		
		$data['title'] = 'SEPODO';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['allProduct'] = $this->Product_model->getAllProduct();
		$data['bannerslider'] = $this->Product_model->getBannerSlider();

		
		
		$this->load->view('store/templates/header', $data);
        $this->load->view('store/templates/navbar',$data);
        $this->load->view('store/index',$data);
       	$this->load->view('store/templates/footer');       	
	}

	public function singleProduct($id)
	{
        $data['title'] = 'SEPODO';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['allProduct'] = $this->Product_model->getAllProduct();
		$data['singleProduct'] = $this->Product_model->getProductById($id);

		
		$this->load->view('store/templates/header', $data);
        $this->load->view('store/templates/navbar',$data);
		$this->load->view('store/single_product',$data);
		$this->load->view('store/templates/sp_navbar',$data);
        $this->load->view('store/templates/footer');
	}

	

	public function detailOrder()
	{
		$data['title'] = 'SEPODO';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('store/templates/header', $data);
        $this->load->view('store/templates/navbar',$data);
		$this->load->view('store/detail_order',$data);
        $this->load->view('store/templates/footer');
	}

	public function addCart()
	{
		
		$data = [
			'id'		=> $this->input->post('id'),
			'name'		=> $this->input->post('name'),
			'qty'		=> htmlspecialchars($this->input->post('qty',true)),
			'price'		=> $this->input->post('price'),
			'image'		=> $this->input->post('image')	
		];
		
	$this->cart->insert($data);
	
	redirect('home/index');
	}

	public function removeCart($rowid)
	{
		$this->cart->remove($rowid);
		redirect('home/detailOrder');
	}

	public function updateCart()
	{
		$data = [
			'rowid'		=> $this->input->post('rowid'),
			'qty'		=> htmlspecialchars($this->input->post('qty', true))
		];
	$this->cart->update($data);
	redirect('home/detailOrder');
	}
	
	public function orderList()
	{
		$data['title'] = 'SEPODO';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('store/templates/header', $data);
        $this->load->view('store/templates/navbar',$data);
		$this->load->view('store/shipping',$data);
        $this->load->view('store/templates/footer');
	}
}
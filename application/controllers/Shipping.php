<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shipping extends CI_Controller
{
	
	// API raja ongkir

	public function index()
	{
		
		$data['title'] = 'SEPODO';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('store/templates/header', $data);
        $this->load->view('store/templates/navbar',$data);
        $this->load->view('store/shipping',$data);
       	$this->load->view('store/templates/footer');       	
	}

	// Provinsi
	public function province(){
		$provinces = $this->rajaongkir->province(); 
		$err = json_decode($provinces, true);
		echo json_encode($err['rajaongkir']['results']);
	}
	
  
  	// Kabupaten / kota
  	public function city($province_id = NULL){
  		if (!empty($province_id)){
  			if (is_numeric($province_id)){
  				$cities = $this->rajaongkir->city($province_id);
				$errcity = json_decode($cities, true);
				echo json_encode($errcity['rajaongkir']['results']);
  			}else{
  				echo "string";
  			}
  		}else{
  			echo "Tidak Ada Provinsi yang Dipilih";
  		}
		
	}
  
  	// Kecamatan
  	public function subdistrict($city_id = NULL){
  		if (!empty($city_id)){
  			if (is_numeric($city_id)){
  				$subdistrict = $this->rajaongkir->subdistrict($city_id);
				$errsubdistrict = json_decode($subdistrict, true);
				echo json_encode($errsubdistrict['rajaongkir']['results']);
  			}else{
  				echo "string";
  			}
  		}else{
  			echo "Tidak Ada Kecamatan yang Dipilih";
  		}
		// $subdistrict = $this->rajaongkir->subdistrict($city_id); // output json
		// $this->output->set_content_type('application/json')->set_output($subdistrict);
	}
  
  	// Biaya ongkir
  	public function cost($origin,$des,$qty,$cour){
		$cost = $this->rajaongkir->cost($origin, $des,$qty,$cour);
		$data = json_decode($cost, true);
		echo json_encode($data['rajaongkir']['results']);
		
	}
}
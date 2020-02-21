<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
	
    public function getAllProduct()
    {
        return $this->db->get('product')->result_array();
    }

    public function getProductById($id)
    {
       return $this->db->get_where('product', ['id' => $id])->row_array();
    }

    public function add()
	{
		$data = [
                    'id'                => $this->input->post('name',true),
                    'name'   			=> $this->input->post('name',true),
                    'image'     		=> $this->_uploadimage(),
                    'folder'     		=> $this->input->post('folder',true),
                    'visibility'    	=> $this->input->post('visibility',true),
                    'category' 			=> $this->input->post('category',true),
                    'description'   	=> $this->input->post('description',true),
                    'quantity'     		=> $this->input->post('quantity',true),
                    'star_member_price' => $this->input->post('star_member_price',true),
                    'member_price'  	=> $this->input->post('member_price',true),
                    'price'      		=> $this->input->post('price',true),
                    'old_price' 		=> $this->input->post('old_price',true),
                    'in_slider'   		=> $this->input->post('in_slider'),                    
            ];
        $this->db->insert('product', $data);
	}

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete('product', ['id' => $id]);
    }

    private function _uploadimage()
    {
        $data = $_FILES['image']['name'];
        $dt = md5($data);
        $config['upload_path']          = './assets/upload/products/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $dt;
        $config['max_size']             = 2048;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')){
            return $this->upload->data('file_name');
        }

        return 'default.jpg';
    }

    private function _deleteImage($id)
    {
    $dt = $this->getProductById($id);
    
    
        if ($dt['image'] != "default.jpg") {
            $filename = explode(".", $dt['image'])[0];
            return array_map('unlink', glob(FCPATH."./assets/upload/products/$filename.*"));
        }
    }

    public function getBannerSlider()
    {
        return $this->db->get('slider')->result_array();
    }
}
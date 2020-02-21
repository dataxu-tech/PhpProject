<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sub_Menu_model extends CI_Model
{
	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
					FROM `user_sub_menu` JOIN `user_menu`
					ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
					";
		return $this->db->query($query)->result_array();

	}

	public function getSubMenuById($id)
	{
		return $this->db->get_where('user_sub_menu', ['id' => $id])->result_array();
	}

	public function add()
	{
		$data = [
        			
        			'menu_id' 	=> $this->input->post('menu_id'),
        			'title'		=> $this->input->post('title'),
        			'url'		=> $this->input->post('url'),
        			'icon'		=> $this->input->post('icon'),
        			'is_active'	=> $this->input->post('is_active')
        	];
        $this->db->insert('user_sub_menu', $data);
	}

	public function update($id)
	{
		
		$data = [
        			'id' 		=> $this->input->post('id'),
        			'menu_id' 	=> $this->input->post('menu_id',true),
        			'title'		=> $this->input->post('title',true),
        			'url'		=> $this->input->post('url',true),
        			'icon'		=> $this->input->post('icon',true),
        			'is_active'	=> $this->input->post('is_active')
        	];
        $this->db->where('id', $id);
		return $this->db->update('user_sub_menu', $data);
	}


	public function delete($id)
	{
		return $this->db->delete('user_sub_menu', ['id' => $id]);
	}
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->form_validation->set_rules('phone','Phone', 'trim|required|min_length[4]',
                                            array(
                                                'required'   => 'Masukkan nomer telephone..!.',
                                                'min_length' => 'Minimal 4 huruf/angka'
                                                )
                                            );
                                            
        $this->form_validation->set_rules('password','Password', 'trim|required|min_length[4]',
                                            array(
                                                'required'   => 'Masukkan Password..!',
                                                'min_length' => 'Minimal 4 huruf/angka/karakter',
                                                )
                                            );
        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Halaman Login';
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/login');
            $this->load->view('admin/templates/auth_footer');
        } else
        {
           // when validation success
           $this->_login();
        }        
    }

    // login function
    private function _login()
    {
        $phone      = htmlspecialchars($this->input->post('phone',true));
        $password   = htmlspecialchars($this->input->post('password',true));

        //query data from database
        $user = $this->db->get_where('user', ['phone' => $phone])->row_array();
        
        //when user axist
        if($user)
        {
            //when user activated
            if( $user['is_active'] ==1 )
            {
                //ceck password
                if(password_verify($password, $user['password']))
                {
                    //data for session
                    $data = [
                        'phone'     => $user['phone'],
                        'role_id'   => $user['role_id']
                    ];

                    $this->session->set_userdata($data);

                    //redirect('user');
                    if($user['role_id'] == 1 ) {
                            redirect('useraccess/owner');
                        } elseif ($user['role_id'] == 2 ) {
                            redirect('useraccess/admin');
                        } elseif ($user['role_id'] == 3 ) {
                            redirect('useraccess/index');
                        }else {
                            redirect('home/index');
                        }
                        
                    
                }else
                {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">password salah!</div>');
                    redirect('auth/index');
                }
            }else
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">phone belum diaktivasi!</div>');
                redirect('auth/index');
            }
        }else
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">silahkan aktivasi phone!</div>');
            redirect('auth/index');
        }
        
    }


    public function registration()
    {
        $this->form_validation->set_rules('name','Name', 'trim|required|min_length[4]',
                                            array(
                                                'required'   => 'Masukkan nama..!.',
                                                'min_length' => 'Minimal 4 huruf'
                                                )
                                            );
        $this->form_validation->set_rules('phone','Email', 'trim|required|min_length[4]|is_unique[user.phone]',
                                            array(
                                                'required'   => 'Masukkan phone..!.',
                                                'min_length' => 'Minimal 4 huruf/angka',
                                                'valid_email'=> 'masukkan valid phone',
                                                'is_unique'  => 'phone sudah pernah digunakan'
                                                )
                                            );
                                            
        $this->form_validation->set_rules('password1','Password1', 'trim|required|min_length[4]|matches[password2]',
                                            array(
                                                'required'   => 'Masukkan Password..!.',
                                                'min_length' => 'Minimal 4 huruf/angka/karakter',
                                                'matches'    => 'password tidak cocok'
                                                )
                                            );
        $this->form_validation->set_rules('password2','Password2', 'trim|required|min_length[4]',
                                            array(
                                                'required'   => 'Masukkan Password..!.',
                                                'min_length' => 'Minimal 4 huruf/angka/karakter',
                                                )
                                            );

        if ($this->form_validation->run() == FALSE)
            {
                $data['title'] = 'Halaman Registrasi';
                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/registration');
                $this->load->view('admin/templates/auth_footer');
            }else
            {
                $data = [
                    'name'      => htmlspecialchars($this->input->post('name', true)),
                    'phone'     => htmlspecialchars($this->input->post('phone', true)),
                    'image'     => 'default.jpg',
                    'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id'   => 3,
                    'is_active' => 0,
                    'date_created' => time()

                ];
                // insert into database
                $this->db->insert('user', $data);
                // create message success in index
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">registrasi sukses!</div>');
                
                redirect('auth/index');
            }

    }

    public function logout()
    {
        $this->session->unset_userdata('phone');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Logout sukses!</div>');
        redirect('home/index');
    }

    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index (){

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
       
        if ($this->form_validation->run()== false){
            
            $data['title'] = 'Linkoe Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } 
        else {
            //validation success
            $this->_login();
        }
    }

    private function _login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //jika user ada
        if($user){
            //user aktif
            if($user['is_active'] == 1) {
                //password benar atau tidak
                if(password_verify($password, $user['password'])){
                    $data = [
                        'username' => $user ['username'],
                        'role_id' => $user ['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('');

                } 
                else{
                    $this->session->set_flashdata('message', '<div align="center" class="alertalert-danger" role="alert">Try again! Wrong password</div>');
                    redirect('auth');
                }
            } 
            else{
                $this->session->set_flashdata('message', '<div align="center" class="alertalert-danger" role="alert">Username is not activated!</div>');
                redirect('auth');
            }
        }

        else{
            $this->session->set_flashdata('message', '<div align="center" class="alertalert-danger" role="alert">Username is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration(){

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]',[
            'is_unique' => 'This username has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',[
            'matches' => 'password does not matches',
            'min_length' => 'password to short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[5]|matches[password1]');


        if ($this->form_validation->run()== false){
            $data['title'] = 'Linkoe User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } 
        else 
        {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alertalert-success" role="alert">Conratulation! Your account has been created. Please login</div>');
            redirect('auth');
        }
    }

    public function logout(){

        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div align="center" class="alertalert-danger" role="alert">You already logged out</div>');
            redirect('auth');
    }
}
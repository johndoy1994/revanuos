<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('Thumbnail');
    }

    public function index() {
        $admin_id = $this->session->userdata('admin_id');
        if (!empty($admin_id)) {
            redirect('admin/dashboard', 'refresh');
        } else {
            $return_data = array();
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/admin_login');
            } else {
                $user_data = array(
                    'usr_email' => $this->input->post('email'),
                    'usr_password' => md5($this->input->post('password')),
                );
                $admin_det = $this->User_model->login($user_data);

                if (!empty($admin_det)) {
                    $data = array(
                        'admin_id' => $admin_det[0]->usr_id,
                        'admin_email' => $admin_det[0]->usr_email,
                    );
                    $this->session->set_userdata($data);
                    redirect('admin/dashboard', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Email and Password Wrong.');
                    $this->load->view('admin/admin_login', array('message' => $return_data));
                }
            }
        }
    }

    public function dashboard() {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $data['UserTotal'] = array(); //$this->User_model->getUserTotal();
        $data['MagazineTotal'] = array(); //$this->User_model->getMagazineTotal();
        $admin_id = $this->session->userdata('admin_id');
        $this->load->view('admin/dashboard', $data);
    }

    public function logout() {
        $this->load->library('session');
        $data = array(
            'admin_id' => '',
            'admin_email' => '',
        );
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_email');
        redirect('admin', 'refresh');
    }
}

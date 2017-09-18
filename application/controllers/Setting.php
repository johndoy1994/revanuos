<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Setting_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('image_lib');
    }

    public function listing() {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $admin_id = $this->session->userdata('admin_id');
        $setting = $this->Setting_model->getSetting();
        $this->load->view('admin/setting_list', array('setting' => $setting));
    }

    public function edithome($id = '') {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $this->form_validation->set_rules('content', 'content', 'trim|required');
        $this->form_validation->set_message('check_default', 'please select site name');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $setting_data = array(
            'id' => $id,
        );
        $setting = $this->Setting_model->selectSettingData($setting_data);
        if ($this->form_validation->run() == FALSE) {
            if (!empty($setting)) {
                $this->load->view('admin/admin_edithome', array('setting' => $setting[0]));
            } else {
                redirect('setting/listing', 'refresh');
            }
        } else {

            $setting_data = array(
                'id' => $this->input->post('id'),
                'content' => $this->input->post('content'),
            );
            if ($_FILES['image']['name'] != "") {
                $error = "";
                $image_path = APPPATH . '../uploads/images/setting';
                $config['upload_path'] = $image_path;
                $config['file_name'] = rand().$_FILES['image']['name'];
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $error['upload_data'] = '';
                $old_img = $this->input->post('old_img');
                if (!$this->upload->do_upload('image')) {
                    $error = $this->upload->display_errors();
                    $imageName = '';
                } else {
                    $imageName = $this->upload->data()['file_name'];
                    $setting_data['image'] = $imageName;
                    $oldImage = realpath(APPPATH . '../uploads/images/setting') . '/' . $old_img;
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                }
            }
            if ($this->Setting_model->updateSetting($setting_data)) {
                $this->session->set_flashdata('success', 'Home Edit Successfully.');
                redirect('setting/listing', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Home Not Edit Successfully.');
                redirect('setting/listing', 'refresh');
            }
        }
    }

    function check_default($post_string) {
        return $post_string == '0' ? FALSE : TRUE;
    }

    public function editabountus($id = '') {
        
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $admin_id = $this->session->userdata('admin_id');
        
        $this->form_validation->set_rules('content', 'content', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $setting_data = array(
            'id' => $id,
        );
        $setting = $this->Setting_model->selectSettingData($setting_data);
        if ($this->form_validation->run() == FALSE) {
            if (!empty($setting)) {
                $this->load->view('admin/admin_editaboutus', array('setting' => $setting[0]));
            } else {
                redirect('setting/listing', 'refresh');
            }
        } else {
            $setting_data = array(
                'id' => $this->input->post('id'),
                'content' => $this->input->post('content'),
                 );
            if ($this->Setting_model->updateSetting($setting_data)) {
                $this->session->set_flashdata('success', 'AboutUs Edit Successfully.');
                redirect('setting/listing', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'AboutUs Not Edit Successfully.');
                redirect('setting/listing', 'refresh');
            }
        }
    }
}

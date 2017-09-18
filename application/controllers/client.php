<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Client_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('Thumbnail');
        $this->load->library('image_lib');
    }

    public function index() {
        //echo '<pre>';print_r($this->cur_admin);exit;
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }

        $clients = $this->Client_model->all_client_data();
        $this->load->view('admin/client_list', array('clients' => $clients));
    }

    public function clientdelete() {
        $clientid = $this->input->post('id');
        $client = $this->Client_model->get_client_data($clientid);
        $unLinkImage = APPPATH . '../uploads/images/clients/' . $client[0]->image;
        $unLinkImage200x200 = APPPATH . '../uploads/images/clients/200x200/' . $client[0]->image;
        if (file_exists($unLinkImage)) {
            unlink($unLinkImage);
        }
        if (file_exists($unLinkImage200x200)) {
            unlink($unLinkImage200x200);
        }
        $this->Client_model->client_delete($clientid);
        $this->session->set_flashdata('success', 'Client Delete Successfully.');
        redirect('client', 'refresh');
    }

    public function addclient() {
        ini_set("max_execution_time", 0);
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }

        $admin_id = $this->session->userdata('admin_id');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/admin_addclient');
        } else {
            $image_path = APPPATH . '../uploads/images/clients';
            $config['upload_path'] = $image_path;
            $config['file_name'] = rand().$_FILES['image']['name'];
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $error = array('msg' => $this->upload->display_errors());
                $imageName = '';
                $this->session->set_flashdata('error', 'Please provide valid image type.');
                redirect('admin/addclient', 'refresh');
            } else {
                $imageName = $this->upload->data()['file_name'];
                $configSize1['image_library'] = 'gd2';
                $configSize1['source_image'] = APPPATH . '../uploads/images/clients/' . $imageName;
                $configSize1['maintain_ratio'] = false;
                $configSize1['width'] = 200;
                $configSize1['height'] = 200;
                $configSize1['new_image'] = APPPATH . '../uploads/images/clients/200x200/';
                $this->image_lib->initialize($configSize1);
                $this->image_lib->resize();
                $this->image_lib->clear();
            }

            $client_data = array(
                'name' => $this->input->post('name'),
                'image' => $imageName,
                'content' => $this->input->post('content'),
            );

            $client_id = $this->Client_model->insertClient($client_data);
            // insert form data into database
            if ($client_id) {
                $this->session->set_flashdata('success', 'Client Added Successfully.');
                redirect('client', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Client Not Added Successfully.');
                redirect('client', 'refresh');
            }
        }
    }

    public function updateclient($id) {
        $this->form_validation->set_rules('type', 'Type', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $client = $this->Client_model->get_client_data($id);
            if (!empty($client)) {
                $this->load->view('admin/admin_editclient', array('client' => $client));
            } else {
                redirect('client', 'refresh');
            }
        } else {
            $client_data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'content' => $this->input->post('content'),
            );

            if ($_FILES['image']['name'] != '') {
                $image_path = APPPATH . '../uploads/images/clients';
                $config['upload_path'] = $image_path;
                $config['file_name'] = rand().$_FILES['image']['name'];
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image')) {
                    
                } else {
                    $client_data['image'] = $this->upload->data()['file_name'];
                    $configSize1['image_library'] = 'gd2';
                    $configSize1['source_image'] = APPPATH . '../uploads/images/clients/' . $client_data['image'];
                    $configSize1['maintain_ratio'] = false;
                    $configSize1['width'] = 200;
                    $configSize1['height'] = 200;
                    $configSize1['new_image'] = APPPATH . '../uploads/images/clients/200x200/';
                    $this->image_lib->initialize($configSize1);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                    $unLinkImage = APPPATH . '../uploads/images/clients/' . $this->input->post('old_image');
                    $unLinkImage200x200 = APPPATH . '../uploads/images/clients/200x200/' . $this->input->post('old_image');
                    if (file_exists($unLinkImage)) {
                        unlink($unLinkImage);
                    }
                    if (file_exists($unLinkImage200x200)) {
                        unlink($unLinkImage200x200);
                    }
                }
            }
            // insert form data into database
            if ($this->Client_model->updateClient($client_data)) {
                $this->session->set_flashdata('success', 'Client Edit Successfully.');
                redirect('client', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Client Not Edit Successfully.');
                redirect('client', 'refresh');
            }
        }
    }

}

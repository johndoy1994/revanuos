<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Portfolio_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('Thumbnail');
        $this->load->library('image_lib');
    }

    public function listing() {
        //echo '<pre>';print_r($this->cur_admin);exit;
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }

        $portfolios = $this->Portfolio_model->all_portfolio_data();
        $this->load->view('admin/portfolio_list', array('portfolios' => $portfolios));
    }

    public function portfoliodelete() {
        $portfolioid = $this->input->post('id');
        $portfolio = $this->Portfolio_model->get_portfolio_data($portfolioid);
        $unLinkImage = APPPATH . '../uploads/images/portfolio/' . $portfolio[0]->image;
        $unLinkImage400x289 = APPPATH . '../uploads/images/portfolio/400x289' . $portfolio[0]->image;
        if (file_exists($unLinkImage)) {
            unlink($unLinkImage);
        }
        if (file_exists($unLinkImage400x289)) {
            unlink($unLinkImage400x289);
        }
        $this->Portfolio_model->portfolio_delete($portfolioid);
        $this->session->set_flashdata('success', 'Portfolio Delete Successfully.');
        redirect('portfolio/listing', 'refresh');
    }

    public function addportfolio() {
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
            $this->load->view('admin/admin_addportfolio');
        } else {
            $image_path = APPPATH . '../uploads/images/portfolio';
            $config['upload_path'] = $image_path;
            $config['file_name'] = rand().$_FILES['image']['name'];
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $error = array('msg' => $this->upload->display_errors());
                $imageName = '';
                $this->session->set_flashdata('error', 'Please provide valid image type.');
                redirect('portfolio/addportfolio', 'refresh');
            } else {
                $imageName = $this->upload->data()['file_name'];
                $configSize1['image_library'] = 'gd2';
                $configSize1['source_image'] = APPPATH . '../uploads/images/portfolio/' . $imageName;
                $configSize1['maintain_ratio'] = false;
                $configSize1['width'] = 400;
                $configSize1['height'] = 289;
                $configSize1['new_image'] = APPPATH . '../uploads/images/portfolio/400x289/';
                $this->image_lib->initialize($configSize1);
                $this->image_lib->resize();
                $this->image_lib->clear();
            }

            $portfolio_data = array(
                'name' => $this->input->post('name'),
                'image' => $imageName,
                'content' => $this->input->post('content'),
            );

            $portfolio_id = $this->Portfolio_model->insertPortfolio($portfolio_data);
            // insert form data into database
            if ($portfolio_id) {
                $this->session->set_flashdata('success', 'Portfolio Added Successfully.');
                redirect('portfolio/listing', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Portfolio Not Added Successfully.');
                redirect('portfolio/listing', 'refresh');
            }
        }
    }

    public function updateportfolio($id) {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $portfolio = $this->Portfolio_model->get_portfolio_data($id);
            if (!empty($portfolio)) {
                $this->load->view('admin/admin_editportfolio', array('portfolio' => $portfolio));
            } else {
                redirect('portfolio/listing', 'refresh');
            }
        } else {
            $portfolio_data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'content' => $this->input->post('content'),
            );

            if ($_FILES['image']['name'] != '') {
                $image_path = APPPATH . '../uploads/images/portfolio';
                $config['upload_path'] = $image_path;
                $config['file_name'] = rand().$_FILES['image']['name'];
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image')) {
                    
                } else {
                    $portfolio_data['image'] = $this->upload->data()['file_name'];
                    $configSize1['image_library'] = 'gd2';
                    $configSize1['source_image'] = APPPATH . '../uploads/images/portfolio/' . $portfolio_data['image'];
                    $configSize1['maintain_ratio'] = false;
                    $configSize1['width'] = 400;
                    $configSize1['height'] = 289;
                    $configSize1['new_image'] = APPPATH . '../uploads/images/portfolio/400x289/';
                    $this->image_lib->initialize($configSize1);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                    
                    $unLinkImage = APPPATH . '../uploads/images/portfolio/' . $this->input->post('old_image');
                    $unLinkImage400x289 = APPPATH . '../uploads/images/portfolio/400x289/' . $this->input->post('old_image');
                    if (file_exists($unLinkImage)) {
                        unlink($unLinkImage);
                    }
                    if (file_exists($unLinkImage400x289)) {
                        unlink($unLinkImage400x289);
                    }
                }
            }
            // insert form data into database
            if ($this->Portfolio_model->updatePortfolio($portfolio_data)) {
                $this->session->set_flashdata('success', 'Portfolio Edit Successfully.');
                redirect('portfolio/listing', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Portfolio Not Edit Successfully.');
                redirect('portfolio/listing', 'refresh');
            }
        }
    }

}

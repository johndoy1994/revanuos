<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Testimonial_model');
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
        $testimonial = $this->Testimonial_model->getTestimonial();
        $this->load->view('admin/testimonial_list', array('testimonial' => $testimonial));
    }

    public function addtestimonial($id = '') {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $admin_id = $this->session->userdata('admin_id');

        if ($id == "") {
            $this->form_validation->set_rules('client_name', 'Client Name', 'trim|required');
            $this->form_validation->set_rules('content', 'content', 'trim|required');
            $this->form_validation->set_message('check_default', 'please select site name');
            //$this->form_validation->set_rules('image', 'File', 'trim|xss_clean');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/admin_addtestimonial');
            } else {
                $error = "";
                $image_path = APPPATH . '../uploads/images/testimonial';
                $config['upload_path'] = $image_path;
                $config['file_name'] = rand().$_FILES['image']['name'];
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $error['upload_data'] = '';
                if (!$this->upload->do_upload('image')) {
                    $error = $this->upload->display_errors();
                    $imageName = '';
                    $this->session->set_flashdata('error', $error);
                    redirect('testimonial/listing', 'refresh');
                } else {
                    $imageName = $this->upload->data()['file_name'];

                    $configSize1['image_library'] = 'gd2';
                    $configSize1['source_image'] = APPPATH . '../uploads/images/testimonial/' . $imageName;
                    $configSize1['maintain_ratio'] = false;
                    $configSize1['width'] = 200;
                    $configSize1['height'] = 200;
                    $configSize1['new_image'] = APPPATH . '../uploads/images/testimonial/200x200/';
                    $this->image_lib->initialize($configSize1);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                }


                $testimonial_data = array(
                    'client_name' => $this->input->post('client_name'),
                    'client_image' => $imageName,
                    'content' => $this->input->post('content'),
                );

                $testimonial_id = $this->Testimonial_model->insertTestimonial($testimonial_data);
                // insert form data into database
                if ($testimonial_id) {
                    $this->session->set_flashdata('success', 'Testimonial Added Successfully.');
                    redirect('testimonial/listing', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Testimonial Not Added Successfully.');
                    redirect('testimonial/listing', 'refresh');
                }
            }
        } else {
            $this->form_validation->set_rules('client_name', 'Client Name', 'trim|required');
            $this->form_validation->set_rules('content', 'content', 'trim|required');
            $this->form_validation->set_message('check_default', 'please select site name');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $testimonial_data = array(
                'id' => $id,
            );
            $testimonial = $this->Testimonial_model->selectTestimonialData($testimonial_data);
            if ($this->form_validation->run() == FALSE) {
                if (!empty($testimonial)) {
                    $this->load->view('admin/admin_edittestimonial', array('testimonial' => $testimonial[0]));
                } else {
                    redirect('testimonial/listing', 'refresh');
                }
            } else {

                $testimonial_data = array(
                    'id' => $this->input->post('id'),
                    'client_name' => $this->input->post('client_name'),
                    'content' => $this->input->post('content'),
                );
                if ($_FILES['image']['name'] != "") {
                    $error = "";
                    $image_path = APPPATH . '../uploads/images/testimonial';
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
//                               $this->session->set_flashdata('error', $error);
//                               redirect('testimonial', 'refresh');
                    } else {
                        $imageName = $this->upload->data()['file_name'];

                        $configSize1['image_library'] = 'gd2';
                        $configSize1['source_image'] = APPPATH . '../uploads/images/testimonial/' . $imageName;
                        $configSize1['maintain_ratio'] = false;
                        $configSize1['width'] = 200;
                        $configSize1['height'] = 200;
                        $configSize1['new_image'] = APPPATH . '../uploads/images/testimonial/200x200/';
                        $this->image_lib->initialize($configSize1);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                        $testimonial_data['client_image'] = $imageName;
                        $oldImage = realpath(APPPATH . '../uploads/images/testimonial') . '/' . $old_img;
                        $oldImage200x200 = realpath(APPPATH . '../uploads/images/testimonial/200x200') . '/' . $old_img;
                        if (file_exists($oldImage)) {
                            unlink($oldImage);
                        }
                        if (file_exists($oldImage200x200)) {
                            unlink($oldImage200x200);
                        }
                    }
                }
                if ($this->Testimonial_model->updateTestimonial($testimonial_data)) {
                    $this->session->set_flashdata('success', 'Testimonial Edit Successfully.');
                    redirect('testimonial/listing', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Testimonial Not Edit Successfully.');
                    redirect('testimonial/listing', 'refresh');
                }
            }
        }
    }

    function check_default($post_string) {
        return $post_string == '0' ? FALSE : TRUE;
    }

    public function Testimonial_dataDelete() {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $testimonial_id = $this->input->post('id');

        $testimonial_data = array(
            'id' => $testimonial_id,
        );
        $testimonial = $this->Testimonial_model->selectTestimonialData($testimonial_data);
        if ($testimonial) {
            $oldImage = realpath(APPPATH . '../uploads/images/testimonial') . '/' . $testimonial[0]->client_image;
            $oldImage200x200 = realpath(APPPATH . '../uploads/images/testimonial/200x200') . '/' . $testimonial[0]->client_image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            if (file_exists($oldImage200x200)) {
                unlink($oldImage200x200);
            }
        }

        $this->Testimonial_model->testimonial_delete($testimonial_id);
        $this->session->set_flashdata('success', 'Testimonial Delete Successfully.');
        redirect('testimonial', 'refresh');
    }

}

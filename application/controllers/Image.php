<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Images_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('image_lib');
    }

    public function index() {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $admin_id = $this->session->userdata('admin_id');
        $images = $this->Images_model->getImages();
        $this->load->view('admin/images_list', array('images' => $images));
    }

    public function addimages($id = '') {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $admin_id = $this->session->userdata('admin_id');

        if ($id == "") {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_message('check_default', 'please select site name');
            //$this->form_validation->set_rules('image', 'File', 'trim|xss_clean');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/admin_addimages');
            } else {
                $error = "";
                $image_path = APPPATH . '../uploads/images/images';
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
                    redirect('image', 'refresh');
                } else {
                    $imageName = $this->upload->data()['file_name'];
                    $configSize1['image_library'] = 'gd2';
                    $configSize1['source_image'] = APPPATH . '../uploads/images/images/' . $imageName;
                    $configSize1['maintain_ratio'] = false;
                    $configSize1['width'] = 400;
                    $configSize1['height'] = 289;
                    $configSize1['new_image'] = APPPATH . '../uploads/images/images/400x289/';
                    $this->image_lib->initialize($configSize1);
                    $this->image_lib->resize();
                    $this->image_lib->clear();
                }


                $images_data = array(
                    'name' => $this->input->post('name'),
                    'image' => $imageName,
                );

                $images_id = $this->Images_model->insertImages($images_data);
                // insert form data into database
                if ($images_id) {
                    $this->session->set_flashdata('success', 'Image Added Successfully.');
                    redirect('image', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Image Not Added Successfully.');
                    redirect('image', 'refresh');
                }
            }
        } else {
            $this->form_validation->set_rules('name', 'Client Name', 'trim|required');
            $this->form_validation->set_message('check_default', 'please select site name');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $images_data = array(
                'id' => $id,
            );
            $images = $this->Images_model->selectImagesData($images_data);
            if ($this->form_validation->run() == FALSE) {
                if (!empty($images)) {
                    $this->load->view('admin/admin_editimages', array('images' => $images[0]));
                } else {
                    redirect('image', 'refresh');
                }
            } else {

                $images_data = array(
                    'id' => $this->input->post('id'),
                    'name' => $this->input->post('name'),
                );
                if ($_FILES['image']['name'] != "") {
                    $error = "";
                    $image_path = APPPATH . '../uploads/images/images';
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
                        $configSize1['source_image'] = APPPATH . '../uploads/images/images/' . $imageName;
                        $configSize1['maintain_ratio'] = false;
                        $configSize1['width'] = 400;
                        $configSize1['height'] = 289;
                        $configSize1['new_image'] = APPPATH . '../uploads/images/images/400x289/';
                        $this->image_lib->initialize($configSize1);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                        $images_data['image'] = $imageName;
                        $oldImage = realpath(APPPATH . '../uploads/images/images') . '/' . $old_img;
                        $oldImage400x289 = realpath(APPPATH . '../uploads/images/images/400x289') . '/' . $old_img;
                        if (file_exists($oldImage)) {
                            unlink($oldImage);
                        }
                        if (file_exists($oldImage400x289)) {
                            unlink($oldImage400x289);
                        }
                    }
                }
                if ($this->Images_model->updateImages($images_data)) {
                    $this->session->set_flashdata('success', 'Images Edit Successfully.');
                    redirect('image', 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Images Not Edit Successfully.');
                    redirect('image', 'refresh');
                }
            }
        }
    }

    function check_default($post_string) {
        return $post_string == '0' ? FALSE : TRUE;
    }

    public function Images_dataDelete() {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $images_id = $this->input->post('id');

        $images_data = array(
            'id' => $images_id,
        );
        $images = $this->Images_model->selectImagesData($images_data);
        if ($images) {
            $oldImage = realpath(APPPATH . '../uploads/images/images') . '/' . $images[0]->image;
            $oldImage400x289 = realpath(APPPATH . '../uploads/images/images/400x289') . '/' . $images[0]->image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            if (file_exists($oldImage400x289)) {
                unlink($oldImage400x289);
            }
        }

        $this->Images_model->images_delete($images_id);
        $this->session->set_flashdata('success', 'Images Delete Successfully.');
        redirect('image', 'refresh');
    }

}

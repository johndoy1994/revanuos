<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Career_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function listing()
    {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $admin_id  =   $this->session->userdata('admin_id');
        $creer = $this->Career_model->getCareer();
        $this->load->view('admin/career_list', array('creer' => $creer));
    }

    public function addcareer($id='')
    {	
        ini_set("max_execution_time",0);
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $admin_id  = $this->session->userdata('admin_id');

        if($id==""){
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            $this->form_validation->set_rules('content', 'content', 'trim|required');
            $this->form_validation->set_message('check_default', 'please select site name');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 
            if ($this->form_validation->run() == FALSE)
            {
                    $this->load->view('admin/admin_addcareer');
            }
            else
            {	
                    $career_data = array(
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                );

                $career_id = $this->Career_model->insertCareer($career_data);
                // insert form data into database
                if ($career_id)
                {
                    $this->session->set_flashdata('success', 'Career Added Successfully.');
                    redirect('career/listing', 'refresh');
                }else{
                    $this->session->set_flashdata('error', 'Career Not Added Successfully.');
                    redirect('career/listing', 'refresh');
                }
            }
        }else{
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            $this->form_validation->set_rules('content', 'content', 'trim|required');
            $this->form_validation->set_message('check_default', 'please select site name');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 

                $career_data = array(
                    'id' => $id,
                    );
                    $career = $this->Career_model->selectCareerData($career_data);
                    if ($this->form_validation->run() == FALSE)
                    { 
                        if (!empty($career)) {
                                $this->load->view('admin/admin_editcareer', array('career' => $career[0]));
                        }else{
                                redirect('career/listing', 'refresh');
                        }	        
                }else{
                        $career_data = array(
                            'id' => $this->input->post('id'),
                            'title' => $this->input->post('title'),
                            'content' => $this->input->post('content'),
                        );
                    if ($this->Career_model->updateCareer($career_data))
                    {
                        $this->session->set_flashdata('success', 'Career Edit Successfully.');
                        redirect('career/listing', 'refresh');
                    }else{
                        $this->session->set_flashdata('error', 'Career Not Edit Successfully.');
                        redirect('career/listing', 'refresh');
                    }
                }
        }
    }
    
    function check_default($post_string)
    {
      return $post_string == '0' ? FALSE : TRUE;
    }
    
    public function careerDelete()
    {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $careerid = $this->input->post('id');
        $this->Career_model->career_delete($careerid);
        $this->session->set_flashdata('success', 'Career Delete Successfully.');
        redirect('career/listing', 'refresh');
    }
}

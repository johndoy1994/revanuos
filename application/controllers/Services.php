<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Services_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index()
    {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $admin_id  =   $this->session->userdata('admin_id');
        $services = $this->Services_model->getServices();
        $this->load->view('admin/services_list', array('services' => $services));
    }

    public function addservices($id='')
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
                    $this->load->view('admin/admin_addservices');
            }
            else
            {	
                    $services_data = array(
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                );

                $services_id = $this->Services_model->insertServices($services_data);
                // insert form data into database
                if ($services_id)
                {
                    $this->session->set_flashdata('success', 'Services Added Successfully.');
                    redirect('services', 'refresh');
                }else{
                    $this->session->set_flashdata('error', 'Services Not Added Successfully.');
                    redirect('services', 'refresh');
                }
            }
        }else{
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            $this->form_validation->set_rules('content', 'content', 'trim|required');
            $this->form_validation->set_message('check_default', 'please select site name');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 

                $services_data = array(
                    'id' => $id,
                    );
                    $services = $this->Services_model->selectServicesData($services_data);
                    if ($this->form_validation->run() == FALSE)
                    { 
                        if (!empty($services)) {
                                $this->load->view('admin/admin_editservices', array('services' => $services[0]));
                        }else{
                                redirect('services', 'refresh');
                        }	        
                }else{
                        $services_data = array(
                            'id' => $this->input->post('id'),
                            'title' => $this->input->post('title'),
                            'content' => $this->input->post('content'),
                        );
                    if ($this->Services_model->updateServices($services_data))
                    {
                        $this->session->set_flashdata('success', 'Services Edit Successfully.');
                        redirect('services', 'refresh');
                    }else{
                        $this->session->set_flashdata('error', 'Services Not Edit Successfully.');
                        redirect('services', 'refresh');
                    }
                }
        }
    }
    
    function check_default($post_string)
    {
      return $post_string == '0' ? FALSE : TRUE;
    }
    
    public function servicesDelete()
    {
        if (empty($this->cur_admin)) {
            redirect('admin', 'refresh');
            exit;
        }
        $servicesid = $this->input->post('id');
        $this->Services_model->services_delete($servicesid);
        $this->session->set_flashdata('success', 'Services Delete Successfully.');
        redirect('services', 'refresh');
    }
}

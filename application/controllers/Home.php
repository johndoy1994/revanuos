<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Setting_model');
        $this->load->library('session');
    }

    public function index() {
        $setting = $this->Setting_model->selecthomeData($page_type = 1);
        $portfolios = $this->Setting_model->selectportfolioData();
        $this->load->view('user/home', array('setting' => $setting, 'portfolios' => $portfolios));
    }

    public function aboutus() {
        $slider = $this->Setting_model->selecthomeData($page_type = 1);

        $setting = $this->Setting_model->selecthomeData($page_type = 2);

        $this->load->view('user/aboutus', array('setting' => $setting, 'slider' => $slider));
    }

    public function testimonial() {
        $slider = $this->Setting_model->selecthomeData($page_type = 1);

        $testimonial = $this->Setting_model->selecttestimonialData();

        $this->load->view('user/testimonial', array('testimonial' => $testimonial, 'slider' => $slider));
    }

    public function contactus() {
        if ($this->input->method() == 'post') {
            if (isset($_FILES['resumr']['name']) && $_FILES['resumr']['name'] != '') {
                $imageName = '';
                $image_path = APPPATH . '../uploads/contactus/';
                $config['upload_path'] = $image_path;
                $config['file_name'] = $_FILES['resumr']['name'];
                $config['allowed_types'] = 'doc|docx|pdf';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('resumr')) {
                    $imageName = $this->upload->data()['file_name'];
                }

                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'ksprojectdevelopers@gmail.com',
                    'smtp_pass' => 'ksprojectdevelopers123!@#',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");

                $message = '<p>Hello,</p>';
                $message .= '<p>New contact request from user as follow.</p>';
                $message .= '<p><b>Name: </b>' . $_POST['name'] . '</p>';
                $message .= '<p><b>Email: </b>' . $_POST['email'] . '</p>';
                $message .= '<p><b>Message: </b>' . $_POST['message'] . '</p>';
                $message .= '<p>Thanks.</p>';
                $this->email->from('noreply@gmail.com', 'Xerces');
                $this->email->to($_POST['email']);
                $this->email->subject($_POST['name'] . ' has requested contact from Xerces Web.');
                $this->email->message($message);
                if ($imageName != '') {
                    $fileLocation = FCPATH . 'uploads/contactus/' . $imageName;
                    $this->email->attach($fileLocation);
                }

                $result = $this->email->send();
                if ($imageName != '') {
                    if (file_exists($fileLocation)) {
                        unlink($fileLocation);
                    }
                }
                if ($result) {
                    $this->session->set_flashdata('success', 'Mail sent successfully. We will get back to you soon.');
                } else {
                    $this->session->set_flashdata('error', 'Mail could not be sent, please try again.');
                }
            }
        }
        $setting = $this->Setting_model->selecthomeData($page_type = 1);

        $this->load->view('user/contactus', array('setting' => $setting));
    }

    public function portfolio() {
        $portfolios = $this->Setting_model->selectportfolioData();
        $setting = $this->Setting_model->selecthomeData($page_type = 1);
        $this->load->view('user/portfolio', array('setting' => $setting, 'portfolios' => $portfolios));
    }

    public function career() {
        $slider = $this->Setting_model->selecthomeData($page_type = 1);
        $careers = $this->Setting_model->selectcareerData();
        $this->load->view('user/career', array('careers' => $careers, 'slider' => $slider));
    }

}

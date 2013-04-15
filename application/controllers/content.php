<?php

/**
 * @ignore
 */
defined('BASEPATH') or exit;

/**
 * @version 0.0.1
 */
class Content extends AppController
{
    
    /**
     * 
     */
    public function index()
    {
        //$this->load->view('content_index');
        $this->load->view('header');
        $this->render_view('content/index', array(
            'title' => $this->lang->line('Index')
        ));
        $this->load->view('footer');
    }
    
    /**
     *
     */
    public function about()
    {
        $this->load->view('header');
        $this->render_view('content/about' , array(
            'title' => $this->lang->line('About'),
        ));
        //$this->load->view('content_about');
        $this->load->view('footer');
    }
    
    /**
     *
     */
    public function contact()
    {
        $data['pass'] = FALSE;
        
        $this->load->view('header');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        //$this->load->library('encrypt');
        //$this->load->library('session');
        
        /*
        if(isset($_POST['submit'])) {
            print_r($_POST);
        }
        */
        //print_r($_POST);
        //print_r($this->session);
        
        
        $this->form_validation->set_rules('contact_name', 'Name', 'required');
        $this->form_validation->set_rules('contact_email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('contact_message', 'Message', 'required');
        
        if ($this->form_validation->run()) {
            $submission = new ContactSubmissionModel();
            $submission->created = time();
            $submission->updated = time();
            $submission->name = $this->input->post('contact_name');
            $submission->email = $this->input->post('contact_email');
            $submission->message = $this->input->post('contact_message');
            
            
            
            if($submission->save()) {
                //tell the user they have successfully sent a contact
                //form submission off... and that someone will be in touch soon.
                //reset the form fields.
                $data['pass'] = TRUE;
                
                $this->session->set_flashdata('success','The contact information is sent successfully!');
                
                redirect(current_url());
                //$this->load->view('formsuccess');
                
            }
        }
        
        // View file lives at: applocation/views/content/contact.php
        $this->render_view('content/contact', $data);
        
        $this->load->view('footer');
    }
    
    public function legal()
    {
        $this->load->view('header');
        $this->render_view('content/legal', array(
            'title' => $this->lang->line('Legal')
        ));
        $this->load->view('footer');
    }
}

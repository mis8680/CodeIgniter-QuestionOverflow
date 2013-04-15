<?php

/**
 * @ignore
 */
defined('BASEPATH') or exit;

class Topics extends AppController
{
    public function index()
    {
        //view all/list all
        //filter posts by taxonomy term
        //pagination, only x number of posts per page
        //$this->load->view('topics/index');
        /*
        $this->load->view('templete', array(
            'view_filename' => 'topics/index'
        ));
        */
        
        $this->load->view('header');
        
        
        $this->render_view('topics/index', array(
            //void
        ));
     
        $this->load->view('footer');
    }
    
    public function view($topic_id = null)
    {
        //view/list single
        $this->load->view('header');
        
        
        $this->load->view('footer');
    }
    
    public function post()
    {
        $this->load->view('header');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        
        //print_r($_POST);
        
        $this->form_validation->set_rules('topic_title', 'Title', 'required');
        $this->form_validation->set_rules('topic_body', 'Body', 'required');
        
        if ($this->form_validation->run()) {
            $topic = new TopicsModel();
            $topic->created = time();
            $topic->updated = time();
            $topic->title = $this->input->post('topic_title');
            $topic->body = $this->input->post('topic_body');
           
            
            if($topic->save()) {
                //tell the user they have successfully sent a contact
                //form submission off... and that someone will be in touch soon.
                //reset the form fields.
                $this->load->view('content/formsuccess');
                
            }
        }
        
        //post/submit a single new topic OR reply to a topic
        $this->render_view('topics/post', array(
            'title' => $this->lang->line('Post')
        ));
        
        $this->load->view('footer');
    }
    
    public function report()
    {
        //report a specific topic or response to the admin
    }
    
    public function subscribe()
    {
        //allow a user to subscribe to a single topic.
    }
    
    public function delete()
    {
        //delete a single post or topic, only admins can do this
    }
}
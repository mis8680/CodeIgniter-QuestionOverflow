<?php

/**
 * @ignore
 */
defined('BASEPATH') or exit;

class User extends AppController
{
    public function index()
    {
        //if user is logged in - take/display their profile/call $this->view();
        //else, redirect them to register
       if($this->session->userdata('loggin_in')) {
            $this->view();
       }
       else {
            $this->register();
       }
    }
    
    public function view()
    {
        //view a specific user's profile
        $this->load->view('header');
        $this->render_view('user/view', array());
        
        $this->load->view('footer');
    }
    
    public function edit()
    {
        //only logged in users can access to edit their own profile.
        $this->load->view('header');
        $this->load->library('form_validation');
        
        $this->render_view('user/edit', array());
        
        $this->load->view('footer');
    }
    
    public function register()
    {
        
        $this->load->view('header');     
        $this->load->library('form_validation');
        
        
        $this->form_validation->set_rules('user_name', 'Name', 'trim|required|xxs_clean');
        $this->form_validation->set_rules('user_email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|md5');
        
    
        if ($this->form_validation->run()) {
            $user = new UsersModel();
            
            //if the user email is existed 
            /*
            if($user->get_where(array('email' => $this->input->post('user_email')))){
                $this->render_view('sorry',array());
                return;
                             
            }
            */
            $user_name = $this->input->post('user_name');
            $user_email = $this->input->post('user_email');
            $this->db->where('name', $user_name);
            $this->db->where('email', $user_email);
            $query = $this->db->get('users');
            
            if($query->num_rows()>0)
            {
                $this->render_view('sorry',array());
                return;
            }
            
            $user->created = time();
            $user->updated = time();
            $user->name = $this->input->post('user_name');
            $user->email = $this->input->post('user_email');
            $user->password = $this->input->post('user_password');
              
            if($user->save()) {
               
                $this->load->view('formsuccess');
               
            }
            else {
                //print 'hahah';    
                $this->render_view('sorry');
            
            }  
            
          
                     
        }
    
            //redirect('/topics/','refresh');
        
        
        
        
        $this->render_view('user/register', array());
        $this->load->view('footer');
       
    }
    
    public function login()
    {
        //$data['pass'] = FALSE;
        $this->load->view('header');
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('user_email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
        
    
        //print_r($_POST);
        // Start by rendering the login form, When it is submitted,
        // you will need to process an "email" and password field.
        //Lookups on the database should occur, using the UserModel instance
        //get_where(array('email' => 'value')). If the user exists in the database,
        //the UserModel instance's invocation of exists() should return true.
        // Note that this UserModel instance is created wihtin local scope,
        //meaing it is not form anywhere else like "CurrentUser"
        //
        //Oh no! How do we check the password? Passwords must be stored
        //in some form of enctyption instead of plain text. In this case
        //we will user the PHP md5() implementation for hashing the passwords.
        //What will need to happen is a comparison between the submitted
        //password and that that is stored whin the database. Therefore,
        //you will need to hash the submitted password value using md5()
        //and perform an equality comparison. If resuly is true, then
        //the user should be logged in. See note below. If the result is false and the passwords
        //do not match, tell the user he or she has entered an invalid password for the found account.
        //
        //How do I go about authenticating? Well ... we will need to start
        //by setting the current user's session information to match that
        //of what is used to determine whether or not the user is authenicated.
        //Therefore, the user session data should be something as follows:
        //
        //array()
        //  'user' => array(
        //      'is_logged_in' => TRUE,
        //      ''user_id' => $userModelInstance->id
        //      )
        //  )
        //
        //
        //Afterwhich, we want to redirect the user to home page.
        //See the CI helper method/functions inside of the URL helper for
        //acheiving this.
        //
        //Other special notes:
        //*Authencicated/logged in users should NOT be able to access
        // this controller action, redirect them to their profile.
        
        if ($this->form_validation->run()) {
            $users = new UsersModel();
            
            $user_email = $this->input->post('user_email');
            $user_password = md5($this->input->post('user_password'));
            
            //print $user_email . $user_password;
                       
            
           
            $this->db->where('email', $user_email);
            $this->db->where('password', $user_password);
            $query = $this->db->get('users');
            
            if($query->num_rows()>0)
            {
                foreach($query->result() as $rows)
                {
                    //add all data to session
                    $newdata = array(
                      'user_id'  => $rows->id,
                      'user_name'  => $rows->name,
                      'user_email'    => $rows->email,
                      'logged_in'  => TRUE,
                    );
                }
                $this->session->set_userdata($newdata);
                //$data['pass'] = TRUE;
                //print_r($this->session->userdata('user'));
                //$this->load->view('formsuccess');
                redirect('/user/view',refresh);
            }
            else {
                $this->render_view('sorry', array());
                return;
            }
                     
        }
     
        //user can only access login if logged out, else redirect
        
        
        $this->render_view('user/login',array());
        
        $this->load->view('footer');
        
    }
    
    public function logout()
    {
        $this->load->view('header');
        
        // users can only access logout if logged in, else redirect
        if($this->session->userdata('logged_in') == TRUE) {
            $newdata = array(
                'user_id'   =>'',
                'user_name'  =>'',
                'user_email'     => '',
                'logged_in' => FALSE,
                );
            $this->session->unset_userdata($newdata);
            $this->session->sess_destroy();
            //$this->view('topics');
            //redirect('/topics/',refresh);
        }
        $this->render_view('user/logout', array());
        
        $this->load->view('footer');
        
        
        
        
    }
}
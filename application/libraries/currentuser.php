<?php
/**
 * @file ~/application/libraries/currentuser.php
 */

 /**
  * @ignore
  */
defined('BASEPATH') or exit;

/**
 * A singleton representation of the current user.
 *
 * Contains implementation of retrieval methods for retrieving the current
 * user model, the current session object (also avaiable via CI instance),
 * and implements helper methods for performing operations and checks on theses two major pices of data.
 *
 * FINAL EXAM!!!!!!
 * singleton pattern
 */

class CurrentUser
{
    /**
     * @var CurrentUser The singleton instance of this class.
     */
    private static $instance = null;
    
    
    /**
     * Returns the singleton instance of the CurrentUser object.
     *
     * @access public
     * @return CurrentUser Returns this instance.
     * 
     */
    final public static function get()
    {
        if(null == self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }
    
    private $ci = null;
    private $has_initalized = false;
    private $model = null;
    private $session = null;
    
    protected function initialize() {
        if($this->has_initalized) {
            return;
        }
        
        //Retrieve and assign a reference to the current CI_instance
        //CI operates on a controller first approach, meaning the
        //CI_Controller implementation is the real "meat" of the application
        //and performs MOST 
        $this->ci = &CI_Controller::get_instance();
        
        if(!isset($this->ci->session)) {
            throw new Exception('The Session library does not appear to be loaded.');
        }
        
        //Assign the instance of the CI_Session locally by reference.
        $this->session = &$this->ci->sesstion;
        
        //Create 
        $this->user = new UserModel();
        
        //Initialize the user model, start by retrieveing the current
        //session data, determine whether or not the user is actually
        //logged in, etc. etc. If the user is loggedin, attempt
        //to retrieve the user model by using $this->user->get($user_id);
        //and test using $this->user->exists().
        
        
        
        //Perhaps! You may want to create an "anonymous" usr record
        //within the database whose primary key (id) is equal to 0;
        //Therefore, when the user is note authenticated you have the ability
        //to set or "user" specific proerties like a name, etc. that could
        //habve default values such as "Guest". If you decide to use
        //this type of implementation, the exists() maay return false
        //as a result of the id being less than1. Therefore, you will
        //need to adapt your code for this.
        //
        //Why this implementation is important is for the face that you
        //have semless usage of the CurrentUser::get()->getModel()->[...]
        //without assigning the "returned" model and testing.
        
        //set the boolean $has_initalized flag to true
        $this->has_initalized = true;
    }
    
    public function getModel()
    {
        return $this->model;
    }
    
    public function getSession()
    {
        return $this->session;
    
    }
    
    public function isLoggedIn()
    {
        //Suggested helper method for you to implement.
        // Example usage : CurrentUser::get()->isLoggedIn();
        //This method of writing method invocation calls one
        //after another is known as daisy-chaingng.
    }
    
    /**
     * Creates a new instance of CurrentUser
     *
     * This method is note overridealbe.
     *
     * @access private
     */

    private function __construct()
    {
        
    }
}
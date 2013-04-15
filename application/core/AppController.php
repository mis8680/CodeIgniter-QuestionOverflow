<?php

/**
 * @ignore
 */
defined('BASEPATH') or exit;

ini_set('display_errors','on');
error_reporting(E_ALL | E_STRICT);


require_once __DIR__ . '/../libraries/currentuser.php';
/**
 * A base controller to all application controllers.
 *
 */
class AppController extends CI_Controller
{
    /**
     * @var boolean Indicator on whether or not initialize has been called.
     */
    private $has_initialized = false;
    
    /**
     * @var UserModel The current user model instance for 'this' user
     */
    private $user = null;
    
    /**
     * Create a new instance of AppController
     *
     * @access public
     * 
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->initialize();
    }
    
    /**
     * Handles application initalizing upon instantiation of the controller
     *
     *  @access protected
     */
    protected function initialize()
    {
        //If has initialied, simply return do not allow init to be called again on the same request
        if($this->has_initialized)
        {
            return;
        }
        
    
        
        $this->user = CurrentUser::get();
        
        //print_r($this->session->userdata);
        
        
        
        $user_session_data = $this->session->userdata('user');
        
        print_r($user_session_data);
        
        if(isset($user_session_data['logged_in']) && TRUE == $user_session_data['logged_in']) {
            //The current user 'appears' to be authenticated....
            //let's continue checking.
            $user_id = isset($user_session_data['user_id']) ? ((int) $user_session_data['user_id']) : NULL;
            if(!empty($user_id)) {
                //Additional "authentication" checks can be performed,
                //but we're keeping it simple for the sake of time.
                $this->user = new UserModel($user_id);
                
                //We need to ckeck whether or not the specified '$user_id'
                //was validate in the database = perform this check on the
                //user model instance.
                
                if(!$this->user->exists()) {
                    $this->session->set_userdata(array(
                        'user' => array(
                            'user_id' => NULL,
                            'logged_in' => FALSE,
                        ),
                    ));
                }
            }
            
        }
        else {
            
        }
        //print $this->session->userdata('logged_in') == 1 ? 'TRUE ' : 'FALSE ';
        //print $this->session->userdata('user_name') . ' =>  ';
        //print $this->session->userdata('user_email');
        
        //TODO: Complete with initialin
        $this->has_initialized = true;
    }
    
    /**
     * Renders a full page view that includes the header and footer,
     * or the main template file with the specified content view within.
     *
     * The '$data' array of variable is assigned to the available view vatiable
     * '$vars'. Therefore, to access variables being passed to the view, you must
     * use '$vars['variable_name']'. The reason is to reduce to the extracted variables
     * within the '$this->load->view' methods, therefore not over populating
     * the local scope with useless and unneeded symbols.
     *
     * @access public
     * @param string $view_name The name of the content view
     * @param array $data An array of variables to be available within the views
     *
     */
    final protected function render_view($view_name, array $data = array())
    {
        //$title = $this->lang->line('Question Overflow') . (isset($data['title']) ? ' - ' . $data['title'] : '');
        
        
        $this->load->view('templete', array(
            //'title' => $title,
            //'user' => $this->getCurrentUser(),
            'view_filename' => $view_name,
            'vars' => $data
            
        ));
    }
    
    
    /**
     * REturn the current user instance.
     *
     * @return UserModel the current reuqest's user instance
     */
    final protected function getCurrentUser()
    {
        return $this->user;
    }
}


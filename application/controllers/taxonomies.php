<?php

/**
 * @ignore
 */
defined('BASEPATH') or exit;

/**
 * URL = ~/index.php/taxonomies
 */
class Taxonomies extends AppController
{
    public function view($taxonomy_id = null)
    {
        print __METHOD__ . ' >> ' . $taxonomy_id . '<br />';
        $taxonomy_id = (int) $taxonomy_id;
        if(empty($taxonomy_id)) {
            //redirect the user...
            return;
        }
        $taxonomy = new TaxonomyModel($taxonomy_id);
        //$taxonomy->get();
        if($taxonomy->exists()) {
            print 'Title: ' . $taxonomy->title; 
        } else {
            print 'The requiested taxonomy does not exist.';
        }
    }
    
    
    public function index()
    {
        print __METHOD__ . '<br />';
        
        
        /**
         * always use $this->input->* when dealing with input data coming from
         * $_POST, $_GET, and so on. The reason being is that it is pre-sanitized and
         * cleaned of possible malicius code or data that is hurtful to our application.
         *
         */
        //print isset($_GET['query']) ? $_GET['query'] : 'No query specified.';
        
        if($this->input->get('query')) {
            print 'Yay! Query exists with value of =' . $this->input->get('query') . '<br />';
        } else {
            print 'Oh no is does not exist! <br />';
        }
        
        /*
        //display all taxonomy terms
        $model = new TaxonomyModel();
        $model->get();
        
        
        foreach($model as $taxonomy) {
            print $taxonomy->id . ' -> ' . $taxonomy->title . '<br />';
        }
        */
        
        
    }
}
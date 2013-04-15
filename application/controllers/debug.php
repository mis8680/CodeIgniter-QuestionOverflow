<?php

/**
 * @ignore
 */
defined('BASEPATH') or exit;

class Debug extends CI_Controller
{
    public function index()
    {
        print 'Base URL: ' . base_url() . '<br />';
        
        $taxonomy = new TaxonomyModel();
        //$taxonomy->get_iterated();
        
        $taxonomy->get();
        foreach($taxonomy as $tax) {
            
            
            print $tax->title . '<br />';
            
            $print = $tax->taxonomytermmodel->get_iterated();
            
            //print_r($print);
            
            foreach($tax->taxonomytermmodel as $tm) {
                print $tm->id . ' :: ' . $tm->name . '<br />';
            }
        }
        
        
        
        //foreach($taxonomy as $tt)
        //{
        //     print $tt->id . ' :: ' . '<br />';
        //}
        //$taxonomy->taxonomytermmodel->get_iterated();
        
        
        
        //print_r($taxonomy->taxonomytermmodel);
        //foreach($taxonomy->taxonomytermmodel as $ttm)
        //{
        //    print 'dfgdsgdf';
        //    print $ttm->id . ' -> ' . '<br />';
        //}
        
    }
}
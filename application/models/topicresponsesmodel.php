<?php
/**
 * @file
 * application/models/topicresponses.php
 */

 /**
 * @ignore
 */
defined('BASEPATH') or exit;


class TopicResponsesModel extends DataMapper
{
    public $table = 'topicresponses';
    
    /**
     * @var array The has many relationship property.
     */
    public $has_many = array('taxonomytermmodel');
    
    /**
     * @var array The has one relationship
     */
    public $has_one = array('usersmodel','topicsmodel');
}

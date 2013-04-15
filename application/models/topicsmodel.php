<?php
/**
 * @file
 * application/models/topic.php
 */

 /**
 * @ignore
 */
defined('BASEPATH') or exit;


class TopicsModel extends DataMapper
{
    public $table = 'topics';
    
    /**
     * @var array The has many relationship property.
     */
    public $has_many = array('taxonomytermmodel');
    
    /**
     * @var array The has one relationship
     */
    public $has_one = array('usersmodel');
}

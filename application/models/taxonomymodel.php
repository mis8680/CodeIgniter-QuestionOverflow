<?php
/**
 * @filesource
 * application/models/taxonomymodel.php
 */

defined('BASEPATH') or exit;

/**
 * Represents a single taxonomies vocabaulary
 *
 * id INT(11) UNSIGNED NOT NULL AUTO_INCREAMENT -- primary key, must auot increament
 * created INT(11) UNSIGNED NOT NULL DEFAULT 0
 * uploaded INT(11) UNSIGNED NOT NULL DEFAULT 0
 * title VARCHAR(255) NOT NULL
 * description TEXT NOT NULL
 * 
 */
class TaxonomyModel extends DataMapper
{
    /**
     * @var string The name of the database table
     */
    public $table = 'taxonomies';
    

     /**
     * @var array The has many relationship property.
     */
    public $has_many = array('taxonomytermmodel');
    
}


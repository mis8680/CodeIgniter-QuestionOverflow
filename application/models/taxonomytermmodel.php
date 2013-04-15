<?php
/**
 *
 * @file
 * ~/application/models/taxonomytermmodel.php
 */

 /**
  * @ignore
  */
defined('BASEPATH') or exit;

/**
 * Represents a single Taxonomy Term
 *
 * id INT(11) UNSIGNED AUTO_INCREMENT -- primary key
 * created INT(11) UNSIGNED NOT NULL DEFAULT 0
 * updated INT(11) UNSIGNED NOT NULL DEFAULT 0
 * taxonomymodel_id INT(11) INSIGNED NOT NULL DEFAULT 0
 * name VARCHAR(255) NOT NULL 
 * 
 */
class TaxonomyTermModel extends DataMapper
{
    /**
     * @var string The base table name for Taxonomy Tarms
     * 
     */
    public $table = 'taxonomy_terms';
    
    /**
     * @var array The has one relationship
     */
    public $has_one = array('taxonomymodel');
    
   
}
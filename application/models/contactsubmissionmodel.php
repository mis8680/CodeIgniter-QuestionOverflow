<?php
/**
 * @file
 * application/models/contactsubmissionmodel.php
 */

 /**
 * @ignore
 */
defined('BASEPATH') or exit;

/**
 * Represents a single contact form submission.
 *
 *
 * schema:
 *  *id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT -- primary key, must auto increment
 *  *created INT(11) UNSIGNED NOT NULL DEFAULT 0 --holds unix timestamp
 *  *updated 
 *  *name VARCHAR DEFAULT ''
 *  *email VARCHAR DEFAULT ''
 *  *message TEXT
 * 
 */

class ContactSubmissionModel extends DataMapper
{
    public $table = 'contact_submissions';
}
<?php


App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class Feedback extends Model {
    var $name = 'Feedback';
    var $useTable='FEEDBACK';
    var $primaryKey ='id';
    var $displayField = 'uname';

}

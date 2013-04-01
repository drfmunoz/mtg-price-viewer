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
class MStore extends Model {
    var $name = 'MStore';
    var $useTable='MSTORES';
    var $primaryKey ='id';

}

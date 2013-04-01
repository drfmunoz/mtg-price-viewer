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
class Card extends Model {
	var $name = 'Card';
	var $useTable='CARD';
	var $primaryKey ='id';
	var $displayField = 'name';
	public $iname='iName';
	
}

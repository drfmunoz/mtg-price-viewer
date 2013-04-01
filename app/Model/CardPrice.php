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
class CardPrice extends Model {
	var $name = 'CardPrice';
	var $useTable='CARD_PRICE';
	var $primaryKey ='id';
	var $displayField = 'price';
	
}

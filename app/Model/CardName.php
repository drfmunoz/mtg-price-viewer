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
class CardName extends Model {
	var $name = 'CardName';
	var $useTable='CARD_NAME';
	var $primaryKey ='id';
	var $displayField = 'name';
}

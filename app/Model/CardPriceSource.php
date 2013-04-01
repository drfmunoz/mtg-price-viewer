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
class CardPriceSource extends Model {
	var $name = 'CardPriceSource';
	var $useTable='CARD_PRICE_SOURCE';
	var $primaryKey ='id';
	var $displayField = 'url';
	
}

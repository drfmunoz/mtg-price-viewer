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
class PriceSubscription extends Model {
    var $name = 'PriceSubscription';
    var $useTable='PRICE_SUBSCRIPTION';
    var $primaryKey ='id';

}

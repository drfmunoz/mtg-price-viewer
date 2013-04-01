<?php
/**
* Utility to get the current exchange rate (currently only USD to EUR) from an external site.
*
**/
class CurrencyTools
{

    //http://www.google.com/ig/calculator?hl=en&q=100USD=?EUR
    protected static $usdToeur = 'http://rate-exchange.appspot.com/currency?from=USD&to=EUR';

    private static function setCurlArgs($curl)
    {
        curl_setopt($curl, CURLOPT_USERAGENT, 'purple-cards');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($curl, CURLOPT_VERBOSE, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array('Content-Type: application/json; charset=utf-8',
                'Accept:application/json, text/javascript, */*; q=0.01'));
    }

    public static function execute($url){
        $ch = curl_init($url);
        self::setCurlArgs($ch);
        $contents = curl_exec( $ch );
        curl_close( $ch );
        $response=json_decode($contents);
        return $response;
    }

    public function USDtoEUR()
    {
       $rate= self::execute(self::$usdToeur)->rate;
       return $rate;
    }
}
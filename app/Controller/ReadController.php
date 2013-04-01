<?php

App::uses('Controller', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('LangUtil', 'Lib');
App::uses('CurrencyTools', 'Lib');


class ReadController extends AppController
{
  	public function about($lang,$content){
		if($content!="about"){
			throw new NotFoundException('Invalid content');
		}
  	}
	
  	public function stores($lang,$content){
		if($content!="stores"){
			throw new NotFoundException('Invalid content');
		}
  	}

}

?>
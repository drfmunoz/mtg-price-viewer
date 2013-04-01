<?php

App::uses('Controller', 'Controller');
App::uses('Sanitize', 'Utility');
class SearchController extends AppController {
	
	public function s(){
        $lang=$this->Session->read('System.lang');
        if(!isset($lang)){
            $lang='en';
        }
		if(isset($_GET['name'])){
            /**
             * should redirect according to the currently selected language
             */
            $this->redirect(array('controller' => 'Card', 'action' => 'search','ext'=>'html',$lang,urlencode($_GET['name'])));
		}
		else{
            $this->redirect(array('controller' => 'index', 'action' => 'langRedirect'));
		}
	}
	
}

<?php
/**
* Author: Freddy Munoz (freddy@cellcore.org)
*
*/
App::uses('Controller', 'Controller');
App::uses('LangUtil', 'Lib');
class AppController extends Controller
{

    public function beforeFilter()
    {
        /**
         * set the default layout
         */
        $this->layout = 'mtg';

        /**
         *	generate a random key for the user
         */
        if (!$this->Session->check('user.key')) {
            $this->Session->write('user.key', sha1(rand(1, 10000) . "." . date('y-m-d-h')));
        }
        $this->set('key', $this->Session->read('user.key'));

        parent::beforeFilter();

        /**
         * check language parameters
         */
        if (isset($this->params['pass'][0]) && sizeof($this->params['pass']) >= 2) {
            $lang_ = $this->params['pass'][0];
            if (LangUtil::isAccepted($lang_)) {
                $this->Session->write('System.lang', $lang_);
            } else {
                $this->redirect(array('controller' => 'index', 'action' => 'langRedirect'));
            }
            $langUrls = LangUtil::buildUrls($this);
            $this->set('langUrls', $langUrls);
			$this->set('lang', $lang_);
        }

        /**
         * load model entities
         */
        $this->loadModel('Card');
		$this->loadModel('Edition');
        $this->loadModel('CardPrice');
        $this->loadModel('CardPriceSource');
        $this->loadModel('CardName');
    }

}

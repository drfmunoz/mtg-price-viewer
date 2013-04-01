<?php
App::uses('Controller', 'Controller');
App::uses('LangUtil', 'Lib');
class IndexController extends AppController
{
    public function home($lang)
    {
        $this->layout = 'mtg';
        $this->Session->write('System.lang', $lang);
        $this->set('langUrls', LangUtil::buildChoiceUrl($this));
    }

    public function langRedirect()
    {
        $lang = $this->Session->read('System.lang');
        if (!isset($lang)||!LangUtil::isAccepted($lang)) {
			//set french as the default language
			 $lang = 'fr';
        }

        $this->redirect(array('controller' => '', 'action' => '/',$lang,'index','ext'=>'html'));
    }

}

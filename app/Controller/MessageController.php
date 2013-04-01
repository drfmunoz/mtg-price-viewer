<?php
App::uses('Controller', 'Controller');
App::uses('Sanitize', 'Utility');
class MessageController extends Controller
{

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = '';
        $this->viewClass = 'Json';
        if(!(isset($this->params['pass'][0]) && sizeof($this->params['pass']) >= 1)||($this->stop($this->params['pass'][0]))){
            $this->response->send();
            $this->_stop();
        }
        $this->loadModel('Feedback');
        $this->loadModel('MStore');
        $this->loadModel('PriceSubscription');
    }

    public function subscribe($verificationString)
    {
        $data=$this->request->input('json_decode');
        //send data to queue
        $dbdata=array();
        $dbdata['PriceSubscription']['uname']=$data->name;
        $dbdata['PriceSubscription']['email']=$data->email;
        $dbdata['PriceSubscription']['subscribedon']= gmdate("Y-m-d H:i:s");
        $dbdata['PriceSubscription']['lang']=$this->getLang();
        $dbdata['PriceSubscription']['card_id']=$data->cardKey;
        $this->PriceSubscription->create();
        $this->PriceSubscription->save($dbdata);
        $this->set('resp',$data);
        $this->set('_serialize', 'resp');
    }

    public function feedback($verificationString)
    {
        $data=$this->request->input('json_decode');
        //send data to queue
        $dbdata=array();
        $dbdata['Feedback']['email']=$data->email;
        $dbdata['Feedback']['senton']= gmdate("Y-m-d H:i:s");
        $dbdata['Feedback']['message']=$data->message;
        $this->Feedback->create();
        $this->Feedback->save($dbdata);
        $this->set('resp',$data);
        $this->set('_serialize', 'resp');
    }

    public function store($verificationString)
    {
        $data=$this->request->input('json_decode');
        //send data to queue
        $dbdata=array();
        $dbdata['MStore']['store']=$data->storeUrl;
        $dbdata['MStore']['senton']= gmdate("Y-m-d H:i:s");
        $this->MStore->create();
        $this->MStore->save($dbdata);
        $this->set('resp',$data);
        $this->set('_serialize', 'resp');
    }

    protected function stop($verificationString)
    {
        if ((!$this->request->is('post')) || ($verificationString != $this->Session->read('user.key'))) {
            $this->set('resp',false);
            $this->set('_serialize', 'resp');
            return true;
        }
        return false;
    }

    protected function getLang(){
        if($this->Session->check('System.lang')){
            return $this->Session->read('System.lang');
        }
        return 'en';
    }

}
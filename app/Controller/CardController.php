<?php
/**
* Author: Freddy Munoz (freddy@cellcore.org)
*
*/
App::uses('Controller', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('LangUtil', 'Lib');
App::uses('CurrencyTools', 'Lib');

function compareObj($a, $b)
{
    return $a['CardPriceSource']['lastPrice']>=$b['CardPriceSource']['lastPrice'];
}


class CardController extends AppController
{
	
	public $paginate = array(
	    'paramType' => 'querystring'
	);
	
	public function index(){
		throw new NotFoundException('Card not found');
	}
    /**
	 * Card detail view
     * @param $lang
     * @param $cardName_
     */
    public function view($lang, $cardName_)
    {
		$cardName=$cardName_;
		if(sizeof($this->params['pass'])>2){
			$cardName=$this->params['pass'][1].'//'.$this->params['pass'][2];
		}
		
        $card = $this->Card->findByiname(strtolower($cardName));
        $prices = array();
        if (isset($card) && sizeof($card) > 0) {

            $card['Card']['priceSources'] = $this->CardPriceSource->find('all', array(
                'conditions' => array('card_id' => $card['Card']['id']),
                'order' => array('lastPrice' => 'asc')
            ));


            $card['Card']['oMultiverseId'] = $card['Card']['multiverseId'];


            if (sizeof($card['Card']['priceSources']) > 0) {
                $minPrice = 999999;
                $maxPos = 0;
                $minPos = 0;
                $maxPrice = 0;
				$otc_size=sizeof($card['Card']['priceSources']);

                for ($u = 0; $u < sizeof($card['Card']['priceSources']); $u++) {
                    if ($card['Card']['priceSources'][$u]['CardPriceSource']['currency'] == 'USD') {

                        $price = $card['Card']['priceSources'][$u]['CardPriceSource']['lastPrice'];
                        $card['Card']['priceSources'][$u]['CardPriceSource']['lastPrice'] = $this->toEuro($price);
                    }
                    $price = $card['Card']['priceSources'][$u]['CardPriceSource']['lastPrice'];
                    if ($price > 0) {
                        if ($price >= $maxPrice) {
                            $maxPrice = $price;
							$maxPos =$u;
                           
                        }
                        if ($price <= $minPrice) {
                            $minPrice = $price;
                            $minPos = $u;
                        }
                        array_push($prices, $price);
                    }
					else{
							$otc_size--;
					}

                }
	
                $card['Card']['priceSources'][$maxPos]['expensive'] = true;
                $card['Card']['priceSources'][$minPos]['cheap'] = true;

                $card['Card']['minPrice'] = $minPrice;
                $card['Card']['maxPrice'] = $maxPrice;
                $card['Card']['medPrice'] = number_format($this->median($prices), 1);
            } else {
                $card['Card']['minPrice'] = 0;
                $card['Card']['maxPrice'] = 0;
                $card['Card']['medPrice'] = 0;
            }

            if (LangUtil::isOther($lang)) {
                $cn = $this->CardName->find('all', array(
                    'conditions' => array('card_id' => $card['Card']['id'], 'language' => LangUtil::getStringToken($lang))
                ));
                if (sizeof($cn) > 0) {
                    $card['Card']['oriname'] = $card['Card']['name'];
                    $card['Card']['name'] = $cn[0]['CardName']['name'];
                    $card['Card']['multiverseId'] = $cn[0]['CardName']['multiverseId'];
                }
            }
            usort($card['Card']['priceSources'], "compareObj");
            $this->set('card', $card);
        } else {
            throw new NotFoundException('Card not found');
        }
    }

    /**
     * @param $lang
     * @param $encodedCardName
     */
    public function search($lang, $encodedCardName)
    {
        /**
         * pre check
         */
        if (!isset($encodedCardName) || !LangUtil::isAccepted($lang)) {
            $this->redirect(array('controller' => 'index', 'action' => 'langRedirect'));
        }
        $this->Session->write('System.lang', $lang);


        $cName = urldecode($encodedCardName);
        $lName = "%" . $cName . "%";
        $cards = $this->CardName->find('all', array(
            'conditions' => array('name LIKE ' => $lName,
                'AND' => array(
                    'OR' => array(
                        array('language' => 'English'),
                        array('language' => 'French')
                    )
                )
            ),
            /*
            limit the number of results to a maximum of 30
            */
            'limit' => 30
        ));
        $this->set('searchName', $cName);
        if (sizeof($cards) >= 1) {
            $card_objs = array();
            $i = 0;
            $ids = array();
            $eids = array();
            foreach ($cards as $cardName) {
                $cid = $cardName['CardName']['card_id'];

                if (!in_array($cid, $ids)) {
                    $cardData = $this->Card->findById($cid);
                    
					$cardData=$this->getPrices($cardData,$cid,$lang);

                    array_push($card_objs, $cardData);
                    array_push($ids, $cid);
                    $eids[$cid] = $i;
                    $i++;
                }

            }
            $ids = array_unique($ids);
            if (sizeof($card_objs) == 1 || sizeof($ids) == 1) {
                $ln = LangUtil::getTokenString($lang);
                $this->redirect(array('controller' => 'Card',
                    'action' => 'view', $ln, $card_objs[0]['Card']['oName'],
                    'ext' => 'html'));
            } else {

                $this->set('cards', $card_objs);
            }
        }
    }

    /**
     * card name service
     */
    public function names()
    {
        $this->layout = '';
        $this->viewClass = 'Json';
        if (!isset($_GET['term'])) {
            $this->set('names', array());
            $this->set('_serialize', 'names');
        } else {
            $cardName = $_GET['term'];

            $lName = Sanitize::clean($cardName) . "%";
            $this->loadModel('CardName');
            $cards = $this->CardName->find('all', array(
                /**
                 * search french or english only
                 */
                'conditions' => array('name LIKE ' => $lName,
                    'AND' => array(
                        'OR' => array(
                            array('language' => 'English'),
                            array('language' => 'French')
                        )
                    )
                ),
                /*
                limit the number of results to a maximum of 30
                */
                'limit' => 30
            ));

            $cNames = array();
            foreach ($cards as $cardName) {
                array_push($cNames, $cardName['CardName']['name']);
            }
            $this->set('names', array_unique($cNames));
            $this->set('_serialize', 'names');
        }

    }

    private function toEuro($dollars){
        return number_format($dollars * $this->getConversionRate(), 1);
    }

    private function getConversionRate(){
       if(!isset($this->conversionRate)){
           $this->conversionRate = CurrencyTools::USDtoEUR();
           $this->set("conversionRate",number_format($this->conversionRate,2));
       }

       return $this->conversionRate;
    }

	/**
	* calculate the media value of an array of numbers
	**/
    private function median($arr)
    {
        sort($arr);
        $count = count($arr); 
        $middleval = floor(($count - 1) / 2);
        if ($count % 2) { 
            $median = $arr[$middleval];
        } else { 
            $low = $arr[$middleval];
            $high = $arr[$middleval + 1];
            $median = (($low + $high) / 2);
        }
        return $median;
    }
	
	public function editions($lang,$edition){
		if(!isset($edition)){
			$this->redirect(array('controller'=>'Card','action'=>'editions',$lang,'index','ext'=>'html'));
		}
		
		if($edition=="index"){
			$editions=$this->Edition->find('all', array(
	                'order' => array('releaseDate' => 'desc')
						));
			if (LangUtil::isOther($lang)) {
					for ($u = 0; $u < sizeof($editions); $u++) {
						$editions[$u]['Edition']['displayName']=$editions[$u]['Edition']['frDisplayName'];
					}
			}
			$this->set('editions',$editions);
		}
		else{
			$editionObj=$this->Edition->find('first',array(
				'conditions'=>array('name'=>$edition)
			));
			if(!isset($editionObj['Edition'])){
				throw new NotFoundException('Edition not found');	
			}		
			if (LangUtil::isOther($lang)) {
				$editionObj['Edition']['displayName']=$editionObj['Edition']['frDisplayName'];
			}
		
			
			$this->view='search';
			$this->paginate = array(
				'paramType' => 'querystring',
				'joins'=>array(
					array(
						'table'=>'CARD_CARD_SET',
						'alias'=>'Cset',
						'type'=>'INNER',
						'conditions'=>array(
							'Card.id=Cset.cards_id'
							)
						),
						array(
						'table'=>'CARD_SET',
						'alias'=>'Edition',
						'type'=>'INNER',
						'conditions'=>array(
							'Edition.id=Cset.sets_id'
							)	
						)
					),
				'conditions'=>array('Edition.name'=>$edition),
				'fields' =>array('Card.id','Card.name'),
				'group'=>array('Card.name')
			        
			    );
			
			$cards=$this->paginate('Card');	
			
			
			for($u=0;$u<sizeof($cards);$u++){
				$cards[$u]=$this->getPrices($cards[$u],$cards[$u]['Card']['id'],$lang);
			}
			$this->set('edition',$editionObj);
			$this->set('cards', $cards);
		}
	}
	
	
	private function getPrices($cardData,$cid,$lang){
		$cardData['Card']['price'] = $this->CardPriceSource->find('first', array(
            'conditions' => array('card_id' => $cid,'lastPrice > '=>0),
            'order' => array('lastPrice' => 'asc')
        ));
        
		if($cardData['Card']['price']['CardPriceSource']['currency']=='USD'){
            $price_= $cardData['Card']['price']['CardPriceSource']['lastPrice'];
            $cardData['Card']['price']['CardPriceSource']['lastPrice']=$this->toEuro($price_);
        }

        $cardData['Card']['otherLang'] = $this->CardName->find('first', array(
            'conditions' => array('card_id' => $cid,
                array('language' => 'French')
            )
        ));
        $cardData['Card']['oName'] = $cardData['Card']['name'];
        if (LangUtil::isOther($lang) && isset($cardData['Card']['otherLang']['CardName'])) {
            $cardData['Card']['name'] = $cardData['Card']['otherLang']['CardName']['name'];
            $cardData['Card']['otherLang']['CardName']['name'] = $cardData['Card']['oName'];
        }
		return $cardData;
	}
	
	public function sitemap(){
		$this->layout='';
		$cards=$this->Card->find('all');
		$this->set('cards',$cards);
	}

}

?>
<?php
class LangUtil
{

    public function getTokenString($string)
    {
        switch ($string) {
            case 'French':
                return 'fr';
                break;
            case 'English':
                return 'en';
                break;
            case 'en':
                return 'en';
                break;
            case 'fr':
                return 'fr';
                break;
            default:
                return 'en';
                break;
        }
    }

    public function isOther($token)
    {
        if ($token == 'fr') {
            return true;
        }
        return false;
    }

    public function getStringToken($token)
    {
        switch ($token) {
            case 'French':
                return 'French';
                break;
            case 'English':
                return 'English';
                break;
            case 'en':
                return 'English';
                break;
            case 'fr':
                return 'French';
                break;
            default:
                return 'English';
                break;
        }
    }

    public function isAccepted($token)
    {
        switch ($token) {
            case 'French':
                return true;
                break;
            case 'English':
                return true;
                break;
            case 'en':
                return true;
                break;
            case 'fr':
                return true;
                break;
            default:
                return false;
                break;
        }
    }

    public function buildUrls($context)
    {
        $urls = array();
		$extraArg='';
		if(sizeof($context->params['pass'])>2){
					$extraArg=$context->params['pass'][2];
		}
        $urls['fr'] = Router::url(array('controller' => $context->params['controller'], 'action' => $context->action, 'fr', $context->params['pass'][1],$extraArg, 'ext' => 'html'));
        $urls['en'] = Router::url(array('controller' => $context->params['controller'], 'action' => $context->action, 'en', $context->params['pass'][1],$extraArg, 'ext' => 'html'));
        return $urls;
    }
    public function buildChoiceUrl($context)
    {
        $urls = array();
        $urls['fr'] ='/fr/index.html';
        $urls['en'] = '/en/index.html';
        return $urls;
    }
}

?>
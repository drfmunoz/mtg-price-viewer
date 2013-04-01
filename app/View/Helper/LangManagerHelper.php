<?php

/**
* Author: Freddy Munoz (freddy@cellcore.org)
*
*/
/**
*
* Internationalization manager. It centralizes the messages placeholder for french and english (and probably other language).
* Why this instead of the native CackePHP internationalization? Because I couldn't make it work on a reasonable time and this 
* solution was quicker.
*
**/
class LangManagerHelper extends AppHelper {
    protected $langs=array('fr','en');

    protected $langMap_=array(
        'fr'=>array(
            'card_input_message' =>'Entrez le nom d\'une carte**',
            'card_search'=>'Trouver',
            'mtg_name'=>'* MTG:"Magic : l\'assemblée"',
            'mtg_search_rest'=>'** la recherche ne comprend que les cartes du format <a href="http://www.wizards.com/magic/tcg/resources.aspx?x=judge/resources/sfrmodern" title="modern format">modern</a>.',
            'mtg_search_title'=>'Trouvez le meilleur prix pour vos cartes * MTG',
            /*footer**/
            'store_add'=>'Ajouter',
            'input_store_url'=>'Entrez l\'adresse URL du magasin',
            'store_url_sample'=>'http://www.unmagasin.com',
            'cancel'=>'Cancel',
            'send_feedback'=>'Envoyer feedback',
            'input_email_address'=>'Entrez votre adresse e-mail : ',
            'mail_sample'=>'roger@example.net',
            'input_message'=>'Entrez votre message : ',
            'input_message_placeholder'=>'Entrez ici votre message...',
            'send'=>'Envoyer',
            'thank_you'=>'Nous vous remercions !',
            'team_thanks'=>'Merci de votre aide. Notre équipe traitera votre demande le plus tôt possible !',
            'add_store_title'=>'Ajouter un magasin',
            'about'=>'À propos',
            'add_feedback_title'=>'Feedback',
            /*View**/
            'store'=>'Magasin',
            'price'=>'Prix',
            'last_update'=>'Mis à jour le',
            'price_not_found'=>'Prix non trouvée',
            /*notice*/
            'card_artwork_notice'=>'* Les source de cartes et les illustrations sont la propriété de <a href="http://www.wizards.com" title="Wizards of the coast">Wizards of the Coast LLC</a>.',
            'card_price_notice'=>'* Les prix affichés sur cette page sont accessibles publiquement sur leurs sites Web respectifs des magasins.',
            /**/
            'card_search_title'=>'Carte recherché',
            'card_search_restriction'=>'Seuls les 30 premiers résultats sont affichés dans cette page',
            'card_name'=>'Nom de la carte',
            'starting_price'=>'Prix a partir de',
            'notify_me'=>'Prévenez-moi quand le prix de cette carte change',
             'price_subscribe'=>'Souscrire au changement de prix',
            'subscribe'=>'Souscrire',
            'input_name'=>'Entrez votre nom',
            'input_name_sample'=>'Roger Regor',
            'add_store_error'=>'SVP, entrez une URL valide (http://mag.fr).',
            'message_error'=>'SVP, entrez un message.',
            'mail_error'=>'SVP, entrez une adresse email valide.',
            'name_error'=>'SVP, entrez un nom.',
            'mtg_exchange_notice'=>'Prix original en US Dollars, converti en euros au taux de la journée.',
			'card_editions_title'=>'Éditions de Magic l\'Assamblée',
			'editions'=>'Éditions',
			'first_page'=>'Première page',
			'previous'=>'Précédent',
			'next'=>'Suivant',
			'last_page'=>'Dernière page',
			'cards'=>'cartes',
			'stores'=>'Magasins',
			'indexed_stores'=>'Magasins indexées par <a href="http://www.lestack.fr">LeStack.fr</a>',
			'header_price_card'=>'Prix de la carte magic',
			'header_editions'=>'Trouvez le prix pour les editions de magic l\'assamblée',
			'header_edition_price'=>'Prix des cartes pour l\'edition',
			'header_price_comparator'=>'Comparateur des prix cartes magic l\'assamblee',
			'price_not_found'=>'Les prix de cette carte ne sont pas disponisbles.'
        ),
        'en'=>array(
            'card_input_message' =>'Enter a card name**',
            'card_search'=>'Search',
            'mtg_name'=>'* MTG: "Magic: the gathering".',
            'mtg_search_rest'=>' ** the search only includes <a href="http://www.wizards.com/magic/tcg/resources.aspx?x=judge/resources/sfrmodern">modern</a> cards.',
            'mtg_search_title'=>'Find the best price for MTG* cards' ,
            /*footer**/
            'store_add'=>'Add a store',
            'input_store_url'=>'Enter a store url',
            'store_url_sample'=>'http://www.somestore.com',
            'cancel'=>'Cancel',
            'send_feedback'=>'Send feedback',
            'input_email_address'=>'Enter your email address:',
            'mail_sample'=>'jon.doe@example.net',
            'input_message'=>'Enter your message:',
            'input_message_placeholder'=>'Enter here your feedback message...',
            'send'=>'Send',
            'thank_you'=>'Thanks you!',
            'team_thanks'=>'Thanks you for your help. Our team will process your request as soon as possible!',
            'add_store_title'=>'Add a store',
            'about'=>'About',
            'add_feedback_title'=>'Feedback',
            /*View**/
            'store'=>'Store',
            'price'=>'Price',
            'last_update'=>'Last update',
            'price_not_found'=>'No prices found',
            /*notice*/
            'card_artwork_notice'=>'* Card source and artwork are property of <a href="http://www.wizards.com" title="Wizards of the coast">Wizards of the Coast LLC</a>. ',
            'card_price_notice'=>'* The prices displayed in this page are publicly available on their respective store websites.',
            /**/
            'card_search_title'=>'Search term',
            'card_search_restriction'=>'Only the first 30 results are displayed in this page',
            'card_name'=>'Card name',
            'starting_price'=>'Starting price',
            'notify_me'=>'Let me know when this card price change',
            'price_subscribe'=>'Subcribe to price change',
            'subscribe'=>'Subscribe',
            'input_name'=>'Enter your name',
            'input_name_sample'=>'John Doe',
            'add_store_error'=>'Please, enter a valid URL (http://store.com)',
            'message_error'=>'Please, enter a message.',
            'mail_error'=>'Please, enter a valid email address.',
            'name_error'=>'Please, enter a name.',
            'mtg_exchange_notice'=>'Original price in US Dollars, converted to euros using the daily exchange rate.',
			'card_editions_title'=>'Magic the Gathering editions',
			'editions'=>'Editions',
			'first_page'=>'First page',
			'previous'=>'Previous',
			'next'=>'Next',
			'last_page'=>'Last page',
			'cards'=>'cards',
			'stores'=>'Stores',
			'indexed_stores'=>'Stores indexed by <a href="http://www.lestack.fr">LeStack.fr</a>',
			'header_price_card'=>'Price of the magic card',
			'header_editions'=>'Find the price of Magic the gathering editions',
			'header_edition_price'=>'Card prices for the edition',
			'header_price_comparator'=>'Magic the gathering price comparator',
			'price_not_found'=>'There are no available prices for this card.'
        )
    );

    public function getLang(){
        return $this->_View->Session->read('System.lang');
    }

    public function get($key){
        return $this->langMap_[$this->getLang()][$key];
    }
}
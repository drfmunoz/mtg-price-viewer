<!DOCTYPE HTML>
<html>
<head>
    <title>
	<?php
		if(isset($card)){
			echo $this->LangManager->get('header_price_card').' '.$card['Card']['name'];
		}
		else if(isset($searchName)){
			echo $this->LangManager->get('card_search_title').' '.$searchName;
		}
		else if(isset($editions)){
			echo $this->LangManager->get('card_editions_title');
		}
		else if(isset($edition)){
			echo $edition['Edition']['displayName'].' '.$this->LangManager->get('cards').' ('.$edition['Edition']['name'].')';
		}
		else{
			echo $this->LangManager->get('mtg_search_title');
		}
	
	?>
	</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	
	<?php
	if(isset($card)){
		echo '<meta name="description" content="'.$this->LangManager->get('header_price_card').' '.$card['Card']['name'].'"/>';
		echo '<meta name="keywords" content="MTG, Magic the gathering, Magic l\'assamblee, prix, prices, modern format,'.$card['Card']['name'].'"/>';
	}
	else if(isset($editions)){
		echo '<meta name="description" content="'.$this->LangManager->get('header_editions').'"/>';
		?>
		<meta name="keywords" content="MTG, Magic the gathering, Magic l'assamblee, prix, prices, modern format"/>
		<?php
	}
	else if(isset($edition)){
		echo '<meta name="description" content="'.$this->LangManager->get('header_edition_price').' '.$edition['Edition']['displayName'].' ('.$edition['Edition']['name'].')'.'"/>';
		echo '<meta name="keywords" content="MTG, Magic the gathering, Magic l\'assamblee, prix, prices, modern format,'.$edition['Edition']['displayName'].','.$edition['Edition']['name'].'"/>';
	}
	else{
		?>
		<meta name="description" content="<?php echo $this->LangManager->get('header_price_comparator'); ?>"/>
		<meta name="keywords" content="MTG, Magic the gathering, Magic l'assamblee, prix, prices, modern format"/>
		<?php
	}
	?>
    
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet"/>
	<?php
	echo $this->Html->script('jquery-1.8.3.min');
	echo $this->Html->script('jquery-ui-1.10.0.custom');
	?>
	<script src="/css/5grid/init.js?use=mobile,desktop,1000px"></script>
<!--    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"  type="text/javascript"></script>-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css"/>
    <noscript>
		<?php 
		echo $this->Html->css('5grid/core'); 
		echo $this->Html->css('5grid/core-desktop'); 
		echo $this->Html->css('5grid/core-1200px'); 
		echo $this->Html->css('5grid/core-noscript'); 
		echo $this->Html->css('style'); 
		echo $this->Html->css('style-desktop'); 
		?>
	</noscript>	
    <style>
        .ui-tooltip {
            font-size:10pt;
            line-height: normal;
        }
    </style>
	

    
<!--[if lte IE 9]>
    <link rel="stylesheet" href="css/ie9.css"/><![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie8.css"/><![endif]-->
    <!--[if lte IE 7]>
    <link rel="stylesheet" href="css/ie7.css"/><![endif]-->
</head>
<body>
	<a href="https://github.com/drfmunoz/mtg-price-viewer"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_left_red_aa0000.png" alt="Fork me on GitHub"></a>
<?php 
echo $this->fetch('content');
echo $this->element('footer');
?>
<div style="height:100%">
	<div class="wrapper-light top-light"style="min-height:25px;height:5%;">
	    <?php
	    echo $this->element('lang_bar');
	    ?>
	</div>
	<div class="wrapper wrapper-style2 wrapper-first" style="min-height:400px;height:90%;">

	    <article class="5grid-layout" id="top">
	        <div class="row">

	            <div class="9u">
	                <header>

	                    <h1> <?php echo $this->LangManager->get('mtg_search_title');?></h1>
	                </header>
				    <?php echo $this->Form->create(false,
				    array('type' => 'get',
				        'url' => array('controller' => 'Search', 'action' => 's'),
				        'id' => 'searchForm'
				    )); ?>
						
						<div class="row">
				            <div class="8u">
							  <input id="searchCard" name="name" type="text" style="width: 100%" placeholder="<?php echo $this->LangManager->get('card_input_message');?>">
							</div>
							<div class="2u">
							  <a id="searchButton" href="#work" class="button button-big"><?php echo $this->LangManager->get('card_search');?></a><br/>
							</div>
						</div>
						
	                     <span style="font-size: 12px">
	                    &nbsp;&nbsp; <?php echo $this->LangManager->get('mtg_name');?><br/>
	                    &nbsp;&nbsp; <?php echo $this->LangManager->get('mtg_search_rest');?>

	                    </span>
	                <?php echo $this->Form->end(); ?>
	            </div>
	        </div>
	    </article>
	</div>
    <?php
    echo $this->element('footer_bar');
    ?>
</div>

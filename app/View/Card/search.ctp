<div style="height:100%">
    <?php
    echo $this->element('searchable_header');
    ?>
    <?php
    echo $this->element('searchable_lang_bar');
    ?>
    <!-- Work -->
    <div class="wrapper wrapper-style2" style="min-height: 550px; min-width:320px;">

    <article>
        <?php
        if (isset($cards)) {
            ?>
            <header>
				<?php if(isset($edition)){
						echo "<h3>".$edition['Edition']['displayName']."</h3>";
				}else{ ?>
                <h3> <?php echo $this->LangManager->get('card_search_title');?>: "<?php echo $searchName;?>"</h3>
                (<span><?php echo $this->LangManager->get('card_search_restriction');?></span>)
				<?php } ?>
            </header>
            <div class="5grid-layout">
                <div class="row">
                    <div class="2u">
                        &nbsp;
                    </div>
                    <div class="8u">
                        <section class="box box-style1 resultsMainPane">


                            <div>
                                <div class="search_result">
                                    <div class="result tableHeader1">
                                        <div class="cardname under"><?php echo  $this->LangManager->get('card_name');?></div>
                                        <div class="price_figure under"><?php echo  $this->LangManager->get('starting_price');?></div>
                                        <div class="sdate under"><?php echo  $this->LangManager->get('last_update');?></div>
                                    </div>
                                </div>
                                <?php
                                foreach ($cards as $card) {

                                    ?>
                                    <div class="search_result">
                                        <div class="result">
                                            <div class="cardname under">

                                                <?php echo $this->Html->link($card['Card']['name'],
                                                array('controller' => 'Card', 'action' => 'view', $lang, $card['Card']['oName'], 'ext' => 'html'));
                                                ?>
                                                <?php if (isset($card['Card']['otherLang']['CardName'])) { ?>

                                                <span class="altname">
	                                        (<?php echo $card['Card']['otherLang']['CardName']['name']; ?>)
	                                    </span>
                                                <?php } ?>
                                            </div>
                                            <div class="price_figure under">
                                                <?php if (isset($card['Card']['price']['CardPriceSource'])){if($card['Card']['price']['CardPriceSource']['currency']=='USD'){echo $this->element('conversion_rate');} echo $card['Card']['price']['CardPriceSource']['lastPrice'] . "&nbsp;&#8364;"; }?>
                                            </div>
                                            <div class="sdate under"><?php if (isset($card['Card']['price']['CardPriceSource'])) echo $this->Time->format('Y-M-d', $card['Card']['price']['CardPriceSource']['lastUpdate']);?> </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
							<?php if(isset($edition)){
								echo $this->element('paginate_navigation');
							}?>
                        </section>
                    </div>
                </div>
            </div>
            <div style="height:100px;">

                <?php echo $this->element('content_notice');?>

            </div>
	</article>
	    <?php
        } else {
            ?>
            <header>
                <h3>Search: "<?php echo $searchName;?>"</h3>
            </header>
            <section class="box box-style1"
                     style="resultsMainPane">
                <div style="text-align: center;font-size: 18px;padding-top: 20px;">
                    <?php echo __('No cards found containing');  echo "&nbsp;" . $searchName;?>".
                    <br> <?php echo __('Try again with another card name.');?>  <br>
                </div>
            </section>

            <?php
        }
        ?>


    </div>
    <?php
    echo $this->element('footer_bar');
    ?>
</div>
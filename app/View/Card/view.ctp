<div style="height:100%">

    <?php
    echo $this->element('searchable_header');
    ?>
    <?php
    echo $this->element('searchable_lang_bar');
    ?>
    <!-- Work -->
    <div class="wrapper wrapper-style2 viewMainPane">

        <article>
            <header>
                <h3><?php echo $card['Card']['name']; ?></h3>
                <?php if (isset($card['Card']['oriname'])) {
                ?>
                (<span> <a
                        href="http://gatherer.wizards.com/Pages/Card/Details.aspx?multiverseid=<?php echo  $card['Card']['oMultiverseId'];?>"
                        title="<?php echo  $card['Card']['name'];?>" target="_blank">
                    <?php echo $card['Card']['oriname']; ?>
                </a>
	            </span>)
                <?php
            } ?>
            </header>
            <div class="5grid-layout">
                <div class="row">
                    <div class="4u">
                        &nbsp;
                    </div>
                    <div class="5u">
                        <div class="melements">
	                                <span class="melement">Min:
	                                    <span class=" cheap">
	                                    &nbsp;<?php echo $card['Card']['minPrice']; ?>&nbsp;&#8364;
	                                    </span>
	                                </span>
	                                <span class="melement">Max:
	                                    <span class="expensive">
	                                    &nbsp;<?php echo $card['Card']['maxPrice']; ?>&nbsp;&#8364;
	                                    </span>
	                                </span>
	                                <span class="melement">Med:
	                                    &nbsp;<?php echo $card['Card']['medPrice']; ?>&nbsp;&#8364;
	                                </span>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="2u">
                        &nbsp;
                    </div>
                    <div class="5u" style="margin-top: 0px;">
                        <a id="cardNotification" href="#" title="Let me know when this card price change"><?php echo $this->LangManager->get('notify_me');?></a>
                        <section class="box box-style1"
                                 style="text-align: left;">

                            <div>
                                <div class="prices tableHeader1" >
                                    <div class="store under"><?php echo $this->LangManager->get('store');?></div>
                                    <div class="price_figure_c under"><?php echo $this->LangManager->get('price');?></div>
                                    <div class="date under"><?php echo $this->LangManager->get('last_update');?></div>
                                </div>

                                <?php
                                if (sizeof($card['Card']['priceSources']) > 0) {
                                    foreach ($card['Card']['priceSources'] as $source) {

                                        ?>
                                        <?php
                                        $price['price'] = $source['CardPriceSource']['lastPrice'];
                                        $price['fetchDate'] = $source['CardPriceSource']['lastUpdate'];
                                        if ($price['price'] > 0) {
                                            ?>

                                            <div class="prices">
                                                <div class="price <?php if (isset($source['cheap'])) {
                                                    echo "pbold";
                                                } ?>">
                                                    <div class="store under">
                                                        <a href="<?php echo $source['CardPriceSource']['url']; ?>"
                                                           target="_blank">
                                                            <?php echo $source['CardPriceSource']['sourceName'];?>
                                                        </a>
                                                    </div>
                                                    <div class="price_figure_c under <?php if (isset($source['expensive'])) {
                                                        echo "expensive";
                                                    } if (isset($source['cheap'])) {
                                                        echo "cheap";
                                                    }?>">
                                                        <?php echo $price['price']; ?> &#8364;<?php if($source['CardPriceSource']['currency']=='USD'){echo $this->element('conversion_rate');}?>
                                                    </div>
                                                    <div class="date under">
                                                        <?php echo $this->Time->format('d-M-Y', $price['fetchDate']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                } else {
                                    echo $this->LangManager->get('price_not_found');
                                }
                                ?>
                            </div>

                        </section>
                    </div>
                    <div class="3u" style="margin-top: 30px;">
                        <section class="image-centered1">

                            <div>
                                <a href="http://gatherer.wizards.com/Pages/Card/Details.aspx?multiverseid=<?php echo  $card['Card']['multiverseId'];?>"
                                   target="_blank" title="<?php echo $card['Card']['name'];?>">
                                    <img src="http://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=<?php echo  $card['Card']['multiverseId'];?>&type=card" alt="<?php echo $card['Card']['name'];?> on Gatherer">
                                </a>
                            </div>
                            <input id="cardKey" type="hidden" name="cardKey" value="<?php echo $card['Card']['id'];?>"/>
                        </section>
                    </div>

                </div>
            </div>

                <?php echo $this->element('content_notice');?>

        </article>
    </div>
    <?php
    echo $this->element('footer_bar');
    ?>
</div>
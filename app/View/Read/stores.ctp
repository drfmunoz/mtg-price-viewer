<div>
    <?php
    echo $this->element('searchable_header');
    ?>
    <!-- <?php
    echo $this->element('searchable_header');
    ?> -->
    <?php
    echo $this->element('searchable_lang_bar');
    ?>
    <!-- Work -->
			<div class="wrapper wrapper-style2">
				<article id="work">
					<header>
						<h2><?php echo $this->LangManager->get('indexed_stores'); ?></h2>
						<span></span>
					</header>
					<div class="5grid-layout">
						<div class="row">
							<div class="4u">
								&nbsp;
							</div>
							<div class="4u">
								<section class="box box-style">
									<div style="text-align:left; padding-left:30px;">
										<div><?php echo $this->Html->image('icons/fr.gif'); ?>&nbsp;<a href="http://www.magicbazar.fr">Magic Bazar</a></div>
										<div><?php echo $this->Html->image('icons/fr.gif'); ?>&nbsp;<a href="http://www.parkage.com">PARKage</a></div>
										<div><?php echo $this->Html->image('icons/fr.gif'); ?>&nbsp;<a href="http://www.magicfrag.fr">Magic Frag</a></div>
										<div><?php echo $this->Html->image('icons/fr.gif'); ?>&nbsp;<a href="http://www.magiccorporation.fr">Magic Corporation</a></div>
										<div><?php echo $this->Html->image('icons/fr.gif'); ?>&nbsp;<a href="http://cartes.mtgfrance.com">MTG France</a></div>
										<div><?php echo $this->Html->image('icons/europeanunion.gif'); ?>&nbsp;<a href="http://www.magiccardmarket.eu">Magic Card Market EU</a></div>
										<div><?php echo $this->Html->image('icons/us.gif'); ?>&nbsp;<a href="http://www.starcitygames.com">Star City Games</a></div>

									</div>
									
								</section>
							</div>
							<div class="4u">
								&nbsp;
							</div>
						</div>
					</div>
				</article>
				<div style="font-size: 11px;padding-bottom: 10px;">
				    <span id="artworkNotice"><?php echo $this->LangManager->get('card_artwork_notice');?></span>
				    <br/>
				    <span id="priceNotice"><?php echo $this->LangManager->get('card_price_notice');?></span>
				    <br/>
				    <span id="searchNotice"><?php echo $this->LangManager->get('mtg_search_rest');?></span>
				</div>
			
			</div>
			

    </div>
    <?php
    echo $this->element('footer_bar');
    ?>
</div>
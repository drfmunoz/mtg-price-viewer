<div>

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
						<h2><a href="http://www.lestack.fr">LeStack.fr</a> magic card prices comparator</h2>
						<span>Find the best price for MTG* cards</span>
					</header>
					<div class="5grid-layout">
						<div class="row">
							<div class="4u">
								<section class="box box-style1" style="height:550px;">
									<h3>What is <a href="http://www.lestack.fr">LeStack.fr</a>?</h3>
									<p><a href="http://www.lestack.fr">LeStack.fr</a> is a magic card price comparator specialised in <b>french card dealers</b> (most of the dealers are french and a few are EU and US sources). <a href="http://www.lestack.fr">LeStack.fr</a> <b>displays the dealer's cheapest prices</b> (useful for comparison). It <b>only supports cards in the modern format</b>, and each card is displayed (and compared) in its latest edition.
										<br>
										NOTE: US card dealers are there to compare french prices agains US prices (don't forge to take into account the shipping price when comparing the prices).

</p>
								</section>
							</div>
							<div class="4u">
								<section class="box box-style1"  style="height:550px;">
									<h3>Why do <a href="http://www.lestack.fr">LeStack.fr</a> exists?</h3>
									<p>I created <a href="http://www.lestack.fr">LeStack.fr</a>  because there wasn't one out there. I'm an occasional magic player, and sometimes I trade and buy cards. Comparing the price for dealer to dealer is quite painful if you go site by site (some traders have huge price differences). <a href="http://www.lestack.fr">LeStack.fr</a> allows you to compare in one site the prices of several card dealers.</p>
								</section>
							</div>
							<div class="4u">
								<section class="box box-style1"   style="height:550px;">
									<h3>Is it free?</h3>
									<p><a href="http://www.lestack.fr">LeStack.fr</a> is free to use. It was created <a href="http://www.lestack.fr">LeStack.fr</a> based on personal needs and it will be free on charge for the foreseeable future (at least 10 months from now). If you want to know more about <a href="http://www.lestack.fr">LeStack.fr</a>, contribute, or just give random feedback, please feel free to send your comments through the "feedback" link on the bottom of this page.</p>
									<p><span>This website design is based on the <a href="http://html5up.net">Miniport 1.0</a> template. Flag icons are part of the <a href="http://www.famfamfam.com/" alt="famfamfam">famfamfam</a> icon library.</span> </p>
								</section>
							</div>
						</div>
					</div>
				</article>
				<div style="font-size: 11px;line-height: 1.8em;padding-top: 12px;padding-bottom: 10px;">
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
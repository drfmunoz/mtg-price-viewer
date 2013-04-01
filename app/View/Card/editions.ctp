<div style="height:100%">
    <?php
    echo $this->element('searchable_header');
    ?>
	<div>
    <?php
    echo $this->element('searchable_lang_bar');
    ?>
	    <!-- Work -->
    <div class="wrapper wrapper-style2" style="min-height: 550px; min-width:320px;">

    <article>
        <header>

            <h3> <?php echo $this->LangManager->get('card_editions_title');?></h3>

        </header>
            <div class="5grid-layout">
                <div class="row">
                    <div class="2u">
                        &nbsp;
                    </div>
                    <div class="8u">
                        <section class="box box-style1 resultsMainPane">
                            <div>
								<?php foreach($editions as $edition){ ?>
							    <div class="search_result">
                                    <div class="result tableHeader1">
										
                                        <div class="under"><?php 
											
											echo $this->Html->link($edition['Edition']['displayName'],
											                                                array('controller' => 'Card', 'action' => 'editions', $lang, $edition['Edition']['name'], 'ext' => 'html'));
											; ?></div>
										<div class="sdate under"><?php echo $edition['Edition']['name']; ?></div>
                                    </div>
                                </div>
								<?php } ?>
							</div>

                        </section>
                    </div>
                </div>
            </div>
            <div style="height:100px;">

                <?php echo $this->element('content_notice');?>

            </div>
	</article>



    </div>
    <?php
    echo $this->element('footer_bar');
    ?>
</div>
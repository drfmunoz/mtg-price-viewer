<div class="wrapper-style4 search-head">

    <?php echo $this->Form->create(false,
    array('type' => 'get',
        'url' => array('controller' => 'Search', 'action' => 's'),
        'id' => 'searchForm'
    )); ?>
    <div class="5grid-layout">
        <div class="row">
            <div class="2u">
                &nbsp;
            </div>
            <div class="6u" style="text-align:right;">
                <input id="searchCard" name="name" type="text" class="search-input" style="font-size:14px;"
                       placeholder="<?php echo $this->LangManager->get('card_input_message');?>">
            </div>
            <div class="2u" style="text-align:left;">
                <button id="searchButton" href="#work" class="button"
                        style="padding-top: 10px;padding-bottom: 10px; font-weight: 400;"><?php echo $this->LangManager->get('card_search');?>
                </button>
                <br/>
            </div>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>

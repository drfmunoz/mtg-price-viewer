<?php
///**
// *
// * PHP 5
// *
// * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
// * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
// *
// * Licensed under The MIT License
// * Redistributions of files must retain the above copyright notice.
// *
// * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
// * @link          http://cakephp.org CakePHP(tm) Project
// * @package       Cake.View.Errors
// * @since         CakePHP(tm) v 0.10.0.1076
// * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
// */
//?>
<!--<h2>--><?php //echo $name; ?><!--</h2>-->
<!--<p class="error">-->
<!--	<strong>--><?php //echo __d('cake', 'Error'); ?><!--: </strong>-->
<!--	--><?php //printf(
//		__d('cake', 'The requested address %s was not found on this server.'),
//		"<strong>'{$url}'</strong>"
//	); ?>
<!--</p>-->
<?php
//if (Configure::read('debug') > 0 ):
//	echo $this->element('exception_stack_trace');
//endif;
//?>

<?php $this->layout='mtg' ?>
<div style="height:100%">
    <div class="wrapper wrapper-style2 wrapper-first" style="min-height:400px;height:100%;">
        <article class="5grid-layout" id="top">
            <div class="row">
                <div class="2u">
                    <?php echo $this->Html->image('alert.png');?>
                </div>
                <div class="9u">
                    <header>
                        <h1> <?php echo __('ERROR 404: Content not found!');?></h1>    <br>
                        <h2>Try looking for another content or go back <a href="/" style="text-decoration: underline;">home</a></h2>
                    </header>
                </div>
            </div>
        </article>
    </div>
</div>
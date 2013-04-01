<div class="wrapper-light footer-light">
	
    <a id="addStore" href="#" title="<?php echo $this->LangManager->get('add_store_title');?>"><?php echo $this->LangManager->get('add_store_title');?></a> |
    <a id="showAbout" href="/read/about/<?php $ln=$this->Session->read('System.lang');if(isset($ln)){echo $ln;}else{ echo 'en';};?>/about.html" title="<?php echo $this->LangManager->get('about');?>"><?php echo $this->LangManager->get('about');?></a> |
    <a id="addFeedback" href="#" title="<?php echo $this->LangManager->get('add_feedback_title');?>"> <?php echo $this->LangManager->get('add_feedback_title');?></a>|
    <?php echo  $this->Html->link($this->LangManager->get('editions'),array('controller' => 'Card', 'action' => 'editions', $lang,'index', 'ext' => 'html'));?>|
	<?php echo  $this->Html->link($this->LangManager->get('stores'),array('controller' => 'read', 'action' => 'stores', $lang,'stores', 'ext' => 'html'));?>
	
</div>	
<?php
$this->Paginator->options(
                        array('url'=> array(
                        'controller' => 'Card',
                        'action' => 'editions',
						$lang,
						$edition['Edition']['name'],
						'ext'=>'html'
                  )));

?>
<div  class="nav_pag">

	<span>
		<?php echo $this->Paginator->first($this->LangManager->get('first_page'), array('title'=>'First')); ?>	
	</span>
	&lt;
	<span>
	
		<?php echo $this->Paginator->prev($this->LangManager->get('previous'), array(), null, array('class' => 'prev disabled','title'=>'Previous')); ?>
	</span>
	&lt;
	<span>

		<?php echo $this->Paginator->numbers(array('modulus'=>8)); ?>
	</span>
	&gt;
	<span>

		<?php echo $this->Paginator->next($this->LangManager->get('next'), array(), null, array('class' => 'prev disabled')); ?>
	</span>
	&gt;
	<span>
		<?php echo $this->Paginator->last($this->LangManager->get('last_page')); ?>
	</span>

</div>

<div class="post-category span12">

	<h1><? echo ucfirst($category);?></h1>
	<div class="row-fluid">
			<ul>
			  <?php foreach($posts as $post) :?>
			      <li class="well well-large span6">
	
			<h1><? echo $post['Post']['title']?></h1>
				<p><? echo $post['Post']['description']?></p>
				<p><? echo $this->Html->link("Read More", array('action'=>'view', $post['Post']['id']))?>
					<p>Published: <? echo $post['Post']['published']?></p>
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
				</li>
	


			<?php endforeach;?>
			
			</ul>
	</div>
	
			<? 
			echo "<div class='pagination pagination-centered'><ul>";

			echo $this->Paginator->prev('<<', array('tag'=>'li', 'disabledTag'=>'a'), null, array('tag'=>'li','disabledTag'=>'a','class' => 'prev disabled'));

			echo $this->Paginator->numbers(array(
				'tag'=>'li', 
				'currentTag'=>'a',
				'separator'=>false));

			echo $this->Paginator->next('>>', array('tag'=>'li', 'disabledTag'=>'a'), null, array('tag'=>'li','disabledTag'=>'a','class' => 'next disabled'));


			?>
	
	</ul>		
	
</div>

</div>
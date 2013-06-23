<div class="span3 visible-desktop visible-tablet">
	
		<? if(!empty($post['Post']['sources'])){
				echo $this->Site->createSourceList($post['Post']['sources']);
			
			}
	
		
		echo $this->Site->links();?>
		
		<p>Published: <? echo $post['Post']['published']?></p>

		<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
		<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
</div>
<div class="posts view span9">
	<h1><?php echo h($post['Post']['title']); ?></h1>
	
	<? echo $post['Post']['content'];?>
	
	<div class="visible-phone">
	<?
	if(!empty($post['Post']['sources'])){
			echo $this->Site->createSourceList($post['Post']['sources']);	
		}
	?>
	
	<p>Published: <? echo $post['Post']['published']?></p>

	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
	<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
	</div>
</div>


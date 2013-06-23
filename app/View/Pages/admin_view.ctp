<div class="span2 visible-desktop visible-tablet">
	<? echo $this->Site->links();?>
	
	<ul>
		<li><?php echo $this->Html->link(__('Edit Page'), array('action' => 'edit', $page['Page']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Page'), array('action' => 'delete', $page['Page']['id']), null, __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('action' => 'add')); ?> </li>
	</ul>
	
	
</div>
<div class="posts view span10 well">
	<h1><?php echo h($page['Page']['title']); ?></h1>
	
	<? echo $page['Page']['content'];?>

</div>



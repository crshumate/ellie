<ul>
  <?php foreach($categories as $category) :?>
<? $slug=strtolower($category['Category']['type']); ?> 
     <li class="well well-large">
	<? 
	$url = $this->Html->url(array('controller'=>'posts', 'action'=>'category',  $slug)); 
	?>
<p><a href="<? echo $url?>"><? echo $category['Category']['type']?></a></p>
	<?php echo $this->Html->link(__('View'), array('controller'=>'posts', 'action' => 'category',  $slug)); ?>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
	<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
	</li>

<?php endforeach;?>




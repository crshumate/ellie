<ul>
  <?php foreach($pages as $page) :?>
      <li class="well well-large">
	<? 
	$url = $this->Html->url(array('controller'=>'pages', 'action'=>'view', $page['Page']['slug'], 'admin'=>false)); 
	?>
<p><a href="<? echo $url?>"><? echo $page['Page']['title']?></a></p>
<p>Published: <? echo $page['Page']['published']?></p>
	<?php echo $this->Html->link(__('View'), array('action' => 'view', $page['Page']['slug'])); ?>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $page['Page']['id'])); ?>
	<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $page['Page']['id']), null, __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?>
	</li>

<?php endforeach;?>




<div class="categories index">
	<h2><?php echo __('Categories'); ?></h2>
	<ul class="nav nav-tabs nav-stacked">
	  <?php foreach($categories as $category) :?>
	      <li>
	<?= $this->Html->link($category['Category']['type'], array('controller'=>'posts', 'action'=>'category', strtolower($category['Category']['type'])))?>
	<?php endforeach;?></li>
	</ul>
	
</div>
<script type="text/javascript">

var imagePath = '<? echo "/".IMAGES_URL ?>';
var deleteUrl = "<? echo $this->Html->url(array('controller'=>'images', 'action'=>'delete'))?>";
</script>
<?
echo $this->Html->script(array('image_add_edit'));

?>

<div class="posts form span7">
<?php echo $this->Form->create('Post', array('class'=>'image-add-form')); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('content',array('class'=>'add-image-content'));
		echo $this->Form->input('sources');
		echo $this->Form->input('category_id', array('type'=>'select', 'options'=>$catOptions));
		echo $this->Form->input('published', array('type'=>'select', 'options'=>$publishOptions));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="span3">
	<?echo $this->Site->imageIframeEdit($images);?>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>

			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Post.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Post.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>

		</ul>
	</div>
</div>
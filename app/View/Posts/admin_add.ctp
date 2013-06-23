<script type="text/javascript">

var imagePath = '<? echo "/".IMAGES_URL ?>';
var deleteUrl = "<? echo $this->Html->url(array('controller'=>'images', 'action'=>'delete'))?>";
</script>
<?
echo $this->Html->script(array('image_add_edit'));

?>

<div class="posts form span7">
<?php echo $this->Form->create('Post', array('type'=>'file', 'class'=>'image-add-form')); ?>
	<fieldset>
		<legend><?php echo __('Add Post'); ?></legend>
	<?php
		echo $this->Form->input('title', array('class'=>'copyTitle'));
		echo $this->Form->input('slug', array('class'=>'slugInput'));
		
		
		echo $this->Form->input('content', array('class'=>'add-image-content'));
		//echo $this->Form->input('image', array('type'=>'file', 'name'=>'data[Post][images][image]','class'=>'image-upload'));
		//echo $this->Form->button('Add Another Image', array('id'=>'add-image'));
		echo $this->Form->input('sources');
		echo $this->Form->input('category_id', array('type'=>'select', 'options'=>$catOptions));
		echo $this->Form->input('published', array('type'=>'select', 'options'=>$publishOptions));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>


</div>

<div class="span3">
	<?echo $this->Site->imageIframe();?>

	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>

			<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

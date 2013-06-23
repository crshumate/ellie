<script type="text/javascript">

var imagePath = '<? echo "/".IMAGES_URL ?>';
</script>
<?
echo $this->Html->script(array('image_add_edit'));

?>

<div class="pages form span7">
<?php echo $this->Form->create('Page', array('class'=>'image-add-form')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Page'); ?></legend>
	<?php
		echo $this->Form->input('title', array('class'=>'copyTitle'));
		echo $this->Form->input('slug', array('class'=>'slugInput'));
		echo $this->Form->input('content',array('class'=>'add-image-content'));
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

			<li><?php echo $this->Html->link(__('List Pages'), array('action' => 'index')); ?></li>
		</ul>
	</div>
</div>

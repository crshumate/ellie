<? echo $this->Html->css(array('nolayout'));?>
<div class="images form">
<?php echo $this->Form->create('Image', array('type'=>'file')); ?>

	<?php
		echo $this->Form->input('image', array('label'=>false, 'class'=>'image-input','type'=>'file'));
	
	?>
	
<?php echo $this->Form->end(__('Submit')); ?>
</div>

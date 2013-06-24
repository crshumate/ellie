<div class="sites form span7">
<?php echo $this->Form->create('Site'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Site'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('site_name');
		echo $this->Form->input('footer_text');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

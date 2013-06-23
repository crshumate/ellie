<?php echo $this->Form->create('ModelName', array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => 'control-label'),
        'between' => '<div class="controls">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));?>
<fieldset>
<?php echo $this->Form->input('Fieldname', array(
    'label' => array('class' => 'control-label'), // the preset in Form->create() doesn't work for me
    )); ?>
</fieldset>
<?php echo $this->Form->end();?>
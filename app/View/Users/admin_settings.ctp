<?
echo $this->Form->create('User');
echo $this->Form->input('email');
echo $this->Form->input('password', array('value'=>''));
echo $this->Form->input('id', array('type'=>'hidden'));
echo $this->Form->submit('Submit');
echo $this->Form->end();
?>
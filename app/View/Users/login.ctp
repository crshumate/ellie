<?	echo $this->Form->create('User');
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->submit('Login');
	echo $this->Form->end();
?>
<? echo $this->Html->link('Forgot your password?', array('controller'=>'users', 'action'=>'lost_password'));?>
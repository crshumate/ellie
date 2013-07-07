<h1>Password Recovery</h1>
<p>Please enter the email address associated with your account to begin the password recovery process.</p>

<?
echo $this->Form->create('User');
echo $this->Form->input('email');
echo $this->Form->end('Submit');
?>
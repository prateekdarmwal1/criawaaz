<?php
echo $this->Form->create('User',["url"=>"direct_listen"]);
echo $this->Form->input('email', array('label' => 'Enter your email address:'));
echo $this->Form->input('password', array('label' => 'Enter your password:'));
echo $this->Form->submit('Submit');
echo $this->form->end();
?>

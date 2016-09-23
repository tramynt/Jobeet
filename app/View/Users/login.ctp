<div class="users">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <h2>Login</h2>
    <fieldset>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
        ?>
    </fieldset>
    <?php echo $this->Form->submit('Login', array('class' => 'btn btn-default'));?>
    <?php echo $this->Html->link('Register user', array('controller' => 'users', 'action' => 'register'), array('class' => 'btn-register'));?>
<?php echo $this->Form->end(); ?>
</div>
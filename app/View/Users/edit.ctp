<div class="container">
    <div class="row">
        <div class="col-md-4 left">
            <?php echo $this->Form->create('User');?>
                <h2>Edit User</h2>
                <div class="form-group">
                    <?php
                    echo $this->Form->input('username', array('type' => 'text'));
                    echo $this->Form->input('password', array('type' => 'password'));
                    echo $this->Form->input('email', array('type' => 'email'));
                    echo $this->Form->input('skills', array('type' => 'text'));
                    ?>
                </div>
                <?php echo $this->Form->submit('Save', array('class' => 'btn btn-default'));?>
            <?php echo $this->Form->end();?>
        </div>
        <div class="col-md-8 right"></div>
    </div>
</div><!-- /.container -->
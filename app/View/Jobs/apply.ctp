<div class="container mg-top">
    <h2>Apply Form</h2>
    <div class="row">
        <?php echo $this->Form->create('Application', array('type' => 'POST'));?>
            <div class="row form-group">
                <label class="control-label col-md-2" for="user">Username:</label>
                <div class="col-md-2">
                    <?php echo $job['User']['username']; ?>
                </div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-2" for="user">Job:</label>
                <div class="col-md-2">
                    <?php echo h($job['Category']['name']); ?>
                </div>
            </div>
            <div class="row form-group">
                <label class="control-label col-md-2" for="user">Message:</label>
                <div class="col-md-2">
                    <?php echo $this->Form->textarea('message', array('line' => 5)); ?>
                </div>
            </div>
        <?php echo $this->Form->hidden('user_id', array('value' => $job['User']['id']));?>
        <?php echo $this->Form->hidden('job_id', array('value' => $job['Job']['id']));?>
        <?php echo $this->Form->submit('Apply', array('class' => 'btn btn-success btn-md'));?>
        <?php echo $this->Form->end();?>
    </div>
</div>

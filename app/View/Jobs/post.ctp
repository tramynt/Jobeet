<div class="container mg-top">
    <div class="row">
        <div class="col-md-4 left">
        <?php echo $this->Form->create('Job', array());?>
            <h2>Post new job</h2>
            <?php
                echo $this->Form->input('category_id', array(
                    'options' => $categories,
                    'empty' => '(choose one)',
                    'type' => 'select'
                )); 
            ?>
            <?php echo $this->Form->input('title',array());?>
            <?php echo $this->Form->input('description',array('type' => 'text')); ?>
            <?php echo $this->Form->input('is_public',array('type' => 'radio', 'options' => array('public','private'), 'legend' => false)); ?>
            <?php echo $this->Form->submit('Save', array( 'class' => 'btn btn-default btn-sm active')); ?>
            <?php echo $this->Form->end(); ?>
        <div class="col-md-8 right"></div>
    </div>
</div>
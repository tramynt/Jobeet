 <div class="container mg-top">
    <div class="row">
    <div class="col-md-4 left">
        <h2>Find job</h2>
        <?php echo $this->Form->create('Job', array('type' => 'GET'));?>
            <?php echo $this->Form->input('job_id',array('type' => 'text'));
              echo $this->Form->input('category_id', array(
                        'options' => $categories,
                        'empty' => '(choose one)',
                        'type' => 'select'
                    )); 
                echo $this->Form->submit('Search', array( 'class' => 'btn btn-success active col-md-3', 'div' => false, 'style' => 'padding: 5px 12px; margin-right: 20px;'));
                echo $this->Html->link(__('Post'), array('action' => 'post'), array('class' => 'btn btn-primary col-md-3'));
            ?>
         <?php echo $this->Form->end(); ?>

        <table class="table table-bordered table-hover table-condensed" style="margin-top: 30px; clear: both; float: left;">
            <tr>
                <th><?php echo $this->Paginator->sort('category_id'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($jobs as $job): ?>
             <tr>
                <td><?= $job['Category']['name'] ?></td>
                <td><?= $job['Job']['created'] ?></td>
                <td class="actions">
                    <?= $this->Html->link('Apply', array('controller' => 'jobs', 'action' => 'apply', $job['Job']['id']));?>
                  
                  <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $job['Job']['id'])); ?>
                  <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $job['Job']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $job['Job']['id']))); ?>
                  </td>
            <?php endforeach ?>
        </table>
    </div>
    <div style="clear: both; float: left;">
        <p>
            <?php
               echo $this->Paginator->counter(array(
              'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
        ?>
        </p>
        <div class="paging">
            <?php
              echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
              echo $this->Paginator->numbers(array('separator' => ''));
              echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
            ?>
        </div>
    </div>
      
</div>
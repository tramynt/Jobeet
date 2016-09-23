 <div class="container mg-top">
    <div class="row">
    <div class="col-md-4 left">
        <h2>User List</h2>
        <table class="table table-bordered table-hover table-condensed" style="margin-top: 30px; clear: both; float: left;">
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('username'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($users as $user): ?>
             <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username']?></td>
                <td><?= $user['email']?></td>
            <?php endforeach ?>
        </table>
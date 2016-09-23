
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <h3> <?= $this->Html->link('Jobeet', array('controller' => 'jobs', 'action' => 'find'));?></h3>
        </div>
        <?php if(AuthComponent::user('id')): ?>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><?= $this->Html->link('Job', array('controller' => 'jobs', 'action' => 'find'));?></li>
                <li><?= $this->Html->link('Edit User', array('controller' => 'users', 'action' => 'edit'));?></li>
            </ul>
            <?= $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('class' => 'logout'));?>
        </div>
        <?php endif ?>

      </div>
    </nav> 
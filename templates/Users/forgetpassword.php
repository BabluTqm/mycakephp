<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->Breadcrumbs->add([
    ['title' => 'listing' , 'url' => ['controller' => 'Users' , 'action' => 'index']],
    ['title' => 'add' , 'url' => ['controller' => 'Users' , 'action' => 'add']],
 ])
?>
<style>
    .error-message{
        color:red;
    }
</style>

<?php echo $cell = $this->cell('Inbox'); ?>

    <div class="column-responsive column-80">
        <div class="users form content">
  
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('forget password') ?></legend>
                
                <?php
                   echo $this->Form->control('email'  ,['required' => false]);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit' , ['class' => 'btn btn-primary'])) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

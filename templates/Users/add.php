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
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
  
            <?= $this->Form->create($user , ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                
                <?php
                    echo $this->Form->control('name' , ['required' => false]);
                    echo $this->Form->control('email'  ,['required' => false]);
                    echo $this->Form->control('phone' , ['required' => false]);
                    echo $this->Form->control('password' , ['required' => false]);
                    echo $this->Form->control('cnf_password' , ['required' => false , 'type' => 'password']);
                     

                        
                    echo $this->Form->control('gender' , ['type'=>'radio']);
                    echo $this->Form->radio('gender', 
                    [['value' => 'male' , 'text' => 'Male'] , 
                    ['value' => 'female' , 'text' => 'Female']] ,
                    ['required' => false]);

                    echo $this->Form->control('image_file' , ['type' => 'file']);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit' , ['class' => 'btn btn-primary'])) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

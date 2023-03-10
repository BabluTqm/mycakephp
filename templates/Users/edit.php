<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<style>
    .error-message{
        color:red;
    }
</style>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user,['enctype'=>'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('name' , ['required' => false]);
                    echo $this->Form->control('email' , ['required' => false]);
                    echo $this->Form->control('phone' , ['required' => false]);
        
                    echo '<label for="gender">Gender</label>';
                    echo $this->Form->radio('gender', 
                    [['value' => 'male' , 'text' => 'Male'] , 
                    ['value' => 'female' , 'text' => 'Female']] ,
                    ['required' => false]);

                    echo $this->Form->control('change_image' , ['type' => 'file']);
                    echo $this->Html->image($user->image);
                   // Html->image($user->image)
                
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

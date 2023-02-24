<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */

 $this->Breadcrumbs->add([
    ['title' => 'listing' , 'url' => ['controller' => 'Employee' , 'action' => 'index']],
    ['title' => 'add' , 'url' => ['controller' => 'Employee' , 'action' => 'add']],
 ])



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
            <?= $this->Html->link(__('List Employee'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    
     <div class="column-responsive column-80">
        <div class="employee form content">
       
            <?= $this->Form->create($employee) ?>
            <fieldset>
                <legend><?= __('Add Employee') ?>
                <?php echo $cell = $this->cell('Inbox'); ?>

            
            </legend>
                <?php
                    echo $this->Form->control('name', ['required' => false]);
                    echo $this->Form->control('email', ['required' => false]);
                    echo $this->Form->control('phone',['required' => false]);
                    echo $this->Form->control('password',['required' => false]);
                    echo $this->Form->control('designation',['required' => false]); 

                    echo '<label for="gender">Gender</label>';
                    echo $this->Form->radio('gender', 
                    [['value' => 'male' , 'text' => 'Male'] , 
                    ['value' => 'female' , 'text' => 'Female']] ,
                    ['required' => false])
                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $insert
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $insert->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $insert->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Insert'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="insert form content">
            <?= $this->Form->create($insert) ?>
            <fieldset>
                <legend><?= __('Edit Insert') ?></legend>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

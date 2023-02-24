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
            <?= $this->Html->link(__('Edit Insert'), ['action' => 'edit', $insert->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Insert'), ['action' => 'delete', $insert->id], ['confirm' => __('Are you sure you want to delete # {0}?', $insert->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Insert'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Insert'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="insert view content">
            <h3><?= h($insert->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($insert->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($insert->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($insert->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($insert->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Insert') ?></h4>
                <?php if (!empty($insert->insert)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($insert->insert as $insert) : ?>
                        <tr>
                            <td><?= h($insert->id) ?></td>
                            <td><?= h($insert->email) ?></td>
                            <td><?= h($insert->password) ?></td>
                            <td><?= h($insert->created) ?></td>
                            <td><?= h($insert->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Insert', 'action' => 'view', $insert->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Insert', 'action' => 'edit', $insert->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Insert', 'action' => 'delete', $insert->id], ['confirm' => __('Are you sure you want to delete # {0}?', $insert->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $insert
 */
?>
<div class="insert index content">
    <?= $this->Html->link(__('New Insert'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Insert') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($insert as $insert): ?>
                <tr>
                    <td><?= $this->Number->format($insert->id) ?></td>
                    <td><?= h($insert->email) ?></td>
                    <td><?= h($insert->created) ?></td>
                    <td><?= h($insert->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $insert->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $insert->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $insert->id], ['confirm' => __('Are you sure you want to delete # {0}?', $insert->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

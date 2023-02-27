<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cart> $cart
 */
?>
<div class="cart index content">
    <?= $this->Html->link(__('Dashboard'), ['controller'=> 'users', 'action' => 'home'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cart') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                   
                    <th><?=h('product Name') ?></th>
                    <th><?= h('product_image') ?></th>
                   
                    <th class="actions"><?= __('quantity') ?></th>
                    <th class="actions"><?= __('Delete') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $cart): ?>
                <tr>
                <td><?= h($cart->product->product_title) ?></td>
                    <td><?= $this->Html->Image($cart->product->product_image) ?></td>
                    
                    <td class="actions">
                    <?= $this->Html->link(__(''), [ 'controller' => 'Cart','action' => 'edit',$cart->id], ['class' => 'fas fa-plus ']) ?>
                    <?= $this->Number->format($cart->quantity) ?>
                    <?= $this->Html->link(__(''), [ 'controller' => 'Cart','action' => 'minus',$cart->id], ['class' => 'fas fa-minus ']) ?>


                    </td>
                    <td class="actions">
                    <?= $this->Html->link(__(''), [ 'controller' => 'Cart','action' => 'delete',$cart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->id),'class' => 'fas fa-trash add-like']) ?>
                    
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>

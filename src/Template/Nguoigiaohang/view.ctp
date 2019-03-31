<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nguoigiaohang $nguoigiaohang
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nguoigiaohang'), ['action' => 'edit', $nguoigiaohang->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nguoigiaohang'), ['action' => 'delete', $nguoigiaohang->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nguoigiaohang->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nguoigiaohang'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nguoigiaohang'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Donhang'), ['controller' => 'Donhang', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Donhang'), ['controller' => 'Donhang', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nguoigiaohang view large-9 medium-8 columns content">
    <h3><?= h($nguoigiaohang->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($nguoigiaohang->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nguoigiaohang->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($nguoigiaohang->status) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Donhang') ?></h4>
        <?php if (!empty($nguoigiaohang->donhang)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Discount') ?></th>
                <th scope="col"><?= __('Ship Price') ?></th>
                <th scope="col"><?= __('Insert Time') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Nguoidung Id') ?></th>
                <th scope="col"><?= __('Nguoigiaohang Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($nguoigiaohang->donhang as $donhang): ?>
            <tr>
                <td><?= h($donhang->id) ?></td>
                <td><?= h($donhang->price) ?></td>
                <td><?= h($donhang->discount) ?></td>
                <td><?= h($donhang->ship_price) ?></td>
                <td><?= h($donhang->insert_time) ?></td>
                <td><?= h($donhang->name) ?></td>
                <td><?= h($donhang->phone) ?></td>
                <td><?= h($donhang->address) ?></td>
                <td><?= h($donhang->status) ?></td>
                <td><?= h($donhang->nguoidung_id) ?></td>
                <td><?= h($donhang->nguoigiaohang_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Donhang', 'action' => 'view', $donhang->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Donhang', 'action' => 'edit', $donhang->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Donhang', 'action' => 'delete', $donhang->id], ['confirm' => __('Are you sure you want to delete # {0}?', $donhang->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

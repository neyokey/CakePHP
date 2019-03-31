<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loainguoidung $loainguoidung
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Loainguoidung'), ['action' => 'edit', $loainguoidung->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Loainguoidung'), ['action' => 'delete', $loainguoidung->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loainguoidung->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loainguoidung'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loainguoidung'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nguoidung'), ['controller' => 'Nguoidung', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nguoidung'), ['controller' => 'Nguoidung', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loainguoidung view large-9 medium-8 columns content">
    <h3><?= h($loainguoidung->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($loainguoidung->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($loainguoidung->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Nguoidung') ?></h4>
        <?php if (!empty($loainguoidung->nguoidung)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Birthday') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Loainguoidung Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($loainguoidung->nguoidung as $nguoidung): ?>
            <tr>
                <td><?= h($nguoidung->id) ?></td>
                <td><?= h($nguoidung->name) ?></td>
                <td><?= h($nguoidung->email) ?></td>
                <td><?= h($nguoidung->password) ?></td>
                <td><?= h($nguoidung->birthday) ?></td>
                <td><?= h($nguoidung->phone) ?></td>
                <td><?= h($nguoidung->address) ?></td>
                <td><?= h($nguoidung->loainguoidung_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Nguoidung', 'action' => 'view', $nguoidung->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Nguoidung', 'action' => 'edit', $nguoidung->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Nguoidung', 'action' => 'delete', $nguoidung->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nguoidung->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loaibantin $loaibantin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Loaibantin'), ['action' => 'edit', $loaibantin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Loaibantin'), ['action' => 'delete', $loaibantin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loaibantin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loaibantin'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loaibantin'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bantin'), ['controller' => 'Bantin', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bantin'), ['controller' => 'Bantin', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loaibantin view large-9 medium-8 columns content">
    <h3><?= h($loaibantin->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($loaibantin->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($loaibantin->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($loaibantin->status) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bantin') ?></h4>
        <?php if (!empty($loaibantin->bantin)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Insert Time') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Loaibantin Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($loaibantin->bantin as $bantin): ?>
            <tr>
                <td><?= h($bantin->id) ?></td>
                <td><?= h($bantin->name) ?></td>
                <td><?= h($bantin->content) ?></td>
                <td><?= h($bantin->insert_time) ?></td>
                <td><?= h($bantin->status) ?></td>
                <td><?= h($bantin->loaibantin_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bantin', 'action' => 'view', $bantin->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bantin', 'action' => 'edit', $bantin->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bantin', 'action' => 'delete', $bantin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bantin->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

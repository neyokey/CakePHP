<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Monan $monan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Monan'), ['action' => 'edit', $monan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Monan'), ['action' => 'delete', $monan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Monan'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loaimonan'), ['controller' => 'Loaimonan', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loaimonan'), ['controller' => 'Loaimonan', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="monan view large-9 medium-8 columns content">
    <h3><?= h($monan->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($monan->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Detail') ?></th>
            <td><?= h($monan->detail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($monan->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Loaimonan') ?></th>
            <td><?= $monan->has('loaimonan') ? $this->Html->link($monan->loaimonan->name, ['controller' => 'Loaimonan', 'action' => 'view', $monan->loaimonan->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($monan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($monan->price) ?></td>
        </tr>
    </table>
</div>

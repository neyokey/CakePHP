<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chitietdonhang $chitietdonhang
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chitietdonhang'), ['action' => 'edit', $chitietdonhang->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chitietdonhang'), ['action' => 'delete', $chitietdonhang->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chitietdonhang->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chitietdonhang'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chitietdonhang'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monan'), ['controller' => 'Monan', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monan'), ['controller' => 'Monan', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Donhang'), ['controller' => 'Donhang', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Donhang'), ['controller' => 'Donhang', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chitietdonhang view large-9 medium-8 columns content">
    <h3><?= h($chitietdonhang->id_donhang) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Donhang') ?></th>
            <td><?= $chitietdonhang->has('donhang') ? $this->Html->link($chitietdonhang->donhang->id, ['controller' => 'Donhang', 'action' => 'view', $chitietdonhang->donhang->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monan') ?></th>
            <td><?= $chitietdonhang->has('monan') ? $this->Html->link($chitietdonhang->monan->name, ['controller' => 'Monan', 'action' => 'view', $chitietdonhang->monan->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chitietdonhang->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($chitietdonhang->amount) ?></td>
        </tr>
    </table>
</div>

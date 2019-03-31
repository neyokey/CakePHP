<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Submenu $submenu
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Submenu'), ['action' => 'edit', $submenu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Submenu'), ['action' => 'delete', $submenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $submenu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Submenu'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Submenu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu'), ['controller' => 'Menu', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menu', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="submenu view large-9 medium-8 columns content">
    <h3><?= h($submenu->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($submenu->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($submenu->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menu') ?></th>
            <td><?= $submenu->has('menu') ? $this->Html->link($submenu->menu->name, ['controller' => 'Menu', 'action' => 'view', $submenu->menu->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($submenu->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $this->Number->format($submenu->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($submenu->status) ?></td>
        </tr>
    </table>
</div>

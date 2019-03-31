<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lienhe $lienhe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lienhe'), ['action' => 'edit', $lienhe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lienhe'), ['action' => 'delete', $lienhe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lienhe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lienhe'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lienhe'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lienhe view large-9 medium-8 columns content">
    <h3><?= h($lienhe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($lienhe->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($lienhe->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lienhe->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $this->Number->format($lienhe->phone) ?></td>
        </tr>
    </table>
</div>

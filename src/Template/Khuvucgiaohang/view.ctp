<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Khuvucgiaohang $khuvucgiaohang
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Khuvucgiaohang'), ['action' => 'edit', $khuvucgiaohang->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Khuvucgiaohang'), ['action' => 'delete', $khuvucgiaohang->id], ['confirm' => __('Are you sure you want to delete # {0}?', $khuvucgiaohang->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Khuvucgiaohang'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Khuvucgiaohang'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="khuvucgiaohang view large-9 medium-8 columns content">
    <h3><?= h($khuvucgiaohang->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($khuvucgiaohang->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($khuvucgiaohang->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($khuvucgiaohang->status) ?></td>
        </tr>
    </table>
</div>

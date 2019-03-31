<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loaimonan $loaimonan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Loaimonan'), ['action' => 'edit', $loaimonan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Loaimonan'), ['action' => 'delete', $loaimonan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loaimonan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loaimonan'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loaimonan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monan'), ['controller' => 'Monan', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monan'), ['controller' => 'Monan', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loaimonan view large-9 medium-8 columns content">
    <h3><?= h($loaimonan->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($loaimonan->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($loaimonan->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Monan') ?></h4>
        <?php if (!empty($loaimonan->monan)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Detail') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Loaimonan Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($loaimonan->monan as $monan): ?>
            <tr>
                <td><?= h($monan->id) ?></td>
                <td><?= h($monan->name) ?></td>
                <td><?= h($monan->price) ?></td>
                <td><?= h($monan->detail) ?></td>
                <td><?= h($monan->image) ?></td>
                <td><?= h($monan->loaimonan_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Monan', 'action' => 'view', $monan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Monan', 'action' => 'edit', $monan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Monan', 'action' => 'delete', $monan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monan->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chitietdonhang $chitietdonhang
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Chitietdonhang'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Monan'), ['controller' => 'Monan', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monan'), ['controller' => 'Monan', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Donhang'), ['controller' => 'Donhang', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Donhang'), ['controller' => 'Donhang', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chitietdonhang form large-9 medium-8 columns content">
    <?= $this->Form->create($chitietdonhang) ?>
    <fieldset>
        <legend><?= __('Add Chitietdonhang') ?></legend>
        <?php
            echo $this->Form->control('donhang_id', ['options' => $donhang]);
            echo $this->Form->control('monan_id', ['options' => $monan]);
            echo $this->Form->control('amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

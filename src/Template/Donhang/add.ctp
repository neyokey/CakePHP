<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Donhang $donhang
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Donhang'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="donhang form large-9 medium-8 columns content">
    <?= $this->Form->create($donhang) ?>
    <fieldset>
        <legend><?= __('Add Donhang') ?></legend>
        <?php
            echo $this->Form->control('price');
            echo $this->Form->control('insert_time');
            echo $this->Form->control('id_nguoidung');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

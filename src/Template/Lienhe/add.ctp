<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lienhe $lienhe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lienhe'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="lienhe form large-9 medium-8 columns content">
    <?= $this->Form->create($lienhe) ?>
    <fieldset>
        <legend><?= __('Add Lienhe') ?></legend>
        <?php
            echo $this->Form->control('address');
            echo $this->Form->control('phone');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Danhmuc $danhmuc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $danhmuc->id_danhmuc],
                ['confirm' => __('Are you sure you want to delete # {0}?', $danhmuc->id_danhmuc)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Danhmuc'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="danhmuc form large-9 medium-8 columns content">
    <?= $this->Form->create($danhmuc) ?>
    <fieldset>
        <legend><?= __('Edit Danhmuc') ?></legend>
        <?php
            echo $this->Form->control('ten_danhmuc');
            echo $this->Form->control('thu_tu');
            echo $this->Form->control('an_hien');
            echo $this->Form->select('parent_id',$dmuc);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

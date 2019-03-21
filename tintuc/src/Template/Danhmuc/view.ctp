<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Danhmuc $danhmuc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Danhmuc'), ['action' => 'edit', $danhmuc->id_danhmuc]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Danhmuc'), ['action' => 'delete', $danhmuc->id_danhmuc], ['confirm' => __('Are you sure you want to delete # {0}?', $danhmuc->id_danhmuc)]) ?> </li>
        <li><?= $this->Html->link(__('List Danhmuc'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Danhmuc'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="danhmuc view large-9 medium-8 columns content">
    <h3><?= h($danhmuc->id_danhmuc) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ten Danhmuc') ?></th>
            <td><?= h($danhmuc->ten_danhmuc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Danhmuc') ?></th>
            <td><?= $danhmuc->has('parent_danhmuc') ? $this->Html->link($danhmuc->parent_danhmuc->id_danhmuc, ['controller' => 'Danhmuc', 'action' => 'view', $danhmuc->parent_danhmuc->id_danhmuc]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Danhmuc') ?></th>
            <td><?= $this->Number->format($danhmuc->id_danhmuc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thu Tu') ?></th>
            <td><?= $this->Number->format($danhmuc->thu_tu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('An Hien') ?></th>
            <td><?= $this->Number->format($danhmuc->an_hien) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Danhmuc') ?></h4>
        <?php if (!empty($danhmuc->child_danhmuc)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id Danhmuc') ?></th>
                <th scope="col"><?= __('Ten Danhmuc') ?></th>
                <th scope="col"><?= __('Thu Tu') ?></th>
                <th scope="col"><?= __('An Hien') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($danhmuc->child_danhmuc as $childDanhmuc): ?>
            <tr>
                <td><?= h($childDanhmuc->id_danhmuc) ?></td>
                <td><?= h($childDanhmuc->ten_danhmuc) ?></td>
                <td><?= h($childDanhmuc->thu_tu) ?></td>
                <td><?= h($childDanhmuc->an_hien) ?></td>
                <td><?= h($childDanhmuc->parent_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Danhmuc', 'action' => 'view', $childDanhmuc->id_danhmuc]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Danhmuc', 'action' => 'edit', $childDanhmuc->id_danhmuc]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Danhmuc', 'action' => 'delete', $childDanhmuc->id_danhmuc], ['confirm' => __('Are you sure you want to delete # {0}?', $childDanhmuc->id_danhmuc)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

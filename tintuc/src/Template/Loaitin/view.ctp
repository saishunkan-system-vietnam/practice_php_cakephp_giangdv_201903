<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loaitin $loaitin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Loaitin'), ['action' => 'edit', $loaitin->idLT]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Loaitin'), ['action' => 'delete', $loaitin->idLT], ['confirm' => __('Are you sure you want to delete # {0}?', $loaitin->idLT)]) ?> </li>
        <li><?= $this->Html->link(__('List Loaitin'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loaitin'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loaitin view large-9 medium-8 columns content">
    <h3><?= h($loaitin->idLT) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ten') ?></th>
            <td><?= h($loaitin->Ten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ten KhongDau') ?></th>
            <td><?= h($loaitin->Ten_KhongDau) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdLT') ?></th>
            <td><?= $this->Number->format($loaitin->idLT) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ThuTu') ?></th>
            <td><?= $this->Number->format($loaitin->ThuTu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdTL') ?></th>
            <td><?= $this->Number->format($loaitin->idTL) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AnHien') ?></th>
            <td><?= $loaitin->AnHien ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

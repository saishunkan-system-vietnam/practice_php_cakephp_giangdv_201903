<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $binh_luan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $binh_luan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $binh_luan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comment'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comment view large-9 medium-8 columns content">
    <h3><?= h($binh_luan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Hoten') ?></th>
            <td><?= h($binh_luan->hoten) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($binh_luan->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($binh_luan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdTin') ?></th>
            <td><?= $this->Number->format($binh_luan->idTin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thuộc bài viết') ?></th>
            <?php if(!empty($binh_luan)){ ?>
            <td><?= h($binh_luan->tieu_de) ?></td>
            <?php
            }
            ?>
            
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Noidung') ?></h4>
        <?= $this->Text->autoParagraph(h($binh_luan->noidung)); ?>
    </div>
</div>

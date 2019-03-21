<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Danhmuc[]|\Cake\Collection\CollectionInterface $danhmuc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Danhmuc'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="danhmuc index large-9 medium-8 columns content">
    <h3><?= __('Danhmuc') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_danhmuc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ten_danhmuc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('thu_tu') ?></th>
                <th scope="col"><?= $this->Paginator->sort('an_hien') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <tr>
                <?= $this->Form->create('inputData') ?>
                    <fieldset>
                    <td><?= $this->Form->control('id_danhmuc');?></td>
                    <td><?= $this->Form->control('ten_danhmuc');?></td>
                    <td><?= $this->Form->control('thu_tu');?></td>
                    <td><?= $this->Form->control('an_hien');?></td>
                    <td><?= $this->Form->control('ten_danhmuc_cha');?></td>
                    
<!--                <td><input type="search" name ="ten_danhmuc" /></td>
                    <td><input type="search" name ="thu_tu" /></td>
                    <td><input type="search" name ="an_hien" /></td>
                    <td><input type="search" name ="ten_danhmuc_cha"/></td>-->
                    <!--<td><input type="submit" value="Tìm kiếm" /></td>-->
                
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
                <fieldset>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($danh_muc as $dmuc): ?>
            <tr>
                <td><?= $this->Number->format($dmuc->id_danhmuc) ?></td>
                <td><?= h($dmuc->ten_danhmuc) ?></td>
                <td><?= $this->Number->format($dmuc->thu_tu) ?></td>
                <?php
                    if($dmuc->an_hien == 0){
                        echo '<td>';
                        echo 'ẩn';
                        echo '</td>';
                ?>
                <?php
                    }else{
                        echo '<td>';
                        echo 'hiện';
                        echo '</td>';
                    }
                ?>
                
                <td><?= $dmuc->ten_danhmuc_cha ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dmuc->id_danhmuc]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dmuc->id_danhmuc]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dmuc->id_danhmuc], ['confirm' => __('Are you sure you want to delete # {0}?', $dmuc->id_danhmuc)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php
   
                    //showCategories($categories);
            ?>
        </tbody>
    </table>
   
</div>

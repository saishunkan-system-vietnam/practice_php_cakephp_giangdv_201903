<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment[]|\Cake\Collection\CollectionInterface $comment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Danhmuc'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="danhmuc index large-9 medium-8 columns content">
    <h3><?= __('Danh sách bình luận') ?></h3>
    <table border="1">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Tóm tắt</th>
                <th>Họ tên</th>
                <th>Nội dung</th>
                <th>Duyệt bình luận</th>
            </tr>
            <tr>
                <?= $this->Form->create(null,['type'=>'get', 'valueSources' => 'query']) ?>
                    <fieldset>
                    <td><?= $this->Form->control('tieu de');?></td>
                    <td><?= $this->Form->control('tom_tat');?></td>
                    <td><?= $this->Form->control('ho_ten');?></td>
                    <td><?= $this->Form->control('noi_dung');?></td>
                    <td>
                        <?php
                            $option = array(1 => 'Hiện', 0 => 'Ẩn');
                        ?>
                        <?= $this->Form->control('trang_thai', [
                            'type'=>'select',
                            'multiple'=>'checkbox', 
                            'options'=> $option,
                            ])?>
                    </td>
                    

                <?= $this->Form->button(__('Tìm kiếm')) ?>
                <?= $this->Form->end() ?>
                <fieldset>
            </tr>
        </thead>
        <tbody>
            <?= $this->Form->create(null,['type'=>'post']) ?>
            <?php foreach ($bai_v as $bv) : ?>
                <?php $fisrtRow = true; 
                      $rowsSpan = $bv->Comments->count(); ?>
                <?php foreach ($bv->Comments as $cm) : 
                    ?>
                <tr>
                    <?php if($fisrtRow) { ?>
                    
                    <td rowspan="<?= $rowsSpan ?>"><?= $bv->TieuDe?></td>
                    <td rowspan="<?= $rowsSpan ?>"><?= $bv->TomTat?></td>
                    <?php } ?>
                    <?php $fisrtRow = false; ?>
                    
                    <td><?= $cm->hoten ?></td>
                    <td><?= $cm->noidung ?></td>
                    <td>
                        <?php if($cm->an_hien == 1){
                            echo 'Đã duyệt';
                        }else{?>
                        <?php echo $this->Form->checkbox("anhien[$cm->id]", ['hiddenField' => false, 'value' => $cm->id]); ?>
                        <?php } ?>
                    </td>
                    
                    
                </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
            
            <td colspan="5" style="text-align: right">
                <?= $this->Form->button(__('Cập nhật')) ?>
            </td>
                    
            <?= $this->Form->end() ?>
        </tbody>
        
        </tbody>
    </table>
</div>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->


</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <?php echo $this->element('navbar-left/navbar'); ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

    <?php echo $this->element('navbar-top/navbar-top'); ?>

      <div class="container-fluid">
      <h3><?= __('Danh sách tin') ?></h3>
      <table cellpadding="0" cellspacing="0">
        <thead>
        <tr style="border-bottom:none">
            <td><?= $this->Html->link(__('Thêm'), ['action' => 'add'],array('class' => 'btn btn-primary')) ?></td>
<!--            <td>
                <form action="/Tin" method="get">
                    <input type="search" name ="TieuDe" />
                    <input type="submit" value="Tìm kiếm" />
                </form>
            </td>-->
        </tr>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('TieuDe', array('label'=>'Tiêu đề')) ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('TomTat', array('label'=>'Tóm tắt')) ?></th>

                <th scope="col"><?= $this->Paginator->sort('SoLanXem', array('label'=>'Số lần xem')) ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('user_name', array('label'=>'Tác giả')) ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('AnHien', array('label'=>'Ẩn hiện')) ?></th>
                <th scope="col" class="actions"><?= __('Thao tác') ?></th>
            </tr>
            <tr>
                <?= $this->Form->create(null,['type'=>'get', 'valueSources' => 'query']) ?>
                <fieldset>
                <td><?= $this->Form->control('TieuDe');?></td>
                <td><?= $this->Form->control('TomTat');?></td>
                <td>
                <?= $this->Form->control('so_lan',['placeholder'=>'Từ']);?>
                <?= $this->Form->control('den_lan',['placeholder'=>'Đến']);?>
                </td>
                <td><?= $this->Form->control('TacGia');?></td>
                <td>
                <?php
                            $option = array(1 => 'Hiện', 0 => 'Ẩn');
                        ?>
                        <?= $this->Form->control('AnHien', [
                            'type'=>'select',
                            'multiple'=>'checkbox', 
                            'options'=> $option,
                            ])?>
                </td>
                <td><?= $this->Form->button(__('Tìm kiếm')) ?></td>
                
                <?= $this->Form->end() ?>
                <fieldset>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tin as $t): ?>
            <tr>
                
                <td><?= h($t->TieuDe) ?></td>
                
                <td><?= h($t->TomTat) ?></td>

                <td><?= h($t->SoLanXem) ?></td>
                
                <td><?= h($t->user_name) ?></td>
                
                 <?php
                    if($t->AnHien == 0){
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
                <td class="actions">
                    <?= $this->Html->link(__('Xem chi tiết'), ['action' => 'view', $t->idTin]) ?>
                    <?= $this->Html->link(__('Sửa tin'), ['action' => 'edit', $t->idTin]) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $t->idTin], ['confirm' => __('Are you sure you want to delete # {0}?', $t->idTin)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>

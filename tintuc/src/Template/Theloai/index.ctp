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
      <h3><?= __('Thể loại') ?></h3>
      <table cellpadding="0" cellspacing="0">
        <thead>
            <tr style="border-bottom: none">
                <td><?= $this->Html->link(__('Thêm thể loại'), ['action' => 'add'],array('class' => 'btn btn-primary')) ?></td>
            </tr>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ThuTu', array('label'=>'Thứ tự')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('TenTL', array('label'=>'Tên thể loại')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('TenTL_KhongDau', array('label'=>'Tên thể loại không dấu')) ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('AnHien', array('label'=>'Ẩn hiện')) ?></th>
                <th scope="col" class="actions"><?= __('Thao tác') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($theloai as $theloai): ?>
            <tr>
                <td><?= $this->Number->format($theloai->ThuTu) ?></td>
                <td><?= h($theloai->TenTL) ?></td>
                <td><?= h($theloai->TenTL_KhongDau) ?></td>
                
                <td><?= h($theloai->AnHien) ?></td>
                <td class="actions">
                    
                    <?= $this->Html->link(__('Xem chi tiết'), ['action' => 'view', $theloai->idTL],array('class' => 'btn btn-primary')) ?>
                    <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $theloai->idTL],array('class' => 'btn btn-warning')) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $theloai->idTL],array('class' => 'btn btn-danger'), ['confirm' => __('Are you sure you want to delete # {0}?', $theloai->idTL)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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

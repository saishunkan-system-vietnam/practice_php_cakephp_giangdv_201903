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
        <h3><?= h($theloai->idTL) ?></h3>
            <?= __('Thao tác') ?>
            <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $theloai->idTL],array('class'=>'btn btn-outline-warning')) ?>
            <?= $this->Form->postLink(__('Xóa'), [
                'action' => 'delete', $theloai->idTL
                ],array('class'=>'btn btn-outline-danger'), [
                    'confirm' => __('Are you sure you want to delete # {0}?', $theloai->idTL)
                ]) ?>
            <?= $this->Html->link(__('Danh sách'), ['action' => 'index'],array('class'=>'btn btn-outline-primary')) ?>
            <?= $this->Html->link(__('Tạo mới'), ['action' => 'add'],array('class'=>'btn btn-outline-primary')) ?>
        <table class="vertical-table">
            <tr>
                <th scope="row"><?= __('Tên thể loại') ?></th>
                <td><?= h($theloai->TenTL) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Tên thể loại không dấu') ?></th>
                <td><?= h($theloai->TenTL_KhongDau) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('id') ?></th>
                <td><?= $this->Number->format($theloai->idTL) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Thứ tự') ?></th>
                <td><?= $this->Number->format($theloai->ThuTu) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Ẩn hiện') ?></th>
                <td><?= $theloai->AnHien ? __('Yes') : __('No'); ?></td>
            </tr>
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

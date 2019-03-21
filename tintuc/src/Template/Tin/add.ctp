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
        <?= $this->Form->create($tin) ?>
        <fieldset>
            <legend><?= __('Thêm bài viết') ?></legend>
            <?php
                echo $this->Form->control('TieuDe', array('label'=>'Tiêu đề'));
                echo $this->Form->control('TieuDe_KhongDau', array('label'=>'Tiêu đề không dấu'));
                echo $this->Form->control('TomTat', array('label'=>'Tóm tắt'));
                echo $this->Form->control('urlHinh', array('label'=>'Hình ảnh'));
                echo $this->Form->control('Ngay', array('label'=>'Ngày đăng bài'), ['empty' => true]);
                echo $this->Form->select('idUser', array('label'=>'id User'));
                echo $this->Form->control('Content', array('label'=>'Nội dung bài viết'));
                echo $this->Form->control('idLT', array('label'=>'id loại tin'));
                echo $this->Form->control('idTL', array('label'=>'id thể loại'));
                echo $this->Form->control('SoLanXem', array('label'=>'Số lần xem'));
                echo $this->Form->control('TinNoiBat', array('label'=>'Tin nổi bật'));
                echo $this->Form->control('AnHien', array('label'=>'Ẩn hiện'));
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
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
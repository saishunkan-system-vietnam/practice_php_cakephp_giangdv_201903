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
            <?= $this->Form->create($loaitin) ?>
            <fieldset>
                <legend><?= __('Thêm loại tin') ?></legend>
                <?php
                    echo $this->Form->control('Ten', array('label'=>'Tên thể loại'));
                    echo $this->Form->control('Ten_KhongDau', array('label'=>'Tên không dấu'));
                    echo $this->Form->control('ThuTu', array('label'=>'Thứ tự'));
                    echo $this->Form->control('AnHien', array('label'=>'Tên ẩn hiện'));
                    echo $this->Form->control('idTL', array('label'=>'id thể loại'));
                ?>
            </fieldset>
            <?= $this->Form->button(__('Thêm')) ?>
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

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
        <?= $this->Form->create($theloai) ?>
            <fieldset>
                <legend><?= __('Thêm thể loại tin') ?></legend>
                <?php
                    echo $this->form->label('Tên thể loại');
                    echo $this->Form->control('TenTL', array('label'=>false));
                    echo $this->form->label('Tên thể loại không dấu');
                    echo $this->Form->control('TenTL_KhongDau',array('label'=>false));
                    echo $this->form->label('thứ tự');
                    echo $this->Form->control('ThuTu',array('label'=>false));
                    echo $this->Form->control('AnHien');
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

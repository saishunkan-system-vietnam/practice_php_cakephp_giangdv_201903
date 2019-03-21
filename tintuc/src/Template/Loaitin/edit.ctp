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
            <legend><?= __('Sửa loại tin') ?></legend>
            <?php
                echo $this->Form->control('Ten',array('label'=>'Tên loại tin'));
                echo $this->Form->control('Ten_KhongDau',array('label'=>'Tên không dấu'));
                echo $this->Form->control('ThuTu', array('label'=>'Thứ tự'));
                echo $this->Form->control('idTL',array('label'=>'id thể loại'));
            ?>
        </fieldset>
        <?= $this->Form->button(__('cập nhật')) ?>
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




<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loaitin $loaitin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $loaitin->idLT],
                ['confirm' => __('Are you sure you want to delete # {0}?', $loaitin->idLT)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Loaitin'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="loaitin form large-9 medium-8 columns content">
    <?= $this->Form->create($loaitin) ?>
    <fieldset>
        <legend><?= __('Edit Loaitin') ?></legend>
        <?php
            echo $this->Form->control('Ten');
            echo $this->Form->control('Ten_KhongDau');
            echo $this->Form->control('ThuTu');
            echo $this->Form->control('AnHien');
            echo $this->Form->control('idTL');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

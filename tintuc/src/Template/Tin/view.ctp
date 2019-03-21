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
      <h3><?= h($tin->idTin) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('TieuDe') ?></th>
            <td><?= h($tin->TieuDe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TieuDe KhongDau') ?></th>
            <td><?= h($tin->TieuDe_KhongDau) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TomTat') ?></th>
            <td><?= h($tin->TomTat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UrlHinh') ?></th>
            <td><?= h($tin->urlHinh) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdTin') ?></th>
            <td><?= $this->Number->format($tin->idTin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdUser') ?></th>
            <td><?= $this->Number->format($tin->idUser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdLT') ?></th>
            <td><?= $this->Number->format($tin->idLT) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdTL') ?></th>
            <td><?= $this->Number->format($tin->idTL) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SoLanXem') ?></th>
            <td><?= $this->Number->format($tin->SoLanXem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ngay') ?></th>
            <td><?= h($tin->Ngay) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TinNoiBat') ?></th>
            <td><?= $tin->TinNoiBat ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AnHien') ?></th>
            <td><?= $tin->AnHien ? __('Yes') : __('No'); ?></td>
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

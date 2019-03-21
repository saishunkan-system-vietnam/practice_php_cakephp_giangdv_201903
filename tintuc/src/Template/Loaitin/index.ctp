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
      <h3><?= __('Loại Tin') ?></h3>
      <table cellpadding="0" cellspacing="0">
        <thead>
            <tr style="border-bottom:none">
                <td><?= $this->Html->link(__('Thêm loại tin'), ['action' => 'add'],array('class' => 'btn btn-primary')) ?></td>
            </tr>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('Ten', array('label'=>'Tên thể loại')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('Ten_KhongDau', array('label'=>'Tên không dấu')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('AnHien', array('label'=>'Ẩn hiện')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('idTL', array('label'=>'id thể loại')) ?></th>
                <th scope="col" class="actions"><?= __('Thao tác') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loaitin as $loaitin): ?>
            <tr>
                
                <td><?= h($loaitin->Ten) ?></td>
                <td><?= h($loaitin->Ten_KhongDau) ?></td>
                <td><?= h($loaitin->AnHien) ?></td>
                <td><?= $this->Number->format($loaitin->idTL) ?></td>
                <td class="actions">
                    
                    <?= $this->Html->link(__('Sửa'), ['action' => 'edit', $loaitin->idLT]) ?>
                    <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $loaitin->idLT], ['confirm' => __('Are you sure you want to delete # {0}?', $loaitin->idLT)]) ?>
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

<div class="sidebar-heading">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <a href="/theloai" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <?= $this->Html->link(__('Thể loại'), ['controller'=>'Theloai','action' => 'index'],array('class'=>'list-group-item list-group-item-action bg-light')) ?>
        <?= $this->Html->link(__('Loại tin'), ['controller'=>'Loaitin','action' => 'index'],array('class'=>'list-group-item list-group-item-action bg-light')) ?>
        <?= $this->Html->link(__('Tin'), ['controller'=>'Tin','action' => 'index'],array('class'=>'list-group-item list-group-item-action bg-light')) ?>
        <?= $this->Html->link(__('Quảng cáo'), ['controller'=>'Quangcao','action' => 'index'],array('class'=>'list-group-item list-group-item-action bg-light')) ?>
        <?= $this->Html->link(__('Sự kiện'), ['controller'=>'Sukien','action' => 'index'],array('class'=>'list-group-item list-group-item-action bg-light')) ?>
      </div>
</div>
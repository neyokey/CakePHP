<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Career[]|\Cake\Collection\CollectionInterface $careers
 */
?>
<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?php echo $this->Url->build('/admin/', true);?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="" title="Người dùng" class="current"> Người dùng</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/nguoidung')?>">
        <div class="widget-box">
          <div class="widget-content nopadding">
                <?php
                    echo $this->Form->select('loainguoidung_id', $loainguoidung,['class' => "input_search", 'empty' => 'Loại người dùng']);
                ?>
                <input class="input_search" type="text" name="info" value="" placeholder="Id, Email, SĐT hoặc Địa Chỉ">
                <a href="" class="btn btn-danger pull-right input_search"><i class="icon-ban-circle"></i> Xóa điều kiện </a>              
                <button onclick='submit_url("form_submit","{{url('admin/transaction')}}","get");' class="btn btn-success pull-right input_search"><i class="icon-save"></i> Xem DS </button>
                <div style="clear: both;"></div>
            </div>
          </div>
      </form>
    </div>
    
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/nguoidung/deletes')?>">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-content nopadding">
              <ul class="recent-posts">
                <li>
                  <?= $this->Flash->render() ?>
                  <a id='1' href="<?=$this->Url->build('/nguoidung/add')?>" class="btn btn-success btn-mini">Thêm mới</a>
                </li>
              </ul>
            </div>
            <!--div class="widget-title">             
              <h5>Static table with checkboxes</h5>
            </div-->
            <div class="widget-content nopadding">
              <table class="table table-bordered table-striped with-check">
                <thead>
                  <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name','Tên') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email','Email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('birthday','Ngày sinh') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('phone','Số điện thoại') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('address','Địa chỉ') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('point','Điểm') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('loainguoidung.name','Loại người dùng') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($nguoidung as $nguoidung): ?>
                   <tr>
                    <td><?= h($nguoidung->id) ?></td>
                    <td><?= h($nguoidung->name) ?></td>
                    <td><?= h($nguoidung->email) ?></td>
                    <td><?= h($nguoidung->birthday) ?></td>
                    <td><?= h($nguoidung->phone) ?></td>
                    <td><?= h($nguoidung->address) ?></td>
                    <td><?= h($nguoidung->point) ?></td>
                    <td><?= h($nguoidung->loainguoidung->name) ?></td>
                    <td>
                      <?php 
                        if($nguoidung->status == 0)
                          echo "Chưa kích hoạt";
                        else
                          echo "Kích hoạt";
                      ?>
                    </td>
                    <td class="center">
                      <?= $this->Html->link(__('Xem đơn hàng'), ['controller' => 'donhang','action' => 'index',1,'?' =>['id_kind' => 'nguoidung','id' => $nguoidung->id]], ['class' => 'btn btn-success btn-mini'])?>
                      <?= $this->Html->link(__('<i class="icon icon-pencil"></i>'), ['action' => 'edit', $nguoidung->id], ['class' => 'btn btn-primary btn-mini','escape' => false]) ?>
                      <?php if($nguoidung->status == 1) 
                        echo $this->Html->link(__('X'), ['action' => 'delete', $nguoidung->id], ['class' => 'btn btn-danger btn-mini']);
                      ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <?php echo $this->element('paginator'); ?>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!--end-main-container-part-->
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
      <a href="" title="Bản tin" class="current"> Bản tin</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/bantin')?>">
        <div class="widget-box">
          <div class="widget-content nopadding">
                <?php
                    echo $this->Form->select('loaibantin_id', $loaibantin,['class' => "input_search", 'empty' => 'Loại bản tin']);
                ?>
                <input class="input_search" type="text" name="info" value="" placeholder="Id hoặc Tên ">
                <a href="" class="btn btn-danger pull-right input_search"><i class="icon-ban-circle"></i> Xóa điều kiện </a>              
                <button onclick='submit_url("form_submit","{{url('admin/transaction')}}","get");' class="btn btn-success pull-right input_search"><i class="icon-save"></i> Xem DS </button>
                <div style="clear: both;"></div>
            </div>
          </div>
      </form>
    </div>
    
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/bantin/deletes')?>">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-content nopadding">
              <ul class="recent-posts"> 
                <li>
                    <?= $this->Flash->render() ?>
                    <a href="<?=$this->Url->build('/bantin/add')?>" class="btn btn-success btn-mini">Thêm mới</a>
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
                    <th scope="col"><?= $this->Paginator->sort('insert_time','Thời gian nhập') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('loaibantin_id','Loại bản tin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('nguoidung_id','Người nhập') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($bantin as $bantin): ?>
                   <tr>
                    <td><?= h($bantin->id) ?></td>
                    <td><?= h($bantin->name) ?></td>
                    <td><?= h($bantin->insert_time) ?></td>  
                    <td><?= h($bantin->loaibantin['name']) ?></td>
                    <td><?= h($bantin->nguoidung['name']) ?></td>
                    <td><?php 
                          if($bantin->status == 0)
                            echo "Chưa kích hoạt";
                          else
                            echo "Kích hoạt";
                        ?>
                    </td>
                    <td class="center">
                      <?= $this->Html->link(__('Xem'), ['action' => 'view', $bantin->id], ['class' => 'btn btn-success btn-mini']) ?>
                      <?= $this->Html->link(__('<i class="icon icon-pencil"></i>'), ['action' => 'edit', $bantin->id], ['class' => 'btn btn-primary btn-mini','escape' => false]) ?>
                      <?php if($type == 1 || $type == 2) 
                        echo $this->Html->link(__('X'), ['action' => 'delete', $bantin->id], ['class' => 'btn btn-danger btn-mini']);
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


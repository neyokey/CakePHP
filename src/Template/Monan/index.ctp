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
      <a href="" title="Món ăn" class="current"> Món ăn</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/monan')?>">
        <div class="widget-box">
          <div class="widget-content nopadding">
                <?php
                    echo $this->Form->select('loaimonan_id', $loaimonan,['class' => "input_search", 'empty' => 'Loại món ăn']);
                ?>
                <input class="input_search" type="text" name="info" value="" placeholder="Id, Tên hoặc giá">
                <a href="" class="btn btn-danger pull-right input_search"><i class="icon-ban-circle"></i> Xóa điều kiện </a>              
                <button onclick='submit_url("form_submit","{{url('admin/transaction')}}","get");' class="btn btn-success pull-right input_search"><i class="icon-save"></i> Xem DS </button>
                <div style="clear: both;"></div>
            </div>
          </div>
      </form>
    </div>
    
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/monan/deletes')?>">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-content nopadding">
              <ul class="recent-posts"> 
                <li>
                  <?= $this->Flash->render() ?>
                  <a href="<?=$this->Url->build('/monan/add')?>" class="btn btn-success btn-mini">Thêm mới</a>
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
                    <th scope="col"><?= $this->Paginator->sort('price','Giá') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('detail','Chi tiết') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('image','Hình ảnh') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('loaimonan_id','Loại') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($monan as $monan): ?>
                   <tr>
                    <td><?= h($monan->id) ?></td>
                    <td><?= h($monan->name) ?></td>
                    <td><?= h($this->Dot->dot($monan->price)) ?>
                    <td><?= h($monan->detail) ?></td>
                    <td><img src="<?= h($monan->image); ?>" width="50"></td>
                    <td><?= h($monan->loaimonan->name) ?></td>
                    <td>
                      <?php 
                        if($monan->status == 0)
                          echo "Chưa kích hoạt";
                        else
                          echo "Kích hoạt";
                      ?>
                    </td>
                    <td class="center">
                      <?= $this->Html->link(__('<i class="icon icon-pencil"></i>'), ['action' => 'edit', $monan->id], ['class' => 'btn btn-primary btn-mini','escape' => false]) ?>
                      <?php if($monan->status == 1) 
                        echo $this->Html->link(__('X'), ['action' => 'delete', $monan->id], ['class' => 'btn btn-danger btn-mini']);
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
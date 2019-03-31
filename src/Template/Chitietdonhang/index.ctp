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
      <a href="<?php echo $this->Url->build('/donhang', true);?>" title="Đơn hàng" class="current"> Đơn hàng</a>
      <a href="" title="Chi tiết đơn hàng" class="current"> Chi tiết đơn hàng</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
    </div>
    
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/chitietdonhang/deletes')?>">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-content nopadding">
              <ul class="recent-posts"> 
                <li>
                  <?= $this->Flash->render() ?>
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
                    <th scope="col"><?= $this->Paginator->sort('donhang_id','ID đơn hàng') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('monan_id','Tên món ăn') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('quantity','Số lượng') ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if($chitietdonhang != null)
                  foreach ($chitietdonhang as $chitietdonhang): ?>
                   <tr>
                    <td><?= h($chitietdonhang->id) ?></td>
                    <td><?= h($chitietdonhang->donhang_id) ?></td>
                    <td><?= h($chitietdonhang->Monan['name']) ?></td> 
                    <td><?= h($chitietdonhang->quantity) ?></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <?php echo $this->element('paginator'); ?>
            </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!--end-main-container-part-->


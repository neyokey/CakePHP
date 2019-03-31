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
      <a href="" title="Liên hệ" class="current"> Liên hệ</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
    </div>
    
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/loainguoidung/deletes')?>">
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
                    <th>Thương hiệu</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Kinh tuyến</th>
                    <th>Vĩ tuyến</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($lienhe as $lienhe): ?>
                   <tr>
                    <td><?= h($lienhe->brand_name) ?></td>
                    <td><?= h($lienhe->address) ?></td>
                    <td><?= h($lienhe->phone) ?></td>
                    <td><?= h($lienhe->email) ?></td>  
                    <td><?= h($lienhe->X) ?></td>
                    <td><?= h($lienhe->Y) ?></td>
                    <td class="center">
                      <?= $this->Html->link(__('<i class="icon icon-pencil"></i>'), ['action' => 'edit', $lienhe->id], ['class' => 'btn btn-primary btn-mini','escape' => false]) ?>                   
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!--end-main-container-part-->


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
      <a href="" title="Loại bản tin" class="current"> Banner</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
    </div>
    
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/banner/deletes')?>">
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
                    <th scope="col"><?= $this->Paginator->sort('name','Tên') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('image',"Hình ảnh") ?></th>
                    <th scope="col"><?= $this->Paginator->sort('position','Vị trí') ?></th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($banner as $banner): ?>
                   <tr>
                    <td><?= h($banner->id) ?></td>
                    <td><?= h($banner->name) ?></td>
                    <td><img src="<?= h($banner->image); ?>" width="50"></td>
                    <td><?= h($banner->position) ?></td>
                    <td class="center">
                      <?= $this->Html->link(__('<i class="icon icon-pencil"></i>'), ['action' => 'edit', $banner->id], ['class' => 'btn btn-primary btn-mini','escape' => false]) ?>
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


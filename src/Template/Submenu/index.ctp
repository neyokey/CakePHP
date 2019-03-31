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
      <a href="<?php echo $this->Url->build('/menu', true);?>" > Menu</a>
      <a href="" class="current"> Submenu</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
    </div>
    
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/submenu/deletes')?>">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-content nopadding">
              <ul class="recent-posts"> 
                <li>
                  <?= $this->Flash->render() ?>
                  <a href="<?=$this->Url->build('/submenu/add/'.$menu_id)?>" class="btn btn-success btn-mini">Thêm mới</a>
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
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('menu_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($submenu as $submenu): ?>
                   <tr>
                    <td><?= h($submenu->id) ?></td>
                    <td><?= h($submenu->name) ?></td>
                    <td><?= h($submenu->link) ?></td>
                    <td><?= h($submenu->position) ?></td>
                    <td><?= h($submenu->Menu['name'])?></td>
                    <td>
                      <?php 
                        if($submenu->status == 0)
                          echo "Chưa kích hoạt";
                        else
                          echo "Kích hoạt";
                      ?>
                    </td>  
                    <td class="center">
                      <?= $this->Html->link(__('<i class="icon icon-pencil"></i>'), ['action' => 'edit', $submenu->id], ['class' => 'btn btn-primary btn-mini' ,'escape' => false]) ?>
                      <?php
                        if(!($submenu->id == 6))
                        {
                            echo $this->Html->link(__('X'), ['action' => 'delete', $submenu->id], ['class' => 'btn btn-danger btn-mini']);
                        }
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


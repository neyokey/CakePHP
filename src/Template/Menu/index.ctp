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
      <a href="" title="Loại món ăn" class="current"> Menu</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/menu')?>">
        <div class="widget-box">
          <div class="widget-content nopadding">
                <select name="status" class="span2 input_search">
                    <option value="">Trạng thái</option>
                    <option value="1">Kích hoạt</option>
                    <option value="0">Chưa kích hoạt</option>
                </select>
                <a href="" class="btn btn-danger pull-right input_search"><i class="icon-ban-circle"></i> Xóa điều kiện </a>              
                <button onclick='submit_url("form_submit","{{url('admin/transaction')}}","get");' class="btn btn-success pull-right input_search"><i class="icon-save"></i> Xem DS </button>
                <div style="clear: both;"></div>
            </div>
          </div>
      </form>
    </div>
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/menu/deletes')?>">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-content nopadding">
              <ul class="recent-posts"> 
                <li>
                  <?= $this->Flash->render() ?>
                  <a href="<?=$this->Url->build('/menu/add')?>" class="btn btn-success btn-mini">Thêm mới</a>
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
                    <th scope="col"><?= $this->Paginator->sort('link','Đường dẫn') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('position','Vị trí') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($menu as $menu): ?>
                   <tr>
                    <td><?= h($menu->id) ?></td>
                    <td><?= h($menu->name) ?></td>
                    <td><?= h($menu->link) ?></td>
                    <td><?= h($menu->position) ?></td>
                    <td>
                      <?php 
                        if($menu->status == 0)
                          echo "Chưa kích hoạt";
                        else
                          echo "Kích hoạt";
                      ?>
                    </td>  
                    <td class="center">
                      <?php
                        if($menu->status == 1)
                          echo $this->Html->link(__('Submenu'), ['controller' => 'submenu','action' => 'index', $menu->id], ['class' => 'btn btn-success btn-mini']);
                      ?>
                      <?= $this->Html->link(__('<i class="icon icon-pencil"></i>'), ['action' => 'edit', $menu->id], ['class' => 'btn btn-primary btn-mini','escape' => false]) ?>
                      <?php
                        if(!($menu->id == 10 || $menu->id == 11))
                        {
                            echo $this->Html->link(__('X'), ['action' => 'delete', $menu->id], ['class' => 'btn btn-danger btn-mini']);
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


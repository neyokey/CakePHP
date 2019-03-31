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
      <a href="" title="Bản tin" class="current"> Giới thiệu</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/gioithieu')?>">
        <div class="widget-box">
          <div class="widget-content nopadding">
                <select name="page" class="span2 input_search">
                    <option value="">Trang</option>
                    <option value="index">Trang chủ</option>
                    <option value="about">Trang giới thiệu</option>
                </select>
                <input class="input_search" type="text" name="info" value="" placeholder="Id hoặc Tiêu đề">
                <a href="" class="btn btn-danger pull-right input_search"><i class="icon-ban-circle"></i> Xóa điều kiện </a>              
                <button onclick='submit_url("form_submit","{{url('admin/transaction')}}","get");' class="btn btn-success pull-right input_search"><i class="icon-save"></i> Xem DS </button>
                <div style="clear: both;"></div>
            </div>
          </div>
      </form>
    </div>
    
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/gioithieu/deletes')?>">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-content nopadding">
              <ul class="recent-posts"> 
                <li>
                    <?= $this->Flash->render() ?>
                    <a href="<?=$this->Url->build('/gioithieu/add')?>" class="btn btn-success btn-mini">Thêm mới</a>
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
                    <th scope="col"><?= $this->Paginator->sort('title','Tiêu đề') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('page','Trang') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('position','Vị trí') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status','Trạng thái') ?></th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($gioithieu as $gioithieu): ?>
                   <tr>
                    <td><?= h($gioithieu->id) ?></td>
                    <td><?= h($gioithieu->title) ?></td> 
                    <td><?php 
                          if($gioithieu->page == 'index')
                            echo "Trang chủ";
                          else
                            echo "Trang giới thiệu";
                        ?>
                    </td>
                    <td><?= h($gioithieu->position) ?></td>
                    <td><?php 
                          if($gioithieu->status == 0)
                            echo "Chưa kích hoạt";
                          else
                            echo "Kích hoạt";
                        ?>
                    </td>
                    <td class="center">
                      <?= $this->Html->link(__('Xem'), ['action' => 'view', $gioithieu->id], ['class' => 'btn btn-success btn-mini']) ?>
                      <?= $this->Html->link(__('<i class="icon icon-pencil"></i>'), ['action' => 'edit', $gioithieu->id], ['class' => 'btn btn-primary btn-mini','escape' => false]) ?>
                      <?= $this->Html->link(__('X'), ['action' => 'delete', $gioithieu->id], ['class' => 'btn btn-danger btn-mini'], ['confirm' => __('Bạn có muốn xóa công ty # {0}?', $gioithieu->name)]) ?>                    
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


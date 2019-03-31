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
      <a href="" title="Loại người dùng" class="current"> Người giao hàng</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/nguoigiaohang')?>">
        <div class="widget-box">
          <div class="widget-content nopadding">
                <select name="status" class="span2 input_search">
                    <option value="">Trạng thái</option>
                    <option value="0">Chưa kích hoạt</option>
                    <option value="1">Sẵn sàng giao hàng</option>
                    <option value="2">Không có sẵn</option>
                </select>
                <input class="input_search" type="text" name="info" value="" placeholder="Id hoặc tên">
                <a href="" class="btn btn-danger pull-right input_search"><i class="icon-ban-circle"></i> Xóa điều kiện </a>              
                <button onclick='submit_url("form_submit","{{url('admin/transaction')}}","get");' class="btn btn-success pull-right input_search"><i class="icon-save"></i> Xem DS </button>
                <div style="clear: both;"></div>
            </div>
          </div>
      </form>
    </div>
    
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/nguoigiaohang/deletes')?>">
        <div class="span12">

          <div class="widget-box">
            <div class="widget-content nopadding">
              <ul class="recent-posts"> 
                <li>
                  <?= $this->Flash->render() ?>
                  <a href="<?=$this->Url->build('/nguoigiaohang/add')?>" class="btn btn-success btn-mini">Thêm mới</a>
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
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($nguoigiaohang as $nguoigiaohang): ?>
                   <tr>
                    <td><?= h($nguoigiaohang->id) ?></td>
                    <td><?= h($nguoigiaohang->name) ?></td>
                    <td><?php 
                        if($nguoigiaohang->status == 0)
                            echo "Chưa kích hoạt";
                        else if( $nguoigiaohang->status == 1 )
                            echo "Sẵn sàng giao hàng";
                        else
                            {
                               echo "Không có sẵn";  
                            }
                        ?>
                    </td> 
                    <td class="center">
                        <?= $this->Html->link(__('Xem đơn hàng'), ['controller' => 'donhang','action' => 'index',1,'?' =>['id_kind' => 'nguoigiaohang','id' => $nguoigiaohang->id]], ['class' => 'btn btn-success btn-mini'])?>
                        <?= $this->Html->link(__('<i class="icon icon-pencil"></i>'), ['action' => 'edit', $nguoigiaohang->id], ['class' => 'btn btn-primary btn-mini','escape' => false]) ?>
                        <?php if(!($nguoigiaohang->status != 1)) 
                        echo $this->Html->link(__('X'), ['action' => 'delete', $nguoigiaohang->id], ['class' => 'btn btn-danger btn-mini']);
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


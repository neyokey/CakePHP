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
      <a href="" title="Đơn hàng" class="current"> Đơn hàng</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/donhang')?>">
        <div class="widget-box">
          <div class="widget-content nopadding">
                <select name="status" class="span2 input_search">
                    <option value="">Trạng thái</option>
                    <option value="0">Chưa xác nhận(giao)</option>
                    <option value="1">Đang giao</option>
                    <option value="2">Hoàn thành</option>
                    <option value="3">Đã hủy</option>
                </select>
                <input class="input_search span3" type="text" name="info" value="" placeholder="Id, Tên, SĐT hoặc Địa Chỉ người nhận">
                <a href="" class="btn btn-danger pull-right input_search"><i class="icon-ban-circle"></i> Xóa điều kiện </a>              
                <button onclick='submit_url("form_submit","{{url('admin/transaction')}}","get");' class="btn btn-success pull-right input_search"><i class="icon-save"></i> Xem DS </button>
                <div style="clear: both;"></div>
            </div>
          </div>
      </form>
    </div>
    
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/donhang/deletes')?>">
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
                    <th scope="col"><?= $this->Paginator->sort('price','Giá') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('insert_time','Thời gian đặt hàng') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name','Tên người nhận') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('phone','Số điện thoại người nhận') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('address','Địa chỉ người nhận') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status','Trạng thái') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('nguoidung_id','Người đặt') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('nguoigiaohang_id','Người giao hàng') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('khuvucgiaohang_id','Khu vực giao hàng') ?></th>
                    <th>Hoạt động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($donhang as $donhang): ?>
                   <tr>
                    <td><?= h($donhang->id) ?></td>
                    <td><?= h($this->Dot->dot($donhang->price)) ?>
                    <td><?= h($donhang->insert_time) ?></td>
                    <td><?= h($donhang->name) ?></td>
                    <td><?= h($donhang->phone) ?></td>
                    <td><?= h($donhang->address) ?></td>
                    <td><?php if($donhang->status == 0) 
                                echo "Chưa xác nhận(giao)"; 
                              else if($donhang->status == 1) 
                                echo "Đang giao";
                              else if($donhang->status == 2) 
                                echo "Hoàn thành"; 
                              else
                                echo "Đã hủy";  
                        ?>        
                    </td>
                    <td><?= h($donhang->Nguoidung['name']) ?></td>
                    <td><?= h($donhang->Nguoigiaohang['name']) ?></td> 
                    <td><?= h($donhang->Khuvucgiaohang['name']) ?></td> 
                    <td class="center">
                      <?= $this->Html->link(__('<i class="icon icon-eye-open"></i>'), ['action' => 'view', $donhang->id], ['class' => 'btn btn-success btn-mini','escape' => false]) ?>
                      <?= $this->Html->link(__('<i class="icon icon-print"></i>'), ['action' => 'print', $donhang->id], ['class' => 'btn btn-danger btn-mini','escape' => false]) ?>
                      
                      <?php
                        if(!($donhang->status == 2 || $donhang->status == 3))
                        {
                          echo $this->Html->link(__('<i class="icon icon-pencil"></i>'), ['action' => 'edit', $donhang->id], ['class' => 'btn btn-primary btn-mini','escape' => false]) ;
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


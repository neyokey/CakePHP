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
      <a href="" title="Loại món ăn" class="current"> Message</a>
    </div>
  </div>
  
  <!--End-breadcrumbs-->
  
  <!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/message')?>">
        <div class="widget-box">
          <div class="widget-content nopadding">
                <select name="status" class="span2 input_search">
                    <option value="">Trạng thái</option>
                    <option value="1">Đã xem</option>
                    <option value="0">Chưa xem</option>
                </select>
                <input class="input_search" type="text" name="info" value="" placeholder="Id, Tên, email hoặc chủ đề">
                <a href="" class="btn btn-danger pull-right input_search"><i class="icon-ban-circle"></i> Xóa điều kiện </a>              
                <button onclick='submit_url("form_submit","{{url('admin/transaction')}}","get");' class="btn btn-success pull-right input_search"><i class="icon-save"></i> Xem DS </button>
                <div style="clear: both;"></div>
            </div>
          </div>
      </form>
    </div>
    <div class="row-fluid">
      <form method="post" action="<?=$this->Url->build('/message/deletes')?>">
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
                    <th scope="col"><?= $this->Paginator->sort('email','Email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('subject','Chủ đề') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('time','Thời gian') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($message as $message): ?>
                   <tr>
                    <td><?= h($message->id) ?></td>
                    <td><?= h($message->name) ?></td>
                    <td><?= h($message->email) ?></td>
                    <td><?= h($message->subject) ?></td>
                    <td><?= h($message->time) ?></td>
                    <td>
                      <?php 
                        if($message->status == 0)
                          echo "Chưa xem";
                        else
                          echo "Đã xem";
                      ?>
                    </td>  
                    <td class="center">
                      <?= $this->Html->link(__('Xem'), ['action' => 'view', $message->id], ['class' => 'btn btn-success btn-mini']) ?>
                      <?= $this->Html->link(__('Unread'), ['action' => 'delete', $message->id], ['class' => 'btn btn-danger btn-mini']) ?>
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


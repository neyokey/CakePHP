<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CvCandidate $cvCandidate
 */
?>
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
    <a href="<?=$this->Url->build('/admin/')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    <a href="<?php echo $this->Url->build('/nguoigiaohang', true);?>" title="Ứng viên" > Người giao hàng</a>
    <a href="" title="Create new city" class="current"> Thêm người giao hàng</a>
    </div>
  </div>
  
<!--End-breadcrumbs-->
  
<!--Action boxes-->
  <div class="container-fluid">
    <div class="row-fluid">
        </div>
    <div class="row-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Thêm người giao hàng</h5>
      </div>
      <div class="widget-content nopadding ">
          <?= $this->Form->create($nguoigiaohang, ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ,'type' => 'file']) ?>
        <input type="hidden" name="_token" value="J5fxrY2jv3eWDWEYo4iJ8v4prF4TTktA5axJIQLS">
            <div class="control-group ">
              <label class="control-label">Tên người giao hàng</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('name', ['class' => 'span6', 'placeholder' => 'Tên người giao hàng', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Trạng thái</label>
              <div class="controls">
                <?php
                    $status = [ '0' => 'Chưa kích hoạt',
                                '1' => 'Sẵn sàng',
                                '2' => 'Không có sẵn'];
                    echo $this->Form->select('status', $status,['class' => "span6"]);
                ?>
              </div>
            </div>
            <div class="form-actions">
              <a onclick="window.history.back();" class="btn btn-success pull-left"> <i class="icon-arrow-left"></i> Quay lại</a>
              <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success pull-right']) ?>
            </div>
          <!-- </form> -->
          <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

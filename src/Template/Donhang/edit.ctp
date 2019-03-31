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
    <a href="<?php echo $this->Url->build('/donhang', true);?>" title="Đơn hàng" > Đơn hàng</a>
    <a href="" title="Create new city" class="current"> Cập nhật đơn hàng</a>
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
          <h5>Cập nhật đơn hàng</h5>
        </div>
        <div class="widget-content nopadding ">
            <?= $this->Form->create($donhang, ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ,'type' => 'file']) ?>
          <input type="hidden" name="_token" value="J5fxrY2jv3eWDWEYo4iJ8v4prF4TTktA5axJIQLS">
            <div class="control-group ">
              <label class="control-label">Tên người nhận</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('name', ['class' => 'span6', 'placeholder' => 'Tên', 'label' => false]);
                ?>
              </div>
              <label class="control-label">SĐT</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('phone', ['class' => 'span6', 'placeholder' => 'Số điện thoại', 'label' => false]);
                ?>
              </div>
              <label class="control-label">Địa chỉ</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('address', ['class' => 'span6', 'placeholder' => 'Địa chỉ', 'label' => false]);
                ?>
              </div>
              <label class="control-label">Ghi chú</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('note', ['class' => 'span6 texteditor', 'placeholder' => 'Ghi chú', 'label' => false]);
                ?>
              </div>
            <?php 
              if($donhang->status == 1)
              {
                echo '<label class="control-label">Trạng thái</label>
                  <div class="controls">';
                $status = [ '2' => 'Hoàn thành',
                            '3' => 'Bị hủy',
                            '0' => 'Xác nhận lại(đổi người giao)',
                            null => 'Không chọn'];
                echo $this->Form->select('status', $status,['class' => "span6"]);
                echo '</div>';
              }
              if($donhang->status == 0)
              {
                echo '<label class="control-label">Người giao hàng</label>
                    <div class="controls">';
                echo $this->Form->select('nguoigiaohang_id', $nguoigiaohang,['class' => "span6"]);
                echo '</div>';
              }
            ?>
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
</div>

<!--end-main-container-part-->

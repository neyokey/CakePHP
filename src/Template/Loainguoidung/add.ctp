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
    <a href="<?php echo $this->Url->build('/loainguoidung', true);?>" title="Ứng viên" > Loại người dùng</a>
    <a href="" title="Create new city" class="current"> Thêm loại người dùng</a>
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
          <h5>Thêm loại người dùng</h5>
        </div>
        <div class="widget-content nopadding ">
            <?= $this->Form->create($loainguoidung, ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ,'type' => 'file']) ?>
          <input type="hidden" name="_token" value="J5fxrY2jv3eWDWEYo4iJ8v4prF4TTktA5axJIQLS">
            <div class="control-group ">
              <label class="control-label">Tên loại</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('name', ['class' => 'span6', 'placeholder' => 'Tên loại', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Phần trăm giảm</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('discount', ['class' => 'span6', 'placeholder' => 'Phần trăm giảm', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Điểm cần</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('point', ['class' => 'span6', 'placeholder' => 'Điểm cần', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Trạng thái</label>
              <div class="controls controls_option_line">
                <?php
                        echo $this->Form->control('status', [
                        'type' => 'radio',
                        'label' => false,
                        'options' => [
                            ['value' => 1, 'text' => __('Kích hoạt')],
                            ['value' => 0, 'text' => __('Ngừng kích hoạt')]
                        ]
                    ]);
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
</div>

<!--end-main-container-part-->

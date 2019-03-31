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
    <a href="<?php echo $this->Url->build('/gioithieu', true);?>"  > Trang giới thiệu</a>
    <a href="" class="current">Cập nhật trang giới thiệu</a>
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
          <h5>Cập nhật trang giới thiệu</h5>
        </div>
        <div class="widget-content nopadding ">
            <?= $this->Form->create($gioithieu, ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ,'type' => 'file']) ?>
          <input type="hidden" name="_token" value="J5fxrY2jv3eWDWEYo4iJ8v4prF4TTktA5axJIQLS">
            <div class="control-group ">
              <label class="control-label">Tiêu đề</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('title', ['class' => 'span6', 'placeholder' => 'Tiêu đề', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Nội dung 1</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('content', ['class' => 'textarea_editor span10', 'style' => 'min-height: 200px', 'id'=>'editor', 'placeholder' => 'Nội dung', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Nội dung 2</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('content2', ['class' => 'textarea_editor1 span10', 'style' => 'min-height: 200px', 'placeholder' => 'Nội dung', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Trang</label>
              <div class="controls">
                <?php
                        echo $this->Form->control('page', [
                        'label' => false,
                        'options' => [
                            ['value' => 'index', 'text' => __('Trang chủ')],
                            ['value' => 'about', 'text' => __('Trang giới thiệu')]
                        ]
                    ]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Thứ tự</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('position', ['type' => 'number','class' => 'span6', 'placeholder' => 'Thứ tự', 'label' => false]);
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

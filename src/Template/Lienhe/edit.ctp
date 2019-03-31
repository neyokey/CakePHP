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
    <a href="<?php echo $this->Url->build('/lienhe', true);?>" > Liên hệ</a>
    <a href="" title="Create new city" class="current"> Cập nhật liên hệ</a>
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
        <h5>Cập nhật liên hệ</h5>
      </div>
      <div class="widget-content nopadding ">
          <?= $this->Form->create($lienhe, ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ,'type' => 'file']) ?>
        <input type="hidden" name="_token" value="J5fxrY2jv3eWDWEYo4iJ8v4prF4TTktA5axJIQLS">
            <div class="control-group ">
              <label class="control-label">Địa chỉ</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('address', ['class' => 'span6', 'placeholder' => 'Tên loại', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Số điện thoại</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('phone', ['class' => 'span6', 'placeholder' => 'Số điện thoại', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Email</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('email', ['class' => 'span6', 'placeholder' => 'Email', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Thương hiệu</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('brand_name', ['class' => 'span6', 'placeholder' => 'Thương hiệu', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Kinh tuyến</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('X', ['class' => 'span6', 'placeholder' => 'Tọa độ X', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Vĩ tuyến</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('Y', ['class' => 'span6', 'placeholder' => 'Tọa độ Y', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Liên kết facebook</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('link_fb', ['class' => 'span6', 'placeholder' => 'Liên kết facebook', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Liên kết instagram</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('link_ins', ['class' => 'span6', 'placeholder' => 'Liên kết instagram', 'label' => false]);
                ?>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Liên kết google+</label>
              <div class="controls">
                <?php
                    echo $this->Form->control('link_gl', ['class' => 'span6', 'placeholder' => 'Liên kết google+', 'label' => false]);
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

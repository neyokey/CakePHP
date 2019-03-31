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
    <a href="" title="Create new city" class="current"> Xem đơn hàng</a>
    </div>
  </div>
  
<!--End-breadcrumbs-->
  
<!--Action boxes-->
    <div class="container-fluid" style=" text-align: center;">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Xem đơn hàng</h5>
            </div>
            <?php 
            if($donhang != null)
            {
        ?>
        <br>
        <div class="widget-content nopadding ">
            <div class="row row__offset-2">
                <div class="grid_2">
                    <?= __('Receiver') ?>
                </div>
                <div class="grid_2">
                    <?= __('Phone') ?>
                </div>
                <div class="grid_2">
                    <?= __('Address') ?>
                </div>
                <div class="grid_2">
                    <?= __('Delivery area') ?>
                </div> 
                <div class="grid_2">
                    <?= __('Time') ?>
                </div>
                <div class="grid_2">
                    <?= __('Note') ?>
                </div>
            </div> 
            <br>
            <div class="row row__offset-2" style=" text-align: center;">
                <div class="grid_2">
                    <?= h($donhang->name) ?>
                </div>
                <div class="grid_2">
                    <?= h($donhang->phone) ?>
                </div>
                <div class="grid_2">
                    <?= h($donhang->address) ?>
                </div> 
                <div class="grid_2">
                    <?= h($donhang->Khuvucgiaohang['name']) ?>
                </div>  
                <div class="grid_2">
                    <?= h($donhang->insert_time) ?>
                </div>  
                <div class="grid_2">
                    <?= h($donhang->note) ?>
                </div>
            </div>
            <hr>
            <div class="row row__offset-2" style=" text-align: center;">
                <div class="grid_2">
                </div>
                <div class="grid_2">
                    <?= __('Dish') ?>
                </div>
                <div class="grid_2">
                    <?= __('Name') ?>
                </div>
                <div class="grid_2">
                    <?= __('Quantity') ?>
                </div>
                <div class="grid_2">
                    <?= __('Price') ?>
                </div> 
            </div>
                <?php 
                    $sum_quantity = 0;
                    $sum_price = 0 ;
                    $count = 0;
                    foreach($chitietdonhang as $key => $var)
                    {
                        $price = $var['quantity']*$var->monan['price'];
                        $sum_quantity += $var['quantity'];
                        $sum_price += $price;
                        $count ++;
                ?>
            <br>
            <div class="row row__offset-2" style=" text-align: center;">
                <div class="grid_2">
                </div>
                <div class="grid_2">
                </div>
                <div class="grid_2">
                    <td><?= h($var->monan['name']) ?></td>
                </div>
                <div class="grid_2">
                    <td><?= h($var->quantity) ?></td>
                </div>
                <div class="grid_2">
                    <td><?= h($this->Dot->dot($price)." VND") ?></td>
                </div>
            </div>
                <?php 
                }
                ?>
            <hr/>
            <div class="row row__offset-2" style=" text-align: center;">
                <div class="grid_2">
                    <td><?= __('Sum') ?></td>
                </div>
                <div class="grid_2">
                    <?= __('Price') ?>
                </div>
                <div class="grid_2">
                    <?= __('Ship price') ?>
                </div>
                <div class="grid_2">
                    <?= __('Discount') ?>
                </div>
                <div class="grid_2">
                    <?= __('Pay price') ?>
                </div>
            </div> 
            <br>
            <div class="row row__offset-2" style=" text-align: center;">
                <div class="grid_2">
                </div>
                <div class="grid_2">
                    <?= h($this->Dot->dot($price = $chitietdonhang->toArray()[0]->donhang->price)." VND")?>
                </div>
                <div class="grid_2">
                    <?= h($this->Dot->dot($ship = $chitietdonhang->toArray()[0]->donhang->ship_price)." VND")?>
                </div>
                <div class="grid_2">
                    <?= h($this->Dot->dot($discount = $chitietdonhang->toArray()[0]->donhang->discount)." VND") ?>
                </div> 
                <div class="grid_2">
                    <?= h($this->Dot->dot($price + $ship - $discount)." VND") ?>
                </div>  
            </div> 
            <br>
            <?php 
                        }
                        else
                        {
                           echo __('Đơn hàng không tồn tại');
                        }
                    ?>
            </div>
        </div> 
        </div>
    </div>
</div>

<!--end-main-container-part-->

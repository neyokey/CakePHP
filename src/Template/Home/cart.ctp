<div class="page">
    <main>
        <section class="well well__offset-3">
            <div class="container" > 
                <h2><?= __('Cart') ?></h2>
                <br>
                <?php 
                    if($listfood != null)
                    {
                ?>
                <div style="background-color: #a95858; color: white; text-align: center;">
                    <div class="row row__offset-2" >
                        <div class="grid_2">
                        </div>
                        <div class="grid_2">
                            <td><?= __('Name') ?></td>
                        </div>
                        <div class="grid_2">
                             <td><?= __('Đơn giá') ?></td>
                        </div>
                        <div class="grid_2">
                            <td><?= __('Quantity') ?></td>
                        </div>
                        <div class="grid_2">
                            <td><?= __('Price') ?></td>
                        </div>
                        <div class="grid_2">
                            <td><?= __('Action') ?></td>
                        </div>  
                    </div>
                        <?php 
                            $sum = 0;
                            foreach ($listfood as $key => $var)
                            {
                                $sum += $var['quantity'];
                        ?>
                    <div class="row row__offset-2">
                        <div class="grid_2">
                            <td><img class="cart" src="<?= h($var['img']) ?>"></td>
                        </div>
                        <div class="grid_2">
                            <td><?= h($var['name']) ?></td>
                        </div>
                        <div class="grid_2">
                            <td><?= h($this->Dot->dot($var['unit'])." VND") ?></td>
                        </div>
                        <div class="grid_2">
                            <form method="post" class="contact-form2" id="contact-form2" action="<?=$this->Url->build('/home/editcart')?>">
                                <?php echo $this->Form->control('id_food', ['class' => 'span6', 'value' => $key,'type'=>'hidden', 'label' => false]);?> 
                                <?php echo $this->Form->control('price_food', ['class' => 'span6', 'value' => $var['price'],'type'=>'hidden', 'label' => false]);?>   
                                <td style="color: black"><?php echo $this->Form->control('quantity', [ 'value' => ($var['quantity']),'type'=>'number','min' => 1, 'label' => false]);?></td>
                        </div>
                        <div class="grid_2">
                            <td><?= h($this->Dot->dot($var['price'])." VND") ?></td>
                        </div>
                        <div class="grid_2">
                            <div class="btn-wr">
                                <?= $this->Form->button(__('Edit'), ['class' => 'btn btn-success']) ?>
                            </div>
                            </form>
                             <form method="post" action="<?=$this->Url->build('/home/deletefoodcart')?>">
                                <?php echo $this->Form->control('id_food', ['class' => 'span6', 'value' => $key,'type'=>'hidden', 'label' => false]);?>
                                <?php echo $this->Form->control('price_food', ['class' => 'span6', 'value' => $var['price'],'type'=>'hidden', 'label' => false]);?> 
                                <div class="btn-wr"> 
                                <?= $this->Form->button(__('Delete'), ['class' => 'btn btn-danger']) ?>  
                                </div>           
                            </form>
                        </div>
                    </div>
                        <?php 
                        }
                        ?>
                    <hr>
                    <div class="row row__offset-2">
                        <div class="grid_2">
                        </div>
                        <div class="grid_2">
                            <td><?= __('Sum')?></td>
                        </div>
                        <div class="grid_2">
                        </div>
                        <div class="grid_2">
                            <td><?php echo $sum; ?></td>
                        </div>
                        <div class="grid_2">
                            <td><?php echo $this->Dot->dot($sum_price)." VND"; ?></td>
                        </div>
                        <div class="grid_2">
                            <div class="btn-wr"><button type="button" class="btn btn-info" onclick="self.location.href='<?php echo $this->Url->build('/home/deleteallfoodcart', true);?>'"><?= __('Delete all')?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row__offset-2">
                        <div class="grid_5">
                        </div>
                        <div class="grid_6">
                            <br>
                            <div class="btn-wr">
                                <a href="<?php echo $this->Url->build('/home/confirm')?>" class="btn btn-info pull-left"></i><?= __('Confirm information') ?></a>
                            </div>
                        </div> 
                        <?= $this->Form->end() ?>
                    </div>
                <?php 
                    }
                    else
                    {
                       echo "<div class='text center'> You have no order </div>";
                    }
                ?>
            </div>
        </section>
    </main>
</div>

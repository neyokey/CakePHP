<div class="page">
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><?= __('Bill') ?></h2>
                <div style="background-color: #a95858; color: white; text-align: center;">
                    <div class="row row__offset-2">
                        <?php 
                            if(isset($chitietdonhang))
                            {
                                $count = 0;
                                $count_price = 0;
                                $count_amount = 0;
                        ?>
                        <div class="grid_2">
                        </div>
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
                            <?= __('Note') ?>
                        </div>   
                        <div class="grid_2">
                            <?= __('Delivery area') ?>
                        </div> 
                    </div>
                    <div class="row row__offset-2">
                        <div class="grid_2">
                        </div>
                        <div class="grid_2">
                            <?= h($chitietdonhang->toArray()[0]->donhang->name) ?>
                        </div>
                        <div class="grid_2">
                            <?= h($chitietdonhang->toArray()[0]->donhang->phone) ?>
                        </div>
                        <div class="grid_2">
                            <?= h($chitietdonhang->toArray()[0]->donhang->address) ?>
                        </div>     
                        <div class="grid_2">
                            <?= h($chitietdonhang->toArray()[0]->donhang->note) ?>
                        </div>
                        <div class="grid_2">
                            <?= h($khuvucgiaohang[0]->name) ?>
                        </div>
                    </div>
                    <hr/>
                    <div class="row row__offset-2">
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
                            foreach($chitietdonhang as $key => $var)
                            {
                                $price = $var['quantity']*$var->monan['price'];
                                $sum_quantity += $var['quantity'];
                                $sum_price += $price;
                                $count ++;
                        ?>
                    <div class="row row__offset-2">
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
                            <td><?= h($price)." VND" ?></td>
                        </div>
                    </div>
                        <?php 
                        }
                        ?>
                    <hr/>
                    <div class="row row__offset-2">
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
                    <div class="row row__offset-2">
                        <div class="grid_2">
                        </div>
                        <div class="grid_2">
                            <?= h($price = $chitietdonhang->toArray()[0]->donhang->price) ?>
                        </div>
                        <div class="grid_2">
                            <?= h($ship = $chitietdonhang->toArray()[0]->donhang->ship_price) ?>
                        </div>
                        <div class="grid_2">
                            <?= h($discount = $chitietdonhang->toArray()[0]->donhang->discount) ?>
                        </div> 
                        <div class="grid_2">
                            <?= h($price + $ship - $discount) ?>
                        </div>  
                    </div> 
                </div>
                    <?php 
                        }
                        else
                        {
                           echo __('You have no order');
                        }
                    ?>
            </div>
        </section>
    </main>
</div>


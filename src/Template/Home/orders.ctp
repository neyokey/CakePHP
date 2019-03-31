<div class="page">
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><?= __('Order history') ?></h2>
                <div class="row row__offset-2">
                    <div class="grid_12 ">
                        <?php 
                            if($donhang != null)
                            {
                                $count = 0;
                                $count_price = 0;
                                $count_status0 = 0;
                                $count_status1 = 0;
                        ?>
                        
                        <div class="grid_1">
                        </div>
                        <div class="grid_2">
                            <?= __('ID') ?>
                        </div>
                        <div class="grid_2">
                            <?= __('Price') ?>
                        </div>
                        <div class="grid_2">
                            <?= __('Time') ?>
                        </div>
                        <div class="grid_2">
                            <?= __('Status') ?>
                        </div>
                        <div class="grid_2">
                            <?= __('Action') ?>
                        </div>
                        <div class="grid_1">
                        </div>         
                    </div>
                </div>
                    <?php foreach ($donhang as $donhang)
                    {
                        $count ++;
                        $price = $donhang->price - $donhang->discount + $donhang->ship_price;
                        $count_price += $price;
                    ?>
                <div class="row row__offset-2">
                    <div class="grid_12">
                        <div class="grid_1">
                        </div>
                        <div class="grid_2">
                            <td><?= h($donhang->id) ?></td>
                        </div>
                        <div class="grid_2">
                            <td><?= h($this->Dot->dot($price).' VND') ?></td>
                        </div>
                        <div class="grid_2">
                            <td><?= h($donhang->insert_time) ?></td>
                        </div>
                        <div class="grid_2">
                            <td><?php if($donhang->status == 0) 
                                    echo __('Unconfimred');
                                  else if($donhang->status == 1) 
                                    echo __('Delivering');
                                  else if($donhang->status == 2) 
                                    echo __('Finish');
                                  else
                                    echo __('Cancell');  
                                ?>        
                            </td>
                        </div>
                        <div class="grid_2">
                            <td class="center">
                                <?= $this->Html->link(__('Detail'), ['controller' => 'home','action' => 'bill',$donhang->id], ['class' => 'btn btn-success btn-mini']) ?>
                            </td>
                        </div>
                        <div class="grid_1">
                        </div>
                    </div>
                </div>
                    <?php 
                    }
                    ?>
                <div class="row row__offset-2">
                        <div class="grid_12">
                            <div class="grid_1">
                                <td><?= __('Sum') ?></td>
                            </div>
                            <div class="grid_2">
                                <td><?php echo $count.__(" orders") ?></td>
                            </div>
                            <div class="grid_2">
                                <td><?php 
                                    echo $this->Dot->dot($count_price).' VND' ?></td>
                            </div>
                            <div class="grid_2">
                            </div>
                            <div class="grid_2">
                            </div>
                            <div class="grid_1"></div>
                        </div>
                </div>  
                    <?php 
                        }
                        else
                        {
                           echo "<div class='text center'>".__("You have no order")."</div>";
                        }
                    ?>
                <div class="btn-wr">
                    <a onclick="window.history.back();" class="btn btn-warning pull-left"> <i class="icon-arrow-left"></i> <?= __('Back') ?></a>
                </div>
            </div>
        </section>
    </main>
</div>


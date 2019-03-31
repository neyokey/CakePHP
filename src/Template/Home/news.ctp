<div class="page">
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><?= __('News') ?></h2>
                <div class="row row__offset-2">
                    <div class="grid_7">
                        <?php foreach ($bantin as $bantin) 
                        {
                        ?>
                            <div style="font-size: 20px; font-weight: bold;"><?php echo $bantin['name'] ?></div>
                            <br>
                            <?php echo __('Post date: ').$bantin['insert_time'].__('| By: ').$bantin->nguoidung['name'].__('<br> Type: '). $bantin->loaibantin['name'];  ?>
                            <div class="row row__offset-2">
                                <div class="grid_3">
                                    <?php 
                                        if(isset($bantin['url_img']))
                                        {
                                            echo '<div class="news">'.$bantin['url_img'].'</div>';
                                        }
                                        else {
                                            echo '<div class="news"><img style="height: auto; max-width: 100%;" src="http://localhost/lvtn/img/slide01.jpg" alt=""></div>';
                                        }
                                    ?>
                                </div>
                                <div class="grid_4">
                                    <div>
                                        <?php echo $bantin->content;?>
                                    </div>
                                    <br>
                                    <br>
                                    <a href="<?php echo $this->Url->build('/home/detailNews/'.$bantin['id']); ?>"><u><?= __('... Detail') ?></u></a>
                                </div>
                            </div>
                            <br>
                            <br>
                        <?php
                        }
                        ?>
                        <?php echo $this->element('paginator'); ?>
                    </div>
                    <div class="grid_2">
                    </div>
                    <div style="font-size: 20px" class="grid_3 center">
                        <?php echo $this->element('kind_news'); ?>
                    </div>
                </div>
                <div class="btn-wr">
                    <a onclick="window.history.back();" class="btn btn-warning pull-left"> <i class="icon-arrow-left"></i><?= __(' Back') ?></a>
                </div>
            </div>
        </section>
    </main>
</div>


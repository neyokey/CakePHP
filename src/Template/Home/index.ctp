<div class="page">
    <header>
        <div class="camera_container">
            <div id="camera" class="camera_wrap">
                <div data-thumb="<?=$banner["index_slide_thumb01"]?>" data-src="<?=$banner["index_slide01"]?>">
                    <div class="camera_caption fadeIn">
                    </div>
                </div>
                <div data-thumb="<?=$banner["index_slide_thumb02"]?>" data-src="<?=$banner["index_slide02"]?>">
                    <div class="camera_caption fadeIn">
                    </div>
                </div>
                <div data-thumb="<?=$banner["index_slide_thumb03"]?>" data-src="<?=$banner["index_slide03"]?>">
                    <div class="camera_caption fadeIn">
                    </div>
                </div>
            </div>

            <div class="brand wow fadeIn">
                <h1 class="brand_name">
                    <a href="./"><?php echo $lienhe['brand_name']; ?></a>
                </h1>
            </div>
        </div>
    </header>
    <main>
        <section class="well">
            <div class="container">
                <?php
                if($monmoi->toArray() != null)
                {
                    echo '<h2>'.__('New Combo').'</h2>';
                    echo '<div class="row">';
                        foreach ($monmoi as  $value) 
                        {
                        ?>
                            <div class="grid_4">
                                <div class="img"><div class="lazy-img" style="padding-bottom: 76.21621621621622%;"><img data-src="<?= $value->image ?>" alt=""></div></div>
                                <h3><?= $value->name ?></h3>
                                <br><?= $value->detail ?></br>
                                <br><?= __('Price:') ?> <?= $this->Dot->dot($value->price).' VND';?></br>
                                <a href="<?=$this->Url->build('/home/addcart/'.$value->id)?>" class="btn"><?= __('Add cart') ?></a>
                            </div>
                            <?php
                            }
                    echo '</div>';
                }
                if($monuachuong->toArray() != null)
                {
                    echo '<h2>'.__('Best selling').'</h2>';
                    echo '<div class="row">'; 
                        foreach ($monuachuong as  $value) 
                        {
                        ?>
                            <div class="grid_4">
                                <div class="img"><div class="lazy-img" style="padding-bottom: 76.21621621621622%;"><img data-src="<?= $value->monan['image']?>" alt=""></div></div>
                                <h3><?= $value->monan['name'] ?></h3>
                                <br><?= $value->monan['detail'] ?></br>
                                <br><?= __('Price:') ?> <?= $this->Dot->dot($value->monan['price']).' VND';?></br>
                                <a href="<?=$this->Url->build('/home/addcart/'.$value->monan['id'])?>" class="btn"><?= __('Add cart') ?></a>
                            </div>
                        <?php
                        }
                    echo '</div>';
                }
                if($bantin->toArray() != null)
                {
                    echo '<h2>'.__('News ').'</h2>';
                    echo '<div class="row">'; 
                    ?>
                        <div class="grid_12">
                        <?php foreach ($bantin as $bantin) 
                        {
                        ?>
                            <div class="row row__offset-2">
                                <div class="grid_1">
                                </div>
                                <div class="grid_3">
                                    <?php 
                                        if(isset($bantin['url_img']))
                                        {
                                            echo '<div class="news">'.$bantin['url_img'].'</div>';
                                        }
                                        else {
                                            echo '<div class="news"><img style="height: auto; max-width: 10%;" src="http://localhost/lvtn/img/slide01.jpg" alt=""></div>';
                                        }
                                    ?>
                                </div>
                                <div class="grid_8">
                                    <div style="font-size: 20px; font-weight: bold;"><?php echo $bantin['name'] ?></div>
                                    <br>
                                    <?php echo __('Post date: ').$bantin['insert_time'].__('| By: ').$bantin->nguoidung['name'].__('<br> Type: ').'<a href=';
                                        echo $this->Url->build('/home/news/'.$bantin->loaibantin['id']).'>';
                                        echo $bantin->loaibantin['name'].'</a>';  ?>
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
                    </div>
                    <?php
                    echo '</div>';
                    echo '<div class="decoration"><a href="'.$this->Url->build('/home/news').'" class="btn">'.__('Read more').'</a></div>';
                } 
                    foreach ($gioithieu as  $value) 
                    {
                        echo '<h2>'.$value['title'].'</h2> <div class="row"> <div class="grid_6">'.$value['content'].'</div><div class="grid_6">'.$value['content2'].'</div></div>';
                    }
                ?>
                <div class="decoration"><a href="<?php echo $this->Url->build('/home/about');?>" class="btn"><?= __('Read more') ?></a></div>
                <section class="well well__offset-2">
            <div class="container center">
                <h2><?= __('Make a Reservation') ?></h2>
                <p class="indents-2"><?= __('Contact us now') ?></p>
                <address class="address-1">
                    <dl><dt><?= __('Address:') ?></dt> <dd><?php echo $lienhe['address'];?></dd></dl>
                    <p><em><?php echo $lienhe['phone'];?></em></p>
                </address>
            </div>
        </section>            </div>
        </section>
    </main>
</div>

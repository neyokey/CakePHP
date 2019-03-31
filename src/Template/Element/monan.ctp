<div class="page">
    <header>
        <div class="camera_container1">

            <div style="display: block; height: 782px; <?php 
                if($banner != null)
                echo 'background-image: url('.$banner['image'].');'
            ?>
            background-repeat: no-repeat; background-position: center; background-size:cover;">
            </div>
            <div class="brand wow fadeIn">
                <h1 class="brand_name2">
                    <?= __($this->request->getParam('action'))?>
                </h1>
            </div>
        </div>
    </header>
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <div class="row box-2">
                    <?php
                        $count = 0;
                        foreach($monan as $mn)
                        {
                            if($count == 3)
                            {
                                $count == 0;
                                echo '</div>';
                                echo '<div class="row box-2">';

                            }
                    ?>
                    
                        <div class="grid_4">
                            <div class="img"><div class="lazy-img" style="padding-bottom: 76.21621621621622%;"><img data-src="<?= $mn->image ?>" alt=""></div></div>
                            <h3><?= $mn->name ?></h3>
                            <br><?= $mn->detail ?></br>
                            <br><?= __('Price:') ?> <?= $this->Dot->dot($mn->price).' VND';?></br>
                            <a href="<?=$this->Url->build('/home/addcart/'.$mn->id)?>" class="btn"><?= __('Add cart') ?></a>
                        </div>
                    <?php
                        $count++;
                        }
                    ?>
                </div>
                <?php echo $this->element('paginator_menu'); ?>
            </div>
        </section>
    </main>
</div>
<div class="page">
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <?php
                    if($bantin != null)
                    {
                        foreach ($bantin as  $bantin) {
                ?>
                <div class="row row__offset-2">
                    <div class="grid_7">
                        <div style="font-size: 20px; font-weight: bold;"><?php echo $bantin['name'] ?></div>
                        <br>
                        <?php echo __('Post date: ').$bantin['insert_time'].__('| By: ').$bantin->nguoidung['name'].__('<br> Type: '). $bantin->loaibantin['name'];  ?>
                    </div>
                    <div class="grid_2">
                    </div>
                    <div style="font-size: 20px" class="grid_3 center">
                        <?php echo $this->element('kind_news'); ?>
                    </div>
                </div>
                <div class="row row__offset-2" style="font-size: 18px">
                    <div class="grid_7 news_content">
                        <?php
                             echo $bantin['content'];
                        ?>
                    </div>
                    <div class="grid_2">
                    </div>
                    <div class="grid_3">
                        
                    </div>
                </div>
                <div class="btn-wr">
                    <a onclick="window.history.back();" class="btn btn-warning pull-left"> <i class="icon-arrow-left"></i> Back</a>
                </div>
                <?php
                }
                    }
                    else{
                       ?> 
                       <div class="row row__offset-2">
                        <div class="grid_7 center" style="font-size: 40px">
                            <?= __('News not exist!') ?>
                        </div>
                        <div class="grid_2">
                        </div>
                        <div style="font-size: 20px" class="grid_3 center">
                            <?php echo $this->element('kind_news'); ?>
                        </div>
                    </div>
                        <div class="btn-wr">
                            <a onclick="window.history.back();" class="btn btn-warning pull-left"> <i class="icon-arrow-left"></i> <?= __('Back') ?></a>
                        </div>
                       <?php
                    }
                ?>
            </div>
        </section>
    </main>
</div>


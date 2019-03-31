<div class="page">
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><?= __('Your infomation') ?></h2>
                <br>
                <?php 
                    if($listfood != null)
                    {
                ?>
                <div class="row row__offset-2">
                    <?= $this->Form->create($donhang, ['class' => 'contact-form1','id' => 'contact-form1', 'enctype' => 'multipart/form-data' ,'type' => 'file','url' => '/home/addorder']) ?>
                    <div class="grid_5">
                        <fieldset>
                            <label class="Recipient name">
                                <?= __('Recipient name') ?>
                                <input type="text" name="name" value="<?= h($user['name']) ?>" />                
                            </label>
                            <label class="phone">
                                <?= __('Phone') ?>
                                <input type="text" name="phone" value="<?= h( $user['phone'])  ?>" />                
                            </label>
                            <label class="address">
                                <?= __('Address') ?>
                                <input type="text" name="address" value="<?= h($user['address'])  ?>" />                
                            </label>
                            <label class="delivery area">
                            <?= __('Delivery area') ?>
                            <?php echo $this->Form->select('khuvucgiaohang_id', $khuvuc,['class' => "span6"]); ?>
                            </label>
                    </div>
                    <div class="preffix_1 grid_6">
                            <label class="Note">
                                    <?= __('Note') ?>
                                    <div class="input textarea required"> 
                                    <?php
                                        echo $this->Form->control('note', ['class' => 'textarea_editor', 'placeholder' => '', 'label' => false]);
                                    ?> 
                                    </div>  
                                </label>
                                <div class="btn-wr">
                                    <?= $this->Form->button(__('Order'), ['class' => 'g-recaptcha btn btn-danger','data-sitekey' => "6Lfk8mYUAAAAAI677Xl8GL-OdOci46F34sGO1aFM",'data-callback' => "onSubmit" , 'id' => 'btnSubmit']) ?> 
                                </div>
                            </fieldset>
                        <?= $this->Form->end() ?> 
                    </div>
                </div>
                <?php 
                }
                    else
                    {
                       echo "<div class='text center'> You have no order </div>";
                    }
                ?>
                <div class="btn-wr">
                <a onclick="window.history.back();" class="btn btn-warning pull-left"> <i class="icon-arrow-left"></i> <?= __(' Back') ?></a>
                </div>
            </div>
        </section>
    </main>
</div>
<script>
   function onSubmit(token) {
        $('#contact-form1').submit();
   }
 </script>
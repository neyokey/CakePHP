<div class="page">
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><?= __('Account information') ?></h2>
                <div class="row row__offset-2">
                    <div class="grid_5">
                        <h2><?= __('Your infomation') ?></h2>
                        <?= $this->Form->create($nguoidung, ['class' => 'contact-form','id' => 'contact-form', 'enctype' => 'multipart/form-data' ,'type' => 'file','url' => '/home/login']) ?>
                            <div class="contact-form-loader"></div>
                            <fieldset>
                                <label class="name">
                                    <?= __('Name:') ?>
                                    <input type="text" name="name" value="<?= h($nguoidung->name) ?>" disabled/>                
                                </label>
                                <label class="Email">
                                    <?= __('Email:') ?>
                                    <input type="text" name="email" value="<?= h($nguoidung->email)  ?>" disabled/>                
                                </label>
                                <label class="Phone">
                                    <?= __('Phone:') ?>
                                    <input type="text" name="phone" value="<?= h($nguoidung->phone)  ?>" disabled/>                
                                </label>
                                <label class="Birthday">
                                    <?= __('Birthday:') ?>
                                    <input type="date" name="birthday" value="<?= h($nguoidung->birthday->i18nFormat('yyyy-MM-dd'))?>" disabled />               
                                </label>
                                <label class="Address">
                                    <?= __('Address:') ?>
                                    <input type="text" name="address" value="<?= h($nguoidung->address)  ?>" disabled/>                
                                </label>
                            </fieldset> 
                        <div class="btn-wr">
                            <a href="<?php echo $this->Url->build('/home/useredit/'.$id)?>" class="btn btn-success pull-left"><?= __('Edit') ?></a>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="preffix_1 grid_6">
                        <h2><?= __('Account infomation') ?></h2>
                        <?= $this->Form->create($nguoidung, ['class' => 'contact-form','id' => 'contact-form', 'enctype' => 'multipart/form-data' ,'type' => 'file','url' => '/home/login']) ?>
                            <div class="contact-form-loader"></div>
                            <fieldset>
                                <label class="point">
                                    <?= __('Point:') ?>
                                    <input type="text" name="point" placeholder="<?= h($nguoidung->point) ?>" disabled/>                
                                </label>
                                <label class="Type">
                                    <?= __('Type:') ?>
                                    <input type="text" name="type" placeholder="<?= h($nguoidung->loainguoidung->name)  ?>" disabled/>                
                                </label>
                            </fieldset>
                            <div class="btn-wr">
                                <a href="<?php echo $this->Url->build('/home/orders/'.$id)?>" class="btn btn-info pull-left"><?= __('Order history') ?></a>
                            </div>
                        <?= $this->Form->end() ?> 
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>


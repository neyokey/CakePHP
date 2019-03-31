<div class="page">
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><?= __('Edit account information') ?></h2>
                <div class="row row__offset-2">
                    <div class="grid_5">
                        <h2><?= __('Your infomation') ?></h2>
                        <?= $this->Form->create($nguoidung, ['class' => 'contact-form','id' => 'contact-form1', 'enctype' => 'multipart/form-data' ,'type' => 'file','url' => '/home/useredit/'.$id]) ?>
                            <div class="contact-form-loader"></div>
                            <fieldset>
                                <label class="name">
                                    <?= __('Name:') ?>
                                    <input type="text" name="name" value="<?= h($nguoidung->name) ?>" />                
                                </label>
                                <label class="Email">
                                    <?= __('Email:') ?>
                                    <input type="text" name="email" value="<?= h($nguoidung->email)  ?>" />                
                                </label>
                                <label class="Phone">
                                    <?= __('Phone:') ?>
                                    <input type="text" name="phone" value="<?= h($nguoidung->phone)  ?>" />                
                                </label>
                                <label class="Birthday">
                                    <?= __('Birthday:') ?>
                                    <input type="date" name="birthday" value="<?= h($nguoidung->birthday->i18nFormat('yyyy-MM-dd'))  ?>" />                
                                </label>
                                <label class="Address">
                                    <?= __('Address:') ?>
                                    <input type="text" name="address" value="<?= h($nguoidung->address)  ?>" />                
                                </label>
                                <div class="btn-wr">
                                    <?= $this->Form->button(__('Edit'), ['class' => 'btn','value' =>'edit']) ?>
                                </div>
                            </fieldset> 
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="preffix_1 grid_6">
                        <h2><?= __('Change password') ?></h2>
                        <?= $this->Form->create($nguoidung, ['class' => 'contact-form','id' => 'contact-form1', 'enctype' => 'multipart/form-data' ,'type' => 'file','url' => '/home/editpassword/'.$nguoidung->id]) ?>
                        <div class="contact-form-loader"></div>
                        <fieldset>
                            <label class="Old password">
                                <?= __('Old password:') ?>
                                <input type="password" name="old_password"  value=""
                                       data-constraints="@Required @Email"/>                
                            </label>
                            <label class="New password">
                                <?= __('New password:') ?>
                                <input type="password" name="new_password" placeholder="" value=""
                                       data-constraints="@Required"/>                
                            </label>
                             <label class="Repeat password">
                                <?= __('Repeat password:') ?>
                                <input type="password" name="repeat_password" placeholder="" value=""
                                       data-constraints="@Required"/>                
                            </label>
                            <div class="btn-wr">
                                <?= $this->Form->button(__('Change'), ['class' => 'btn']) ?>
                            </div>
                        </fieldset>
                    <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>


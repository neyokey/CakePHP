<section class="well well__offset-3">
  <div class="container">
    <h2><?= __('Login/Signup') ?></h2>
    <div class="row box-3">
        <div class="grid_5">
            <h2><?= __('Login') ?></h2>
            <?= $this->Form->create($nguoidung, ['class' => 'contact-form','id' => 'contact-form1', 'enctype' => 'multipart/form-data' ,'type' => 'file','url' => '/home/login']) ?>
                <div class="contact-form-loader"></div>
                <fieldset>
                    <label class="email">
                        <?= __('Your E-mail:') ?>
                        <input type="text" name="email" placeholder="" value=""
                               data-constraints="@Required @Email"/>                
                    </label>
                    <label class="password">
                        <?= __('Your Password:') ?>
                        <input type="password" name="password" placeholder="" value=""
                               data-constraints="@Required"/>                
                    </label>
                    <div class="btn-wr">
                        <?= $this->Form->button(__('Login'), ['class' => 'btn','value' =>'login']) ?>
                    </div>
                </fieldset>
            <?= $this->Form->end() ?>
        </div>   
        <div class="preffix_1 grid_6">
            <h2><?= __('Signup') ?></h2>
            <?= $this->Form->create($nguoidung, ['class' => 'contact-form','id' => 'contact-form2', 'enctype' => 'multipart/form-data' ,'type' => 'file','url' => '/home/signup']) ?>
                <div class="contact-form-loader"></div>
                <fieldset>
                    <label class="name">
                        <?= __('Your Name:') ?>
                        <input type="text" name="name" placeholder="" value=""
                               data-constraints="@Required @JustLetters"/>
                    </label>
                    <label class="email">
                        <?= __('Your E-mail:') ?>
                        <input type="text" name="email" placeholder="" value=""
                               data-constraints="@Required @Email"/>                
                    </label>
                    <label class="password">
                        <?= __('Your Password:') ?>
                        <input type="password" name="password" placeholder="" value=""
                               data-constraints="@Required"/>                
                    </label>
                    <label class="birthday">
                        <?= __('Your Birthday:') ?>
                        <input type="date" name="birthday"/>                
                    </label>
                    <label class="phone">
                        <?= __('Your Phone-number:') ?>
                        <input type="number" name="phone" placeholder="" value=""
                               data-constraints="@Required"/>                
                    </label>
                    <label class="address">
                        <?= __('Your Address:') ?>
                        <input type="text" name="address" placeholder="" value=""
                               data-constraints="@Required"/>                
                    </label>
                    <div class="btn-wr">
                        <?= $this->Form->button(__('Sign-up'), ['class' => 'g-recaptcha btn btn-danger','data-sitekey' => "6Lfk8mYUAAAAAI677Xl8GL-OdOci46F34sGO1aFM",'data-callback' => "onSubmit" , 'id' => 'btnSubmit']) ?> 
                    </div>
                </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
  </div>
</section>

<script>
   function onSubmit(token) {
        $('#contact-form2').submit();
   }
</script>
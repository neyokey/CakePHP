
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?=$this->Url->build('/home/css/grid.css')?>"/>
    <link rel="stylesheet" href="<?=$this->Url->build('/home/css/style.css')?>"/>
    <link rel="stylesheet" href="<?=$this->Url->build('/home/css/camera.css')?>"/>
    <link rel="stylesheet" href="<?=$this->Url->build('/home/css/jquery.fancybox.css')?>"/>
    <link rel="stylesheet" href="<?=$this->Url->build('/home/css/contact-form.css')?>"/>
    <link rel="stylesheet" href="<?=$this->Url->build('/home/css/font-awesome.min.css')?>"/>
    <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/font-awesome.css')?>"/>
    <link rel="stylesheet" href="<?=$this->Url->build('/home/css/Open-Sans.css')?>"/>
    <link rel="stylesheet" href="<?=$this->Url->build('/home/css/Yesteryear.css')?>"/>
    <link rel="stylesheet" href="<?=$this->Url->build('/css/cake.css')?>"/>
    <script src="<?=$this->Url->build('/home/js/jquery.js')?>"></script>
    <script src="<?=$this->Url->build('/home/js/jquery-migrate-1.2.1.js')?>"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

   

    <!--[if lt IE 9]>
    <html class="lt-ie9">
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a> 
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
    <script src="<?=$this->Url->build('/home/js/device.min.js')?>"></script> 
</head>

<body>
    <div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->
    <header>
        <div >
            <div class="container">
                <div class="brand">
                    <h1 class="brand_name">
                        <a href="<?=$this->Url->build('/home/index')?>"><?php echo $lienhe['brand_name']; ?></a>
                    </h1>
                </div>
                <nav class="nav">
                    <?php echo $this->element('menu'); ?>
                </nav>
            </div>
        </div>
        <div class="toggle-menu-container">
            <nav class="nav">
                <div class="nav_title"></div>
                <a class="sf-menu-toggle fa fa-bars" href="#"></a>
                <?php echo $this->element('menu'); ?>
            </nav>            
        </div>
    </header>
    <!--========================================================
                              CONTENT
    =========================================================-->
    <main>
        <?= $this->fetch('content') ?>
    </main>

    <!--========================================================
                              FOOTER
    =========================================================-->
    <footer>
        <?php echo $this->element('footer'); ?>
    </footer>
</div>
<script src="<?=$this->Url->build('/home/js/script.js')?>"></script>
<?php
    if(isset($alert))
    {
?>
    <script type="text/javascript"> alert('<?php echo __($alert);?>');</script>
<?php
    $alert = null;
    }
?>
</body>
</html>
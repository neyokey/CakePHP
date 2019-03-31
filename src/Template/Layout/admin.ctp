
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quản lí</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/bootstrap.min.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/grid.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/bootstrap-responsive.min.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/colorpicker.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/datepicker.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/uniform.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/uniform.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/select2.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/matrix-style.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/matrix-media.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/bootstrap-wysihtml5.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/font-awesome.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/admin.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/css/cake.css')?>"/>
  <link rel="stylesheet" href="<?=$this->Url->build('/admin/css/daterangepicker/daterangepicker.css')?>"/>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

  <script src="<?=$this->Url->build('/admin/js/jquery.min.js')?>"></script>
  <link rel="Shortcut Icon" href="img/favicon.ico" type="image/x-icon" />  
</head>
<body>

  <!--Header-part-->

  <div id="header">
    <h1><a href="">Quản lí </a></h1>
  </div>
  <!--close-Header-part--> 


  <!--top-Header-menu-->
  <div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
      <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text"><?php echo $name; ?> </span><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo $this->Url->build('/nguoidung/view/'.$id, true);?>"><i class="icon-user"></i> Thông tin tài khoản</a></li>
          <li class="divider" id='1'></li>
          <li class="divider"></li>
          <li><a href="<?php echo $this->Url->build('/home/logout', true);?>"><i class="icon-key"></i> Đăng xuất</a></li>
        </ul>
      </li>
      <li><a href="<?php echo $this->Url->build('/', true);?>"><i class="icon-arrow-left"></i> Trang chủ</a></li>
    </ul>
  </div>
<div id="sidebar"><a href="" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <?php echo $this->element('sidebar'); ?>
</div>

<?= $this->fetch('content') ?>



<!--end-Footer-part-->

<script src="<?=$this->Url->build('//cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js')?>"></script> 
<script src="<?=$this->Url->build('//cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/vi.js')?>"></script> 
<script src="<?=$this->Url->build('/admin/js/daterangepicker/daterangepicker.js')?>"></script> 
<script src="<?=$this->Url->build('/admin/js/jquery.ui.custom.js')?>"></script> 
<script src="<?=$this->Url->build('/admin/js/jquery.ui.custom.js')?>"></script> 
<script src="<?=$this->Url->build('/admin/js/bootstrap.min.js')?>"></script>
<script src="<?=$this->Url->build('/admin/js/bootstrap-colorpicker.js')?>"></script>
<script src="<?=$this->Url->build('/admin/js/bootstrap-datepicker.js')?>"></script>
<script src="<?=$this->Url->build('/admin/js/masked.js')?>"></script>
<script src="<?=$this->Url->build('/admin/js/select2.min.js')?>"></script>
<script src="<?=$this->Url->build('/admin/js/matrix.js')?>"></script>
<script src="<?=$this->Url->build('/admin/js/matrix.form_common.js')?>"></script>
<script src="<?=$this->Url->build('/admin/js/wysihtml5-0.3.0.js')?>"></script>
<script src="<?=$this->Url->build('/admin/js/bootstrap-wysihtml5.js')?>"></script>
<script src="<?=$this->Url->build('/admin/js/jquery.peity.min.js')?>"></script>
<script src="<?=$this->Url->build('/admin/js/jquery.uniform.js')?>"></script>
</body>
</html>

<script>
  $('.textarea_editor').wysihtml5();
  $('.textarea_editor1').wysihtml5();
</script>
<script type="text/javascript">
  $(document).ready(function() {   
        test()
});
    function test() {
         $("#1").load("<?=$this->Url->build('/admin/php/alert.php')?>");
        setTimeout( test, 5000);    
}
</script>


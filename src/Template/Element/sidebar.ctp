<ul class="nav">
  <?php
    if ($type <= 2) 
    {
  ?>
    <li class="<?php if($this->request->getParam('controller') =='Admin') echo 'active'; ?>">
     <a href="<?php echo $this->Url->build('/admin/', true);?>">
      <i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu <?php if($this->request->getParam('controller') =='Nguoidung' || $this->request->getParam('controller') =='Loainguoidung' || $this->request->getParam('controller') =='Nguoigiaohang') echo 'open'; ?>">
      <a href="">
      <i class="icon icon-group"></i> <span>Người dùng</span><i style="float: right; line-height: 1" class="icon icon-arrow-down"></i></a>
      <ul>
        <li class="<?php if($this->request->getParam('controller') =='Nguoidung') echo 'active'; ?>"> 
            <a href="<?php echo $this->Url->build('/nguoidung', true);?>">
            <i class="icon icon-user"></i> <span>Người dùng</span></a></li>
        <li class="<?php if($this->request->getParam('controller') =='Loainguoidung') echo 'active'; ?>"> 
            <a href="<?php echo $this->Url->build('/loainguoidung', true);?>">
            <i class="icon icon-group"></i> <span>Loại người dùng</span></a></li>
        <li class="<?php if($this->request->getParam('controller') =='Nguoigiaohang') echo 'active'; ?>"> 
            <a href="<?php echo $this->Url->build('/nguoigiaohang', true);?>">
            <i class="icon icon-road "></i> <span>Người giao hàng</span></a></li>   
      </ul>
    </li>
    <li class="submenu <?php if($this->request->getParam('controller') =='Monan' || $this->request->getParam('controller') =='Loaimonan') echo 'open'; ?>">
      <a href="">
      <i class="icon icon-heart"></i> <span>Món ăn</span><i style="float: right; line-height: 1" class="icon icon-arrow-down"></i></a>
      <ul>
        <li class="<?php if($this->request->getParam('controller') =='Monan') echo 'active'; ?>"> 
          <a href="<?php echo $this->Url->build('/monan', true);?>">
          <i class="icon icon-lemon"></i> <span>Món ăn</span></a></li>
        <li class="<?php if($this->request->getParam('controller') =='Loaimonan') echo 'active'; ?>"> 
          <a href="<?php echo $this->Url->build('/loaimonan', true);?>">
          <i class="icon icon-heart"></i> <span>Loại món ăn</span></a></li>
      </ul>
    </li>
    <li class="submenu <?php if($this->request->getParam('controller') =='Bantin' || $this->request->getParam('controller') =='Loaibantin') echo 'open'; ?>">
      <a href="">
      <i class="icon icon-th-list"></i><span>Bản tin </span><i style="float: right; line-height: 1" class="icon icon-arrow-down"></i></a>
      <ul>
        <li class="<?php if($this->request->getParam('controller') =='Bantin') echo 'active'; ?>"> 
          <a href="<?php echo $this->Url->build('/bantin', true);?>">
          <i class="icon icon-list-alt"></i> <span>Bản tin</span></a></li>
        <li class="<?php if($this->request->getParam('controller') =='Loaibantin') echo 'active'; ?>"> 
          <a href="<?php echo $this->Url->build('/loaibantin', true);?>">
          <i class="icon icon-th-list"></i> <span>Loại bản tin</span></a></li>
      </ul>
    </li>
    <li class="<?php if($this->request->getParam('controller') =='Donhang') echo 'active'; ?>">
      <a href="<?php echo $this->Url->build('/donhang', true);?>">
      <i class="icon icon-shopping-cart"></i> <span>Đơn hàng</span></a></li>
    <li class="<?php if($this->request->getParam('controller') =='Message') echo 'active'; ?>">
      <a href="<?php echo $this->Url->build('/message', true);?>">
      <i class="icon icon-comment"></i> <span>Message</span></a></li>
    <li class="submenu <?php if($this->request->getParam('controller') =='Lienhe' || $this->request->getParam('controller') =='Banner' || $this->request->getParam('controller') =='Menu' || $this->request->getParam('controller') =='Gioithieu' || $this->request->getParam('controller') =='Khuvucgiaohang' || $this->request->getParam('controller') =='Submenu') echo 'open'; ?>">
      <a href="">
      <i class="icon icon-inbox"></i> <span>Hiển thị</span><i style="float: right; line-height: 1" class="icon icon-arrow-down"></i></a>
      <ul>
        <li class="<?php if($this->request->getParam('controller') =='Lienhe') echo 'active'; ?>">
          <a href="<?php echo $this->Url->build('/lienhe', true);?>">
          <i class="icon icon-phone"></i> <span>Liên hệ</span></a></li>
        <li class="<?php if($this->request->getParam('controller') =='Banner') echo 'active'; ?>">
          <a href="<?php echo $this->Url->build('/banner', true);?>">
          <i class="icon icon-picture"></i> <span>Banner</span></a></li>  
        <li class="<?php if($this->request->getParam('controller') =='Menu' || $this->request->getParam('controller') =='Submenu') echo 'active'; ?>">
          <a href="<?php echo $this->Url->build('/menu', true);?>">
          <i class="icon icon-align-center"></i> <span>Menu</span></a></li>  
        <li class="<?php if($this->request->getParam('controller') =='Gioithieu') echo 'active'; ?>">
          <a href="<?php echo $this->Url->build('/gioithieu', true);?>">
          <i class="icon icon-inbox"></i> <span>Trang giới thiệu</span></a></li>
        <li class="<?php if($this->request->getParam('controller') =='Khuvucgiaohang') echo 'active'; ?>">
          <a href="<?php echo $this->Url->build('/khuvucgiaohang', true);?>">
          <i class="icon icon-map-marker"></i> <span>Khu vực giao hàng</span></a></li>
      </ul>
    </li> 
  <?php
  }
  else
  {
  ?>
    <li class="<?php if($this->request->getParam('controller') =='Nguoigiaohang') echo 'active'; ?>"> 
      <a href="<?php echo $this->Url->build('/nguoigiaohang', true);?>">
      <i class="icon icon-road "></i> <span>Người giao hàng</span></a></li>
    <li class="<?php if($this->request->getParam('controller') =='Donhang') echo 'active'; ?>">
      <a href="<?php echo $this->Url->build('/donhang', true);?>">
      <i class="icon icon-shopping-cart"></i> <span>Đơn hàng</span></a></li>
    <li class="<?php if($this->request->getParam('controller') =='Bantin') echo 'active'; ?>"> 
          <a href="<?php echo $this->Url->build('/bantin', true);?>">
          <i class="icon icon-list-alt"></i> <span>Bản tin</span></a></li> 
  <?php
  }
  ?>
</ul>
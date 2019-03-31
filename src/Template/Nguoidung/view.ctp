<div class="col-sm-12 text-center">
        <div class="col-sm-12">
            <tr>
                <div class="col-sm-4">
                    Tên người dùng
                </div>
                <div class="col-sm-8">
                    <?= h($nguoidung->name) ?>
                </div>
            </tr>
        </div>
        <div class="col-sm-12">
            <tr>
                <div class="col-sm-4">
                    Email
                </div>
                <div class="col-sm-8">
                    <?= h($nguoidung->email) ?>
                </div>
            </tr>
        </div>
        <div class="col-sm-12">
            <tr>
                <div class="col-sm-4">
                    Số điện thoại
                </div>
                <div class="col-sm-8">
                    <?= h($nguoidung->phone) ?>
                </div>
            </tr>
        </div>
        <div class="col-sm-12">
            <tr>
                <div class="col-sm-4">
                    Địa chỉ
                </div>
                <div class="col-sm-8">
                    <?= h($nguoidung->address) ?>
                </div>
            </tr>
        </div>
        <div class="col-sm-12">
            <tr>
                <div class="col-sm-4">
                    Ngày sinh
                </div>
                <div class="col-sm-8">
                    <?= h($nguoidung->birthday) ?>
                </div>
            </tr>
        </div>
        <div class="col-sm-12">
            <tr>
                <div class="col-sm-4">
                    Loại người dùng
                </div>
                <div class="col-sm-8">
                    <?= h($nguoidung->loainguoidung->name) ?>
                </div>
            </tr>
        </div>
        <div class="col-sm-12">
            <tr>
                <div class="col-sm-3">   
                </div>
                <div class="col-sm-8">
                    <a onclick="window.history.back();" class="btn btn-warning pull-left"> <i class="icon-arrow-left"></i> Quay lại</a>
                    <div class="col-sm-2">
                    
                    </div>
                    <a href="<?php echo $this->Url->build('/nguoidung/useredit/'.$id)?>" class="btn btn-success pull-left"> <i class="icon-arrow-left"></i> Chỉnh sửa</a>
                    <div class="col-sm-2">
                    
                    </div>
                    <a href="<?php echo $this->Url->build('/home/donhang/'.$id)?>" class="btn btn-info pull-left"> <i class="icon-arrow-left"></i> Đơn hàng đã mua</a>
                </div>
            </tr>
        </div>
</div>

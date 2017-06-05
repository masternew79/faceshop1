<div class="col-md-12 feature" ng-controller="userController">
    <div class="col-md-12">
        <div class="col-md-8 text-right">
            <form class="navbar-form out" role="search">
                <div class="form-group out">
                    <input type="text" class="form-control" placeholder="Tìm kiếm thành viên" size="40">
                </div>
                <button type="submit" class="btn btn-info"><b class="glyphicon glyphicon-search"></b></button>
            </form>
        </div>
        <div class="col-md-4 text-right"><a href="#/addUser" class="btn btn-success"><i class="fa fa-user-plus"></i> Thêm thành viên</a></div>
    </div>
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên thành viên</th>
            <th>Ngày sinh</th>
            <th>SDT</th>
            <th>Tùy chọn</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 1;foreach ($this->user as $item){?>
        <tr class="text-center">
            <td><?php $stt++;?></td>
            <td><?php $item->name?></td>
            <td><?php $item->dob?></td>
            <td><?php $item->mobile?></td>
            <td>
                <button class="btn btn-default btn-xs" id="<?php echo $item->id;?>">Xóa</button>
                <a href="" class="btn btn-warning btn-xs">Sửa</a>
                <a href="" class="btn btn-info btn-xs">Chi tiết</a>
            </td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div>
</div>

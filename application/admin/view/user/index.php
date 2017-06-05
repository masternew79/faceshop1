<div class="col-md-12 feature" ng-controller="userController">
    <div class="col-md-12" style="margin-bottom: 20px">
        <div class="col-md-5 text-right col-md-offset-3">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
                    <div class="form-group out">
                        <input type="text" class="form-control" placeholder="Tìm kiếm người dùng" size="40" ng-model="search" ng-keyup="typing(search)">
                    </div>
                </div>
        </div>
    </div>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Mã thành viên</th>
                <th>Email</th>
                <th>Tên thành viên</th>
                <th>SĐT</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center" ng-repeat="user in users">
                <td>{{user.id}}</td>
                <td>{{user.email}}</td>
                <td>{{user.name}}</td>
                <td>{{user.mobile}}</td>
                <td>
                    <button class="btn btn-default btn-xs" id="<?php echo $item->id;?>">Xóa</button>
                    <a href="" class="btn btn-warning btn-xs">Sửa</a>
                    <a href="" class="btn btn-info btn-xs">Chi tiết</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>

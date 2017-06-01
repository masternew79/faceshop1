<div class="col-md-10 feature">
    <div class="col-md-12">
        <div class="col-md-8 text-right">
            <form class="navbar-form" role="search">
                <div class="form-group out">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" size="40">
                </div>
                <button type="submit" class="btn btn-info"><b class="glyphicon glyphicon-search"></b></button>
            </form>
        </div>
        <!--        <div class="col-md-4 text-right"><a href="#/addProduct" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Thêm sản phẩm</a></div>-->
    </div>
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã khách hàng</th>
            <th>Tên</th>
            <th>SDT</th>
            <th>Email</th>
            <th width="250px">Tổng cộng</th>
            <th>Status</th>
            <th>Tùy chọn</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $stt = 1;
        foreach ($this->order as $item)
        {
            ?>

            <tr class="text-center" ng-hide="appear1">
                <td><?php echo $stt++;?></td>
                <td><?php echo $item->user_id;?></td>
                <td><?php echo $item->name;?></td>
                <td><?php echo $item->mobile;?></td>
                <td><?php echo $item->email;?></td>
                <td><?php echo $item->total;?></td>
                <td><?php
                    switch ($item->status)
                    {
                        case 0 : echo 'Mới đặt'; break;
                        case 1: echo 'Đã xác nhận'; break;
                        case 2: echo 'Đang giao'; break;
                        case 3: echo 'Hoàn tất'; break;
                        default : echo 'Đã Hủy'; break;
                    }
                    ?></td>
                <td>
                    <button class="btn btn-default btn-xs" id="<?php echo $item->id;?>">Xóa</button>
                    <a href="<?=HTP::$baseUrl .'/order/update/'.$item->id;?>" class="btn btn-warning btn-xs">Sửa</a>
                    <a href="<?=HTP::$baseUrl .'/order/detail/'.$item->id;?>" class="btn btn-info btn-xs">Chi tiết</a>
                </td>
            </tr>
            <?php
        }

        ?>


        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        $(document).on("click","button",function(){
            var result = confirm("Bạn có muốn xóa Hóa Đơn" + this.id);
            if(result)
            {
                $.get("<?=HTP::$baseUrl;?>" + "/order/delete/" + this.id, function(data, status){
                    alert("Xóa thành công");
                });
            }
        });
    });

</script>


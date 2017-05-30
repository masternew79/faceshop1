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
        <div class="col-md-4 text-right"><a href="#/addProduct" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Thêm sản phẩm</a></div>
    </div>
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>STT</th>
            <th>Hình</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Giảm giá</th>
            <th width="250px">Thông tin</th>
            <th>Lượt xem</th>
            <th>Tùy chọn</th>
        </tr>
        </thead>
        <tbody>




        <tr class="text-center" ng-hide="appear1">
            <td>1</td>
            <td class="image"><img src="../assets/img/acer1.png" alt="" class="img-responsive"></td>
            <td>Lorem ipsum dolor sit amet.</td>
            <td>1000000</td>
            <td>100000</td>
            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, architecto.</td>
            <td>1200</td>
            <td>
                <a href="" class="btn btn-default btn-xs" ng-click="appear1 = delete()">Xóa</a>
                <a href="" class="btn btn-warning btn-xs">Sửa</a>
                <a href="" class="btn btn-info btn-xs">Chi tiết</a>
            </td>
        </tr>
        <p align="center" style="font-size: 25px;">
            <?php
            $sodong = $this->sodong;
            $tongsotrang=ceil($this->totalPage/$sodong);
            $nhom = 5;
            $p = $this->page;

            ?>
            <a style="font-size: 20px;" href="<?=HTP::$baseUrl. '/product'?>"> Đầu </a>&nbsp
            <?php

            if($p != 1)
            {
                ?>
                <a style="font-size: 20px;" href="<?=HTP::$baseUrl. '/product/'. ($p - 1); ?>"> << </a>&nbsp
                <?php
            }

            if($nhom % 2 == 0)
            {
                $dau = $p - ($nhom / 2);
                $cuoi = $p + ($nhom / 2 -1);
            }
            else
            {
                $dau = $p - floor($nhom / 2);
                $cuoi = $p + floor($nhom / 2);
            }
            if($dau < 1)
            {
                $dau = 1;
                $cuoi = $dau + $nhom - 1;
            }

            if($cuoi > $tongsotrang)
            {
                $cuoi = $tongsotrang;
                $dau = $cuoi - $nhom + 1;
            }
            if($nhom > $tongsotrang)
            {
                $dau = 1;
                $cuoi = $tongsotrang;
            }
            for($i=$dau;$i<=$cuoi;$i++)
            {
                if ($i==$p)
                {
                    echo $i."&nbsp;";
                }
                else
                {
                    ?>
                    <a style="font-size: 20px;" href="<?=HTP::$baseUrl. '/product/'. $i; ?></a> <?=$i;?>&nbsp
                    <?php
                }
            }


            if($p != $tongsotrang)
            {
                ?>
                <a style="font-size: 20px;" href="<?=HTP::$baseUrl. '/product/'. ($p + 1); ?>">  >> </a>&nbsp
                <?php
            }
            ?>
            <a style="font-size: 20px;" href="<?=HTP::$baseUrl. '/product/'.  $tongsotrang;?>">  Cuối </a>
        </p>




        </tbody>
    </table>
</div>














<script>
    $('#btn_delete').click(function () {
        console.log(1);
        $.post('<?=HTP::$baseUrl?>/product/add/1', function (data) {
            alert(data);
        });
    });

</script>

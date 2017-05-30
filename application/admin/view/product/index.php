<div class="col-md-10 feature" xmlns:font-size="http://www.w3.org/1999/xhtml">
    <div class="col-md-12">
        <div class="col-md-8 text-right">
            <form class="navbar-form" role="search">
                <div class="form-group out">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" size="40">
                </div>
                <button type="submit" class="btn btn-info"><b class="glyphicon glyphicon-search"></b></button>
            </form>
        </div>
        <div class="col-md-4 text-right"><a href="<?=HTP::$baseUrl .'/product/add'?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Thêm sản phẩm</a></div>
    </div>
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>STT</th>
            <th>Hình</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Giảm giá</th>
            <th>Lượt xem</th>
            <th>Tùy chọn</th>
        </tr>
        </thead>
        <tbody>



        <?php
        $stt = 1;
        foreach ($this->products as $item){ ?>
        <tr class="text-center" ng-hide="appear1">
            <td><?php echo $stt++;?></td>
            <td class="image"><img src="<?=HTP::$resourceUrl .'/' .$item->image;?>" alt="" class="img-responsive"></td>
            <td><?php echo $item->name;?></td>
            <td><?php echo $item->price;?></td>
            <td><?php echo $item->sale_off;?></td>
            <td><?php echo $item->view?></td>
            <td>
                <a href="<?=HTP::$baseUrl .'/product/delete/'. $item->id?>" class="btn btn-default btn-xs" ng-click="appear1 = delete()">Xóa</a>
                <a href="<?=HTP::$baseUrl .'/product/update/'. $item->id?>" class="btn btn-warning btn-xs">Sửa</a>
                <a href="<?=HTP::$baseUrl .'/product/detail/'. $item->id?>" class="btn btn-info btn-xs">Chi tiết</a>
            </td>
        </tr>
        <?php }?>
        </tbody>
    </table>
    <?php
        $sodong = $this->sodong;
        $tongsotrang = ceil($this->totalPage/$sodong);
        $nhom = 5;
        $p = $this->page;
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
    ?>


    <nav aria-label="Page navigation" class="text-center">
        <ul class="pagination">
            <li>
                <a href="<?=HTP::$baseUrl. '/product/1'?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
                for($i = $dau; $i <= $cuoi; $i++)
                {
                    if ($i == $p)
                    {?>
                        <li><a href="#"><?php echo $i;?></a></li>
                   <?php }
                    else
                    {
                        ?>
                        <li><a href="<?=HTP::$baseUrl. '/product/'. $i; ?>"><?php echo $i;?></a></li>
                        <?php
                    }
                }
            ?>
            <li>
                <a href="<?=HTP::$baseUrl. '/product/'.  $tongsotrang;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

</div>















<script>
    $('#btn_delete').click(function () {
        console.log(1);
        $.post('<?=HTP::$baseUrl?>/product/add/1', function (data) {
            alert(data);
        });
    });

</script>

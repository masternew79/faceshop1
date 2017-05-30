<!-- wrapper -->
<div class="wrapper">
    <!-- hot -->
    <div class="hot container">
        <div class="title"><a href="">Kết quả tìm kiếm <i class="fa fa-sign-in none"></i></a></div>

        <?php
        $sellingProduct = $this->products;
        $i = 0;
        $delay = 0.3;
        foreach ($sellingProduct as $selling) :
            ?>
            <div class="col-md-3 col-xs-6 wow fadeInUp p5 " data-wow-delay="<?php echo $delay; ?>s" >
                <div class="col-md-12 thumbnail product">
                    <div class="view col-md-10 col-md-offset-1 text-center">
                        <i class="fa fa-eye"> <?php echo $selling->view ?></i>
                    </div>
                    <a href="<?php echo HTP::$baseUrl . '/product/' . $selling->id ?>">
                        <img src="<?=HTP::$resourceUrl . '/' . $selling->image?>">
                        <div class="caption">
                            <p class="name"><?php echo $selling->name; ?></p>
                            <p class="price"><?php echo $selling->price; ?> VNĐ</p>
                        </div>
                    </a>
                    <div class="action text-center v-align" data-id="<?php echo $selling->id ?>">
                        <div class="col-md-6 buy">
                            <a href=""><i class="fa fa-credit-card"></i> MUA NGAY</a>
                        </div>
                        <div class="col-md-6 add" ng-click="addCart($event)">
                            <i class="fa fa-cart-plus fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if ($i == 3):
                $delay = 0;
                ?>
                <div class="clearfix"></div>
                <?php
            endif;
            $i++;
            $delay += 0.1;
        endforeach;
        ?>
    </div>
    <!-- end hot -->
    <?php
    $key = $this->key;
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
                <a href="<?=HTP::$baseUrl. '/search/1/?search='.$key?>" aria-label="Previous">
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
                    <li><a href="<?=HTP::$baseUrl. '/search/'.$i.'/?search='.$key?>"><?php echo $i;?></a></li>
                    <?php
                }
            }
            ?>
            <li>
                <a href="<?=HTP::$baseUrl. '/search/'.$tongsotrang.'/?search='.$key?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

</div>
<!-- end wrapper -->
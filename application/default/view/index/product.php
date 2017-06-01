<div class="wrapper container-fluid" style="margin-top: 70px">
    <div class="row">
        
        <div class="col-md-10 col-md-offset-1 detail">
            <ol class="breadcrumb">
                    <li><a href="">Trang chủ</a></li>
                    <li><a href="#">Máy tính</a></li>
                    <li><a href="" title="">Asus</a></li>
                    <li class="active">Lorem ipsum dolor sit.</li>
                </ol>
            <?php 
            $product = $this->product;
            foreach ($product as $pro) :
            ?>
            <div class="col-md-5 thumbnail">
                <img src="<?php echo HTP::$resourceUrl . '/' . $pro->image ?>" class="img-responsive">
            </div>
            <div class="col-md-6 info">
                <div class="panel panel-danger">
                    <div class="panel-heading text-center">
                        <div class="name-detail"><?php echo $pro->name; ?></div>
                    </div>
                    <div class="panel-body text-left">
                        <div class="price-detail text-center">Giá: <?php echo $pro->price ?> VND</div>
                        <hr>
                        <div class="info">
                            <?php echo $pro->description ?>
                        </div>
                        <hr>
                        <div class="text-center v-align action-detail">
                            <div class="col-md-6 buy">
                                <a href=""><i class="fa fa-credit-card"></i> MUA NGAY</a>
                            </div>
                            <div class="col-md-6 add v-align">
                                <i class="fa fa-cart-plus fa-2x"></i> THÊM VÀO GIỎ
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
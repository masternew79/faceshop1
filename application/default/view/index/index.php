<div class="index"></div>
<!-- intro -->
<div class="intro" data-parallax="scroll" data-image-src="<?=HTP::$baseUrl?>/public/assets/img/background-new.jpg">
    <div class="container-fluid">
        <!-- name-shop -->
        <div class="row text-center wow rotateInDownLeft slogan" data-wow-duration="2s">
            <b class="fa fa-diamond fa-3x"></b>
            <h1>MUA HÀNG TRỰC TUYẾN</h1>
        </div>
        <hr class="wow rotateInDownRight" >
        <!-- end name-shop -->
        <!-- content-about -->
        <div class="row content">
            <div class="col-md-3 wow fadeInLeft" data-wow-delay="1s">
                <div class="col-md-12 col detail1 v-align">
                    <div class="col-md-3 icon"><b class="fa fa-credit-card"></b></div>
                    <div class="col-md-9 detail col-md-offset-1 ">
                        <h4>Thanh toán trực tuyến</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, quae.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 wow fadeInDown" data-wow-delay="1.4s">
                <div class="col-md-12 detail2  col v-align">
                    <div class="col-md-3 icon"><b class="fa fa-car"></b></div>
                    <div class="col-md-9 detail col-md-offset-1 ">
                        <h4>Miễn phí vận chuyển</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, quae.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 wow fadeInUp" data-wow-delay="1.7s">
                <div class="col-md-12 detail3 col v-align">
                    <div class="col-md-3 icon"><b class="fa fa-gift"></b></div>
                    <div class="col-md-9 detail col-md-offset-1 ">
                        <h4>Quà tặng hấp dẫn</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, quae.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 wow fadeInRight" data-wow-delay="1.9s">
                <div class="col-md-12 col detail4 v-align">
                    <div class="col-md-3 icon"><b class="fa fa-sign-in"></b></div>
                    <div class="col-md-9 detail col-md-offset-1 ">
                        <h4>Phúc lợi thành viên</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, quae.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end conten-about -->
    </div>
</div>
<!-- end intro -->

<!-- wrapper -->
<div class="wrapper">
    <!-- hot -->
    <div class="hot container">
        <div class="title"><a href="">Sản phẩm bán chạy <i class="fa fa-sign-in none"></i></a></div>
        <?php 
        $bestSelling = $this->bestSelling;
         ?>
        <div class="col-md-6 col-xs-6 wow fadeInLeft p5" data-wow-delay="0.3s">
            <div class="col-md-12 thumbnail product">
                <div class="view col-md-6 col-md-offset-3  text-center">
                    <i class="fa fa-eye"></i> <?php echo $bestSelling->view; ?>
                </div>
                <a href="<?php echo HTP::$baseUrl.'/product/'.$bestSelling->id ?>" class="detail">
                    <div class="row top" style="margin: 15px;">
                        <div class="col-md-5" style="padding: 0"><img src="<?=HTP::$resourceUrl . '/' . $bestSelling->image?>" class="img-responsive"></div>
                        <div class="col-md-7">
                            <div class="caption">
                                <p class="name"><?php echo $bestSelling->name ?></p>
                                <p class="price"><?php echo $bestSelling->price ?> VNĐ</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-12 bottom">
                        <p class="label label-info out"><i class="glyphicon glyphicon-align-left"></i></p>
                        <?php echo $bestSelling->description ?>
                    </div>
                </a>
                <div class="clearfix" style="margin-bottom: 20px"></div>
                <div class="action text-center v-align" data-id="<?php echo $bestSelling->id ?>" >
                    <div class="col-md-6 buy"><a href=""><i class="fa fa-credit-card"  ng-click="addCart($event)"></i> MUA NGAY</a></div>
                    <div class="col-md-6 add" ng-click="addCart($event)"><i class="fa fa-cart-plus fa-2x"></i></div>
                </div>
            </div>
        </div>
        <?php 
        $sellingProduct = $this->sellings;
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
                        <a href=""  ng-click="addCart($event)"><i class="fa fa-credit-card"></i> MUA NGAY</a>
                    </div>
                    <div class="col-md-6 add" ng-click="addCart($event)">
                        <i class="fa fa-cart-plus fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if ($i == 1):
                $delay = 0;
            ?>
        <div class="clearfix"></div>
             <?php   
            endif;
            $i++;
            $delay += 0.3;
        endforeach; 
        ?>
    </div>
    <!-- end hot -->
    <!-- hot -->
    <div class="hot container">
        <div class="title"><a href="">Sản phẩm mới nhất <i class="fa fa-sign-in none"></i></a></div>
        <?php 
        $bestSelling = $this->newest;
         ?>
        <div class="col-md-6 col-xs-6 wow fadeInLeft p5" data-wow-delay="0.3s">
            <div class="col-md-12 thumbnail product">
                <div class="view col-md-6 col-md-offset-3  text-center">
                    <i class="fa fa-eye"></i> <?php echo $bestSelling->view; ?>
                </div>
                <a href="<?php echo HTP::$baseUrl.'/product/'.$bestSelling->id ?>" class="detail">
                    <div class="row top" style="margin: 15px;">
                        <div class="col-md-5" style="padding: 0"><img src="<?=HTP::$resourceUrl . '/' . $bestSelling->image?>" class="img-responsive"></div>
                        <div class="col-md-7">
                            <div class="caption">
                                <p class="name"><?php echo $bestSelling->name ?></p>
                                <p class="price"><?php echo $bestSelling->price ?> VNĐ</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-12 bottom">
                        <p class="label label-info out"><i class="glyphicon glyphicon-align-left"></i></p>
                        <?php echo $bestSelling->description ?>
                    </div>
                </a>
                <div class="clearfix" style="margin-bottom: 20px"></div>
                <div class="action text-center v-align" data-id="<?php echo $bestSelling->id ?>" >
                    <div class="col-md-6 buy"><a href=""><i class="fa fa-credit-card"  ng-click="addCart($event)"></i> MUA NGAY</a></div>
                    <div class="col-md-6 add" ng-click="addCart($event)"><i class="fa fa-cart-plus fa-2x"></i></div>
                </div>
            </div>
        </div>
        <?php 
        $sellingProduct = $this->news;
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
                        <a href=""><i class="fa fa-credit-card"  ng-click="addCart($event)"></i> MUA NGAY</a>
                    </div>
                    <div class="col-md-6 add" ng-click="addCart($event)">
                        <i class="fa fa-cart-plus fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if ($i == 1):
                $delay = 0;
            ?>
        <div class="clearfix"></div>
             <?php   
            endif;
            $i++;
            $delay += 0.3;
        endforeach; 
        ?>
    </div>
    <!-- end hot -->
    <!-- hot -->
    <div class="hot container">
        <div class="title"><a href="">Sản phẩm giảm giá <i class="fa fa-sign-in none"></i></a></div>
        <?php 
        $bestSelling = $this->biggestDiscount;
         ?>
        <div class="col-md-6 col-xs-6 wow fadeInLeft p5" data-wow-delay="0.3s">
            <div class="col-md-12 thumbnail product">
                <div class="view col-md-6 col-md-offset-3  text-center">
                    <i class="fa fa-eye"></i> <?php echo $bestSelling->view; ?>
                </div>
                <a href="<?php echo HTP::$baseUrl.'/product/'.$bestSelling->id ?>" class="detail">
                    <div class="row top" style="margin: 15px;">
                        <div class="col-md-5" style="padding: 0"><img src="<?=HTP::$resourceUrl . '/' . $bestSelling->image?>" class="img-responsive"></div>
                        <div class="col-md-7">
                            <div class="caption">
                                <p class="name"><?php echo $bestSelling->name ?></p>
                                <p class="price"><?php echo $bestSelling->price ?> VNĐ</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-12 bottom">
                        <p class="label label-info out"><i class="glyphicon glyphicon-align-left"></i></p>
                        <?php echo $bestSelling->description ?>
                    </div>
                </a>
                <div class="clearfix" style="margin-bottom: 20px"></div>
                <div class="action text-center v-align" data-id="<?php echo $bestSelling->id ?>" >
                    <div class="col-md-6 buy"><a href=""><i class="fa fa-credit-card"  ng-click="addCart($event)"></i> MUA NGAY</a></div>
                    <div class="col-md-6 add" ng-click="addCart($event)"><i class="fa fa-cart-plus fa-2x"></i></div>
                </div>
            </div>
        </div>
        <?php 
        $sellingProduct = $this->discounts;
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
                        <a href=""><i class="fa fa-credit-card" ng-click="addCart($event)"></i> MUA NGAY</a>
                    </div>
                    <div class="col-md-6 add" ng-click="addCart($event)">
                        <i class="fa fa-cart-plus fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if ($i == 1):
                $delay = 0;
            ?>
        <div class="clearfix"></div>
             <?php   
            endif;
            $i++;
            $delay += 0.3;
        endforeach; 
        ?>
    </div>
    <!-- end hot -->
    
</div>
<!-- end wrapper -->
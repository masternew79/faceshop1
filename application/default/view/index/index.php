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
<div class="wrapper" ng-controller="indexController">
    <!-- hot -->
    <div class="new container">
        <div class="title"><a href="">Sản phẩm bán chạy<i class="fa fa-sign-in none"></i></a></div>
        <div class="col-md-6 col-xs-6 wow fadeInLeft p5" data-wow-delay="0.5s" ng-cloak>
            <div class="col-md-12 thumbnail product">
                <a class="detail" href="<?php echo HTP::$baseUrl . '/product/'?>{{bestSelling.id}}" ng-click="increaseView(bestSelling.id)">
                    <div class="discount-label tag" ng-if="bestSelling.sale_off !== '0'"> <span>-{{bestSelling.sale_off}}%</span> </div>
                    <div class="row top" style="margin: 15px;">
                        <div class="col-md-5" style="padding: 0">
                            <img src="<?=HTP::$resourceUrl . '/'?>{{bestSelling.img}}" class="img-responsive">
                            <div class="caption">
                                <p class="name">{{bestSelling.name}}</p>
                                <p class="price">{{bestSelling.salePrice | currency : '' : 0}} VNĐ</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            
                            <div class="bottom" ng-bind-html="bestSelling.description"></div>
                        </div>
                    </div>
                    
                </a>
                <div class="clearfix" style="margin-bottom: 20px"></div>
                <div class="action text-center v-align">
                    <div class="col-md-6 buy"><a href=""><i class="fa fa-credit-card"  ng-click="buyNow(bestSelling.id)"></i> MUA NGAY</a></div>
                    <div class="col-md-6 add" ng-click="pushCart(bestSelling.id)"><i class="fa fa-cart-plus fa-2x"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-xs-6 wow fadeInUp p5 " data-wow-delay="0.3" ng-repeat-start="selling in sellings" ng-cloak>
            <div class="col-md-12 thumbnail product">
                <a href="<?php echo HTP::$baseUrl . '/product/'?>{{selling.id}}" ng-click="increaseView(selling.id)">
                    <div class="discount-label tag" ng-if="selling.sale_off !== '0'"> <span>-{{selling.sale_off}}%</span> </div>
                    <img src="<?=HTP::$resourceUrl . '/'?>{{selling.img}}">
                    <div class="caption">
                        <p class="name">{{selling.name}}</p>
                        <p class="price"> {{selling.salePrice | currency : '' : 0}} VNĐ</p>
                    </div>
                </a>
                <div class="action text-center v-align">
                    <div class="col-md-6 buy">
                        <a href=""  ng-click="pushCart(selling.id)"><i class="fa fa-credit-card"></i> MUA NGAY</a>
                    </div>
                    <div class="col-md-6 add" ng-click="pushCart(selling.id)">
                        <i class="fa fa-cart-plus fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="clearfix" ng-repeat-end ng-show="selling.count === 1"></div>
    </div>
    <!-- end hot -->
    <!-- new -->
    <div class="new container">
        <div class="title"><a href="">Sản phẩm mới nhất <i class="fa fa-sign-in none"></i></a></div>
        <div class="col-md-6 col-xs-6 wow fadeInLeft p5" data-wow-delay="0.5s" ng-cloak>
            <div class="col-md-12 thumbnail product">
                <a class="detail" href="<?php echo HTP::$baseUrl . '/product/'?>{{newest.id}}" ng-click="increaseView(newest.id)">
                    <div class="discount-label tag" ng-if="newest.sale_off !== '0'"> <span>-{{newest.sale_off}}%</span> </div>
                    <div class="row top" style="margin: 15px;">
                        <div class="col-md-5" style="padding: 0">
                            <img src="<?=HTP::$resourceUrl . '/'?>{{newest.img}}" class="img-responsive">
                            <div class="caption">
                                <p class="name">{{newest.name}}</p>
                                <p class="price">{{newest.salePrice | currency : '' : 0}} VNĐ</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            
                            <div class="bottom" ng-bind-html="newest.description"></div>
                        </div>
                    </div>
                    
                </a>
                <div class="clearfix" style="margin-bottom: 20px"></div>
                <div class="action text-center v-align">
                    <div class="col-md-6 buy"><a href=""><i class="fa fa-credit-card"  ng-click="buyNow(newest.id)"></i> MUA NGAY</a></div>
                    <div class="col-md-6 add" ng-click="pushCart(newest.id)"><i class="fa fa-cart-plus fa-2x"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-xs-6 wow fadeInUp p5 " data-wow-delay="0.3" ng-repeat-start="new in news" ng-cloak>
            <div class="col-md-12 thumbnail product">
                <a href="<?php echo HTP::$baseUrl . '/product/'?>{{new.id}}" ng-click="increaseView(bestnew.id)">
                    <div class="discount-label tag" ng-if="new.sale_off !== '0'"> <span>-{{new.sale_off}}%</span> </div>
                    <img src="<?=HTP::$resourceUrl . '/'?>{{new.img}}">
                    <div class="caption">
                        <p class="name">{{new.name}}</p>
                        <p class="price"> {{new.salePrice | currency : '' : 0}} VNĐ</p>
                    </div>
                </a>
                <div class="action text-center v-align">
                    <div class="col-md-6 buy">
                        <a href=""  ng-click="pushCart(new.id)"><i class="fa fa-credit-card"></i> MUA NGAY</a>
                    </div>
                    <div class="col-md-6 add" ng-click="pushCart(new.id)">
                        <i class="fa fa-cart-plus fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="clearfix" ng-repeat-end ng-show="new.count === 1"></div>
    </div>
    <!-- end new -->
    <!-- disc -->
    <div class="new container">
        <div class="title"><a href="">Sản phẩm giảm giá <i class="fa fa-sign-in none"></i></a></div>
        <div class="col-md-6 col-xs-6 wow fadeInLeft p5" data-wow-delay="0.5s" ng-cloak>
            <div class="col-md-12 thumbnail product">
                <a class="detail" href="<?php echo HTP::$baseUrl . '/product/'?>{{biggestDiscount.id}}" ng-click="increaseView(biggestDiscount.id)">
                    <div class="discount-label tag" ng-if="biggestDiscount.sale_off !== '0'"> <span>-{{biggestDiscount.sale_off}}%</span> </div>
                    <div class="row top" style="margin: 15px;">
                        <div class="col-md-5" style="padding: 0">
                            <img src="<?=HTP::$resourceUrl . '/'?>{{biggestDiscount.img}}" class="img-responsive">
                            <div class="caption">
                                <p class="name">{{biggestDiscount.name}}</p>
                                <p class="price">{{biggestDiscount.salePrice | currency : '' : 0}} VNĐ</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            
                            <div class="bottom" ng-bind-html="biggestDiscount.description"></div>
                        </div>
                    </div>
                    
                </a>
                <div class="clearfix" style="margin-bottom: 20px"></div>
                <div class="action text-center v-align">
                    <div class="col-md-6 buy"><a href=""><i class="fa fa-credit-card"  ng-click="buyNow(biggestDiscount.id)"></i> MUA NGAY</a></div>
                    <div class="col-md-6 add" ng-click="pushCart(biggestDiscount.id)"><i class="fa fa-cart-plus fa-2x"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-xs-6 wow fadeInUp p5 " data-wow-delay="0.3" ng-repeat-start="discount in discounts" ng-cloak>
            <div class="col-md-12 thumbnail product">
                <a href="<?php echo HTP::$baseUrl . '/product/'?>{{discount.id}}" ng-click="increaseView(bestdiscount.id)">
                    <div class="discount-label tag" ng-if="discount.sale_off !== '0'"> <span>-{{discount.sale_off}}%</span> </div>
                    <img src="<?=HTP::$resourceUrl . '/'?>{{discount.img}}">
                    <div class="caption">
                        <p class="name">{{discount.name}}</p>
                        <p class="price"> {{discount.salePrice | currency : '' : 0}} VNĐ</p>
                    </div>
                </a>
                <div class="action text-center v-align">
                    <div class="col-md-6 buy">
                        <a href=""  ng-click="pushCart(discount.id)"><i class="fa fa-credit-card"></i> MUA NGAY</a>
                    </div>
                    <div class="col-md-6 add" ng-click="pushCart(discount.id)">
                        <i class="fa fa-cart-plus fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="clearfix" ng-repeat-end ng-show="discount.count === 1"></div>
    </div>
    <!-- end disc -->
    
</div>
<!-- end wrapper -->
<div class="wrapper container-fluid" style="margin-top: 70px" ng-controller="categoryController">
    <div class="row">
        <div class="col-md-12 list">
            <div ng-repeat-start="product in products" class="col-md-3 col-xs-6 wow fadeInUp p5 " data-wow-delay="0.2s" ng-cloak>
                <div class="col-md-12 thumbnail product">
                    <div class="view col-md-10 col-md-offset-1 text-center" ng-cloak>
                        <i class="fa fa-eye"> {{product.view}}</i>
                    </div>
                    <a href="<?php echo HTP::$baseUrl . '/product/'; ?>{{product.id}}">
                        <img src="<?=HTP::$resourceUrl . '/'?>{{product.img}}" class="img-responsive">
                        <div class="caption">
                            <p class="name" ng-cloak>{{product.name}}</p>
                            <p class="price" ng-cloak>{{product.salePrice}} VNĐ</p>
                        </div>
                    </a>
                    <div class="action text-center v-align" data-id="{{product.id}}">
                        <div class="col-md-6 buy" ng-click="addCart($event)">
                            <a href="" ><i class="fa fa-credit-card"></i> MUA NGAY</a>
                        </div>
                        <div class="col-md-6 add"  ng-click="addCart($event)">
                           <i class="fa fa-cart-plus fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix" ng-show="(product.count % 4) == 3" ng-repeat-end></div>
            <div class="clearfix"></div>
            <div class="row text-center">
                <ul class="pagination">
                    <li ng-click="changePage(1)"><a>&laquo;</a></li>
                    <li ng-repeat="page in paging"><a ng-model="page.link" ng-click="changePage(page.link)">{{page.link}}</a></li>
                    <li ng-click="changePage(groups)"><a>&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
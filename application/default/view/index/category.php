<div class="wrapper container-fluid" style="margin-top: 70px" ng-controller="categoryController">
    <div class="row">
        <div class="col-md-2 sidebar">
            <div class="panel panel-danger">
                <div class="panel-heading">Tùy chọn</div>
                <div class="panel-body">
                    <h4><span class="label label-danger">Hãng</span></h4>
                    <?php 
                    $trademarks = $this->trademarks;
                    foreach ($trademarks as $trademark):
                     ?>
                    <div class="radio">
                      <label><input type="checkbox" name="trademark" value="<?php echo $trademark->id; ?>"> <?php echo ucfirst($trademark->name) ?></label>
                    </div>
                    <?php 
                    endforeach;
                     ?>
                </div>
            </div>
        </div>
        <div class="col-md-10 list">
            <ol class="breadcrumb">
                <li><a href="<?php echo HTP::$baseUrl; ?>">Trang chủ</a></li>
                <li><a href="#">Máy tính</a></li>
                <li class="active">Asus</li>
                <div class="row text-right sort pull-right">
                    <span class="">SẮP XẾP: </span>
                    <button type="button" class="btn btn-default btn-black btn-xs" ng-click="sortBy('price')">Giá <i ng-show="propertyName === 'price'" class="fa fa-caret-down"></i></button>
                    <button type="button" class="btn btn-default btn-black btn-xs" ng-click="sortBy('sale_off')">Giảm giá <i ng-show="propertyName ==='sale_off'" class="fa fa-caret-down"></i></button>
                    <button type="button" class="btn btn-default btn-black btn-xs" ng-click="sortBy('sold')">Số lượng bán <i ng-show="propertyName === 'sold'" class="fa fa-caret-down"></i></button>
                </div>
            </ol>
            
            <div ng-repeat-start="product in products" class="col-md-3 col-xs-6 wow fadeInUp p5 " data-wow-delay="<?php echo $delay ?>s" ng-cloak>
                <div class="col-md-12 thumbnail product">
                    <div class="view col-md-10 col-md-offset-1 text-center" ng-cloak>
                        <i class="fa fa-eye"> {{product.view}}</i>
                    </div>
                    <a href="">
                        <img src="<?=HTP::$resourceUrl . '/'?>{{product.img}}" class="img-responsive">
                        <div class="caption">
                            <p class="name" ng-cloak>{{product.name}}</p>
                            <p class="price" ng-cloak>{{product.price}} VNĐ</p>
                        </div>
                    </a>
                    <div class="action text-center v-align" data-id="{{product.id}}">
                        <div class="col-md-6 buy">
                            <a href=""><i class="fa fa-credit-card"></i> MUA NGAY</a>
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
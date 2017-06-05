<div class="wrapper container-fluid checkout" style="margin-top: 70px" ng-controller="checkoutController">
    <div class="row">
        <div class="col-md-5">
            <div class="cart-list-checkout animated">
                <div>
                    <div class="col-md-11 text-center">
                        <h4 class="cart-title text-center">ĐƠN HÀNG</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
                <ul class="list-group">
                    <li class="text-center text-danger" ng-if="!cart.length">Vui lòng thêm sản phẩm vào đơn hàng</li>
                    <li ng-if="cart.length" class="list-group-item clearfix" ng-repeat="product in cart | filter:query as filtered" ng-cloak>
                        <div class="cart-item" data-id="{{product.id}}">
                            <div class="col-md-2 cart-item-img thumbnail"><img src="<?=HTP::$resourceUrl . '/'?>{{product.img}}" class="img-responsive"></div>
                            <div class="col-md-5">
                                <div class="row cart-item-name">
                                    <a href="">{{product.name}}</a>
                                </div>
                                <div class="row cart-item-price">{{product.salePrice | currency : '': 0}} VNĐ</div>
                            </div>
                            <div class="col-md-5 quantity">
                                <button type="button" class="minus" ng-click=minus($event)><i class="fa fa-minus"></i></button>
                                <input type="text" name="quantity"  ng-model="product.qty" class="text-center" size="5">
                                <button type="button" class="plus" ng-click="plus($event)"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-7 checkout text-center" ng-if="!cart.length">
            <a href="<?php echo HTP::$baseUrl . "/category/1" ?>" class="btn btn-warning">Tiếp tục mua sắm</a>
            
        </div>
        <div class="col-md-7 checkout" ng-if="cart.length">
            <div class="border-bot row">
                <div class="col-md-12">
                    <div class="col-md-5  title-check text-left">Tạm tính:</div>
                    <div class="col-md-5 price text-right" ng-cloak>{{$parent.total | currency : '' : 0}} VNĐ</div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-5  title-check text-left">Phí vận chuyển:</div>
                    <div class="col-md-5 price text-right" ng-cloak>{{$parent.ship | currency : '' : 0}} VNĐ</div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-5 total text-left">Thành tiền:</div>
                    <div class="col-md-5 price text-right" ng-cloak>{{$parent.lastPrice | currency : '' : 0}} VNĐ</div>
                </div>
            </div>
            <div class="border-bot row">
                <h5 class="text-center text-uppercase"> Thông tin người nhận</h5>
                <div class="col-md-12">
                    <form actio method="POST" class="form-horizontal text-center">
                        <div class="form-group">
                            <label class="control-label col-md-3">Họ Tên</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control name" id="name" name="receiver-name" value="{{user.name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Số điện thoại </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control mobile text-center" id="mobile" name="receiver-mobile" value="{{user.mobile}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" >Địa chỉ </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control text-center" id="address" name="receiver-address" placeholder="Tên đường, số nhà, ..." value="{{user.address}}">
                                <div style="margin: 5px"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Thanh toán </label>
                            <label class="radio-inline"><input type="radio" name="payment" checked>Tiền mặt (trực tiếp)</label>
                            <label class="radio-inline"><input type="radio" name="payment">Trực tuyến (online)</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button class="btn btn-danger text-uppercase" ng-click="checkout()">Đặt hàng</button>
            </div>
        </div>
    </div>
</div>
<div class="wrapper container-fluid checkout" style="margin-top: 70px" ng-controller="categoryController">
    <div class="row">
        <div class="col-md-6">
            <div class="cart-list-checkout animated">
                <div>
                    <div class="col-md-11 text-center">
                        <h4 class="cart-title text-center">Giỏ hàng</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
                <ul class="list-group">
                    <li class="list-group-item clearfix" ng-repeat="product in cart | filter:query as filtered">
                        <div class="cart-item" data-id="{{product.id}}">
                            <div class="col-md-2 cart-item-img thumbnail"><img src="<?=HTP::$resourceUrl . '/'?>{{product.img}}" class="img-responsive"></div>
                            <div class="col-md-5">
                                <div class="row cart-item-name">
                                    <a href="">{{product.name}}</a>
                                </div>
                                <div class="row cart-item-price">{{product.price}} VNĐ</div>
                            </div>
                            <div class="col-md-4 quantity">
                                <button type="button" class="minus" ng-click=minus($event)><i class="fa fa-minus"></i></button>
                                <input type="text" name="quantity"  ng-model="product.qty" class="text-center" size="5">
                                <button type="button" class="plus" ng-click="plus($event)"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="col-md-1 cart-item-delete" ng-click="remove($event)"><i class="fa fa-close"></i></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 checkout">
            <div class="border-bot row">
                <div class="col-md-12">
                    <div class="col-md-5  title-check text-left">Tạm tính:</div>
                    <div class="col-md-5 price text-right">{{total}} VNĐ</div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-5  title-check text-left">Phí vận chuyển:</div>
                    <div class="col-md-5 price text-right">{{ship}} VNĐ</div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-5 total text-left">Tổng tiền:</div>
                    <div class="col-md-5 price text-right">{{thanhtien}} VNĐ</div>
                </div>
            </div>
            <div class="border-bot row">
                <div class="col-md-12">
                    <form actio method="POST" class="form-horizontal text-center">
                        <div class="form-group">
                            <label class="control-label col-md-2">Họ Tên</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control name" id="name" name="name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Số điện thoại </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control mobile text-center" id="mobile" name="mobile" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2" >Địa chỉ </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control text-center" id="address" name="address" placeholder="Tên đường, số nhà, ...">
                                <div style="margin: 5px"></div>
                                <div class="col-md-4">
                                    Tỉnh/Thành phố:
                                    <select class="select-province" name="province">
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    Quận/Huyện:
                                    <select class="select-district" name="district">
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    Phường/Xã: 
                                    <select class="select-ward" name="ward">
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col md-3 title-check">Hình thức thanh toán</div>
                <div class="col md-9">
                    <div class="col-md-3">
                        <button class="btn btn-success" ng-click="checkout()">Đặt hàng</button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-warning">Thanh toán tiền mặt</button>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <a href="" class="btn btn-danger">Thanh toán trực tuyến</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
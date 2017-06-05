<div class="col-md-12 feature" xmlns:font-size="http://www.w3.org/1999/xhtml" ng-controller="productController">
    <div class="col-md-12" style="margin-bottom: 20px">
        <div class="col-md-5 text-right col-md-offset-3">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
                    <div class="form-group out">
                        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" size="40" ng-model="search" ng-keyup="typing(search)">
                    </div>
                </div>
        </div>
        <div class="col-md-4 text-right"><a href="<?=HTP::$baseUrl .'/product/add'?>" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Thêm sản phẩm</a></div>
    </div>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th><button type="button" class="btn btn-default btn-black btn-xs" ng-click="sortBy('id')">Mã sản phẩm <i ng-show="propertyName === 'id'" ng-class="{'fa fa-caret-down' : reverse, 'fa fa-caret-up' : !reverse}"></i></button></th>
                <th>Hình</th>
                <th><button type="button" class="btn btn-default btn-black btn-xs" ng-click="sortBy('name')">Tên <i ng-show="propertyName === 'name'" ng-class="{'fa fa-caret-down' : reverse, 'fa fa-caret-up' : !reverse}"></i></button></th>
                <th><button type="button" class="btn btn-default btn-black btn-xs" ng-click="sortBy('price')">Giá <i ng-show="propertyName === 'price'" ng-class="{'fa fa-caret-down' : reverse, 'fa fa-caret-up' : !reverse}"></i></button></th>
                <th><button type="button" class="btn btn-default btn-black btn-xs" ng-click="sortBy('sale_off')">Giảm giá <i ng-show="propertyName === 'sale_off'" ng-class="{'fa fa-caret-down' : reverse, 'fa fa-caret-up' : !reverse}"></i></button></th>
                <th><button type="button" class="btn btn-default btn-black btn-xs" ng-click="sortBy('view')">Xem <i ng-show="propertyName === 'view'" ng-class="{'fa fa-caret-down' : reverse, 'fa fa-caret-up' : !reverse}"></i></button></th>
                <th><button type="button" class="btn btn-default btn-black btn-xs" ng-click="sortBy('sold')">Bán ra <i ng-show="propertyName === 'sold'" ng-class="{'fa fa-caret-down' : reverse, 'fa fa-caret-up' : !reverse}"></i></button></th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center" ng-repeat="product in products">
                <td>{{product.id}}</td>
                <td class="image"><img src="<?=HTP::$resourceUrl . '/'?>{{product.img}}" alt="" class="img-responsive"></td>
                <td>{{product.name}}</td>
                <td>{{product.price | currency : '' : 0}} VNĐ</td>
                <td>{{product.sale_off}} %</td>
                <td>{{product.view}}</td>
                <td>{{product.sold}}</td>
                <td>
                    <button class="btn btn-default btn-xs">Xóa</button>
                    <a href="" class="btn btn-warning btn-xs">Sửa</a>
                    <a href="" class="btn btn-info btn-xs">Chi tiết</a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="clearfix"></div>
    <div class="row text-center" ng-if="search === '' || search === undefined">
        <ul class="pagination">
            <li ng-click="changePage(1)"><a>&laquo;</a></li>
            <li ng-repeat="page in paging" ng-model="page.link" ng-click="changePage(page.link)" ng-class="{active: page.active}"><a>{{page.link}}</a></li>
            <li ng-click="changePage(groups)"><a>&raquo;</a></li>
        </ul>
    </div>
</div>

<?php
    $item = $this->product;
?>
<div class="col-md-10 feature text-center">
    <div class="col-md-10 col-md-offset-1">
        <div class="title alert alert-success">Cập nhật sản phẩm</div>
        <form action="" method="POST" class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-md-3">Lựa chọn hình ảnh </label>
                <div class="col-md-9">
                    <input type="file" name="" value="" placeholder="">
                </div>
            </div>
            <div class="form-group" ng-class="{'is-focus':focus===true}">
                <label class="control-label col-md-3">Tên sản phẩm </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="<?=$item->name;?>" id="name" name="Product[name]" ng-focus="focus = true" ng-blur="focus = false">
                </div>
            </div>
            <div class="form-group" ng-class="{'is-focus':focus===true}">
                <label class="control-label col-md-3">Giá </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="<?=$item->price;?>" id="name" name="Product[price]" ng-focus="focus = true" ng-blur="focus = false">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Mô tả </label>
                <div class="col-md-9">
                    <textarea name="Product[description]" type="text" class="form-control" id="price" ng-value="<?=$item->description;?>"></textarea>
                </div>
            </div>
<!--            <div class="form-group">-->
<!--                <label class="control-label col-md-2">Nhãn hiệu </label>-->
<!--                <div class="col-md-3 col-md-offset-2">-->
<!--                    <div class="col-md-12">-->
<!--                        <select name="gender" disabled>-->
<!--                            <option value="1" ng-selected="gender == 1">Nam</option>-->
<!--                            <option value="0" ng-selected="gender == 0">Nữ</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
</div>
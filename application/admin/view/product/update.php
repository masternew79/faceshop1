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
                    <input type="text" class="form-control" id="name" name="name" ng-focus="focus = true" ng-blur="focus = false">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Thông tin </label>
                <div class="col-md-9">
                    <textarea name="" type="text" class="form-control" id="price" name="price"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
</div>
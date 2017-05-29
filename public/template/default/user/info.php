<div class="col-md-10 feature">

	<div class="alert alert-danger user-title"><i class="fa fa-address-book"></i> Thông tin cá nhân</div>
	<form action="" method="POST" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-md-2">Tên </label>
			<div class="col-md-9">
				<input type="text" class="form-control" id="name" name="name" value="{{user.name}}">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Số điện thoại </label>
			<div class="col-md-9">
				<input type="text" class="form-control" id="price" name="price" value="{{user.mobile}}">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Ngày sinh</label>
			<div class="col-md-9">
				<div class="col-md-3">
					<select name="day">
						<option ng-repeat="day in range(1, 31)" value="day">{{day}}</option>
					</select>
				</div>
				<div class="col-md-3">
					<select name="day">
						<option ng-repeat="month in range(1, 12)" value="month">{{month}}</option>
					</select>
				</div>
				<div class="col-md-3">
					<select name="day">
						<option ng-repeat="year in range(1970, 2017)" value="year">{{year}}</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Giới tính </label>
			<div class="col-md-9">
				<div class="col-md-3">
					<select name="day">
						<option value="0">Nam</option>
						<option value="1">Nữ</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Địa chỉ </label>
			<div class="col-md-9">
				<div class="col-md-3">
					<select name="day">
						<option value="0">Chọn thành phố</option>
						<option ng-repeat="day in range(1, 31)" value="day">{{day}}</option>
					</select>
				</div>
				<div class="col-md-3">
					<select name="day">
					<option value="0">Chọn quận/huyện</option>
						<option ng-repeat="month in range(1, 12)" value="month">{{month}}</option>
					</select>
				</div>
				<div class="col-md-3">
					<select name="day">
						<option value="0">Chọn phường/xã</option>
						<option ng-repeat="year in range(1970, 2017)" value="year">{{year}}</option>
					</select>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="price" name="price" value="">
				</div>
			</div>
		</div>
	</form>

	
</div>
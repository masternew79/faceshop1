<div class="col-md-10 feature">

	<div class="alert alert-danger user-title"><i class="fa fa-address-book"></i> Thông tin cá nhân</div>
	<form actio method="POST" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-md-2">Tên </label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="name" name="name" value="{{name}}" ng-disabled="!updateInfo">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Số điện thoại </label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="price" name="price" value="{{mobile}}" ng-disabled="!updateInfo">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Ngày sinh</label>
			<div class="col-md-10">
				<div class="col-md-2">
					<select name="day" ng-disabled="!updateInfo">
						<option ng-repeat="day in range(1, 31)" value="day" ng-selected="day == Day">{{day}}</option>
					</select>
				</div>
				<div class="col-md-2">
					<select name="day" ng-disabled="!updateInfo">
						<option ng-repeat="month in range(1, 12)" value="month" ng-selected="month == Month">{{month}}</option>
					</select>
				</div>
				<div class="col-md-2">
					<select name="day" ng-disabled="!updateInfo">
						<option ng-repeat="year in range(1970, 2017)" value="year" ng-selected="year = Year">{{year}}</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Giới tính </label>
			<div class="col-md-10">
				<div class="col-md-3">
					<select name="day" ng-disabled="!updateInfo">
						<option value="1" ng-selected="gender == 1">Nam</option>
						<option value="0" ng-selected="gender == 0">Nữ</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" >Địa chỉ </label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="price" name="price" ng-value="address" placeholder="Tên đường, số nhà, ..." ng-disabled="!updateInfo">
				<div style="margin: 5px"></div>
				<div class="col-md-3">
					Thành phố:
					<select name="day" ng-disabled="!updateInfo" ng-model='currentProvince'>
						<option ng-repeat="province in provinces" ng-value="province.id" ng-selected="province.id == province_id">{{province.name}} </option>
					</select>
				</div>
				<div class="col-md-3">
					Quận/Huyện:
					<select name="day" ng-disabled="!updateInfo">
						<option value="0">Quận / Huyện</option>
						<option ng-repeat="district in districts" value="district.id" ng-selected="district.id == district_id">{{district.name}}</option>
					</select>
				</div>
				<div class="col-md-3">
					Phường/Xã: 
					<select name="day" ng-disabled="!updateInfo">
						<option value="0">Phường/Xã</option>
						<option ng-repeat="ward in wards" value="ward.id" ng-selected="ward.id == ward_id">{{ward.name}}</option>
					</select>
				</div>
			</div>
		</div>
		<div class="text-right">
			<button type="button" class="btn btn-warning" ng-if="!updateInfo && !updatePass" ng-click="changePass()">Thay đổi mật khẩu</button>
			<button type="button" class="btn btn-success" ng-click="changeInfo()" ng-show="!updateInfo">Cập nhật thông tin</button>
			<button type="button" class="btn btn-success"  ng-if="updateInfo" ng-click="changeInfo()">Xác nhận</button>
		</div>
	</form>
	<form actio method="POST" class="form-horizontal"  ng-if="updatePass">
		<div class="form-group">
			<label class="control-label col-md-2">Mật khẩu hiện tại </label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="name" name="name" value="" ng-disabled="!update">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Mật khẩu mới </label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="price" name="price" value="" ng-disabled="!update">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Nhập lại mật khẩu </label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="price" name="price" value="" ng-disabled="!update">
			</div>
		</div>
		<div class="text-right">
			<button type="button" class="btn btn-success" ng-click="changePass()">Thay đổi</button>
		</div>
	</form>




	
</div>
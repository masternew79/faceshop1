<div class="wrapper container-fluid user" style="margin-top: 70px; background-image: url(<?php echo HTP::$resourceUrl; ?>/assets/img/admin-back.jpg);" ng-controller="userInfoController">
	<div class="row sub-wrap" style="background: rgba(0, 0, 0, 0.5)">
		<div class="col-md-8 col-md-offset-2 feature">
			<div class="alert alert-danger user-title"><i class="fa fa-address-book"></i> Thông tin cá nhân</div>
			<form actio method="POST" class="form-horizontal text-center">
				<div class="form-group">
					<label class="control-label col-md-2">Họ Tên</label>
					<div class="col-md-10">
						<input type="text" class="form-control name" id="name" name="name" value="" ng-model="user.name" ng-disabled="!updateInfo">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Số điện thoại </label>
					<div class="col-md-10">
						<input type="text" class="form-control mobile text-center" id="mobile" name="mobile" ng-model="user.mobile" value="" ng-disabled="!updateInfo">
					</div>
				</div>
				<div class="form-group text-center">
					<label class="control-label col-md-2">Ngày sinh</label>
					<div class="col-md-6 col-md-offset-2">
						<div class="col-md-4">
							<select name="day" ng-disabled="!updateInfo">
								<option ng-repeat="day in days" ng-value="{{day}}" ng-selected="day == Day">{{day}}</option>
							</select>
						</div>
						<div class="col-md-4">
							<select name="day" ng-disabled="!updateInfo">
								<option ng-repeat="month in months" ng-value="{{month}}" ng-selected="month == Month">{{month}}</option>
							</select>
						</div>
						<div class="col-md-4">
							<select name="day" ng-disabled="!updateInfo">
								<option ng-repeat="year in years" ng-value="{{year}}" ng-selected="year == Year">{{year}}</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Giới tính </label>
					<div class="col-md-3 col-md-offset-2">
						<div class="col-md-12">
							<select name="gender" ng-disabled="!updateInfo">
								<option value="1" ng-selected="user.gender == 1">Nam</option>
								<option value="0" ng-selected="user.gender == 0">Nữ</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2" >Địa chỉ </label>
					<div class="col-md-10">
						<input type="text" class="form-control text-center" id="address" name="address" placeholder="Tên đường, số nhà, ..." ng-model="user.address" ng-disabled="!updateInfo">
					</div>
				</div>
				<br>
				<div class="text-right">
					<button type="button" class="btn btn-link updatepass" ng-if="!updatePass" ng-click="changePass()" ng-show="!updateInfo">Thay đổi mật khẩu</button>
					<button type="button" class="btn btn-success updateinfo" ng-if="!updateInfo" ng-show="!updatePass" ng-click="changeInfo()">Cập nhật thông tin</button>
					<button type="button" class="btn btn-danger cancel" ng-if="updateInfo" ng-click="changeInfo()">Hủy</button>
					<button type="button" class="btn btn-primary confirm" ng-if="updateInfo" ng-click="changeInfo()">Xác nhận</button>
				</div>
			</form>
			<form method="POST" class="form-horizontal form-update-pass" ng-if="updatePass">
				<div class="form-group">
					<label class="control-label col-md-2">Mật khẩu hiện tại </label>
					<div class="col-md-10">
						<input type="password" class="form-control" id="name" name="current-password" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Mật khẩu mới </label>
					<div class="col-md-10">
						<input type="password" class="form-control" id="price" name="new-password" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Nhập lại mật khẩu </label>
					<div class="col-md-10">
						<input type="password" class="form-control" id="price" name="re-enter" value="">
					</div>
				</div>
				<div class="text-right">
					<button type="button" class="btn btn-danger cancelpass" " ng-click="changePass()">Hủy</button>
					<button type="button" class="btn btn-primary confirmpass" ng-click="changePass()">Xác nhận</button>
				</div>
			</form>
		</div>
	</div>
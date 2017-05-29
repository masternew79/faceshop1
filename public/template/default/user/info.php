<div class="col-md-10 feature">

	<div class="alert alert-danger user-title"><i class="fa fa-address-book"></i> Thông tin cá nhân</div>
	<form action="" method="POST" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-md-2">Tên </label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="name" name="name" value="{{user.name}}" disabled>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Số điện thoại </label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="price" name="price" value="{{user.mobile}}" disabled>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Ngày sinh</label>
			<div class="col-md-10">
				<div class="col-md-2">
					<select name="day" disabled="">
						<option ng-repeat="day in range(1, 31)" value="day">{{day}}</option>
					</select>
				</div>
				<div class="col-md-2">
					<select name="day" disabled="">
						<option ng-repeat="month in range(1, 12)" value="month">{{month}}</option>
					</select>
				</div>
				<div class="col-md-2">
					<select name="day" disabled="">
						<option ng-repeat="year in range(1970, 2017)" value="year">{{year}}</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Giới tính </label>
			<div class="col-md-10">
				<div class="col-md-3">
					<select name="day" disabled="">
						<option value="0">Nam</option>
						<option value="1">Nữ</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2">Địa chỉ </label>
			<div class="col-md-10">
				<div class="col-md-3">
					<select name="day" disabled="">
						<option value="0">Thành phố</option>
						<option ng-repeat="day in range(1, 31)" value="day">{{day}}</option>
					</select>
				</div>
				<div class="col-md-3">
					<select name="day" disabled="">
					<option value="0">Quận / Huyện</option>
						<option ng-repeat="month in range(1, 12)" value="month">{{month}}</option>
					</select>
				</div>
				<div class="col-md-3">
					<select name="day" disabled="">
						<option value="0">Phường/Xã</option>
						<option ng-repeat="year in range(1970, 2017)" value="year">{{year}}</option>
					</select>
				</div>
				<div class="col-md-10">
					<input type="text" class="form-control" id="price" name="price" value="" disabled="" placeholder="Tên đường, số nhà, ...">
				</div>
			</div>
		</div>
	</form>

	
</div>
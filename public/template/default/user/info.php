<div class="col-md-10 feature">

	<div class="alert alert-danger user-title"><i class="fa fa-address-book"></i> Thông tin cá nhân</div>
	<form action="" method="POST" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-md-3">Tên </label>
			<div class="col-md-9">
				<input type="text" class="form-control" id="name" name="name" value="{{user.name}}">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3">Số điện thoại </label>
			<div class="col-md-9">
				<input type="text" class="form-control" id="price" name="price" value="{{user.mobile}}">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3">Ngày sinh </label>
			<div class="col-md-9">
				<select name="day" multiple>
					<option value=""></option>
					<option value=""></option>}
				</select>
				
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3">Giới tính </label>
			<div class="col-md-9">
				<label class="radio-inline"><input type="radio" value="" name="gender">Nam</label>
				<label class="radio-inline"><input type="radio" value="" name="gender">Nữ</label>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3">Địa chỉ </label>
			<div class="col-md-9">
				<input type="text" class="form-control" id="price" name="price">
			</div>
		</div>
	</form>

	
</div>
<div class="wrapper container-fluid user" style="margin-top: 70px; background-image: url(<?php echo HTP::$resourceUrl; ?>/assets/img/admin-back.jpg);">
	<div class="row sub-wrap" style="background: rgba(0, 0, 0, 0.5)">
		<div class="col-md-8 col-md-offset-2 feature">
			<div class="alert alert-danger user-title"><i class="fa fa-address-book"></i> Thông tin cá nhân</div>
			<form actio method="POST" class="form-horizontal text-center">
				<div class="form-group">
					<label class="control-label col-md-2">Họ Tên</label>
					<div class="col-md-10">
						<input type="text" class="form-control name" id="name" name="name" value="" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Số điện thoại </label>
					<div class="col-md-10">
						<input type="text" class="form-control mobile text-center" id="mobile" name="mobile" value="" disabled>
					</div>
				</div>
				<div class="form-group text-center">
					<label class="control-label col-md-2">Ngày sinh</label>
					<div class="col-md-6 col-md-offset-2">
						<div class="col-md-4">
							<select name="day" disabled>
								<?php
								for($i = 1; $i <= 31; $i++):
									?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php 
								endfor;
								?>
							</select>
						</div>
						<div class="col-md-4">
							<select name="month" disabled>
								<?php
								for($i = 1; $i <= 12; $i++):
									?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php 
								endfor;
								?>
							</select>
						</div>
						<div class="col-md-4">
							<select name="year" disabled>
								<?php
								for($i = 1990; $i <= 2017; $i++):
									?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php 
								endfor;
								?>
							</select>

						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Giới tính </label>
					<div class="col-md-3 col-md-offset-2">
						<div class="col-md-12">
							<select name="gender" disabled>
								<option value="1" ng-selected="gender == 1">Nam</option>
								<option value="0" ng-selected="gender == 0">Nữ</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2" >Địa chỉ </label>
					<div class="col-md-10">
						<input type="text" class="form-control text-center" id="address" name="address" placeholder="Tên đường, số nhà, ..." disabled>
						<div style="margin: 5px"></div>
						<div class="col-md-12">
							<div class="col-md-4">
								Tỉnh/Thành phố:
								<select class="select-province" name="province" disabled>
								</select>
							</div>
							<div class="col-md-4">
								Quận/Huyện:
								<select class="select-district" name="district" disabled>
								</select>
							</div>
							<div class="col-md-4" disabled>
								Phường/Xã: 
								<select class="select-ward" name="ward" disabled>
								</select>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="text-right">
					<button type="button" class="btn btn-link updatepass">Thay đổi mật khẩu</button>
					<button type="button" class="btn btn-success updateinfo">Cập nhật thông tin</button>
					<button type="button" class="btn btn-danger hide cancel">Hủy</button>
					<button type="button" class="btn btn-primary hide confirm">Xác nhận</button>
				</div>
			</form>
			<form method="POST" class="form-horizontal hide form-update-pass">
				<div class="form-group">
					<label class="control-label col-md-2">Mật khẩu hiện tại </label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="name" name="current-password" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Mật khẩu mới </label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="price" name="new-password" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Nhập lại mật khẩu </label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="price" name="re-enter" value="">
					</div>
				</div>
				<div class="text-right">
					<button type="button" class="btn btn-danger cancelpass" ">Hủy</button>
					<button type="button" class="btn btn-primary confirmpass ">Xác nhận</button>
				</div>
			</form>
		</div>
	</div>
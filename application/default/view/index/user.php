<div class="wrapper container-fluid user" style="margin-top: 70px; background-image: url(<?php echo HTP::$resourceUrl; ?>/assets/img/admin-back.jpg);">
    <div class="row sub-wrap" style="background: rgba(0, 0, 0, 0.5)">
        <div class="col-md-2 user-sidebar">
			<div class="col-md-11 item info">
				<a href="#/">
					<div class="col-md-3 icon" style="font-size: 2em;"><i class="fa fa-user-circle-o"></i></div>
					<div class="col-md-9 text-right">
						Thông tin cá nhân
					</div>  
				</a>
			</div>
			<div class="col-md-11 item bill">
				<a href="#/bill">
					<div class="col-md-3 icon" style="font-size: 2em;"><i class=" glyphicon glyphicon-list-alt"></i></div>
					<div class="col-md-9 text-right">
						Đơn hàng
					</div>  
				</a>
			</div>
		</div>
		<div ng-view></div>
</div>
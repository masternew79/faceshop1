<div class="wrapper container-fluid user" style="margin-top: 70px; background-image: url(<?php echo HTP::$resourceUrl; ?>/assets/img/admin-back.jpg);" ng-controller="billController">
	<div class="row sub-wrap" style="background: rgba(0, 0, 0, 0.5)">
		<div class="col-md-12 feature">
			<div class="alert alert-danger user-title"><i class="fa fa-address-book"></i> Danh sách đơn hàng</div>
			<div class="col-md-12">
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>STT</th>
							<th>Sản phẩm</th>
							<th>Tổng tiền</th>
							<th>Trang thái</th>
							<th>Tùy chọn</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="bill in bills" class="text-center" ng-hide="appear1">
							<td>1</td>
							<td>
								<p ng-repeat="product in bill.name">- {{product.substring(0,30)}}...</p>
							</td>
							<td>{{bill.total}}</td>
							<td>{{bill.status}}</td>
							<td>
								<a href="" class="btn btn-default btn-xs" ng-if="bill.status == 1" ng-click="cancelBill(bill.id_bill)">Hủy đơn hàng</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
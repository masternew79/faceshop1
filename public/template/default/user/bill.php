<div class="col-md-10 feature">
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
						<p ng-repeat="product in bill.name">{{product}}</p>
					</td>
					<td>{{bill.total}}</td>
					<td>{{bill.status}}</td>
					<td>
						<a href="" class="btn btn-default btn-xs" ng-click="appear1 = delete()">Hủy đơn hàng</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
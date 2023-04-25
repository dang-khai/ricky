<div ng-controller="OrderController">
    <div id="loading" class="position-absolute z-1 mt-5" style="left: 50%;">
        <div class="spinner-border" role="status" id="loading" class="position-absolute z-1 mt-5" style="left: 50%;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @include('partials.aside')
    <div class="col py-3">
        <h1 class="text-center">Danh sách đặt hàng</h1>

        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Tên</th>
                        <th>Đơn hàng</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody ng-repeat="(index, order) in orders">
                    <tr>
                        <th>%index+1%</th>
                        <th>%order.name%</th>
                        <th>Đơn hàng %index+1%</th>
                        <th>
                            <div ng-if="order.status == 0">Chưa xác nhận</div>
                            <div ng-if="order.status == 1">Đã xác nhận</div>
                        </th>
                        <th><a href="#!/admin/order/%order.id%"><button ng-click="show(order.id)" class="btn btn-info">Chi tiết</button></a></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
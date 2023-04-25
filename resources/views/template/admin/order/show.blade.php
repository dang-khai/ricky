<div ng-controller="OrderController">
    <div id="loading" class="position-absolute z-1 mt-5" style="left: 50%;">
        <div class="spinner-border" role="status" id="loading" class="position-absolute z-1 mt-5" style="left: 50%;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @include('partials.aside')
    <div class="col py-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Thông tin đơn hàng</div>
                    <div class="card-body">
                        <ul>
                            <li>Sản phẩm:
                                <ul ng-repeat="item in order.cart.cart_item">
                                    <li>%item.product.name% - Số lượng: %item.quantity%</li>
                                </ul>
                            </li>
                        </ul>
                        <button ng-if="order.status == 0" ng-click="confirm()" class="btn btn-primary">Xác nhận đơn hàng</button>
                        <button ng-if="order.status == 1" disabled class="btn btn-primary">Đã xác nhận đơn hàng</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Thông tin khách hàng</div>
                    <div class="card-body">
                        <ul>
                            <li>Họ tên: <strong>%order.name%</strong></li>
                            <li>Số điện thoại: <strong>%order.phone%</strong></li>
                            <li>Địa chỉ: <strong>%order.address%</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
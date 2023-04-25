<div ng-controller="CartController">
    @include('partials.header')
        <div class="w-100" style="height: 100px">
            <h1 class="text-center mt-5" style="color: #0052B1;">Cart</h1>
        </div>
        <div class="container-fluid" style="background: #F0F9FC;">
            <div class="container py-5">
                <div class="card bg-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th class="fs-6 fw-normal opacity-50" style="width: 20%">PRODUCT</th>
                                            <th></th>
                                            <th class="fs-6 fw-normal opacity-50 text-center" style="width: 20%">QUANLITY</th>
                                            <th class="fs-6 fw-normal opacity-50 text-center" style="width: 20%">SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="(index,cart) in carts">
                                            <td><img ng-src="%cart.product.image[0].url%" alt=""></td>
                                            <td>
                                                <div class="fs-4 fw-bold" style="color: #0052B1">%cart.product.name%</div>
                                                <p class="fs-6 opacity-75">%cart.product.sub_category.category.name% - %cart.product.sub_category.name%</p>
                                                <p class="fs-6 opacity-75">$%cart.product.price%</p>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-around border rounded align-items-center">
                                                    {{-- <button class="btn" ng-disabled="minusIsDisabled" ng-click="minus($event)">-</button > --}}
                                                    <input value="%cart.quantity%" disabled style="width: 20px; border:none; background: white;">
                                                    {{-- <button class="btn" ng-click="plus($event)">+</button> --}}
                                                </div>
                                            </td>
                                            <td class="text-center fs-5 fw-bold" id="subTotal" style="color: #0052B1">$%cart.product.price * cart.quantity%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                {{-- <button class="btn btn-outline-primary float-end me-4" ng-click="updateCart()" ng-disabled="isDisabled">Update Cart</button> --}}
                            </div>
                            <div class="col-md-4">
                                <div class="container border rounded">
                                    <div class="d-flex justify-content-between mt-5">
                                        <h4 style="color: #0052B1;">Subtotal</h4>
                                        <h4 style="color: #F63E04;">$%total%.00</h4>
                                    </div>
                                    <hr class="my-3">
                                    <div class="d-flex justify-content-between">
                                        <h4 style="color: #0052B1;">Shipping</h4>
                                        <h4 style="color: #F63E04;">$10.00</h4>
                                    </div>
                                    <div class="mt-3">
                                        <div class="opacity-75">Shipping to..</div>
                                        <form ng-submit="order()">
                                            <div class="mt-3">
                                                <label for="">Name</label>
                                                <input ng-model="name" type="text" class="form-control">
                                            </div>
                                            <div class="mt-3">
                                                <label for="">Address</label>
                                                <input ng-model="address" type="text" class="form-control">
                                            </div>
                                            <div class="mt-3">
                                                <label for="">Phone</label>
                                                <input ng-model="phone" type="text" class="form-control">
                                            </div>
                                            <hr class="my-3">
                                            <div class="d-flex justify-content-between mb-5">
                                                <h4 style="color: #0052B1;">Total</h4>
                                                <h4 style="color: #F63E04;">$%total + 10%.00</h4>
                                            </div>
                                            <button type="submit" class="btn mb-5 text-white w-100 rounded-75" style="background-color: #0052B1; height: 50px">Order</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('partials.footer')
</div>
<div ng-controller="ShopController">
    @include('partials.header')
        <div style="background: #F0F9FC">
            <div class="container w-75 bg-white ">
                <div class="card mt-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img ng-src="%product.image[0].url%" alt="" style="width: 80%">
                        </div>
                        <div class="col-md-6 mt-5 ms-5">
                            <h1 class="fw-bold" style="color: #0052B1">%product.name%</h1>
                            <h3 style="color: #F63E04" class="my-3">$%product.price%</h3>
                            <div class="fs-6 opacity-75 mb-3">%product.description%</div>
                            <div class="d-flex">
                                <div class="d-flex justify-content-around border rounded align-items-center">
                                    <button class="btn" ng-disabled="minusIsDisabled" ng-click="minus()">-</button >
                                    <input ng-bind="quantity" disabled ng-model="quantity" style="width: 20px; border:none; background: white;">
                                    <button class="btn" ng-click="plus()">+</button>
                                </div>
                                <button ng-click="cartAdd(product.id)" class="btn btn-primary ms-3"><i class="fas fa-shopping-cart"></i> ADD TO CART</button>
                            </div>
                            <div class="card mt-3 py-1 text-center d-flex" style="color: #0052B1">
                                <div class="card-body">
                                    <i class="fas fa-truck me-3"></i> Free delivery for first order and every next over $100
                                </div>
                            </div>
                            <div class="row opacity-75 pt-3">
                                <div class="col-md-6">
                                    <div>100% Money Back Warranty</div>
                                    <div class="pt-3">Free and Fast Delivery</div>
                                </div>
                                <div class="col-md-6">
                                    <div>All Items Top Best Quality</div>
                                    <div class="pt-3">24/7 Support</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('partials.footer')
</div>
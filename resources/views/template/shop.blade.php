@include('partials.header')
<div ng-controller="ShopController" style="height: fit-content">
    <div class="container-fluid bg-white ">
        <h1 class="text-center pt-5" style="color: #0052B1">Shop</h1>
        <div class="container-sm d-flex justify-content-around align-items-center px-5">
            <div ng-repeat="category in categories" class="text-capitalize text-center">
                <div class="my-4">
                    <a ng-href="/#!/shop/%category.name%" class="text-decoration-none text-dark">
                        <img ng-src="%category.image[0].url%" alt="%category.name%">
                        <div>%category.name%</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3 bg-white rounded" >
        <div class="row">
            <div class="col-md-2 border">
                <div class="mb-5">
                    <h3 class="mt-3">Price</h3>
                    <input type="range" class="w-100">
                    <div class="opacity-75 fs-6 fw-light mb-3">Price: $10 — $480</div>
                    <button class="btn btn-sm btn-outline-primary w-100 rounded-5">Filter</button>
                </div>
                <div class="mb-5">
                    <h3>Color</h3>
                    <div class="d-flex my-2">
                        <div class="rounded-circle bg-success me-2" style="width: 25px; height: 25px"></div>
                        <span>Green</span></div>
                    <div class="d-flex my-2">
                        <div class="rounded-circle bg-secondary me-2" style="width: 25px; height: 25px"></div>
                        <span>Grey</span></div>
                    <div class="d-flex my-2">
                        <div class="rounded-circle bg-danger me-2" style="width: 25px; height: 25px"></div>
                        <span>Red</span></div>
                    <div class="d-flex my-2">
                        <div class="rounded-circle bg-light me-2" style="width: 25px; height: 25px"></div>
                        <span>White</span></div>
                </div>
                <div class="mb-5">
                    <h3>Size</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Big
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Medium
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Small
                        </label>
                    </div>
                </div>
                <div class="mb-5">
                    <h3>Meat</h3>
                    <a href="" class="text-decoration-none text-dark"><i class="fas fa-cow me-3 my-3"></i> Beef</a> <br>
                    <a href="" class="text-decoration-none text-dark"><i class="fas fa-drumstick-bite me-3"></i> Chicken</a>
                </div>
            </div>
            <div class="col-md-10 border" style="height: fit-content">
                <div class="d-flex justify-content-between align-items-center" style="height: 65px">
                    <div class="text fw-light opacity-75">Showing 1-16 of 65 results</div>
                    <div class="text fw-light">Default Sorting <i class="fas fa-arrow-down mx-2"></i></div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-center border" ng-repeat="product in products">
                        <a ng-href="#!/shop/%product.sub_category.category.name%/%product.id%"><img ng-src="%product.image[0].url%" alt="%product.name%"></a>
                        <div class="fw-bold fs-5">%product.name%</div>
                        <div class="fw-medium opacity-75 my-3">%product.description%</div>
                        <div class="fw-light fs-6"><strong>%product.sub_category.category.name%->%product.sub_category.name%</strong></div>
                        <div class="d-flex justify-content-between align-items-center my-3 position-relative">
                            <div class="fs-4 fw-bold" style="color: #0052B1">$40.00</div>
                            <a href="" ng-click="cartAdd(product.id)"><i class="fas fa-shopping-cart fs-5" style="color: #0052B1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')



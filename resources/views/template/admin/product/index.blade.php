<div ng-controller="ProductController">
    @include('partials.aside')
    <div id="loading" class="position-absolute z-1 mt-5" style="left: 50%;">
    <div class="spinner-border" role="status" id="loading" class="position-absolute z-1 mt-5" style="left: 50%;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="col my-3" id="container" style="display: none">
        <h1 class="text-center">Danh sách sản phẩm</h1>
        <a href="/#!/admin/product/create">
            <button class="btn btn-primary">Thêm sản phẩm</button>
        </a>

        <table class="table my-3">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Handle</th>
                </tr>
            </thead>
            <tbody ng-repeat="(index, product) in products" >
                <tr>
                    <th class="fw-normal">%index + 1%</th>
                    <th class="w-25 fw-normal">%product.name%</th>
                    <th class="fw-normal">$%product.price%</th>
                    <th class="w-25 fw-normal">%product.description%</th>
                    <th class="w-25 fw-normal">%product.sub_category.category.name% -> %product.sub_category.name%</th>
                    <th>
                        <button class="btn btn-danger" ng-click="delete(product.id)">Xóa</button>
                        <a href="/#!/admin/product/edit/%product.id%" ng-click="edit(product.id)"><button class="btn btn-warning">Sửa</button></a>
                    </th>

                </tr>
            </tbody>
        </table>
    </div>
</div>

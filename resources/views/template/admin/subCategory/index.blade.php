<div ng-controller="SubCategoryController">
    @include('partials/aside')
    <div id="loading" class="position-absolute z-1 mt-5" style="left: 50%;">
    <div class="spinner-border" role="status" id="loading" class="position-absolute z-1 mt-5" style="left: 50%;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="col py-3" id="container" style="display: none">
        <h1 class="text-center my-3">%category.name%</h1>
        <a href="/#!/admin/category/subcategory/%category.id%/create" class="text-decoration-none">
            <button class="btn btn-primary">Thêm</button>
        </a>
        <a href="/#!/admin/category" class="text-decoration-none">
            <button class="btn btn-warning">Quay lại</button>
        </a>

        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Handle</th>
            </tr>
            </thead>
            <tbody ng-repeat="(index, subcategory) in category.sub_category">
                <tr>
                    <th>%index + 1%</th>
                    <th>%subcategory.name%</th>
                    <th>
                        <button class="btn btn-danger" ng-click="delete(subcategory.id)">Xóa</button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div ng-controller="CategoryController">
    <div id="loading" class="position-absolute z-1 mt-5" style="left: 50%;">
        <div class="spinner-border" role="status" id="loading" class="position-absolute z-1 mt-5" style="left: 50%;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @include('partials.aside')
    <div class="col py-3" id="container" style="display: none">
        <h1 class="text-center">Danh mục</h1>
        <a href="/#!/admin/category/create">
            <button class="btn btn-primary mb-3">Thêm</button>
        </a>

        <div class="card">
            <table id="table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Handle</th>
                </tr>
                </thead>
                <tbody ng-repeat="(index, category) in categories">
                <tr>
                    <th>%index + 1%</th>
                    <th>%category.name%</th>
                    <th class="d-flex">
                        <button class="btn btn-warning">Sửa</button>
                        <button class="btn btn-danger mx-2" ng-click="delete(category.id)">Xóa</button>
                        <a href="/#!/admin/category/subcategory/%category.id%"><button type="button" class="btn btn-info">Chi tiết</button></a>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

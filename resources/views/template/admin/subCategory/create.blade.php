<div ng-controller="SubCategoryController">
    @include('partials.aside')
    <div class="col py-2">
        <h1 class="text-center">Thêm danh mục</h1>
        <form action="" ng-submit="create($event)">
            <div class="my-3">
                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" ng-model="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" accept="image/*" id="img">
            </div>
            <div class="my-3">
                <label for="">Danh mục gốc</label>
                <input type="text" class="form-control" disabled value="%category.name%">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="/#!/admin/category/subcategory/%category.id%">
                <button class="btn btn-warning">Quay lại</button>
            </a>
        </form>
    </div>
</div>

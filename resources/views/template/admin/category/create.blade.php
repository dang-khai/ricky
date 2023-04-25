<div ng-controller="CategoryController">
    @include('partials.aside')
    <div class="col">
        <h1 class="text-center my-3">Thêm danh mục</h1>
        <form ng-submit="create($event)" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="name" ng-model="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" accept="image/*" id="img">
            </div>
            <button class="btn btn-primary" type="submit">Thêm</button>
            <a href="/#!/admin/category">
                <button class="btn btn-warning">Quay lại</button>
            </a>
        </form>
    </div>
</div>

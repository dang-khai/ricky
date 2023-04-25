<div ng-controller="ProductController">
    @include('partials.aside')
    <div class="col my-3">
        <h1 class="text-center">Thêm sản phẩm</h1>
        <form ng-submit="create()">
            <div class="mb-3">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" ng-model="name">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="">Danh mục</label>
                    <select name="" id="" class="form-control" ng-change="selectedCate(selected)" ng-model="selected">
                        <option value="%category.id%" ng-selected="selected == category.id" ng-repeat="(index, category) in categories">%(index + 1)%. %category.name%</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Loại</label>
                    <select name="" id="" class="form-control" ng-model="subCategory_id">
                        <option ng-repeat="(index, subcategory) in subcategories.sub_category" value="%subcategory.id%">%index + 1%. %subcategory.name%</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="">Giá</label>
                <input type="text" class="form-control" name="price" ng-model="price">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" accept="image/*" id="img">
            </div>
            <div class="mb-3">
                <label for="">Mô tả</label>
                <textarea rows="5" class="form-control" name="description" ng-model="description"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Thêm</button>
            <a href="#!/admin/product"><button class="btn btn-warning">Quay lại</button></a>
        </form>
    </div>
</div>

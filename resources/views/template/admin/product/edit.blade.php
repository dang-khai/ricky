<div ng-controller="ProductController">
    @include('partials.aside')
    <div class="col my-3">
        <h1 class="text-center">Sửa sản phẩm</h1>
        <form ng-submit="update()">
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" ng-model="name" placeholder="%editData.name%">
            </div>
            <div class="mb-3">
                <label for="">Price</label>
                <input type="text" class="form-control" ng-model="price" placeholder="%editData.price%">
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <textarea class="form-control" ng-model="description"></textarea>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
</div>

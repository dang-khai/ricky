<div ng-controller="RegisterController">
    @include('partials.header')
    <div class="container w-50">
        <h2 class="text-center mt-5">Đăng ký</h2>
        <form ng-submit="register()" class="mb-5">
            <div class="mb-3">
                <label for="name" class="form-label">Họ tên</label>
                <input type="text" name="name" id="name" ng-model="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" ng-model="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" id="password" ng-model="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" id="password_confirmation" ng-model="password_confirmation" class="form-control">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">
                    Đã có tài khoản?
                    <a href="#!/login" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Đăng nhập</a>
                </p>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </div>
        </form>
    </div>
    @include('partials.footer')
</div>
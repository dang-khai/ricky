<div ng-controller="LoginController">
    @include('partials.header')
    <div class="container w-50">
        <h2 class="text-center mt-5">Đăng nhập</h2>
        <form ng-submit="login()" class="mb-5">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" ng-model="email"e class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" id="password" ng-model="password"e class="form-control">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">
                    Chưa có tài khoản?
                    <a href="#!/register" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Đăng
                        ký</a>
                </p>
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </div>
        </form>
    </div>
    @include('partials.footer')
</div>

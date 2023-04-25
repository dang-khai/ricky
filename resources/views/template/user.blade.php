<div ng-controller="UserController">
    @include('partials.header')
    <h2 class="text-center mt-5">
        Thông tin khách hàng
    </h2>
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-2">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        
                        <li class="nav-item">
                            <a href="#!/" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-dark">Đơn hàng</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
                    
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</div>
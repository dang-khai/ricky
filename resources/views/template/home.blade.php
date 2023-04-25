@include('partials.header')
<aside class="container-fluid bg-light d-flex justify-content-end" ng-controller="HomeController">
    <div class="row mx-5">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold text-success">EVERY FRIDAY <br> BIG SALE</h1>
            <button class="btn btn-dark rounded" type="button">SHOP NOW</button>
        </div>
    </div>
    <img src="{{ asset('img/ricky-1737695079.svg') }}" class="mt-5 position-absolute">
    <img src="{{ asset('img/ricky-1737330363.png') }}" width="50%" height="500px" class="mt-5 me-5 position-relative">
    <div>% $location %</div>
</aside>
@include('partials.footer')

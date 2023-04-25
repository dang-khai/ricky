import 'angular'
import angular from 'angular'
import 'angular-route'

toastr.options = {
    positionClass: 'toast-bottom-right',
    timeOut: "3000"
}

const app = angular.module('app', ['ngRoute'])

function hideloading() {
    document.getElementById('loading').style.display = 'none'
    document.getElementById('container').style.display = 'block'
}

app.config(($interpolateProvider) => {
    $interpolateProvider.startSymbol('%')
    $interpolateProvider.endSymbol('%')
})

app.controller('MainController', function ($scope, $route) {
    $scope.$route = $route
})

app.controller('HomeController', function ($scope, $http, $location) {
})

app.controller('ShopController', function ($scope, $http, $routeParams, $location) {
    $scope.categories = {}
    $scope.products = {}
    $scope.product = {}
    $scope.quantity = 1 

    $http.get('api/categories').then((response) => $scope.categories = response.data)
    $http.get('api/products').then((response) => $scope.products = response.data)
    $http.get('api/products/'+$routeParams.id).then((response) => $scope.product = response.data)

    $scope.cartAdd = function (id) {
        $http.post('api/cart', {'product_id': id, 'quantity': $scope.quantity}).then(() => toastr.success("Thêm vào giỏ hàng thành công"));
    }

    $scope.minus = () => {
        $scope.quantity = $scope.quantity - 1
        if ($scope.quantity === 0) {
            $scope.minusIsDisabled = true
        }
        $scope.isDisabled = false
    }
    $scope.plus = () => {
        $scope.quantity = $scope.quantity + 1
        $scope.isDisabled = false
    }
})

app.controller('ShopCateController', function ($scope, $http, $routeParams) {
    $scope.products = []
    $scope.categories = []

    $http.get('api/products').then((response) => {
        for (var i = 0; i < response.data.length; i++) {
            if(response.data[i].sub_category.category.name == $routeParams.name) {
                $scope.products.push(response.data[i])
            }
        }
    })

    $scope.cartAdd = function (id) {
        $http.post('api/cart', {'product_id': id}).then(() => toastr.success("Thêm vào giỏ hàng thành công"))
    }
})

app.controller('AdminController', function ($scope, $http) {

})

app.controller('CategoryController', function ($scope, $route, $http, $location) {
    $scope.categories = []
    $scope.name = null

    $scope.create = function ($event) {
        const file = $event.target.querySelector('input[type="file"]').files[0]

        $http.post('api/admin/categories', {
            name: $scope.name,
            file: file,
        }, {
            headers: {
                'Content-Type': undefined
            },
            transformRequest: function (data) {
                const formData = new FormData()
                angular.forEach(data, function (value, key) {
                    formData.append(key, value)
                })

                return formData
            }
        }).then(() => {
            $location.path('/admin/category')
            toastr.success('Thêm thành công')
        })
    }

    $scope.delete = function ($id) {
        $http.delete('api/admin/categories/' + $id).then(function (response) {
            if (response.status === 200) {
                $route.reload()
            }
        })
    }

    $http.get('api/admin/categories').then((response) => {
        hideloading()
        $scope.categories = response.data
    }).catch((error) => {
        if (error.status === 401) {
            $location.path('/')
            toastr.warning('Bạn không có quyền truy cập')
        }
    })
})

app.controller('SubCategoryController', function ($scope, $route, $http, $routeParams, $location) {
    $scope.category = []
    $http.get('api/admin/categories/' + $routeParams.id).then((response) => {
        $scope.category = response.data
        hideloading()
    })
    $scope.create = function ($event) {
        const file = $event.target.querySelector('input[type=file]').files[0]
        $http.post('api/admin/subcategories', {
            category_id: $routeParams.id,
            name: $scope.name,
            file: file,
        }, {
            headers: {
                'Content-Type': undefined
            },
            transformRequest: function (data) {
                const formData = new FormData()
                angular.forEach(data, function (value, key) {
                    formData.append(key, value)
                })

                return formData
            }
        }).then(() => {
            $location.path('/admin/subCategory')
            toastr.success('Thêm thành công')
        })
    }
    $scope.delete = function ($id) {
        $http.delete('api/admin/subcategories/' + $id).then(function (response) {
            if (response.status == 200) {
                $route.reload()
            }
        })
    }
})

app.controller('ProductController', function ($scope, $http, $location, $route, $routeParams) {
    $scope.categories = []
    $scope.subcategories = []
    $scope.products = []
    $scope.editData = []
    $http.get('api/admin/categories').then((response) => $scope.categories = response.data)
    $http.get('api/admin/products').then((response) => {
        hideloading()
        $scope.products = response.data
    })
    $scope.selectedCate = function ($id) {
        $http.get('/api/amin/categories/' + $id).then((response) => $scope.subcategories = response.data)
        $scope.create = function () {
            const data = {
                'name': $scope.name,
                'subCategory_id': $scope.subCategory_id,
                'price': $scope.price,
                'url': document.querySelector('input[type="file"]').files[0],
                'description': $scope.description
            }
            $http.post('api/admin/products/', data,
                {
                    headers: {
                        'Content-Type': undefined
                    },
                    transformRequest: function (data) {
                        const formData = new FormData()
                        angular.forEach(data, function (value, key) {
                            formData.append(key, value)
                        })

                        return formData
                    }
                }).then(function (response) {
                    if (response.status == 200) {
                        $location.path('/admin/product')
                        toastr.success('Thêm thành công')
                    }
                })
        }
    }

    $scope.edit = function ($id) {
        $http.get('/api/admin/products/' + $id).then((response) => $scope.editData = response.data)
    }

    $scope.update = function () {
        var data = {
            'id': $routeParams.id,
            'name': $scope.name,
            'price': $scope.price,
            'description': $scope.description
        }
        $http.put('api/admin/products/' + $routeParams.id, data).then((response) => $location.path('/admin/product'))
    }

    $scope.delete = function ($id) {
        $http.delete('api/admin/products/' + $id).then(function (response) {
            if (response.status == 200) {
                $route.reload()
            }
        })
    }
})

app.controller('LoginController', function ($scope, $http, $location, $route) {
    $scope.login = function () {
        $scope.data = {
            'email': $scope.email,
            'password': $scope.password
        }
        $http.post('api/login', $scope.data).then(() => {
            $location.path('/')
            window.location.href = '/'
            toastr.success('Đăng nhập thành công')
        }).catch(() => {
            $route.reload()
            toastr.error('Đăng nhập thất bại')
        });
     }
})

app.controller('RegisterController', function ($scope, $http, $location) {
    $scope.register = function () {
        $scope.data = {
            'name': $scope.name,
            'email': $scope.email,
            'password': $scope.password,
            'password_confirmation': $scope.password_confirmation
        }
        $http.post('api/register', $scope.data).then(() => {
            $location.path('/')
            toastr.success('Đăng kí thành công')
        })
    }
})

app.controller('CartController', function ($scope, $http) {
    $scope.carts = []
    $scope.cart_id = null
    $scope.quantity = null
    $scope.isDisabled = true
    $scope.price = null;    

    $http.get('api/cart').then((response) => {
        $scope.carts = response.data
        $scope.cart_id = response.data[0].id
        $scope.quantity = response.data[0].quantity
        for (let i = 0; i < response.data.length; i++) {
            parseFloat(response.data[i].product.price)
        }
        const withsubTotal = response.data.map(item => {
            let subTotal = item.quantity * item.product.price
            return subTotal
        })
        $scope.total = withsubTotal.reduce((acc, curr) => {
            return acc + curr
        }, 0)
        console.log($scope.total);        
    })

    $scope.minus = (event) => {
        $scope.quantity = event.target.parentElement.querySelector('input').value--
        if ($scope.quantity === 1) {
            $scope.minusIsDisabled = true
        }
        $scope.isDisabled = false

    }
    $scope.plus = (event) => {
        $scope.quantity = event.target.parentElement.querySelector('input').value++
        $scope.isDisabled = false
    }

    $scope.order = () => {
        $scope.data = {
            'cart_id': $scope.cart_id,
            'name': $scope.name,
            'phone': $scope.phone,
            'address': $scope.address
        }
        console.log($scope.data);
        $http.post('api/order', $scope.data).then()
    }
})

app.controller('OrderController', function ($scope, $http, $routeParams, $location) {
    $scope.orders = []
    $scope.order = []

    $http.get('api/admin/order').then((response) => {
        $scope.orders = response.data       
        hideloading()
    })
    $http.get('api/admin/order/'+$routeParams.id).then((response) => {
        $scope.order = response.data
        console.log($scope.order);
    })
    
    $scope.confirm = () => {
        $http.put('api/admin/order/'+$routeParams.id, {'id': $routeParams.id, 'status': 1}).then(() => $location.path('/admin/order'))
    }
})

app.controller('UserController', function ($scope, $http, $routeParams) {
    $scope.users = null
    $scope.user = null

    $http.get('api/users').then((response) => $scope.users = response.data)
    $http.get('api/users/'+$routeParams.id).then((response) => $scope.user = response.data)
})

app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'home.html',
            controller: 'HomeController'
        })
        .when('/shop', {
            templateUrl: 'shop.html',
            controller: 'ShopController'
        })
        .when('/shop/:name', {
            templateUrl: 'shopCate.html',
            controller: 'ShopCateController'
        })
        .when('/shop/:name/:id', {
            templateUrl: 'detail.html',
            controller: 'ShopController'
        })
        .when('/admin', {
            templateUrl: 'admin/admin.html',
            controller: 'AdminController'
        })
        .when('/admin/order', {
            templateUrl: 'admin/order/index.html',
            controller: 'OrderController'
        })
        .when('/admin/order/:id', {
            templateUrl: 'admin/order/show.html',
            controller: 'OrderController'
        })
        .when('/admin/user', {
            templateUrl: 'admin/user/index.html',
            controller: 'UserController'
        })
        .when('/admin/category', {
            templateUrl: 'admin/category/index.html',
            controller: 'CategoryController'
        })
        .when('/admin/category/subcategory/:id', {
            templateUrl: 'admin/subCategory/index.html',
            controller: 'SubCategoryController'
        })
        .when('/admin/category/subcategory/:id/create', {
            templateUrl: 'admin/subCategory/create.html',
            controller: 'SubCategoryController'
        })
        .when('/admin/category/create', {
            templateUrl: 'admin/category/create.html',
            controller: 'CategoryController'
        })
        .when('/admin/product', {
            templateUrl: 'admin/product/index.html',
            controller: 'ProductController'
        })
        .when('/admin/product/create', {
            templateUrl: 'admin/product/create.html',
            controller: 'ProductController'
        })
        .when('/admin/product/edit/:id', {
            templateUrl: 'admin/product/edit.html',
            controller: 'ProductController'
        })
        .when('/login', {
            templateUrl: 'auth/login.html',
            controller: 'LoginController'
        })
        .when('/register', {
            templateUrl: 'auth/register.html',
            controller: 'RegisterController'
        })
        .when('/cart', {
            templateUrl: 'cart.html',
            controller: 'CartController'
        })
        .when('/user/:id', {
            templateUrl: 'user.html',
            controller: 'UserController'
        })
})


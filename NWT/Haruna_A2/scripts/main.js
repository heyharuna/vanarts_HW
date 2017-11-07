
// create module
var marimekko = angular.module("marimekko", ["ngRoute", "ngAnimate"]);
myBag = [];

marimekko.controller('AppController',
    [
        '$scope',
        '$window',
        function($scope, $window) {
            $scope.myBag = $window.myBag;
            $scope.total = $window.total;
        }
    ]
);

var shopList = function($scope, $http) {

    // get product.json file
    $http({
      method: "GET",
      url: "scripts/product.json"
    }).then( function onSuccess(response) {
        $scope.myData = response.data.product;
    }, function onError(response) {
        $scope.myError = response.statusText;
    });

    // for filter by selected option
    $scope.getFilter = function() {
        var filter = {};
        filter[$scope.filterlist] = $scope.category;
        return filter;
    };
    $scope.total = 0;
    var seeMyBag = angular.element( document.querySelector( '.detailBtn' ) );
    $scope.addBag = function(e) {
        myBag.push({
            "price" : parseInt($(e.currentTarget).attr("data-price")),
            "title" : $(e.currentTarget).attr("data-title"),
            "img" : $(e.currentTarget).attr("data-img"),
            "description" : $(e.currentTarget).attr("data-description")
        });
        console.log(myBag);
        seeMyBag.addClass('showBtn');
        $scope.total += parseInt($(e.currentTarget).attr("data-price"));
    };

};

marimekko.config(function($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl : "partials/items.php"
        })
        .when("/shoppingcart", {
            templateUrl : "partials/shoppingcart.php"
        })
        .otherwise({
            templateUrl: "index.php"
        });
});


// controller to use shopList
marimekko.controller("shopList", shopList);
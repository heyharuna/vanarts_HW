<div class="container shoppingbagpage">
    <div>
        <h1>Shopping Bag</h1>
    </div>
    <div class="row product" ng-repeat="item in myBag">
        <div class="col-5">
            <div class="productImage">
                <img ng-src="{{ item.img }}">
            </div>
        </div>
        <div class="col-7 productInfo">
            <h2 ng-bind="item.title"></h2>
            <h4 ng-bind="item.price"></h4>
            <p ng-bind="item.description"></p>
        </div>
    </div>
</div>
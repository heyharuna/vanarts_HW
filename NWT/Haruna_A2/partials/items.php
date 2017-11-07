<div ng-controller="shopList">
    <div class="col-8">
        <div class="row product" ng-repeat="product in myData | filter: getFilter()">
            <div class="col-5">
                <div class="productImage">
                    <img ng-src="{{ product.image }}">
                </div>
            </div>
            <div class="col-7 productInfo">
                <h2 ng-bind="product.title"></h2>
                <h4 ng-bind="product.price"></h4>
                <p ng-bind="product.description"></p>
                <a class="addBtn" data-img="{{ product.image }}" data-title="{{ product.title }}" data-description="{{ product.description }}" data-price="{{ product.price }}" ng-click="addBag($event)">Add Bag</a>
            </div>
        </div>
    </div>
    <div class="menu">
        <div class="filter">
            <h2>Filters</h2>
            <div class="search">
                <label>Search by
                    <select id="filter" ng-model="filterlist">
                        <option  value="$">All</option>
                        <option  value="title">Title</option>
                        <option  value="price">Price</option>
                        <option  value="description">Description</option>
                    </select>
                </label>
                <input ng-model="category" placeholder="Search">
            </div>
        </div>
        <div class="cart">
            <h2>Bag</h2>
            <h4>Amount : <span class="sumBag">$ {{total}}</span></h4>
            <div id="listOfBag">
                <div class='bagImg' ng-repeat="img in myBag">
                    <img class='imgBag' ng-src="{{ img.img }}">
                </div>
            </div>
            <a href="#!shoppingcart" class="detailBtn">See Bag</a>
        </div>
    </div>
</div>

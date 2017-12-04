
// Object
function nation(n, img, cur, unit) {
    this.name = n;
    this.flagImg = img;
    this.currency = cur;
    this.unit = unit;
}

// create new object of each country
var cad = new nation("CAN", "canada.png", 1, "img/canadian-dollar.png");
var yen = new nation("JPN", "japan.png", 88.34, "img/yen.png");
var pound = new nation("ENG", "united-kingdom.png", 0.59, "img/pound.png");
var euro = new nation("EUR", "european.png", 0.66, "img/euro.png");
var rupiah = new nation("IDN", "indonesia.png", 10665.00, "img/indonesian-rupiah.png");
var usd = new nation("USA", "united-states.png", 0.79, "img/dollar-symbol.png");
var rand = new nation("ZAF", "south-africa.png", 10.81, "img/south-african-rand.png");

// array of countries
var nationArr = [cad, yen, pound, euro, rupiah, usd, rand];

// change flag img when change select
$("#select_1").change(function() {
    $("#flag_1").attr('src', 'img/'+$(this).val());
});
$("#select_2").change(function() {
    $("#flag_2").attr('src', 'img/'+$(this).val());
});


// append option tag for select
for (var i=0; i<nationArr.length; i+=1){
    $('#select_1').append(`<option value='${nationArr[i].flagImg}' data-cur ='${nationArr[i].currency}' data-unit ='${nationArr[i].unit}'>${nationArr[i].name}</option>`);
};
for (var i=0; i<nationArr.length; i+=1){
    $('#select_2').append(`<option value='${nationArr[i].flagImg}' data-cur='${nationArr[i].currency}' data-unit ='${nationArr[i].unit}'>${nationArr[i].name}</option>`);
};


// get first currency
var firstCur = nationArr[0].currency;
$("#select_1").change(function() {
    firstCur = $(this).find(':selected').data('cur');
    $("#unit_1").attr("src", $(this).find(':selected').data('unit'));
    getResult();
    //console.log(firstCur);
});

// get second currency
var secondCur = nationArr[0].currency;
$("#select_2").change(function() {
    secondCur = $(this).find(':selected').data('cur');
    $("#unit_2").attr("src", $(this).find(':selected').data('unit'));
    getResult();
})

var curArr = [];
var number = '';
var typeNum = '';

$(".num").click(function() {
    if($(this).val() == "d" ) {
        deleteNum();
    }
    else {
        curArr.push($(this).val());
    }
    typeNum = curArr.join('');
    $("#currency").text(typeNum);
})

function deleteNum() {
    curArr.splice(curArr.length - 1);
}

var result;

// get result of currency culculator
function  getResult() {
    var currencyNum = parseInt(typeNum);
    if(typeNum === '') {
        result = 0;
    }
    else {
        result = parseInt((currencyNum * secondCur) / firstCur);
        $("#result").text(result.toLocaleString());
    }
    console.log(currencyNum.toLocaleString());
}

$("#getresult").click(function() {
    getResult();
    if($("#currency").text() === "0") {
        alert("Please type number!");

    }
})

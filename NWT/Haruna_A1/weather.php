<?php
$data = simplexml_load_file('https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22vancouver%2C%20Canada%22)&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');
$data_condition = simplexml_load_file('https://query.yahooapis.com/v1/public/yql?q=select%20item.condition.text%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22vancouver%2C%20canada%22)&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');

if(isset($_GET['submitCity'])) {

    if($_GET['selectCity'] === "Vancouver"){
        $data = simplexml_load_file('https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22vancouver%2C%20Canada%22)&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');
        $data_condition = simplexml_load_file('https://query.yahooapis.com/v1/public/yql?q=select%20item.condition.text%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22vancouver%2C%20canada%22)&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');
    }
    else if($_GET['selectCity'] === "New York") {
        $data = simplexml_load_file('https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22New%20York%2C%20ak%22)&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');
        $data_condition = simplexml_load_file('https://query.yahooapis.com/v1/public/yql?q=select%20item.condition.text%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22New%20York%2C%20ak%22)&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');
    }
    else if($_GET['selectCity'] === "Copenhagen") {
        $data = simplexml_load_file('https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22Copenhagen%22)&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');
        $data_condition = simplexml_load_file('https://query.yahooapis.com/v1/public/yql?q=select%20item.condition.text%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22Copenhagen%22)&format=xml&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');
    }
}

$namespace = $data->results->channel->getNamespaces(true);
$yw = $data->results->channel->children($namespace['yweather']);

//get wind speed
$speedUnit = $yw->units->attributes()->speed;
$speed = $yw->wind->attributes()->speed;

//get location
$city = $yw->location->attributes()->city;
$country = $yw->location->attributes()->country;
$province = $yw->location->attributes()->province;

//get wind direction
$direction = $yw->wind->attributes()->direction;

$cw = $data->results->channel->item->children($namespace['yweather']);

//get current tempreture
$current_temp = ($cw->condition->attributes()->temp-32)/1.8;

//get last updated time
$last_update = $data->results->channel->lastBuildDate;

//get current weather
$desc_con = $data_condition->results->channel->item->children($namespace['yweather'])->condition->attributes()->text

?>

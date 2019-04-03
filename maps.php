<?php

$address1="9000 Ming Ave, Bakersfield, CA 93311";
//$address2="23358 Baker Ave, Derby Acres, CA 93224";
//$address2="9001 Stockdale Hwy, Bakersfield, CA 93311";
$address2="3535 Bowman Ct, Bakersfield, CA 93308";

//$address1 ="Clarendon Blvd,Arlington,VA";
//$address2="2400+S+Glebe+Rd,+Arlington,+VA";

//$psql =  $psql = pg_query("SELECT * FROM jobview WHERE endtime? < '$time?'");
//Saddress1 = $street . ", " . $city . "," . $state . " " . $zip;


//$geo=geocode($address1, $address2);

function geocode($address1, $address2){

    // url encode the address
    $addr1 = urlencode($address1);
    $addr2 = urlencode($address2);
    //$key = "Ri6AZEcYeddY3NrpMbnzdo7sETs6BrwU";
    $key = "AIzaSyDoDGT_9j2_-_Fo5Is8Jk-fsadzuROPOlE";

    //$url = "https://nominatim.openstreetmap.org/?format=json&addressdetails=1&q={$addr1}&format=json&limit=1";

    //echo $url;

    //$curl = curl_init();

    // set url
    //curl_setopt($curl, CURLOPT_URL, $url);

    //return the transfer as a string
    //curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // $output contains the output string
    //$output = curl_exec($curl);

    //decode the json
    //$resp = json_decode($output, true);

    // get the important data
    //$lat1 = $resp[0]['lat'];
    //$long1 = $resp[0]['lon'];

    //curl_close($curl);

    //$url = "https://nominatim.openstreetmap.org/?format=json&addressdetails=1&q={$addr2}&format=json&limit=1";

    //echo $url;

    //$ch = curl_init();

    // set url
    //curl_setopt($ch, CURLOPT_URL, $url);

    //return the transfer as a string
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // $output contains the output string
    //$output = curl_exec($ch);

    //decode the json
    //$ret = json_decode($output, true);

    // get the important data
    //$lat2 = $ret[0]['lat'];
    //$long2 = $ret[0]['lon'];

    //curl_close($curl);

    // put the data in the array
    //$data_arr = ['lat' => $lati, 'long' => $longi];

    //$key = "91hHTBPH19aCArEyh38CQvn6wryjdkwh";
    /*$addr1 = urlencode($lat1);
    $addr2 = urlencode($long1);
    $addr3 = urlencode($lat2);
    $addr4 = urlencode($long2);*/

    /*echo $addr1;
    echo $addr2;
    echo $addr3;
    echo $addr4;*/

    //echo 'http://open.mapquestapi.com/directions/v2/route?key=Ri6AZEcYeddY3NrpMbnzdo7sETs6BrwU&from='.$address1.'&to='.$address2.'';
    //http://open.mapquestapi.com/directions/v2/route?key=Ri6AZEcYeddY3NrpMbnzdo7sETs6BrwU&from=9001 Stockdale Hwy, Bakersfield, CA&to=925 Jewetta Avenue, Bakersfield, CA

    //$mpq = file_get_contents("http://open.mapquestapi.com/directions/v2/route?key={$key}&from={$address1}&to={$address2}");
    //echo "http://open.mapquestapi.com/directions/v2/route?key={$key}&from={$addr1}&to={$addr2}";
    //$url = "https://nominatim.openstreetmap.org/?format=json&addressdetails=1&q={$address1}&format=json&limit=1";

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    //CURLOPT_URL => 'http://open.mapquestapi.com/directions/v2/route?key=Ri6AZEcYeddY3NrpMbnzdo7sETs6BrwU&from='.$addr1.','.$addr2.'&to='.$addr3.','.$addr4.''
    //CURLOPT_URL => 'http://open.mapquestapi.com/directions/v2/route?key=Ri6AZEcYeddY3NrpMbnzdo7sETs6BrwU&from='.$addr1.'&to='.$addr2.''
    CURLOPT_URL => 'https://maps.googleapis.com/maps/api/directions/json?origin='.$addr1.'&destination='.$addr2.'&key='.$key.''
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    $err = curl_error($curl);

    //echo $resp;

    $result = json_decode($resp, true);
    //print_r($result['route']['distance']);
    //$dist = $result['legs']['distance']['text'];
    $dist = $result['routes'][0]['legs'][0]['distance']['text'];
    echo $err;
    //echo $dist;

    /*$json = file_get_contents('http://open.mapquestapi.com/geocoding/v1/address?key={your_key_here}&location=Lancaster,PA');
    $jsonArr = json_decode($json);

    $lat1 = $jsonArr->results[0]->locations[0]->latLng->lat;
    $lon1 = $jsonArr->results[0]->locations[0]->latLng->lng;*/

    //for objects
    //$dist = $resp->route[0]->distance;
    // Close request to clear up some resources
    curl_close($curl);
    //curl_close($ch);
    //return $data_arr;
    //return $resp;
    return $dist;

}

print_r($geo);

// $lat = $geo['lat']
// $long = $geo['long']
?>
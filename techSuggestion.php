<?php
session_start();
require_once('connect.php');

if(!isset($_SESSION['active'])) {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
    exit();
}

$jID = $_GET["jID"];
$w1 = $_GET["w1"] /100;
$w2 = $_GET["w2"] /100;

function geocode($address1, $address2) {
    $addr1 = urlencode($address1);
    $addr2 = urlencode($address2);
    $key = "AIzaSyDoDGT_9j2_-_Fo5Is8Jk-fsadzuROPOlE";
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://maps.googleapis.com/maps/api/directions/json?origin='.$addr1.'&destination='.$addr2.'&key='.$key.''
    ));

    // Send the request and save response to $resp
    $resp = curl_exec($curl);
    $err = curl_error($curl);
    $result = json_decode($resp, true);
    $dist = $result['routes'][0]['legs'][0]['distance']['text'];
    echo $err;
    curl_close($curl);
    return $dist;
}

suggest_tech($jID,$w1,$w2);

function suggest_tech($jID,$w1,$w2) {
    $lowcost = 999;
    $costvalue = 999;
    $suggestedTech = -1;
    $distance = 0;
    $maxdistance = 16; // hard coded maxdistance
    $result = pg_query("SELECT * FROM employeeview;");

    while($row = pg_fetch_row($result)) {
        $eID = $row[2];

        $check_available = pg_query("SELECT check_available('$eID','$jID')");
        $available = pg_fetch_row($check_available);
        
        $check_skill = pg_query("SELECT check_skill('$eID','$jID')");
        $skilled = pg_fetch_row($check_skill);
        
        $check_first_job = pg_query("SELECT is_first_job('$eID','$jID')");
        $is_first_job = pg_fetch_row($check_first_job);
        
        if(($available[0] == "f") || ($skilled[0] == "f")) {
            continue;
        }
        
        if($is_first_job[0] == "f") {
            $prevJob1 = pg_query("SELECT getpreviousjob('$eID','$jID')");
            $prevJob2 = pg_fetch_row($prevJob1);
            $prevJob3 = pg_query("SELECT address,city,state,zipcode FROM location, job WHERE pk_location = fk_location and pk_job = $prevJob2[0]");
            $prevJob4 = pg_fetch_row($prevJob3);
            $nextJobAddress = pg_query("SELECT address,city,state,zipcode FROM location, job WHERE pk_location = fk_location and pk_job = $jID");
            $nextJob = pg_fetch_row($nextJobAddress);
            $ad1 = $prevJob4[0].", ".$prevJob4[1].", ".$prevJob4[2]." ".$prevJob4[3];
            $ad2 = $nextJob[0].", ".$nextJob[1].", ".$nextJob[2]." ".$nextJob[3];
            $dist = geocode($ad1, $ad2);
            $distance = preg_replace('/[^0-9\.]/', '', $dist);
            $cost = pg_query("SELECT getcost($eID,$jID,'$distance','$maxdistance','$w1','$w2')");
            $costvalue = pg_fetch_row($cost); 
        } else {
            $cost = pg_query("SELECT getcost($eID,$jID,0,'$maxdistance','$w1','$w2')");
            $costvalue = pg_fetch_row($cost); 
        }
        
        if($costvalue[0] < $lowcost) {
            $lowcost = $costvalue[0];
            $suggestedTech = $eID;
        }   
    }
    $employee = pg_query("SELECT * FROM employeeview WHERE pk_employee = $suggestedTech;");
    while ($row_employee = pg_fetch_assoc($employee)) {
        echo $row_employee["firstname"]." ". $row_employee["lastname"]."";
    }
    //echo "<br>Distance: ".$distance; // Display distance to job
}
?>

<?php 
session_start();
require_once('connect.php');

if(!isset($_SESSION['active'])) {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
    exit();
} else {
    $CUSTOMER_ID = $_GET["CUSTOMER_ID"];
    $loc = pg_query("SELECT * FROM locationview WHERE fk_customer = $CUSTOMER_ID");
    while ($row_loc = pg_fetch_assoc($loc)) {
        $location = $row_loc["pk_location"];
        $address = $row_loc["address"];
        echo "<option value=$location>";
        echo $address;
        echo "</option>";
    }
}
?>

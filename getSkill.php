<?php
session_start();
require_once('connect.php');

if(!isset($_SESSION['active'])) {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
    exit();
} else {
    $EMPLOYEE_ID = $_GET["EMPLOYEE_ID"];
    $i = 1;
    $prob = pg_query("SELECT type, level FROM skillview, problemview WHERE fk_employee = $EMPLOYEE_ID and fk_problem  = pk_problem;");
    while ($row_prob = pg_fetch_assoc($prob)) {
        $val = $row_prob["level"];
        $type = $row_prob["type"];
        $inputID = "myRange{$i}";
        $valueID = "demo{$i}";
        echo "<div class='row'>";
        echo "<div class='col-lg-2 col-md-2 col-sm-2'>";
        echo "<h4>$type</h4>";
        echo "</div>";
        echo "<div class='col-lg-9 col-md-9 col-sm-9'>";
        echo "<br><input type='range' min='0' max='10' value=$val name=$inputID>";
        echo "<p style='text-align: center;'><span style='float:left;'>Unskilled</span>";
        echo "Average<span style='float:right;'>Skilled</span></p>";
        echo "</div>";
        echo "<div class='col-lg-1 col-md-1 col-sm-1'>";
        echo "<br><span id=$valueID></span>";
        echo "</div>";
        echo "</div>";
        $i++;
    }
}
?>

<?php
session_start();
require_once('connect.php');

if(!isset($_SESSION['active'])) {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
    exit();
} else {
    $EMPLOYEE_ID = $_GET['technician'];
    
    $RES = pg_query("SELECT * FROM problem");
    while($row = pg_fetch_row($RES)) {
        $i = $row[0];
        $myRange = "myRange{$i}";
        $level = $_GET[$myRange];
        pg_query($db,"SELECT addskill('$EMPLOYEE_ID','$i','$level')");
    }
}
?>
<script type="text/javascript">
document.location.href="https://cs.csubak.edu/~kgregory/4910/dashboard.php";
</script>

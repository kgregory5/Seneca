<?php
session_start();
require_once('connect.php');

if(!isset($_SESSION['active'])) {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
    exit();
} else if (isset($_GET['delete'])) {
    $jobID = $_GET['delete'];
    pg_query("SELECT deletejob('$jobID')");
    
    header("Location: https://cs.csubak.edu/~kgregory/4910/jobboard.php");
    exit();
}
?>

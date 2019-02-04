<?php
session_start();
require_once('connect.php');

if(isset($_POST['username']) && ($_POST['password']) &&
    !empty($_POST['username']) && !empty($_POST['password'])) {
    
    $postedUsername = trim(htmlspecialchars($_POST['username']));
    $postedPassword = trim(htmlspecialchars($_POST['password']));

    $sql = pg_query("SELECT * FROM users WHERE username='".$postedUsername."' AND password='".$postedPassword."';"); 
    $userid = pg_query("SELECT pk_user FROM users WHERE username='".$postedUsername."';");

    $login_check = pg_num_rows($sql); 
    if($login_check > 0) {
        while($row = pg_fetch_array($sql)) {
            foreach ($row as $key => $val) {
                $key = stripslashes($val);
            }
        }
        $_SESSION['active'] = true;
        $_SESSION['username'] = $postedUsername;
        $_SESSION['user_id'] = $userid; 

        session_regenerate_id();

        header("Location: https://cs.csubak.edu/~kgregory/4910/dashboard.php");
        exit();
    } else {
        header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
        //echo "<h3 style='text-align:center;'>User name or password did not match</h3>";
        exit();
    }
} else {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
    //echo "<h3 style='text-align:center;'>Please login</h3>";
    exit();
}
?>

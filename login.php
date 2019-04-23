<?php
session_start();
require_once('connect.php');

if(isset($_POST['username']) && ($_POST['password']) &&
    !empty($_POST['username']) && !empty($_POST['password'])) {

    $postedUsername = trim(htmlspecialchars($_POST['username']));
    $postedPassword = trim(htmlspecialchars($_POST['password']));

    $sql = pg_query("SELECT * FROM users WHERE username='$postedUsername' AND password='$postedPassword'"); 

    $login_check = pg_num_rows($sql); 
    if($login_check > 0) {
        while($row = pg_fetch_array($sql)) {
            foreach ($row as $key => $val) {
                $key = stripslashes($val);
            }
            $_SESSION['active'] = true;
            $_SESSION['username'] = $row[1];
            $_SESSION['user_id'] = $row[0]; 
        }
        session_regenerate_id();
        header("Location: https://cs.csubak.edu/~kgregory/4910/dashboard.php");
        exit();
    } else {
        header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
        exit();
    }
} else {
    header("Location: https://cs.csubak.edu/~kgregory/4910/home.php");
    exit();
}
?>

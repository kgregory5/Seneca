<?php
if(isset($_POST['username']) && ($_POST['password']) &&
    !empty($_POST['username']) && !empty($_POST['password'])) {
        
    $postedUsername = htmlspecialchars(trim($_POST['username']));
    $postedPassword = htmlspecialchars(trim($_POST['password']));

    $sql = "SELECT * FROM user WHERE username='$postedUsername' AND password='$postedPassword'"; 
    
    $res = $db->query($sql); 
    if($res->num_rows == 1) {
        $row = $res->fetch_assoc();
        $_SESSION['active'] = true;
        $_SESSION['username'] = $row['username'];

        session_regenerate_id();

        header("Location: ./dashboard.php");
        exit();
    }
    else {
        //echo "<h3 style='text-align:center;'>User name or password did not match</h3>";
        //header("Location: ./home.php");
        //exit();
    }
}
else {
    //echo "<h3 style='text-align:center;'>Please login</h3>";
    //header("Location: ./home.php");
    //exit();
}
?>

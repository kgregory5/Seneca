<?php
// connect.php - script that opens connection with database
define('HOST', 'ec2-54-243-187-30.compute-1.amazonaws.com');
define('PORT', '5432');
define('USERNAME', 'jxvgftvbcoxhlv');
define('PW', '39b27ba10da6601c066bd21ac4cf85ee70afaa17b73decbcd821f8e24e43db17');
define('DB', 'dc29u058iceh05');

// CONNECT
//$db = new mysqli(HOST, USERNAME, PW, DB);
//$db = pg_connect(HOST, PORT, DB, CREDENTIALS);
$db = pg_connect(HOST, DB, USERNAME, PW);

if(!$db) {
    echo "ERROR: connection unsuccessful\n";
}

else {
    echo "connection successful\n";
}

$result = pg_query($db, "SELECT username FROM user");
echo $result;
?>

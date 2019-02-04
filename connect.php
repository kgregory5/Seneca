<?php
// connect.php - script that opens connection with database
$db = pg_connect("host=ec2-54-243-187-30.compute-1.amazonaws.com 
                  port=5432 dbname=dc29u058iceh05 user=jxvgftvbcoxhlv 
                  password=39b27ba10da6601c066bd21ac4cf85ee70afaa17b73decbcd821f8e24e43db17");

if(!$db) {
    echo "ERROR: connection unsuccessful\n";
} else {
    //echo "connection successful\n";
}
?>

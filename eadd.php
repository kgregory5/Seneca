<?php
session_start();
//require_once('connect.php');
$db = pg_connect("host=ec2-54-243-187-30.compute-1.amazonaws.com port=5432 dbname=dc29u058iceh05 user=jxvgftvbcoxhlv password=39b27ba10da6601c066bd21ac4cf85ee70afaa17b73decbcd821f8e24e43db17");
if(isset($_POST['insert'])){
	$user = $_POST['user'];
	$pass = $_POST['psw'];
	$fname = $_POST['first'];
	$lname = $_POST['last'];
	$phn = "{". $_POST['phone']. "}";
	//$phn = $_POST['phone'];
	//$phn = str_split($pho,1);
	$rate = 0.3;
	$com = 't';
	//translate('$phn', '[]', '{}');

	/*$psql = "SELECT addemployee($user,$pass,$fname,$lname,$phn,$rate,$com)";
	$result = pg_prepare($db,"query",$psql);
	$result = pg_execute($db,"query",array('$user','$pass','$fname','$lname','$phn','$rate','$com'));*/
	//translate('$phn', '[]', '{}')::text[] AS '$phn')
	//pg_query("SELECT addemployee('$user','$pass','$fname','$lname','$phn[0]','$rate','$com')");
	//pg_query("SELECT addemployee('$user','$pass','$fname','$lname',translate(('$phn', '[]', '{}')::text[]) AS '$phn','$rate','$com')");
	pg_query("SELECT addemployee('$user','$pass','$fname','$lname','$phn','$rate','$com')");

            /*':user' => $user,
            ':pass' => $pass,
            ':fname' => $fname,
            ':lname' => $lname,
            ':phn' => $phn,
            ':rate' => $rate,
            ':com' => $com));*/
	//$result = pg_execute($db,"query",array('$user','$pass','$fname','$lname','$phn','$rate','$com'));
	//$rate = $_POST['rate'];
	//$comm = $_POST['work'];

}
header("Location:employees.php");
        exit;
?>
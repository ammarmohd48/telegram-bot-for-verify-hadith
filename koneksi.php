<?php

$server = "localhost";
$username = "id7565134_root";
$password = "ammar";
$db_name = "id7565134_hadith_scrapy";

//$db = mysql_connect($server,$username,$password) or DIE('koneksi ke database gagal []');
//$mysql_select_db($db_name,$db) or DIE('nama database tersebut tidak ada []');

$conn = mysqli_connect($server,$username,$password,$db_name);
// check connection

if (mysqli_connect_errno())
{
	echo"Failed to connect to MySQL:" . mysqli_connect_error();
}
else
{
    echo "success";
}
?>
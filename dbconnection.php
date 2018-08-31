<?php
ini_set("error_reporting",0);
//ini_set("session.cache_limiter", "Private");
ob_start();
@session_start();
$DB_Host="localhost";
$DB_Name="p";
$DB_Username="root";
$DB_Password="";
$con=mysql_connect($DB_Host,$DB_Username,$DB_Password) or die(mysql_errno());
$db=mysql_select_db("$DB_Name",$con) or die(mysql_error());
?>
<?php
session_start();
if(@$_SESSION["logintype"] == "Admin")
{
	header("Location: adminhome.php");
}

if(@$_SESSION["logintype"] == "users")
{
	header("Location: staffhome.php");
}

    include("header.php");
	include("dbconnection.php");
	include("slider.php");
	
	
	?>
    <?php
   include("footer.php");
   ?>
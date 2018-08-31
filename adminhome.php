<?php
session_start();
include("header.php");

include("dbconnection.php"); 
$insdb ="INSERT INTO product(productname,productdescription,teammember,teamid,startdate,enddate,noofdays,productdocs,productstatus) VALUES 
('$_POST[productname]','$_POST[description]','$_POST[teammember]','$_POST[teamid]', '$_POST[startdate]','$_POST[enddate]','$_POST[noofdays]','$_POST[productdocs]','$_POST[productstatus]')";
mysql_query($insdb,$con);
	
	?>
    <div id="fpms_content">
	
        	<div class="header_02">Admin home</div>
<p class="bi_para">&nbsp;Welcome <?php echo $_SESSION[names]; ?></p>
      
      <div class="rc_btn_02"></div>
           
            <div class="margin_bottom_40"></div>
            <div class="cleaner"></div>
        <div style="margin-left:120px;margin-top:-30px;">
   	  <a href="adminhome.php"><img src="images/adminhome.png"></a>
         <a href="updateprofile.php"><img src="images/adminprofile.png"></a> 
                <a href="addnewteam.php"><img src="images/team.png"></a>
                <a href="viewstaff.php"><img src="images/staff.png"></a><br/><br/>
                <a href="products2.php"><img src="images/addproducts.png"></a>
				     <a href="viewproduct.php"><img src="images/viewproducts.png"></a>
               	<a href="liveproduct.php"><img src="images/liveproducts.png"></a>
			   <a href="timesheet.php"><img src="images/stafftimesheet.png"></a><br/><br/>
                <a href="wages.php"><img src="images/wages.png">
                <a href="logout.php"><img src="images/logout.png">

        <div class="cleaner"></div>
		</div>
        
    </div>
   <?php
   include("footer.php");
   ?>
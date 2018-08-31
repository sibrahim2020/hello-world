<?php
session_start();
    include("header.php");
include("dbconnection.php"); 

if(isset($_POST[submitsearch]))
{

$qresult=mysql_query("select * from users where userid!= '100' AND teamid='$_POST[teamid]'");
}
else
{
$qresult=mysql_query("select * from users where userid!= '100' ");
}
	$qresultteam=mysql_query("select * from team");
	
	?>
    <div id="fpms_content">
   	
        <div id="fpms_content_left">
        	<div class="header_02"><strong><a href="addusers.php">Add Staff</a></strong></div>
   	      <table width="950" border="1">
       	      <tr bgcolor="#999999">
       	        <th width="111" scope="col">Employee Name</th>
       	        <th width="75" scope="col">Login ID</th>
				 <th width="180" scope="col">Food & Hygiene - Level</th>
       	        <th width="93" scope="col">Salary</th>
       	        <th width="94" scope="col">Contact No</th>
   	        </tr>
			<?php
			while($arrvar=mysql_fetch_array($qresult))
			{
				
				echo "        <tr>
              <td>&nbsp; $arrvar[fname] $arrvar[lname]</td>
              <td>&nbsp;$arrvar[loginid]</td>";
              echo "<td>&nbsp;$arrvar[expirence]</td>
			  <td>&nbsp;$arrvar[basicsalary]</td>
			  <td>&nbsp;$arrvar[contactno]</td>
            </tr>";
			}

        		
			?>
   
   	      
   	      </table>
   	      <p>&nbsp;</p>
  <div class="rc_btn_02"></div>
            
            <div class="margin_bottom_40"></div>
            <div class="cleaner"></div>
        </div> <!-- end of content left -->
        
        <div id="fpms_content_right">
        
        	<div class="content_right_section">
            	
                                            <?php
			 if($_SESSION["logintype"] = "Admin")
			 {
				include("adminsidebar.php");
			 }
			 else
			 {
				 include("empsidebar.php");
			 }
				?>
            
                <div class="margin_bottom_20"></div>
        	</div>
            
        </div> <!-- end of content right -->
        
        <div class="cleaner"></div>
        
    </div>
    
   <?php
   include("footer.php");
   ?>
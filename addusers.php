<?php
session_start();
?>

<script>
function validateFormadem()
{
var fn=document.forms["formadem"]["firstname"].value;
var ln = document.forms["formadem"]["lastname"].value;
var dob= document.forms["formadem"]["dob"].value;
var logi = document.forms["formadem"]["loginid"].value;
var pass = document.forms["formadem"]["password"].value;
var confpass = document.forms["formadem"]["confirmpassword"].value;
var bn = document.forms["formadem"]["teamname"].value;
var jndate = document.forms["formadem"]["joineddate"].value;
var bs = parseInt(document.forms["formadem"]["basicsalary"].value);
var addr = document.forms["formadem"]["address"].value;
var cty = document.forms["formadem"]["city"].value;
var coun = document.forms["formadem"]["country"].value;
var cntno = document.forms["formadem"]["contactno"].value;
var usertype = document.forms["formadem"]["usertype"].value;
var expe = document.forms["formadem"]["experience"].value;


if (fn==null || fn=="")
  {
  alert("First name must be filled out");
  return false;
  }
  
  if (ln==null || ln=="")
  {
  alert("Last name must be filled out");
  return false;
  }
  
 
  if (logi==null || logi=="")
  {
  alert("Login ID must be filled out");
  return false;
  }
  

  
  if ( pass==null || pass=="")
  {
  alert("Password must be filled out");
  return false;
  }

  if ( confpass==null || confpass=="")
  {
  alert(" Confrom Password must be filled out");
  return false;
  }
  

  if ( pass!=confpass)
  {
  alert("Password and confrom Password  must be same");
  return false;
  }
  
  if ( bn==null || bn=="")
  {
  alert(" team name must be filled out");
  return false;
  }
  if(bs<6)
  {
	  alert("Basic salary must be greater than 6.50");
	  return false;
  }
  if ( addr==null || addr=="")
  {
  alert(" address must be filled out");
  return false;
  }
    if ( cty==null || cty=="")
  {
  alert(" City must be filled out");
  return false;
  }
  
   if (coun==null || coun=="")
  {
  alert("Country must be filled out");
  return false;
  }
  if (contno==null || contno=="")
  {
  alert("Contact No must be filled out");
  return false;
  }
  
  

   if (usertype==null || usertype=="")
  {
  alert("Employee Type must be filled out");
  return false;
  }
  if (expe==null ||expe=="")
  {
  alert("Experience must be filled out");
  return false;
  }

}
</script>

<?php
include("header.php");
include("dbconnection.php");

$result = mysql_query("SELECT * FROM team");

$dateofbirth = $_POST[dob];
$dobs = date("Y-m-d", strtotime($dateofbirth));

$joindate = $_POST[joineddate];
$joindt = date("Y-m-d", strtotime($joindate));

if(isset($_POST["submit"]))
{
$insdb ="INSERT INTO users(fname,lname,loginid,password,teamid,joindate,basicsalary,address,city,country,contactno,sex,dob,usertype,expirence) VALUES 
('$_POST[firstname]','$_POST[lastname]', '$_POST[loginid]','$_POST[password]','$_POST[teamname]','$joindt','$_POST[basicsalary]','$_POST[address]','$_POST[city]','$_POST[country]','$_POST[contactno]','$_POST[radio]','$dobs','$_POST[usertype]','$_POST[experience]')";
$recc = mysql_query($insdb,$con);
}

if(isset($_POST[updatebtn]))
{
	mysql_query("update users set loginid = ''$_POST[firstname]','$_POST[lastname]', '$_POST[loginid]','$_POST[radio]','$_POST[teamname]','$_POST[joineddate]','$_POST[basicsalary]','$_POST[address]','$_POST[city]','$_POST[country]','$_POST[contactno]','$_POST[radio]','$_POST[dob]','$_POST[usertype]','$_POST[experience]'");
}

$txt=mysql_query("select * from team");
	?>

    <div id="fpms_content">
   	
        <div id="fpms_content_left">
        	<div class="header_02">Add A New Staff</div>
       	  <p>&nbsp;<?php echo $succ; ?><a href="viewstaff.php"><strong>View Staff</strong></a></p>
          
		  
		  <form id="formadem" name="formadem" method="post" action="" onsubmit="return validateFormadem()">
         <table width="950" border="3">
<tr>
<th scope="col">&nbsp;</th>
<th scope="col" align="left">&nbsp;<?php echo $brad; ?></th>
</tr>
<tr>
<th scope="col"><strong>First Name</strong></th>
<th scope="col" align="left">
 <input name="firstname" type="text" id="firstname" size="50" /> </tr>
<tr>
<th scope="col"><strong>Last Name</strong></th>
<th scope="col" align="left">
<input name="lastname" type="text" id="lastname" size="50" />
</tr>
 <tr>
<th scope="col"><strong>Sex</strong></th> 
<th scope="col" align="left">
  <input name="radio" type="radio" id="male" value="male" checked="checked" />
  Male

<input type="radio" name="radio" id="female" value="female" />
Female</th>
  </tr>
  <tr>
<th scope="col"><strong>Date of Birth</strong></th>
<th scope="col" align="left">
<script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
<input type="Text" name="dob" id="dob" maxlength="25" size="25"><a href="javascript:NewCal('dob','ddmmmyyyy',false,24)"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
</tr>
<tr>
<th scope="col"><strong>Login Id</strong></th>
<th scope="col" align="left">
<input type="text" name="loginid" id="loginid" />
</tr>
<tr>
<th scope="col"><strong>Password</strong></th>
<th scope="col" align="left">
 <input type="password" name="password" id="password" />
</tr>
  <tr>
<th scope="col"><strong>Joined Date</strong></th>
<th scope="col" align="left">
<script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
<input type="Text" name="joineddate" id="joineddate" maxlength="25" size="25"><a href="javascript:NewCal('joineddate','ddmmmyyyy',false,24)"><img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
</tr>
<tr>
<th scope="col"><strong>Basic Salary</strong></th>
<th scope="col" align="left">
<input type="text" name="basicsalary" id="basicsalary" />
</tr>
<tr>
<th scope="col"><strong>Address</strong></th>
<th scope="col" align="left">
<textarea name="address" id="address" cols="45" rows="5"></textarea>
</tr>
<tr>
<th scope="col"><strong>City</strong></th>
<th scope="col" align="left">
 <input type="text" name="city" id="city" />
</tr>
<tr>
<th scope="col"><strong>Country</strong></th>
<th scope="col" align="left">
 <select name="country" id="country">
              <option value="England,UK">England,UK</option>
            </select>
</tr>
<tr>
<th scope="col"><strong>Contact No</strong></th>
<th scope="col" align="left">
<input type="text" name="contactno" id="contactno" />
</tr>
<tr>
<th scope="col"><strong>User Type</strong></th>
<th scope="col" align="left">
<select name="usertype" id="usertype">
                <option value="Staffs">Staffs</option>
                <option value="Suppervisor">Suppervisor</option>
				  <option value="Production Manager">Production Manager</option>
				   <option value="Admin">Admin</option>
              </select></tr>
<tr>
<th scope="col"><strong>Experience</strong></th>
<th scope="col" align="left">
<select name="experienc" id="experienc">
                <option value="Level 2">Level 2</option>
                <option value="Level 3">Level 3</option>
              </select>
</tr>			  
			  
<td>&nbsp;</td>
<td>
  <input type="submit" name="submit" id="submit" value="Add users" />
              <input type="reset" name="reset" id="reset" value="Reset" />
              <input name="update" type="button" value="Update" />
            
</td>
</tr>
</table>
</form>
          <p>&nbsp;</p>
      <div class="rc_btn_02"></div>
            
            <div class="margin_bottom_40"></div>
            <div class="cleaner"></div>
        </div> <!-- end of content left -->
        
        <div id="fpms_content_right">
        
        	<div class="content_right_section">
            	
                <?php
				include("adminsidebar.php");
				?> 
                
              <div class="news_section">
                <div class="news_image"></div>
              </div>
                
              <div class="margin_bottom_20"></div>
              <div class="margin_bottom_20"></div>
                <div class="margin_bottom_20"></div>
        	</div>
            
        </div> <!-- end of content right -->
        
        <div class="cleaner"></div>
        
    </div>
   <?php
   include("footer.php");
   ?>
<?php
session_start();
header("Refresh: 5;");
?>
<script language="javascript" type="text/javascript">
function getXMLHTTP() { 
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(countryId) {		
		var strURL="findState.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
</script>
<script>
function validateFormadbr()
{
var bn=document.forms["formadb"]["productname"].value;
var addr = document.forms["formadb"]["productdescription"].value;

		  if (bn==null || bn=="")
		  {
		  alert("product name must be filled out");
		  return false;
		  }
		  
		  if (addr==null || addr=="")
		  {
		  alert("productdescription must be filled out");
		  return false;
		  }
		  
}

</script>

<?php
    include("header.php");
	include("dbconnection.php");
	
	if(isset($_POST[addproduct]))
	{
		$sql="INSERT INTO product (productname,productdescription,quantity) VALUES ('$_POST[productname]','$_POST[productdescription]','$_POST[quantity]')";
	
		if (!mysql_query($sql,$con))
		{
		die('Error: ' . mysql_error());
		}
		if(mysql_affected_rows())
		{
			$brad = "New product record inserted successfully...";
		}
	}
	
		if(isset($_POST[updatebtn]))
		{
		mysql_query("UPDATE product SET productname='$_POST[productname]',productdescription='$_POST[productdescription]',quantity='$_POST[quantity]' where productid='$_POST[projid]'");
		header("Location: products2.php");
		}
		if(isset($_POST[updatebtna]))
		{
		header("Location: products2.php");
		}
		if(isset($_POST[deletebtn]))
		{
				mysql_query("DELETE FROM product where productid='$_POST[projid]'");
						header("Location: products2.php");
		}
	
			$productreca  =mysql_query("select * from product where productid='$_GET[projid]'");
			
			$arrvara=mysql_fetch_array($productreca);
			
			$projid =$arrvara[productid];
			$brname = $arrvara[productname];
			$brproductdescription = $arrvara[productdescription];
			$brquantity = $arrvara[quantity];
        		
	?> 
<div id="fpms_content">
   	
    <div id="fpms_content_left">
        	
          <table width="1185" border="1">
            <tr>
              <th width="342" scope="col" bgcolor="#999999"><label for="productname2">product Name</label></th>
              <th width="45" scope="col" bgcolor="#999999">Product Filling</th> <th width="142" scope="col" bgcolor="#999999">Quantity</th>
			  <th width="100" scope="col" bgcolor="#999999">Product Status</th>
            </tr>
            <?php
			$productrec  =mysql_query("select * from product order by productid desc");
			while($arrvar=mysql_fetch_array($productrec))
			{
				
				echo "        <tr>
              <td>&nbsp;$arrvar[productname]</td>
              <td>&nbsp;$arrvar[productdescription]</td> 
			  <td>&nbsp$arrvar[quantity]</td>
			  <td>&nbsp$arrvar[productstatus]</td>
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
                  
                <div class="margin_bottom_20"></div>
        	</div>
            
        </div> <!-- end of content right -->
        
        <div class="cleaner"></div>
        
    </div>
   <?php
   include("footer.php");
   ?>
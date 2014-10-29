<?php
	define("ABSLPATH",dirname(__FILE__)."/");
	include(ABSLPATH.'top.php');
	include(ABSLPATH.'community.php');
	include(ABSLPATH.'contacts.php');
?>
<!--Page content goes here-->
<!---------------- START ---------------->
<div class="container">

<div class="leftside">	
	<div class="logincontainer">
		<p id="labels"><?php echo $name?> Login:</p>
		<div id="form">
		   <form id="login" name="login" method="post" action="">
		      <table class="tb">
			     <tr><td><input name="email_id" type="text" id="email_id" value="Email ID" size="25"/></td></tr>
				 <tr><td><label for="password"></label></tr></td>
				 <tr><td><input name="password" type="text" id="password" value="Password" size="25"/></tr></td>
				 <tr><td><input type="checkbox" name="rememberme" value="Remember me?" /> Remember me?</tr></td>
				 <tr><td><input name="add" type="submit" id="add" value="Login" /></tr></td>
				 <tr><td><a href="#">Forgot password?</a></tr></td>
			  </table>
		   </form>
		</div>
	</div>
	
	<div class="contactscontainer">
		<p id="labels">Community Contacts</p>
		<p id="txt" style="font-weight:bold">Maintenance Office</p>
		<p id="txt">123-456-7890</p>
		<p id="txt">simple@ticket.com</p>
		<br>
		<p id="txt" style="font-weight:bold">Board Members</p>
		<p id="txt"><?php echo $member1; ?></p>
		<p id="txt"><?php echo $mem1email; ?></p>
		<p id="txt"><?php echo $member2; ?></p>
		<p id="txt"><?php echo $mem2email; ?></p>
		<p id="txt"><?php echo $member3; ?></p>
		<p id="txt"><?php echo $mem3email; ?></p>
		<p>&nbsp;</p>
	</div>
	
	<div class="cforum">
		<p id="labels">Community Forum</p>
		<p id="txt">Add to the discussion in our local forum.</p>
		<a style="float: right;" href="forum.php" />Visit the forum.</a>
	</div>
	
</div>

<div class="rightside">

	<div class="logocontainer">
		<img src="images/chlogo.png" height="240" width="350" alt="Community Logo" />
		<p id="labels"><?php echo $name ?>&#174;</p>
		<br>
		<h2><?php echo $name?></h2>
	</div>


	<div class="formcontainer">
		<p id="labels">Maintenance Request Form</p>
		<form action="send.php" method="post">
		<table id="txt">
              <tr>
				<td><input name="txtFirstName" type="text" id="txtFirstName" value="First Name*" size="25"></td>
				<td><input name="txtLastName" type="text" id="txtLastName" value="Last Name*" size="25"></td>
			  </tr>
			  <tr>
			    <td><input name="txtCphone" type="text" id="txtCphone" value="Cell Phone" size="25"></td>
			    <td><input name="txtHphone" type="text" id="txtHphone" value="Home Phone" size="25"></td>
			  </tr>
			  <tr>
			  	<td><input name="txtAddress" type="text" id="txtAddress" value="Address*" size="25"></td>
			  </tr>
			  <tr>
			    <td><input name="contacttime" type="text" id="contacttime" value="A time to call:" size="20"></td>
			  </tr>
			  <tr>
			    <td>Describe the issue:*</td>
			  </tr>
			  <tr>
				<td colspan="4"><textarea name="description" cols="55" class="description" id="description" runat="server"></textarea></td>
			  </tr>
			  <tr>
			      <td  colspan="4">

					 <?php
					  require_once("recaptchalib.php");
					  $publickey = "6LdOUekSAAAAALVP2D_ioBf45UaJYvsyOZyxt2cP";
					  echo recaptcha_get_html($publickey);
					  ?>
			      </td>
			  </tr>
			    <td colspan="4" align="center" ><input name="add" type="submit" id="add" value="Submit" /></td>
		  </table>
		  </form>
		  <?php
		  if(isset($_GET['status']))
		  {
			$status = $_GET['status'];
			if($status == 1)
			{
				echo "Ticket Successfully submitted.";
			}
			else if ($status == 0)
			{
				echo "Unable to submit ticket please try again or contact management.";
			}
		  }
		  ?>
	</div>	
	
	<div class="newscontainer">
	<p id="labels">Community News</p>
	<?php/*
	$Conn = mssql_connect('','','')
	   or die('Unable to connect to server');
	$Db=mssql_select_db('',$Conn);
	$result = mssql_query("SELECT TOP 2 * FROM dbtable ORDER BY AID DESC");
	  echo "<table border='1'>";
	  while ($row = mssql_fetch_array($result))
	  {
		  echo "<tr><td id=\"bold\" >" . $row['title'] . "</td></tr>";
		  echo "<tr><td>" . $row['date'] . "</td></tr>";
		  echo "<tr><td>" . $row['announcement'] . "</td></tr>";
		  echo "<tr><td id=\"tab\" >" . " - " . $row['user'] . "</td></tr>";
	  }
	  echo "</table>";      
	  mssql_close($Conn);
	  */
	?> 
	<a style="float:right;" href="#" />Older News</a>
	</div>
</div>


<!---------------- END ---------------->
<!--pull in bottom bar, and closing tags-->
<?php include('bottom.php'); ?>
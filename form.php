<?php
function print_form() {
  echo '
		<form action="insert.php" method="post">
		<table id="txt">
              <tr>
				<td><input name="txtFirstName" type="text" id="txtFirstName" value="First Name*" size="30"></td>
				<td><input name="txtLastName" type="text" id="txtLastName" value="Last Name*" size="30"></td>
			  </tr>
			  <tr>
			    <td><input name="txtCphone" type="text" id="txtCphone" value="Cell Phone" size="30"></td>
			    <td><input name="txtHphone" type="text" id="txtHphone" value="Home Phone" size="30"></td>
			  </tr>
			  <tr>
			  	<td><input name="txtAddress" type="text" id="txtAddress" value="Address*" size="30"></td>
			  </tr>
			  <tr>
			    <td><input name="contacttime" type="text" id="contacttime" value="A time to call:" size="25"></td>
			  </tr>
			  <tr>
			    <td>Describe the issue:*</td>
			  </tr>
			  <tr>
				<td colspan="4"><textarea name="description" cols="55" class="description" id="description" runat="server"></textarea></td>
			  </tr>
			  <tr>
			      <td>
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
		  ';
}
?>
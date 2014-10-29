<?php
	define("ABSLPATH",dirname(__FILE__)."/");
	include(ABSLPATH.'top.php');
	include(ABSLPATH.'community.php');
	include(ABSLPATH.'contacts.php');
?>

<div class="container">

	<div>
	<p id="labels">All Community News</p>
	<?php
	$Conn = mssql_connect('','','')
	   or die('Unable to connect to server');
	$Db=mssql_select_db('',$Conn);
	$result = mssql_query("SELECT * FROM dbtable ORDER BY AID DESC");
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
	?>
	</div>
</div>

<!---------------- END ---------------->
<!--pull in bottom bar, and closing tags-->
<?php include('bottom.php'); ?>
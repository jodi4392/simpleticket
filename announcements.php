<?php
$Conn = mssql_connect('','','')
   or die('Unable to connect to server');
$Db=mssql_select_db('',$Conn);
$result = mssql_query("SELECT * FROM dbtable");
  echo "<table border='1'>";
  while ($row = mssql_fetch_array($result))
  {
  echo "<tr><td>" . $row['title'] . "</td></tr>";
  echo "<tr><td>" . $row['date'] . "</td></tr>";
  echo "<tr><td>" . $row['announcement'] . "</td></tr>";
  echo "<tr><td>" . $row['user'] . "</td></tr>";
  }
  echo "</table>";      
  mssql_close($Conn);
?>
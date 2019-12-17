<?php 
	session_start();
	include("service/config_service.php");

	header('Content-type: image/jpeg');

	$strSQL = " SELECT * FROM tb_files WHERE file_id = ".$_GET["file_id"];
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);

	echo $objResult["name"];

?>

  
    
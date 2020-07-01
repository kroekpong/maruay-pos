<?php

	session_start();
	include("service/config_service.php");


	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$position = strpos($actual_link,"web");
	$uri =  substr($actual_link, 0, $position);

	/************** MASTER SET UP **************/
	
	$pos_skin = "skin-blue" ;
	$pos_logo= $uri."assets/img/pos/pos.png" ;
	
	$pos_version = "3.0";

	// $pos_id = "POS-SERVER";
	// $pos_id = "POS-001";
	$pos_id = "POS-002";
	$pos_name = "KHOTDEE POS";
    $printer =  "PDFCreator"; // กำหนดชื่อเครื่องพิมพ์
    $printer_invoice =  "PDFCreator"; // กำหนดชื่อเครื่องพิมพ์ ออกใบกำกับภาษี


	$pos_user_id = "admin";
	$pos_user_nane = "ADMIN";
	$pos_user = "ADMIN";
	$pos_role = "Admin";

	$sel_all = "--- ทั้งหมด ---";

	/************** MASTER SET UP **************/

	$pos_price_type = array(
		'P0' => 'ราคาขายปกติ',
		'P1' => 'ราคาขายพิเศษ 1',
		'P2' => 'ราคาขายพิเศษ 2'
	); 

	$sql_conf = "  SELECT VALUE AS PRINT_CONFIRM FROM tb_PosNum WHERE TYPE = 'PRINT_CONFIRM' " ;
	$q_list_conf = mysql_query($sql_conf) or die("Could not query");
	while($result = mysql_fetch_array($q_list_conf)) {
		$pos_print_cf = $result['PRINT_CONFIRM'];
	 }

	$sql_conf = "  SELECT VALUE AS REST_CONFIRM FROM tb_PosNum WHERE TYPE = 'REST_CONFIRM' " ;
	$q_list_conf = mysql_query($sql_conf) or die("Could not query");
	while($result = mysql_fetch_array($q_list_conf)) {
		$pos_rest_cf = $result['REST_CONFIRM'];
	 }
	 
	$sql_conf = "  SELECT VALUE AS POS_NAME FROM tb_PosNum WHERE TYPE = 'POS_NAME' " ;
	$q_list_conf = mysql_query($sql_conf) or die("Could not query");
	while($result = mysql_fetch_array($q_list_conf)) {
		$pos_name = $result['POS_NAME'];
	 }
 
	 $sql_cont = "  SELECT VALUE AS PRINT_NAME FROM tb_PosNum WHERE TYPE = 'PRINT_NAME_SERVER' " ;
	 $q_cont = mysql_query($sql_cont) or die("Could not query");
	 while($result = mysql_fetch_array($q_cont)) {
		 $printer = $result['PRINT_NAME'];
	 }


	 if(isset($_SESSION['user_info'])) {

		$pos_user_id = $_SESSION['user_ID'];
		$pos_user_nane = $_SESSION['user_ID'];
		$pos_user = $_SESSION['full_name'];
		$pos_role = $_SESSION['role'];
			 
	 }


	 /**** PRINT SET UP ****/
	 $printer_status = "0";
	 try { 
		if(printer_open($printer)){ 
			$printer_status = "1";
		}  
	  } catch (Exception $e) { 
			// handing error 
			$printer_status = "0";
	  }
	  


?> 

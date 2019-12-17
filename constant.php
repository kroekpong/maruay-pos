<?php

	session_start();
	include("service/config_service.php");


	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$position = strpos($actual_link,"web");
	$uri =  substr($actual_link, 0, $position);

	
	$pos_skin = "skin-blue" ;
	$pos_logo= $uri."assets/img/pos/pos.png" ;
	$pos_name = "KHOTDEE POS";
	// $pos_name = "MG Thailand";
	
	// $pos_branch = "สาขาหลัก";
	$pos_user_id = "admin";
	$pos_user_nane = "ADMIN";
	$pos_user = "ADMIN";
	$pos_role = "Admin";


	$sel_all = "--- ทั้งหมด ---";


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
 

	 if(isset($_SESSION['user_info'])) {

		$pos_user_id = $_SESSION['user_ID'];
		$pos_user_nane = $_SESSION['user_ID'];
		$pos_user = $_SESSION['full_name'];
		$pos_role = $_SESSION['role'];
			 
	 }


?> 

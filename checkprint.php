<?php

  include("service/config_service.php");
  
 
  $printer =  "PDFCreator"; // กำหนดชื่อเครื่องพิมพ์
  $printer_status = "0";
  $sql_cont = "  SELECT VALUE AS PRINT_NAME FROM tb_PosNum WHERE TYPE = 'PRINT_NAME' " ;
  $q_cont = mysql_query($sql_cont) or die("Could not query");
  while($result = mysql_fetch_array($q_cont)) {
      $printer = $result['PRINT_NAME'];
   }
   
   try { 
		$handle = printer_open($printer);
	  //  $handle = printer_open('\\\\STCVN251\\SMCP');
	  //  var_dump($handle);
	if($handle){ 
		$printer_status = "1";
	}  
  } catch (Exception $e) { 
		// handing error 
		$printer_status = "0";
  }
  
  
  

    
  ?>
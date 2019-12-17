<?php

  include("service/config_service.php");
  

  $rows= array();

  $total_discount = "9,999.00";
  $total_amount ="9,999.00";
  $total_pay = "9,999.00";
  $total_change ="9,999.00";
  $total_qty= 0;
   			
  $inv_no= "INV-TEST999999999999";

  $shopname = "KHOTDEE 168";
//   $sql_cont = "  SELECT VALUE AS POS_NAME FROM tb_PosNum WHERE TYPE = 'POS_NAME' " ;
//   $q_cont = mysql_query($sql_cont) or die("Could not query");
//   while($result = mysql_fetch_array($q_cont)) {
//       $shopname = $result['POS_NAME'];
//    }

  $printer =  "PDFCreator"; // กำหนดชื่อเครื่องพิมพ์
  $sql_cont = "  SELECT VALUE AS PRINT_NAME FROM tb_PosNum WHERE TYPE = 'PRINT_NAME' " ;
  $q_cont = mysql_query($sql_cont) or die("Could not query");
  while($result = mysql_fetch_array($q_cont)) {
      $printer = $result['PRINT_NAME'];
   }


  // ฟังก์ชั่นสำหรับ กำหนดค่าของ ตัวเลขที่สัมพันธ์กับ การพิมพ์
  // ตัวอย่างเช่น ขนาด 1 cm ในค่า px ที่ DPI ที่ 600 ก็จะเป็น dpimm2px(10);
  // หรือ ขนาด 1 cm ในค่า px ที่ DPI 300 ก็จะเป็น dpimm2px(10,300); 
  function dpimm2px($val,$dpi=600){
    return ((($dpi*0.393701)/10)*$val); 
  }


  $docname =  $inv_no."_".date("YmdHis");  

  if($handle = printer_open($printer)){   

    
      //  การตั้งค่าการพิมพ์
    printer_set_option($handle, PRINTER_COPIES, 1);

    printer_set_option($handle,PRINTER_PAPER_FORMAT,PRINTER_FORMAT_CUSTOM);
    printer_set_option($handle,PRINTER_PAPER_LENGTH,200);
    printer_set_option($handle,PRINTER_PAPER_WIDTH,55);
    printer_set_option($handle, PRINTER_MODE, "raw");

    printer_start_doc($handle, $docname); // กำหนดชื่อเอกสาร ที่จะ print
    printer_start_page($handle);
 
    // ทดสอบสร้างพื้นที่รูปสี่เหลี่ยม เพือไว้อ้างอิงตำแหน่ง เวลาใช้งานจริง ตัดออกได้
    // $brush = printer_create_brush(PRINTER_BRUSH_SOLID, "CCCCCC");
    // printer_select_brush($handle, $brush);  
    // printer_draw_rectangle($handle, 0, 0, dpimm2px(50), dpimm2px(100));
    // printer_delete_brush($brush);
 
    // ส่วนของการพิมพ์ข้อความ รองรับภาษาไทย
    $font = printer_create_font("TH Sarabun New", dpimm2px(7), dpimm2px(2.4), PRINTER_FW_BOLD, false, false, false, 0);
    printer_select_font($handle, $font);
    $text = iconv("UTF-8","TIS-620",$shopname);
    printer_draw_text($handle, $text, dpimm2px(8.2), dpimm2px(3));
    printer_delete_font($font);
// 
    $font = printer_create_font("TH Sarabun New", dpimm2px(3), dpimm2px(0.9), PRINTER_FW_NORMAL, false, false, false, 0);
    printer_select_font($handle, $font);


    // $text = "TAX 0000000000000 (VAT Included)";
    // $text = iconv("UTF-8","TIS-620",$text); 
    // printer_draw_text($handle, $text, dpimm2px(10), dpimm2px(10));

    $text = "ใบเสร็จรับเงิน/ใบกำกับภาษีอย่างย่อ";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(12), dpimm2px(10));  

    $text = $inv_no;
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(3), dpimm2px(14));  

    $text = date("H:i:s d/m/Y");
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(29), dpimm2px(14));  

    $text = "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(3), dpimm2px(16));  
     
    // $y_end+=4;
    // $y_pos = $y_end;
    $text = "จำนวน";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(3), dpimm2px(18));    

    $text = "รายการ";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(12), dpimm2px(18));    

    $text = "จำนวนเงิน";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(37), dpimm2px(18));       

    $y_start = 21;
    $y_end = 0;

    // for ($i = 0; $i < count($pas_arr); $i++)  {   
    for($i=1; $i<=count($rows); $i++){
        $y_pos = $y_start+(($i-1)*3);

        $text = $rows[$i-1]['qty'];
        $text = iconv("UTF-8","TIS-620",$text); 
        printer_draw_text($handle, $text, dpimm2px(3), dpimm2px($y_pos));       
       
        $text = $rows[$i-1]['product_Name'];
        $text = iconv("UTF-8","TIS-620",$text); 
        $string = substr($text, 0, 32);
        printer_draw_text($handle, $string, dpimm2px(8), dpimm2px($y_pos));       


        $text = $rows[$i-1]['amount_f'];
        $text = iconv("UTF-8","TIS-620", $text); 
        $strlen = strlen($text);
        $strno = 45-$strlen ;
        printer_draw_text($handle, $text, dpimm2px($strno), dpimm2px($y_pos));      
        $y_end = $y_pos;        
    }


     
    $y_end+=2.5;
    $y_pos = $y_end;
    $text = "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(3), dpimm2px($y_pos));  


    $y_end+=3;
    $y_pos = $y_end;
    $text = "ส่วนลด";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(3), dpimm2px($y_pos));
    
    $text = $total_discount;
    $text = iconv("UTF-8","TIS-620",$text); 
    $strlen = strlen($text);
    $strno = 45-$strlen ;
    printer_draw_text($handle, $text, dpimm2px($strno), dpimm2px($y_pos));      

    $y_end+=3;
    $y_pos = $y_end;
    $text = "รวมเป็นเงิน";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(3), dpimm2px($y_pos));       

    $text = "[ ".$total_qty." ]";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(12), dpimm2px($y_pos));      
    $text = $total_amount;
    $text = iconv("UTF-8","TIS-620",$text); 
    $strlen = strlen($text);
    $strno = 45-$strlen ;
    printer_draw_text($handle, $text, dpimm2px($strno), dpimm2px($y_pos));          
     
    $y_end+=3;
    $y_pos = $y_end;
    $text = "รับเงิน/เงินทอน";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(3), dpimm2px($y_pos));       

    $text = $total_pay;
    $text = iconv("UTF-8","TIS-620",$text); 
    $strlen = strlen($text);
    $strno = 32-$strlen ;
    printer_draw_text($handle, $text, dpimm2px($strno), dpimm2px($y_pos));      

    $text = $total_change;
    $text = iconv("UTF-8","TIS-620",$text); 
    $strlen = strlen($text);
    $strno = 44.5-$strlen ;
    printer_draw_text($handle, $text, dpimm2px($strno), dpimm2px($y_pos));      
 
    // $y_end+=4;
    // $y_pos = $y_end;
    // $text = "R0000000000";
    // $text = iconv("UTF-8","TIS-620",$text); 
    // printer_draw_text($handle, $text, dpimm2px(3), dpimm2px($y_pos));       
    // $text = date("H:i:s d/m/Y");
    // $text = iconv("UTF-8","TIS-620",$text); 
    // printer_draw_text($handle, $text, dpimm2px(30), dpimm2px($y_pos));                  
     

    $y_end+=5;
    $y_pos = $y_end;
    $text = "*** โปรดเก็บไว้เป็นหลักฐาน ***";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(13.5), dpimm2px($y_pos));              
 
    $y_end+=4;
    $y_pos = $y_end;
    $text = "โทร 0933262848 ";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(18), dpimm2px($y_pos));              
 
    $y_end+=4;
    $y_pos = $y_end;
    $text = "ขอบคุณที่ใช้บริการ ";
    $text = iconv("UTF-8","TIS-620",$text); 
    printer_draw_text($handle, $text, dpimm2px(18), dpimm2px($y_pos));              
 
    // $y_end = $y_end+4;
    // $y_pos = $y_end;    
    // $text = "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -";
    // $text = iconv("UTF-8","TIS-620",$text); 
    // printer_draw_text($handle, $text, dpimm2px(3), dpimm2px($y_pos));       
         
    /////////Cash Drawer/////////
    $fh = fopen("opencashdrawer.txt", "rb"); //เปิดไฟล์
    $content = fread($fh, filesize("opencashdrawer.txt"));
    fclose($fh);    
    printer_write($handle, $content); //ส่งโค๊ดไปเตะเงิน
    /////////End Cash Drawer/////////
 
    printer_delete_font($font);
 
    printer_end_page($handle);
    printer_end_doc($handle);
    printer_close($handle);

    $arr = array('status' => 'success');  
    echo json_encode($arr);
          
  }else{
      $arr = array('status' => 'error' , 'desc' => "Connot connect to: ".$printer);  
      echo json_encode($arr);
  }



    
  ?>
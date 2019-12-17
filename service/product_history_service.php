<?php 
	session_start();
	include("config_service.php");
	 
	if(isset($_REQUEST['method'])){

		header('Content-type: application/json');
			
		if("search"==$_REQUEST['method']){
			$rows= array();
   			
			$sql_cmd = "  SELECT s.*  , h.remark , h.create_date create_date_hdr,
			case 
			when transType = 'S' then 'จ่ายออกปกติ'
			when transType = 'R' then 'คืนสินค้า'
			when transType = 'U' then 'อัพเดทสต๊อก'
			else '-'
			end as sale_status_txt						
			FROM tb_TransactionLog s 
			left join tb_SaleHeader h on h.saleHeader_ID = s.saleHeader_ID
			 where 1=1 " ;

			if(!empty( $_REQUEST['startDate']) && !empty( $_REQUEST['endDate'])){
			 
				$sql_cmd .= " AND  ( DATE(s.create_date) >= STR_TO_DATE('".$_REQUEST['startDate']."', '%d/%m/%Y' ) 
				and DATE(s.create_date) <= STR_TO_DATE('".$_REQUEST['endDate']."', '%d/%m/%Y')  ) ";  
			} 
 
			if(!empty( $_REQUEST['group'])){

				$sql_cmd .= " AND s.transType = '".$_REQUEST['group']."' "; 
			}
				
			$sql_cmd .= " ORDER by s.create_date  asc";
		
			$q_list = mysql_query($sql_cmd) or die("Could not query");

			while($result=mysql_fetch_assoc($q_list)) {
				$rows[]=$result;
			}

			echo json_encode($rows);

		}else if("summary_detail"==$_REQUEST['method']){

			$rows= array();
   			
			$sql_cmd = "  SELECT d.*  ,  h.total_discount , h.total_amount
			FROM  tb_SaleHeader h  join tb_SaleDetail d
			on h.saleHeader_ID = d.saleHeader_ID
			where h.sale_status = 'S' " ;
			
			$sql_total = "  SELECT  h.total_discount ,  total_amount  	
			FROM  tb_SaleHeader h  
			where h.sale_status = 'S' " ;
				
			if(!empty( $_REQUEST['startDate']) && !empty( $_REQUEST['endDate'])){
				$sql = " AND  ( DATE(h.create_date) >= STR_TO_DATE('".$_REQUEST['startDate']."', '%d/%m/%Y' ) 
				and DATE(h.create_date) <= STR_TO_DATE('".$_REQUEST['endDate']."', '%d/%m/%Y')  ) ";  
				$sql_cmd .= $sql;
				$sql_total .= $sql;
			} 
				
			$sql_cmd .= " ORDER by h.create_date , d.saleDetail_ID DESC ";

			$total_cost_itm = 0;
			$total_amount_itm = 0;
			$total_discount_itm = 0;
			$q_list = mysql_query($sql_cmd) or die("Could not query");
			while($result=mysql_fetch_assoc($q_list)) {
				$rows[]=$result;
				$total_cost_itm += (float) $result['cost'];
				$total_amount_itm += (float) $result['amount'];
				$total_discount_itm += (float) $result['discount'];
			}

			$q_total = mysql_query($sql_total) or die("Could not query");
			
			$total_amount_hdr = 0;
			$total_discount_hdr = 0;
			while($rs=mysql_fetch_assoc($q_total)) {
				$total_amount_hdr += (float) $rs['total_amount'];
				$total_discount_hdr += (float) $rs['total_discount'];
			}

			$total_cost = $total_cost_itm;
			$total_discount  = $total_discount_hdr + $total_discount_itm ;
			$arr = array(
				'total_cost' => $total_cost , 
				'total_amount' => $total_amount_hdr , 
				'total_discount' => $total_discount  , 
				'total_profit' => $total_amount_hdr - $total_cost , 
				'data' => $rows
			);  
			echo json_encode($arr);

		}else if("summary_day"==$_REQUEST['method']){

			$rows= array();
   			
			$sql_cmd = " SELECT  ROUND(SUM(d.cost),2) total_cost ,  
			ROUND(SUM(d.discount),2) total_discount_itm  , 
		   (SELECT ROUND(SUM(i.total_discount),2) FROM tb_SaleHeader i 
			 WHERE DATE_FORMAT(i.create_date, '%d/%m/%Y') = DATE_FORMAT(d.create_date, '%d/%m/%Y')  
			 and i.sale_status = 'S' ) AS total_discount_hdr,
			  ROUND(SUM(d.amount),2) total_amount , 
		  DATE_FORMAT(d.create_date, '%d/%m/%Y') name
		 FROM  tb_SaleHeader h   
		 left JOIN tb_SaleDetail d
		 ON h.saleHeader_ID = d.saleHeader_ID 
		 WHERE h.sale_status = 'S'  " ;
				
			if(!empty( $_REQUEST['startDate']) && !empty( $_REQUEST['endDate'])){
				$sql = " AND  ( DATE(d.create_date) >= STR_TO_DATE('".$_REQUEST['startDate']."', '%d/%m/%Y' ) 
				and DATE(d.create_date) <= STR_TO_DATE('".$_REQUEST['endDate']."', '%d/%m/%Y')  ) ";  
				$sql_cmd .= $sql;
				// $sql_total .= $sql;
			} 
				
			$sql_cmd .= " GROUP BY DATE_FORMAT(d.create_date, '%d/%m/%y')    ORDER by d.create_date   ";

			$total_cost = 0;
			$total_amount_itm = 0;
			$total_discount_itm = 0;
			$total_discount_hdr = 0;
			$q_list = mysql_query($sql_cmd) or die("Could not query");
			while($result=mysql_fetch_assoc($q_list)) {

				$result['net_amount'] = $result['total_amount']-$result['total_discount_hdr'] ;
				$result['sum_discount'] = $result['total_discount_itm']+$result['total_discount_hdr'] ;
				// $result['sum_discount'] = $result['total_amount']+$result['total_discount_hdr'] ;
				$rows[]=$result;

				$total_cost+= (float) $result['total_cost'];
				$total_amount_itm += (float) $result['total_amount'];
				$total_discount_itm+= (float) $result['total_discount_itm'];
				$total_discount_hdr+= (float) $result['total_discount_hdr'];
			}

			 

			$total_amount = $total_amount_itm - $total_discount_hdr;
			$total_discount  = $total_discount_hdr + $total_discount_itm ;
			$total_profit  = $total_amount - $total_cost ;

			$arr = array(
				'total_cost' => $total_cost , 
				'total_amount' => $total_amount , 
				'total_discount' => $total_discount  , 
				'total_profit' => $total_profit, 
				'data' => $rows
			);  
			echo json_encode($arr);

		}else if("summary_bill"==$_REQUEST['method']){

			$rows= array();
   			
			$sql_cmd = " SELECT
				h.saleHeader_ID name,
				ROUND(SUM(d.cost),2)    total_cost, 
				ROUND( h.total_discount + SUM(d.discount),2)  sum_discount, 
				h.total_amount net_amount, 
				DATE_FORMAT(d.create_date, '%d/%m/%Y')    create_date
			FROM tb_SaleHeader h
				LEFT JOIN tb_SaleDetail d
				ON h.saleHeader_ID = d.saleHeader_ID
			WHERE h.sale_status = 'S' " ;
				
			if(!empty( $_REQUEST['startDate']) && !empty( $_REQUEST['endDate'])){
				$sql = " AND  ( DATE(h.create_date) >= STR_TO_DATE('".$_REQUEST['startDate']."', '%d/%m/%Y' ) 
				and DATE(h.create_date) <= STR_TO_DATE('".$_REQUEST['endDate']."', '%d/%m/%Y')  ) ";  
				$sql_cmd .= $sql;
				// $sql_total .= $sql;
			} 
				
			$sql_cmd .= " GROUP BY h.saleHeader_ID    ORDER by d.create_date   ";

			$total_cost = 0;
			$total_amount = 0;
			$total_discount = 0;
			$q_list = mysql_query($sql_cmd) or die("Could not query");
			while($result=mysql_fetch_assoc($q_list)) {

				$result['total_amount'] = $result['net_amount']+$result['sum_discount'] ;
				$rows[]=$result;

				$total_cost+= (float) $result['total_cost'];
				$total_amount += (float) $result['net_amount'];
				$total_discount+= (float) $result['sum_discount'];
			}

			 
			$total_profit  = $total_amount - $total_cost ;

			$arr = array(
				'total_cost' => $total_cost , 
				'total_amount' => $total_amount , 
				'total_discount' => $total_discount  , 
				'total_profit' => $total_profit, 
				'data' => $rows
			);  
			echo json_encode($arr);

		}else{ 			
			$arr = array('status' => 'error');  
			echo json_encode($arr);
		}

		
	}else{
		echo "Required parameter!";
	}
 
?>
  
   

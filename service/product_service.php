<?php 
	session_start();
	include("config_service.php");
	 
	if(isset($_REQUEST['method'])){

		header('Content-type: application/json');
			
		if("search"==$_REQUEST['method']){
		
			// $arr = explode(' ',$_REQUEST['date_sum']);
	        // $date_select=$arr[1];
			// $day=$arr[0];

			$rows= array();
   			
			$sql_cmd = "  SELECT p.*, TRUNCATE(p.normal_price, 2) n_price,
				l.location_name loc_name,
				c.category_name cat_name,
				u.unitType_name  unit_name
				FROM tb_ProductMaster p
				LEFT JOIN tb_Location l
				ON l.location_ID = p.location_ID
				LEFT JOIN tb_Category c
				ON c.category_ID = p.category_ID
				LEFT JOIN tb_UnitType u
				ON u.unitType_ID = p.unitType_ID
				WHERE p.product_status = 'Active'  " ;
				
		
			if(!empty( $_REQUEST['name'])){
			 
				$sql_cmd .= " AND ( p.product_Name like '%".$_REQUEST['name']."%' "; 
				$sql_cmd .= " or  p.product_ID like '%".$_REQUEST['name']."%'  "; 
				$sql_cmd .= " or  p.serial_no like '%".$_REQUEST['name']."%' ) "; 
			} 

			if(!empty( $_REQUEST['group'])){
			 
				$sql_cmd .= " AND  p.category_ID = '".$_REQUEST['group']."' ";  
			} 

			if(!empty( $_REQUEST['location'])){
			 
				$sql_cmd .= " AND  p.location_ID = '".$_REQUEST['location']."' "; 
			} 

			if(!empty( $_REQUEST['warn']) &&  $_REQUEST['warn'] == 'Y'){
			 
				$sql_cmd .= " AND  qty < min_qty"; 
			} 
			
			if(!empty( $_REQUEST['package']) &&  $_REQUEST['package'] == 'Y'){
				$product_ID=$_REQUEST['product_ID'];

				$sql_cmd .= " AND  p.product_ID <> '".$product_ID."'  ";  
				$sql_cmd .= " AND  NOT EXISTS 
					( SELECT  1  FROM  tb_ProductMaster d WHERE  d.parent_product_id = p.product_ID )  ";  

			} 
			
			 $sql_cmd .= " ORDER by p.create_date DESC ";
	 
			$q_list = mysql_query($sql_cmd) or die("Could not query");

			while($result=mysql_fetch_assoc($q_list)) {
				$rows[]=$result;
			}
			echo json_encode($rows);

		}else if("search_sell"==$_REQUEST['method']){
		
				// $arr = explode(' ',$_REQUEST['date_sum']);
				// $date_select=$arr[1];
				// $day=$arr[0];
	
				$rows= array();
				   
				$sql_cmd = "  SELECT p.product_ID, p.product_Name , p.serial_no  , p.qty as old_qty , 1 as qty ,0 as discount ,
				 TRUNCATE(p.normal_price, 2) total_price , u.unitType_name as unit_name ,TRUNCATE(p.cost, 2) cost  
				  , qty_condition , wholesale_flg , TRUNCATE(p.wholesale_price, 2) wholesale_price , " ;
					
			 
				if(!empty( $_REQUEST['ptype']) &&  $_REQUEST['ptype'] == 'P2'){
					$sql_cmd .= " TRUNCATE(p.special_price_2, 2) sell_price ";  
				} 
				else if(!empty( $_REQUEST['ptype']) &&  $_REQUEST['ptype'] == 'P1'){
					$sql_cmd .= " TRUNCATE(p.special_price_1, 2) sell_price "; 
				}else {
					$sql_cmd .= " TRUNCATE(p.normal_price, 2) sell_price "; 
				} 

				$sql_cmd .= " FROM tb_ProductMaster p  
					LEFT JOIN tb_UnitType u
					ON u.unitType_ID = p.unitType_ID 
					WHERE 1=1  and  p.product_status = 'Active'  " ;
				

				if(isset( $_REQUEST['name'])){
					$sql_cmd .= " AND p.product_ID = '".$_REQUEST['name']."' "; 
				}else{
					$sql_cmd .= "  AND 1 = 2 ";
				}
			 
				
				$q_list = mysql_query($sql_cmd) or die("Could not query");
	
				while($result=mysql_fetch_assoc($q_list)) {
					$rows[]=$result;
				}
				// echo isset( $_REQUEST['name']);
				echo json_encode($rows);
			
		} else if("return_count"==$_REQUEST['method']){
			$user_id=$_REQUEST['user_id'];
			$sql_rest = " SELECT  1  FROM tb_SaleHeader  WHERE sale_status = 'W' and employee_ID = '".$user_id."' " ;
			$q_list_rest = mysql_query($sql_rest) or die("Could not query");
			$rest_no = mysql_num_rows($q_list_rest);

			echo json_encode($rest_no);

		} else if("search_rest_count"==$_REQUEST['method']){
			$user_id=$_REQUEST['user_id'];
			$sql_rest = " SELECT a.saleHeader_ID  ,a.order_date, 
			 ( SELECT count(d.saleDetail_ID)   from tb_SaleDetail d where d.saleHeader_ID = a.saleHeader_ID ) as total 
			FROM tb_SaleHeader  a
			WHERE a.sale_status = 'W' and a.employee_ID = '".$user_id."' order by a.saleHeader_ID" ;
			$q_list_rest = mysql_query($sql_rest) or die("Could not query");
			$rows= array();
			while($result=mysql_fetch_assoc($q_list_rest)) {
				$rows[]=$result;
			}

			echo json_encode($rows);

		} else if("search_rest_list"==$_REQUEST['method']){
			$saleHeader_ID=$_REQUEST['saleHeader_ID'];
			$sql_rest = " SELECT a.* ,  a.price as sell_price , a.amount as total_price 
			  , p.qty_condition , p.wholesale_flg , TRUNCATE(p.wholesale_price, 2) wholesale_price 
			FROM tb_SaleDetail  a    left join  tb_ProductMaster p
			ON p.product_ID = a.product_ID
			WHERE a.saleHeader_ID= '".$saleHeader_ID."' " ;
			$q_list_rest = mysql_query($sql_rest) or die("Could not query");
			$rows= array();
			while($result=mysql_fetch_assoc($q_list_rest)) {
				$rows[]=$result;
			}

				/*  Delete Temp */
			$strSQL = "DELETE FROM tb_SaleHeader WHERE   saleHeader_ID= '".$saleHeader_ID."' " ;
			$objQuery = mysql_query($strSQL);

			$strSQL2 = "DELETE FROM tb_SaleDetail  WHERE   saleHeader_ID= '".$saleHeader_ID."' " ;
			$objQuery2 = mysql_query($strSQL2);

			echo json_encode($rows);

		} else if("search_sell_list"==$_REQUEST['method']){

			$saleHeader_ID=$_REQUEST['saleHeader_ID'];
			$sql_rest = " SELECT a.* ,  a.price as sell_price , a.amount as total_price ,
			p.qty AS old_qty_update , (p.qty + a.qty) AS new_qty_update , 
			ROUND(h.total_amount,2) total_amount, ROUND(h.total_discount,2) total_discount
			FROM tb_SaleDetail  a 
			left join  tb_SaleHeader h   on a.saleHeader_ID = h.saleHeader_ID
			LEFT JOIN  tb_ProductMaster p   ON p.product_ID = a.product_ID
			WHERE   a.saleHeader_ID= 'INV-".$saleHeader_ID."' and  h.sale_status = 'S' " ;

			$q_list_rest = mysql_query($sql_rest) or die("Could not query");
			$rows= array();
			while($result=mysql_fetch_assoc($q_list_rest)) {
				$rows[]=$result;
			}
 
			echo json_encode($rows);


		} else if("del_product"==$_REQUEST['method']){
	
			$product_ID=$_REQUEST['product_ID'];
			$user_id=$_REQUEST['user_id'];

			// $strSQL = " delete from tb_ProductMaster  WHERE product_ID= '".$product_ID."' " ;
			$strSQL = " 	update   tb_ProductMaster  set product_status = 'Inactive'  WHERE product_ID= '".$product_ID."' " ;
			$strSQL = mysql_query($strSQL);

			if($objQuery){
				$arr = array('status' => 'success');  
				echo json_encode($arr);
			} else{			
				$arr = array('status' => 'error');  
				echo json_encode($arr);
			}

		} else if("save_product"==$_REQUEST['method']){
	
			$product_ID=$_REQUEST['product_ID'];
			$serial_no=$_REQUEST['product_ID'];
			$product_Name=$_REQUEST['product_Name'];
			$category_ID=$_REQUEST['category_ID'];
			$location_ID=$_REQUEST['location_ID'];
			$cost=$_REQUEST['cost'];
			$special_price_1=$_REQUEST['special_price_1'];
			$special_price_2=$_REQUEST['special_price_2'];
			$unitType_ID=$_REQUEST['unitType_ID'];
			$qty=$_REQUEST['qty'];
			$normal_price=$_REQUEST['normal_price'];
			$wholesale_flg=$_REQUEST['wholesale_flg'];
			$min_qty=$_REQUEST['min_qty'];

			$parent_product_id=$_REQUEST['parent_product_id'];
			$parent_sub_qty=$_REQUEST['parent_sub_qty'];

			$user_id=$_REQUEST['user_id'];

			$qty_condition = "0";
			$wholesale_flg = "0";
			$wholesale_price = "0";
			if(isset( $_REQUEST['qty_condition'])){
				$qty_condition = $_REQUEST['qty_condition'];
			}
			if(isset( $_REQUEST['wholesale_flg'])){
				$wholesale_flg = $_REQUEST['wholesale_flg'];
			}
			if(isset( $_REQUEST['wholesale_price'])){
				$wholesale_price = $_REQUEST['wholesale_price'];
			}
			// $total_amount = str_replace(",","",$total_amount);
			// $total_discount = str_replace(",","",$total_discount);

			// $sale_id = "" ;
			$strSQL = " SELECT count(1) as total   from tb_ProductMaster a   
					WHERE  a.product_status = 'Active' and a.product_ID = '".$product_ID."' "; 
		   $objQuery = mysql_query($strSQL);
		   $data=mysql_fetch_assoc($objQuery);
		   if($data['total'] > 0 ){
			  $arr = array('status' => 'duplicate'); 
			  echo json_encode($arr);
		   }else{			
			  
				$query_insert = " 
				INSERT INTO tb_ProductMaster 
					(
					product_ID, 
					product_Name, 
					qty, 
					min_qty, 
					location_ID, 
					cost, 
					normal_price, 
					special_price_1, 
					special_price_2, 
					category_ID, 				 
					serial_no, 
					qty_condition, 
					wholesale_flg, 
					wholesale_price, 
					unitType_ID, 
					product_status, 
					parent_product_id,
					parent_sub_qty,
					create_date, 
					create_by  
					)
					VALUES
					('".$product_ID."', 
					'".$product_Name."', 
					'".$qty."', 
					'".$min_qty."', 
					'".$location_ID."', 
					'".$cost."', 
					'".$normal_price."', 
					'".$special_price_1."', 
					'".$special_price_2."', 
					'".$category_ID."', 				 
					'".$serial_no."', 
					'".$qty_condition."', 
					'".$wholesale_flg."', 
					'".$wholesale_price."', 
					'".$unitType_ID."', 
					'Active', 
					'".$parent_product_id."', 
					'".$parent_sub_qty."', 
					NOW(), 
					'".$user_id."'   
					) ";

				$objQuery = mysql_query($query_insert) or die(mysql_error());
				if($objQuery){
					$arr = array('status' => 'success');  
					echo json_encode($arr);
				} else{			
					$arr = array('status' => 'error');  
					echo json_encode($arr);
				}

			}

		} else if("edit_product"==$_REQUEST['method']){
	
			$product_ID=$_REQUEST['product_ID'];
			$serial_no=$_REQUEST['product_ID'];
			$product_Name=$_REQUEST['product_Name'];
			$category_ID=$_REQUEST['category_ID'];
			$location_ID=$_REQUEST['location_ID'];
			$cost=$_REQUEST['cost'];
			$special_price_1=$_REQUEST['special_price_1'];
			$special_price_2=$_REQUEST['special_price_2'];
			$unitType_ID=$_REQUEST['unitType_ID'];
			$qty=$_REQUEST['qty'];
			$normal_price=$_REQUEST['normal_price'];
			$wholesale_flg=$_REQUEST['wholesale_flg'];
			$min_qty=$_REQUEST['min_qty'];

			$parent_product_id=$_REQUEST['parent_product_id'];
			$parent_sub_qty=$_REQUEST['parent_sub_qty'];

			$user_id=$_REQUEST['user_id'];

			$qty_condition = "0";
			$wholesale_flg = "0";
			$wholesale_price = "0";
			if(isset( $_REQUEST['qty_condition'])){
				$qty_condition = $_REQUEST['qty_condition'];
			}
			if(isset( $_REQUEST['wholesale_flg'])){
				$wholesale_flg = $_REQUEST['wholesale_flg'];
			}
			if(isset( $_REQUEST['wholesale_price'])){
				$wholesale_price = $_REQUEST['wholesale_price'];
			}
			 
			  
			$query_update = "
			update tb_ProductMaster set 
			product_Name='".$product_Name."', 
			qty='".$qty."', 
			min_qty='".$min_qty."', 
			location_ID='".$location_ID."', 
			cost='".$cost."', 
			normal_price='".$normal_price."', 
			special_price_1='".$special_price_1."', 
			special_price_2='".$special_price_2."', 
			category_ID='".$category_ID."', 
			serial_no='".$serial_no."', 
			qty_condition='".$qty_condition."', 
			wholesale_flg='".$wholesale_flg."', 
			wholesale_price='".$wholesale_price."', 
			unitType_ID='".$unitType_ID."', 
			product_status='Active', 
			parent_product_id='".$parent_product_id."', 
			parent_sub_qty='".$parent_sub_qty."', 
			update_date=NOW(), 
			update_by='".$user_id."' 
			where product_ID='".$product_ID."'";

			$objQuery = mysql_query($query_update) or die(mysql_error());
			if($objQuery){
				$arr = array('status' => 'success');  
				echo json_encode($arr);
			} else{			
				$arr = array('status' => 'error');  
				echo json_encode($arr);
			}

		} else if("update_stock"==$_REQUEST['method']){

			$saleType=$_REQUEST['saleType'];
			$total_amount=$_REQUEST['total_amount'];
			$user_id=$_REQUEST['user_id'];
			$remark=$_REQUEST['remark'];

			$total_amount = str_replace(",","",$total_amount);
			// $total_discount = str_replace(",","",$total_discount);

			$sale_id = "" ;
	
			$query_insert = "  insert into  `tb_SaleHeader`( saleHeader_ID ,`saleType_ID`,`total_discount`,`total_amount`,
			`customer_ID`,`employee_ID`,`order_date`,`sale_status`,`create_date`,
			`create_by` , remark ) values ( fn_getNumber('".$saleType."')
			,'U0' ,'0','".$total_amount."' ,NULL,'".$user_id."' 
			,NOW(),'U',NOW(), '".$user_id."' , '".$remark."' ) ";

			$objQuery = mysql_query($query_insert) or die(mysql_error());

			if($objQuery){

				$items = json_decode($_REQUEST['items'], true);
				foreach ($items as $item) {
 
					$query_detail = "  insert into  `tb_TransactionLog` ( `saleHeader_ID` , `product_ID`
					, `product_Name` , old_qty ,`qty`,new_qty , `create_date`, `create_by`, transType ) 
					values (  
						( SELECT `VALUE` FROM tb_PosNum WHERE `TYPE` = '".$saleType."' ) ,  
						 '".$item['product_ID']."' ,
						fn_getProductName('".$item['product_ID']."') ,
					'".$item['old_qty']."' ,'".$item['qty']."' ,'".$item['new_qty']."' ,  NOW(), '".$user_id."' , 'U' ) ";

					$objQuery_detail = mysql_query($query_detail) or die(mysql_error());

					if( "SA" == $saleType){
						$query_stk = " call sp_addStock('".$item['product_ID']."' ,".$item['qty']." )";
						$objQuery_stk = mysql_query($query_stk) or die(mysql_error());	
					}

				}

			}

		 
			if($objQuery && $objQuery_detail){
				$arr = array('status' => 'success');  
				echo json_encode($arr);
			} else{			
				$arr = array('status' => 'error');  
				echo json_encode($arr);
			}

		}else{ 			
			$arr = array('status' => 'error');  
			echo json_encode($arr);
		}

		
	}else{
		echo "Required parameter!";
	}
?>
  
   

<?php 
		session_start();
		include("config_service.php");
	 
	if(isset($_REQUEST['method'])){

		header('Content-type: application/json');
			
		if("SEARCH_UNIT"==$_REQUEST['method']){

			$sql = " select * from tb_UnitType order by unitType_ID " ;

			$q_list = mysql_query($sql) or die("Could not query");
			$rows= array();
			while($result=mysql_fetch_assoc($q_list)) {
				$rows[]=$result;
			}

			$arr = array('data' => $rows);  
			echo json_encode($arr);
		}elseif("SEARCH_CATEGORY"==$_REQUEST['method']){

			$sql = " select * from tb_Category  order by category_ID  " ;

			$q_list = mysql_query($sql) or die("Could not query");
			$rows= array();
			while($result=mysql_fetch_assoc($q_list)) {
				$rows[]=$result;
			}

			$arr = array('data' => $rows);  
			echo json_encode($arr);

		}elseif("SEARCH_LOCATION"==$_REQUEST['method']){

			$sql = " select * from tb_Location order by location_ID  " ;

			$q_list = mysql_query($sql) or die("Could not query");
			$rows= array();
			while($result=mysql_fetch_assoc($q_list)) {
				$rows[]=$result;
			}

			$arr = array('data' => $rows);  
			echo json_encode($arr);

		}elseif("save"==$_REQUEST['method']){

			$name=$_REQUEST['name'];
			$type=$_REQUEST['type'];
			$user_id=$_REQUEST['user_id'];

			
			if($type=='1'){
				$query_insert = "  insert into  tb_UnitType ( unitType_ID , unitType_name , `create_date`, `create_by` ) 
				values (  fn_getId('UT') , '".$name."' , NOW(), '".$user_id."'  ) ";
				
				$qcount = " SELECT count(1) as total  from tb_UnitType  WHERE  unitType_name = '".$name."' "; 
			}else if($type=='2'){
				$query_insert = "  insert into  tb_Category ( category_ID , category_name , `create_date`, `create_by` ) 
				values (  fn_getId('CT') , '".$name."' , NOW(), '".$user_id."'  ) ";

				$qcount = " SELECT count(1) as total  from tb_Category  WHERE  category_name = '".$name."' "; 
			}else if($type=='3'){
				$query_insert = "  insert into  tb_Location ( location_ID , location_name , `create_date`, `create_by` ) 
				values (  fn_getId('LC') , '".$name."' , NOW(), '".$user_id."'  ) ";

				$qcount = " SELECT count(1) as total  from tb_Location  WHERE  location_name = '".$name."' "; 
			}


			$ocount = mysql_query($qcount);
			$data=mysql_fetch_assoc($ocount);
			if($data['total'] > 0 ){
				$arr = array('status' => 'duplicate'); 
				echo json_encode($arr);
			}else{		

				$objQuery = mysql_query($query_insert) or die(mysql_error());
				if($objQuery){
					$arr = array('status' => 'success');  
					echo json_encode($arr);
				} else{			
					$arr = array('status' => 'error');  
					echo json_encode($arr);
				}
			}


		}elseif("update"==$_REQUEST['method']){

			$code=$_REQUEST['code'];
			$name=$_REQUEST['name'];
			$type=$_REQUEST['type'];
			$user_id=$_REQUEST['user_id'];

			if($type=='1'){
				$query_insert = "  update  tb_UnitType  set    unitType_name = '".$name."'
				, `update_date`= NOW() , `update_by`  =  '".$user_id."'  where unitType_ID = '".$code."' ";

				$qcount = " SELECT count(1) as total  from tb_UnitType  WHERE  unitType_name = '".$name."'
				and unitType_ID <> '".$code."' "; 
			}else if($type=='2'){
				$query_insert = "  update  tb_Category  set    category_name = '".$name."'
				, `update_date`= NOW() , `update_by`  =  '".$user_id."'  where category_ID = '".$code."' ";

				$qcount = " SELECT count(1) as total  from tb_Category  WHERE  category_name = '".$name."'
				and category_ID <> '".$code."' "; 
			}else if($type=='3'){
				$query_insert = "  update  tb_Location  set    location_name = '".$name."'
				, `update_date`= NOW() , `update_by`  =  '".$user_id."'  where location_ID = '".$code."' ";

				$qcount = " SELECT count(1) as total  from tb_Location  WHERE  location_name = '".$name."'
				and location_ID <> '".$code."' "; 
			}


			$ocount = mysql_query($qcount);
			$data=mysql_fetch_assoc($ocount);
			if($data['total'] > 0 ){
				$arr = array('status' => 'duplicate'); 
				echo json_encode($arr);
			}else{		

				$objQuery = mysql_query($query_insert) or die(mysql_error());
				if($objQuery){
					$arr = array('status' => 'success');  
					echo json_encode($arr);
				} else{			
					$arr = array('status' => 'error');  
					echo json_encode($arr);
				}
			}

		}elseif("delete"==$_REQUEST['method']){

			$code=$_REQUEST['code'];
			$type=$_REQUEST['type'];

			if($type=='1'){
				$strSQL = "delete from  tb_UnitType  WHERE unitType_ID= '".$code."' " ;
			}else if($type=='2'){
				$strSQL = "delete from  tb_Category  WHERE category_ID= '".$code."' " ;
			}else if($type=='3'){
				$strSQL = "delete from  tb_Location  WHERE location_ID= '".$code."' " ;
			}
		
		
			$strRs = mysql_query($strSQL);

			if($strRs){
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
  
   

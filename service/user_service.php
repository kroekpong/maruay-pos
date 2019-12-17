<?php 
	session_start();
	include("config_service.php");

 
	if(isset($_REQUEST['method'])){

		header('Content-type: application/json');
			
		if("search"==$_REQUEST['method']){

			$sql = " select * from tb_Employee order by employee_ID " ;

			$q_list = mysql_query($sql) or die("Could not query");
			$rows= array();
			while($result=mysql_fetch_assoc($q_list)) {
				$result['fn1']=  (strpos($result['function'], 'fn1')!== false) ? "1" : "0";
				$result['fn2']=  (strpos($result['function'], 'fn2')!== false)  ? "1" : "0";
				$result['fn3']=  (strpos($result['function'], 'fn3')!== false)  ? "1" : "0";
				$result['fn4']=  (strpos($result['function'], 'fn4')!== false)  ? "1" : "0";
				$rows[]=$result;
			}

			$arr = array('data' => $rows);  
			echo json_encode($arr);

		}else if("save"==$_REQUEST['method']){

			$user_id=$_REQUEST['user_id'];
			$func = "";
			if(isset( $_REQUEST['fn1'])){
				$func .= "fn1,";
			}
			if(isset( $_REQUEST['fn2'])){
				$func .= "fn2,";
			 }
			 if(isset( $_REQUEST['fn3'])){
				$func .= "fn3,";
			 }
			 if(isset( $_REQUEST['fn4'])){
				$func .= "fn4,";
			 }
			
			$query_insert = "  insert into  tb_Employee ( employee_name , employee_surname ,role ,tel
			,user_ID,password ,register_date, `create_date`, `create_by` , function ) 
			values (  '".$_REQUEST['employee_name']."', '".$_REQUEST['employee_surname']."' , '".$_REQUEST['role']."' 
			,'".$_REQUEST['tel']."' , '".$_REQUEST['user_ID']."', '".$_REQUEST['password']."' , NOW(), NOW(), '".$user_id."'  , '".$func."'  ) ";
			
			$qcount = " SELECT count(1) as total  from tb_Employee  WHERE  user_ID = '".$_REQUEST['user_ID']."' "; 

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


		}else if("update"==$_REQUEST['method']){

			$user_id=$_REQUEST['user_id'];
			$func = "";
			if(isset( $_REQUEST['fn1'])){
			$func .= "fn1,";
			}
			if(isset( $_REQUEST['fn2'])){
			$func .= "fn2,";
			}
			if(isset( $_REQUEST['fn3'])){
			$func .= "fn3,";
			}
			if(isset( $_REQUEST['fn4'])){
			$func .= "fn4,";
			}


			$query = "  update  tb_Employee  set    
			employee_name = '".$_REQUEST['employee_name']."'
			,employee_surname = '".$_REQUEST['employee_surname']."'
			,role = '".$_REQUEST['role']."'
			,tel = '".$_REQUEST['tel']."'
			,user_ID = '".$_REQUEST['user_ID']."'
			,password = '".$_REQUEST['password']."'
			,function = '".$func."'
			, `update_date`= NOW() , `update_by`  =  '".$user_id."'  where employee_ID = '".$_REQUEST['employee_ID']."' ";
			
			
			
			$qcount = " SELECT count(1) as total  from tb_Employee  WHERE  user_ID = '".$_REQUEST['user_ID']."' 
			and employee_ID <> '".$_REQUEST['employee_ID']."' "; 

			$ocount = mysql_query($qcount);
			$data=mysql_fetch_assoc($ocount);
			if($data['total'] > 0 ){
				$arr = array('status' => 'duplicate'); 
				echo json_encode($arr);
			}else{		

				$objQuery = mysql_query($query) or die(mysql_error());
				if($objQuery){
					$arr = array('status' => 'success');  
					echo json_encode($arr);
				} else{			
					$arr = array('status' => 'error');  
					echo json_encode($arr);
				}
			}

		}else if("delete"==$_REQUEST['method']){

			$code=$_REQUEST['employee_ID'];

			$strSQL = "delete from  tb_Employee  WHERE employee_ID= '".$code."' " ;
		
			$strRs = mysql_query($strSQL);

			if($strRs){
				$arr = array('status' => 'success');  
				echo json_encode($arr);
			} else{			
				$arr = array('status' => 'error');  
				echo json_encode($arr);
			}

		}else if("login"==$_REQUEST['method']){

			$user_ID=$_REQUEST['user_ID'];
			$password=$_REQUEST['password'];

			$error="";
			$sql = "SELECT u.* FROM tb_Employee u WHERE u.user_ID = '".mysql_real_escape_string($user_ID)."'
				AND u.password = '".mysql_real_escape_string($password)."' ";

			$sql_result = mysql_query ($sql) or die ('request "Could not execute SQL query" '.$sql);
			$user = mysql_fetch_assoc($sql_result);
			if(!empty($user)){	


				$user['fn1']=  (strpos($user['function'], 'fn1')!== false) ? "1" : "0";
				$user['fn2']=  (strpos($user['function'], 'fn2')!== false)  ? "1" : "0";
				$user['fn3']=  (strpos($user['function'], 'fn3')!== false)  ? "1" : "0";
				$user['fn4']=  (strpos($user['function'], 'fn4')!== false)  ? "1" : "0";
				
				$_SESSION['user_info'] = $user;
				$_SESSION['user_ID'] = $user['user_ID'];
				$_SESSION['employee_ID'] = $user['employee_ID'];
				$_SESSION['name'] = $user['employee_name'];
				$_SESSION['full_name'] = $user['employee_name'] ." ". $user['employee_surname'];
				$_SESSION['role'] = $user['role'];

				$query = " UPDATE tb_Employee SET last_login = NOW() WHERE user_ID ='".mysql_real_escape_string($user_ID)."' ";
				mysql_query ($query, $connection ) or die ('request "Could not execute SQL query" '.$query);
			
			}else{
				$error = 'ชื่อผู้ใช้งานหรือรหัสผ่าน ไม่ถูกต้อง !';
			}
	
			if($error==""){
				$arr = array('status' => 'success');  
				echo json_encode($arr);
			} else{			
				$arr = array('status' => 'error', 'desc' => $error );  
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
  
   

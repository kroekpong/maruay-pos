<?php include 'constant.php' ;?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><? echo $pos_name; ?></title>

	<link href="<?php echo $uri ; ?>assets/img/pos/icon.png" rel="shortcut icon">
	
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="assets/css/AdminLTE.min.css"> 

	<!-- <link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Sarabun:400,500,700&display=swap" rel="stylesheet"> -->

	<link rel="stylesheet" href="assets/css/sweetalert.css"/>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->



<style>		

body , html, h2{
	/* font-family: 'Sarabun', sans-serif !important; */
	font-family: 'Chakra Petch', sans-serif !important;
}

	.login-page{ 
		background-color: #3b4b6b;
 		background-repeat: no-repeat;  
		background-attachment: fixed;  
		background-position-x: center; 
		background-position-y: bottom; 

	}
	
	.panel-default {
	    padding: 15px;
	}
		
		img.sign-img {
    width: 10em;
}
 </style>
	


</head>

<body class="hold-transition login-page">

<br>
<br>
<br>
<br>
<br>
<div class="row">
<!-- <div class="login-box-body"> -->

		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-body ">
					<div class="text-center sign-box">
						<img class="sign-img" alt="" src="assets/img/pos/pos.png">
					</div>
					<h2 class="text-center"> <? echo $pos_name; ?> </h2> 
<!-- 					<hr> -->

					<form class="sign-box" role="form" method="post" onsubmit="return dologin()">
						<fieldset>
							
							
							
<!-- 								<div class="alert alert-danger text-center" role="alert"> -->
<!-- 									Session Time Out ! -->
<!-- 								</div> -->
							
								
							<div class="form-group">
								<input id="username"  name="username"  class="form-control"  required type="text" maxlength="20" placeholder="ชื่อผู้ใช้" value="">
							</div>
							<div class="form-group">
								<input id="password" name="password" class="form-control" required type="password" placeholder="รหัสผ่าน" >
							</div>
<!-- 							<div class="checkbox"> -->
<!-- 								<label> -->
<!-- 									<input name="remember" type="checkbox" value="Remember Me">Remember Me -->
<!-- 								</label> -->
<!-- 							</div> -->
<!-- 							<a href="welcome.htm" class="btn btn-primary">Login</a> -->
							
							<div class="form-group text-center">
							<button class="btn btn-primary" type="button" onclick="dologin()"> &nbsp;&nbsp;เข้าสู่ระบบ <i class="fa fa-sign-in"></i>&nbsp;&nbsp; </button>
							</div>
<!-- 						   <hr> --> 


						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	
<!-- 	</div> -->
	</div>
	<!-- /.login-box -->
	
	
	
	
	
	<!-- jQuery 3 -->
	<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="assets/plugins/iCheck/icheck.min.js"></script>

	<script src="assets/js/sweetalert.min.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' /* optional */
			});
		});



		$(document).keydown(function(e) {
			console.log('keyCode: ', e.keyCode);
			if (e.keyCode === 13){
				// e.preventDefault();
				dologin();
			}
		});

		function dologin() {
			var username = $('#username').val();
			var password = $('#password').val();

			var data = {
				user_ID : username,
				password : password
			}


			if(username != '' && password != ''){

				$.ajax({
					data : data,
					type: "post",
					url: "service/user_service.php?method=login",
					success: function(rdata){
						// $("#return-count-txt").html(rs);
						if(rdata['status']=='success'){
							location = 'main.php';
						}else{
							alert('ชื่อผู้ใช้/รหัสผ่าน ไม่ถูกต้อง !','warning');
							$('#username,#password').val('');
						}

						
					}
				});
			}else{
				alert('โปรดระบุ ชื่อผู้ใช้/รหัสผ่าน ! ','warning');
				$('#username').focus();
			}

			// if(username == 'admin' && password == '123456'){
			// 	location = 'main.php';
			// }else if(username == 'user' && password == '123456'){
			// 	location = 'main.php';
			// }else{
				// swal('','ชื่อผู้ใช้/รหัสผ่าน  ');
			// }
		}
	</script>
</body>

</html>
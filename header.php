<?php include 'constant.php' ;?>


<?php
	if(!isset($_SESSION['user_info']))
	{		echo "<script>alert(' กรุณาล็อคอินเข้าสู่ระบบ !'); </script>";
			print "<meta http-equiv='refresh' content='0;URL=login.php'>";
			exit();
	}



?>

<?php include 'checkprint.php' ;?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title><? echo $pos_name; ?></title>

	<link href="<?php echo $uri ; ?>assets/img/pos/khotdee_circle.png" rel="shortcut icon">

	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo $uri ; ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo $uri ; ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<!-- <link rel="stylesheet" href="<?php echo $uri ; ?>assets/bower_components/Ionicons/css/ionicons.min.css"> -->
	
	<link rel="stylesheet" href="<?php echo $uri ; ?>assets/css/bootstrap-select.min.css">
	
	
	<link rel="stylesheet" href="<?php echo $uri ; ?>assets/css/AdminLTE.min.css">
	
	<link rel="stylesheet" href="<?php echo $uri ; ?>assets/css/skins/<?php echo $pos_skin; ?>.min.css">
	
	<link rel="stylesheet" href="<?php echo $uri ; ?>assets/css/daterangepicker.css">
	<link rel="stylesheet" href="<?php echo $uri ; ?>assets/css/dataTables.bootstrap.min.css">
	
	<link rel="stylesheet" href="assets/css/buttons.dataTables.min.css">

	<link rel="stylesheet" href="assets/css/sweetalert.css"/>


	<link rel="stylesheet" href="<?php echo $uri ; ?>assets/css/custom.css">
  

    <script src="<?php echo $uri; ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo $uri; ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo $uri; ?>assets/bower_components/fastclick/lib/fastclick.js"></script> -->
    <script src="<?php echo $uri; ?>assets/js/adminlte.min.js"></script>

	<!-- <script  src="<?php echo $uri; ?>assets/js/moment.min.js"></script> -->
	<script  src="<?php echo $uri; ?>assets/js/moment-with-locales.min.js"></script>

	<script  src="<?php echo $uri; ?>assets/js/bootstrap-datepicker.js"></script>

	<script  src="<?php echo $uri; ?>assets/js/jquery.dataTables.min.js"></script>

	<script  src="<?php echo $uri; ?>assets/js/dataTables.bootstrap.min.js"></script>

	<script  src="<?php echo $uri; ?>assets/js/daterangepicker.js"></script>

	<script src="assets/js/dataTables.buttons.min.js"></script>

	<!-- <script src="assets/js/jszip.min.js"></script>
	<script src="assets/js/pdfmake.min.js"></script>
	<script src="assets/js/vfs_fonts.js"></script>
	<script src="assets/js/buttons.print.min.js"></script> -->

	<script src="assets/js/sweetalert.min.js"></script>
	<script src="assets/js/notify.js"></script>
 
    

</head>

<body class="fixed   sidebar-collapse <?php echo $pos_skin; ?> "  > <!--  sidebar-collapse -->
	<!-- <div class="wrapper"> -->
		<header class="main-header">
			<!-- Logo -->
			<a href="#" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini">
					<b><? echo $pos_name; ?></b>
				</span>
					
			   <span class="logo-lg"> <b><? echo $pos_name; ?></b> 

			   </span>
				<!-- logo for regular state and mobile devices
<!-- 				<span class="logo-lg"> -->
<!-- 				</span> -->
			</a>
			
			
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a> -->

				<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
				<ul class="nav navbar-nav">

				<? if($_SESSION['user_info']['fn1']=="1") { ?>
					<li id="menu-main">
							<a href="<?php echo $uri; ?>main.php">
	 							<i class="fa  fa-barcode fa-lg"></i> 
								<span class="l-menu">ขายสินค้า</span>
							</a>
					</li>
				  
				<? } 
				
				if($_SESSION['user_info']['fn2']=="1") { ?>
					 <li id="menu-stock">
							<a href="<?php echo $uri; ?>stock.php">
	 							<i class="fa fa-shopping-cart fa-lg"></i> 
								<span class="l-menu" >คลังสินค้า</span>
							</a>
					</li>
				<? } 
				if($_SESSION['user_info']['fn3']=="1") { ?>
					 <li id="menu-summary" >
							<a href="<?php echo $uri; ?>summary.php">
	 							<i class="fa fa-bar-chart fa-lg"></i> 
								<span class="l-menu" >สรุปยอดการขาย</span>
							</a>
					</li>
				<? } 
				if($_SESSION['user_info']['fn4']=="1") { ?>	 

					<li class="dropdown" id="menu-setting">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-gears fa-lg"></i> <span class="l-menu" >ตั้งค่าระบบ </span> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?php echo $uri; ?>setting_user.php"><i class="fa fa-users"></i> ผู้ใช้งานระบบ</a></li>
						<li class="divider"></li>
						<!-- <li><a href="<?php echo $uri; ?>setting_barcode.php"><i class="fa fa-barcode "></i> สร้างบาร์โค้ด</a></li>
						<li class="divider"></li> -->
						<li><a href="<?php echo $uri; ?>setting_param.php"><i class="fa  fa-list-ul "></i> ตั้งค่าพารามิเตอร์พื้นฐาน</a></li>
					</ul>
					</li>
				<? }   ?>		 


					 
			 
				</ul>
			
			</div>

				<div class="navbar-custom-menu">
				
					<ul class="nav navbar-nav">

						<li class="dropdown notifications-menu">
							<a href="#" >
							<i class="fa fa-print"> </i> 
							<? if($printer_status=="1") {?>
							<span class="label label-success"  id="printok" title="<?echo $printer;?>" >
								<i class="fa fa-check "></i>
							</span>
							<? } else {?>
							<span class="label label-danger"  id="printnok">
								<i class="fa fa-exclamation"></i>
							</span>
							<?  } ?>
							</a> 
						</li>

						<li class="dropdown messages-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-exclamation-circle"></i>
							<!-- <span class="label label-success">4</span> -->
							</a>
							<ul class="dropdown-menu">
								<li class="header">รหัสบาร์โค้ด [ ลูกศรขึ้น <i class="fa fa-arrow-up"></i> ] </li>
								<li class="header">ส่วนลดพิเศษ [ ลูกศรซ้าย <i class="fa fa-arrow-left"></i> ] </li>
								<li class="header">ช่องจ่ายเงิน [ ลูกศรขวา <i class="fa fa-arrow-right"></i> ] </li>
								<li class="header">บันทึกและพิมพ์บิล [ Enter <i class="fa fa-check-square"></i> ] </li>
							</ul>
						</li>
						<!-- ********** -->

						<li class="dropdown notifications-menu hidden">
							<a href="#" >
							<i class="fa fa-bell-o"></i>
							<span class="label label-warning">10</span>
							</a> 
						</li>
					

						<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo $pos_logo ; ?>" class="user-image"  >
								<span class="hidden-xs"><?php echo $pos_user ; ?> (<?php echo $pos_role ; ?>)</span>
								</a>
								<ul class="dropdown-menu">
								 
								<!-- Menu Footer-->
								<li class="user-footer">
									<a href="<?php echo $uri ; ?>logout.php">
										ออกจากระบบ <i class="fa fa-sign-out"></i>
									</a>
								</li>
								</ul>
							</li>

					 
					</ul>
				</div>
			</nav>


		</header>
		
		 
	
		
	<script type="text/javascript">

	var cPath = '<? echo $uri; ?>';

	var url = window.location;
	
	// $('.sidebar-menu ul li').find('a').each(function () {
    //     var link = new RegExp($(this).attr('href')); 
    //     if (link.test(document.location.href)) {
    //         if(!$(this).parents().hasClass('active')){
    //             $(this).parents('li').addClass('menu-open');
    //             $(this).parents().addClass("active");
    //             $(this).addClass("active"); 
    //         }
    //     }
    // });


	  // for sidebar menu entirely but not cover treeview
	//   $('ul.sidebar-menu a').filter(function() {
	//      return this.href == url;
	//   }).parent().addClass('active');
	//   //Top bar
	//   $('ul.navbar-nav a').filter(function() {
	//      return this.href == url;
	//   }).parent().addClass('active');

	//   // for treeview
	//   $('ul.treeview-menu a').filter(function() {
	//      return this.href == url;
	//   }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
		  
	  

	  _showLoading = function(v){
    	if(v){
    		swal({
    			title: '<div class="loading">กำลังดำเนินการ... <i class="fa fa-refresh fa-spin"></i></div>',
    			html: true,
    			showConfirmButton: false
    		});
    	}else{
    		swal.close();
    	}
	}

	var DT_TH = {	"language": {
				"sProcessing": "กำลังดำเนินการ...",
				"sLengthMenu": "แสดง_MENU_ รายการ",
				"sZeroRecords": "ไม่พบรายการสินค้า",
				"sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
				"sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
				"sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกรายการ)",
				"sInfoPostFix": "",
				"sSearch": "ค้นหาจากรายการ:",
				"sUrl": "",
				"oPaginate": {
								"sFirst": "เิริ่มต้น",
								"sPrevious": "ก่อนหน้า",
								"sNext": "ถัดไป",
								"sLast": "สุดท้าย"
				}
		} };
	
		moment.locale('th') 

	</script>

	
<script>

var _PRINT_CONFIRM = <? echo $pos_print_cf;?> ;
var _REST_CONFIRM = <? echo $pos_rest_cf;?> ;

function getInteger(str){
	return /^\d+$/.test(str);
}

function getPriceTxt(text){
// console.log("getPriceTxt : "+text);

	if(isNaN(parseFloat(text))){
		return 0;
	}else{
		return parseFloat(text);
	}
}

function getPriceFormat(text){
	// console.log("getPriceFormat : "+text);
	if(isNaN(parseFloat(text))){
		return 0.00;
	}else{
		return parseFloat(text).toFixed(2);
	}
}

	function priceFormat(num) {
		num = getPriceFormat(num);
		var num_parts = num.toString().split(".");
		num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		return num_parts.join(".");
	}

</script>
		
		
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149131945-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-149131945-2');
</script>
		
		
		
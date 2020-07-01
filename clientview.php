<?php include 'constant.php' ;?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><? echo $pos_name; ?></title>

	<link href="<?php echo $uri ; ?>assets/img/pos/icon.png" rel="shortcut icon">
	
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="assets/css/AdminLTE.min.css"> 

	<!-- <link href="https://fonts.googleapis.com/css?family=Chakra+Petch|Sarabun:400,500,700&display=swap" rel="stylesheet"> -->

 
 <!-- <link rel="stylesheet" href="<?php echo $uri ; ?>assets/css/custom.css"> -->

    <script src="<?php echo $uri; ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

	<script  src="<?php echo $uri; ?>assets/js/jquery.dataTables.min.js"></script>

  <script  src="<?php echo $uri; ?>assets/js/dataTables.bootstrap.min.js"></script>


	<!-- <script  src="<?php echo $uri; ?>assets/js/moment.min.js"></script> -->
	<script  src="<?php echo $uri; ?>assets/js/moment-with-locales.min.js"></script>

<style>

@font-face {
	font-family: "Chakra Petch";
	src: url("assets/fonts/Chakra_Petch/ChakraPetch-Regular.ttf");
}


body , html, h4{
	/* font-family: 'Sarabun', sans-serif !important; */
	font-family: 'Chakra Petch', sans-serif !important;
}

.masthead {
    /* position: relative; */
    width: 100%;
    height: 100%;
    min-height: 35rem;
    /* padding: 15rem 0; */
    background:
	 /* linear-gradient(to bottom,rgba(22,22,22,.3) 0,rgba(22,22,22,.7) 90%,#161616 100%),  */
	/* url(http://localhost/template/startbootstrap-grayscale-gh-pages/img/bg-masthead.jpg); */
	/* url(https://img.freepik.com/free-photo/abstract-blurred-photo-supermarket-with-empty-shopping-cart-shopping-concept_43379-1122.jpg?size=626&ext=jpg); */
	url(https://img.freepik.com/free-photo/shopping-trolley-supermarket-aisle_102375-203.jpg?size=626&ext=jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;

}

.content{
  padding: 25x 10px;
}

.row {
    height: 100%;
    /* display: table-row; */
}

.full-height {
  height: 100%;
}
.h40 {
  height: 20%;
margin-bottom: 25px;
}
.h60  {
  height: 75%;
}
.m10  {
  margin-top: 10px;
}

.dataTable thead {
    color: rgb(255, 255, 255);
    background-color: rgb(58, 128, 198) !important;
    
}
 
/* .row .no-float {
  display: table-cell;
  float: none;
} */

.bg-bw {
    background:  rgba(0, 0, 0, 0.88);
    /* border-radius: 0px; */
}

.bg-c-blue {
    background: linear-gradient(45deg, #4099ff, #73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg, #2ed8b6, #59e0c5);
}

.bg-c-pink {
    background: linear-gradient(45deg, #FF5370, #ff869a);
}
 

td.dataTables_empty {
    text-align: center;
}

.alert {
}

.box-summary  {
  padding : 5px;
  font-size: 1.2em;
}
.box-price  {
  background:  linear-gradient(45deg, #3c59bc, #9e2121);
  color: rgb(255, 255, 255);
}

.box-title{
  font-size: 32px !important;
    width: 100%;
    /* animation: myfirst 2s 1; */
}

marquee {
  height: 35px;
}

@keyframes myfirst
{
  0%      {color:yellow;}
  99.999% {color:yellow;}
  100%    {color:red;}
}

.table {
    background-color: #dbe5ff;
    margin-bottom: 0px;  
   
}

td{
  border-right: 1px solid #ddd;
}

 
.row {
    margin-right: 0;
    margin-left: 0;
}

.description-header {
    margin-bottom: 10px !important;
}


.input-price{
	text-align: right;
	border: none !important;   
	font-size: 24px;
	color: #333;
	 font-weight: 600;
    height: 40px;
    padding: 5px 5px;
}
 
/* #view-table{overflow:hidden; word-wrap:normal | break-word; } */

</style>
 </head>
</html>
 

<div class="masthead " >
     

    <!-- Main content -->
    <section class="content full-height">


      <div class="row full-height">

          <div class="col-md-7 col-xs-7  ">


            <div class="box box-solid  bg-bw "  >

                <div class="box-header with-border">
                  <h3 class="box-title "><marquee behavior="SCROLL">ยินดีต้อนรับสู่  <?echo $pos_name ;?> </marquee></h3>
                </div>

                <div class="box-body ">
                  <!-- <img class="img-responsive pad" src="https://img.freepik.com/free-photo/abstract-blurred-photo-supermarket-with-empty-shopping-cart-shopping-concept_43379-1122.jpg?size=626&ext=jpg" alt="Photo"> -->
                  <!-- <div class="table-wrapper" id="box-left"> -->
                      <table  id="view-table"  class="table table-striped dataTable" style="width:100%">
                              <thead>
                                  <tr>
                                      <th class="text-center">#</th>
                                      <th class="text-center">ชื่อสินค้า</th>
                                      <th class="text-center">จำนวน</th>
                                      <th class="text-center">ราคา</th>
                                  </tr>
                              </thead>
                            
                          </table>
                  
                    <!-- </div> -->
                </div>
    
            </div>
            <!-- /.box -->
          </div>
        


          <div class="col-md-5 col-xs-5 ">
 

 
       

          <div class="box  no-border">

          <script  src="https://weatherwidget.io/js/widget.min.js"></script>

<a class="weatherwidget-io" href="https://forecast7.com/en/13d36100d98/chon-buri/" 
data-label_1="CHONBURI" data-label_2="WEATHER"
 data-font="Roboto"    data-theme="original" >CHONBURI WEATHER</a>
 
          </div>


          <div class="box box-price box-widget">
            <!-- <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span> -->
            <div class="box-body  full-height">
                <div class="col-md-6 box-summary ">
								 
                 <label>ส่วนลด (บาท)</label>
                 <input class="form-control input-price " id="h-t1" readonly="" value="0.00" >
   
               </div>
                <div class="col-md-6 box-summary">
								 
                 <label  class="pull-right">รวมเป็นเงิน (บาท)</label>
                 <input class="form-control input-price " id="h-t2" readonly="" style=" color: #00a65a; " value="0.00" >
   
               </div>
                <div class="col-md-6 box-summary m10">
                 <label >รับเงินมา (บาท)</label>
                 <input class="form-control input-price " id="h-t3" readonly="" style=" color: blue; " value="0.00" >
               </div>
                <div class="col-md-6 box-summary m10">
                 <label class="pull-right">เงินทอน (บาท)</label>
                 <input class="form-control input-price " id="h-t4" readonly="" style=" color: red; "  value="0.00" >
               </div>

            </div>
            <!-- /.info-box-content -->
          </div>

   <!-- <div class="box  no-border">
             <div style="text-align:center;padding: 0;"> <h3><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/city/1611110"><span style="color:gray;">Current local time in</span><br />Chon Buri, Thailand</a></h3> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FBangkok" width="100%" height="115" frameborder="0" seamless></iframe> </div>

          </div> -->
 

<div class="box box-success">
							<div class="row">

								<div class="col-sm-6 border-right ">
									<div class="description-block">
										<h5 class="description-header"><i class="fa fa-user"></i> แคชเชียร์ </h5>
										<span class="description-text" id="m-role"><? echo $pos_id?></span>
									</div>
								</div>

								<!-- <div class="col-sm-4 border-right pad-5">
									<div class="description-block">
										<h5 class="description-header"><i class="fa fa-calendar-o"></i> วันที่</h5>
										<span class="description-text" id="m-date"></span>
									</div>
								</div> -->
								<!-- /.col -->
								<div class="col-sm-6 border-right pad-5">
									<div class="description-block">
										<h5 class="description-header"><i class="fa fa-calendar-o"></i> วันที่เวลา</h5>
										<span class="description-text" id="m-time"> </span>
									</div>
								</div>
								<!-- /.col -->
								 
								<!-- /.col -->
							</div>
							<!-- /.row -->
							</div>

<!-- *************** -->

					</div>
 
          </div>
        

        </div>


      </div>

      

 


    </section>
    <!-- /.content -->
  </div>










 

<script>

moment.locale('th');

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
    
    var viewTable;
    
	function buildTableView(vheight) {    

         viewTable = $('#view-table').DataTable({

          scrollY:     vheight,
      //  scrollCollapse: true,
          lengthChange:false,
          searching:false,
          info:   false,
          paging:   false,
          data:[],
          columns: [
              { 
                "data": "sorder", "width": "10%",
                "fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
                  $(nTd).html(++iRow);
                }
	            },
              { 
                "data": "product_Name" 
                  },
              // { 
              //  "data": "old_qty", "width": "10%"
              //     },
              { 
              "data": "qty", "width": "12%"
                  },
            { 
              "data": "total_price", "width": "12%"
              , render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
                }
              
            ], 
            "aoColumnDefs": [
            { "sClass": "text-center", "aTargets": [0,2] },
            { "sClass": "text-right", "aTargets": [3] }
            // { "visible": false, "targets": groupColumn }
            ],
          // ordering: false,
          destroy: true,
          rowCallback: function (row, data) {},
          language : DT_TH['language'] ,
          "order": [[ 0, "desc" ]]
      });

}



function populateStorage() {
  var retrievedObject = localStorage.getItem('SELL_ITEM');
  var calPrice = localStorage.getItem('CAL_PRICE');

  var datalist =  JSON.parse(retrievedObject) ;
	viewTable.clear().draw();
  viewTable.rows.add(datalist).draw();

  calPrice =  JSON.parse(calPrice) ;
	$('#h-t1').val(calPrice['total_dis']);
	$('#h-t2').val(calPrice['total_sum']);
	$('#h-t3').val(calPrice['total_pay']);
	$('#h-t4').val(calPrice['total_change']);

}

// var i = setInterval(function(){
// 	// populateStorage();
//     localStorage.setItem('CLIENT_ACTIVE', 0);
// }, 500);

window.onstorage = () => {
  // When local storage changes, dump the list to
  // console.log("****** CHANGE ******* ");
  populateStorage();
};

	var updateTime = function () {
		var date = moment(new Date());
		// $('#m-date').html(date.format('LL'));
		$('#m-time').html(date.format('LL HH:mm:ss'));
    // datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
    
    localStorage.setItem('CLIENT_ACTIVE', 1);
    // console.log(" SET CLIENT_ACTIVE "+localStorage['CLIENT_ACTIVE']);
	};

// var elem = document.documentElement;
// /* View in fullscreen */
// function openFullscreen() {
//    if (elem.mozRequestFullScreen) { /* Firefox */
//     elem.mozRequestFullScreen();
//   } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
//     elem.webkitRequestFullscreen();
//   } else if (elem.msRequestFullscreen) { /* IE/Edge */
//     elem.msRequestFullscreen();
//   }
// }


 function viewer() {
		var b= $(window).height();  
		// GoInFullscreen($("html").get(0));
		setTimeout(function(){
			  buildTableView(b-160); 
        populateStorage();

        //  openFullscreen() ;
		},2000);
		
    setInterval(updateTime, 1000);

  }

  viewer();
  

</script>

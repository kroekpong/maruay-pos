<?php include 'header.php' ;?>

<? 

if($_SESSION['user_info']['fn2']!="1")
{
		echo "<script>alert(' คุณไม่มีสิทธ์เข้าใช้งาน !'); </script>";
		print "<meta http-equiv='refresh' content='0;URL=main.php'>";
		exit();
}

?>

<?php 


$sql_warn = " SELECT  1  from tb_ProductMaster  where   qty < min_qty " ;
$q_list_warn = mysql_query($sql_warn) or die("Could not query");
$pos_warn_no = mysql_num_rows($q_list_warn);

    

$pos_category =array();
$pos_unit =array();
$pos_location =array();

// **** POS_CATEGORY
$sql_category = " SELECT  category_ID as cat_id , category_name as cat_name from tb_Category   ORDER by category_ID " ;
$q_list = mysql_query($sql_category) or die("Could not query");
while($result=mysql_fetch_array($q_list)) {
	$pos_category[]=$result;
}

$sql_loc = " SELECT  location_ID as loc_id , location_name as loc_name from tb_Location   ORDER by location_ID " ;
$q_list = mysql_query($sql_loc) or die("Could not query");
while($result=mysql_fetch_array($q_list)) {
	$pos_location[]=$result;
}

$sql_unit = " SELECT  unitType_ID as unit_id , unitType_name as unit_name from tb_UnitType   ORDER by unitType_ID " ;
$q_list = mysql_query($sql_unit) or die("Could not query");
while($result=mysql_fetch_array($q_list)) {
	$pos_unit[]=$result;
}



?>


<div class="content-wrapper">
	
	<!-- <section class="content"> -->

	<div class="row">

		<div class="col-md-12">
				<!-- Application buttons -->
				<div class="box box-widget">

					<div class="box-body bg-bw">

							<a class="btn btn-app bg-blue" id="b-add" >
								<i class="fa fa-cart-plus"></i> เพิ่มข้อมูลสินค้า [F1]
							</a>
							
							<a class="btn btn-app bg-red"  id="b-del" >
								<i class="fa fa-remove"></i> ลบสินค้า [Del]
							</a>
							
							<a class="btn btn-app bg-olive" id="b-update" >
								<i class="fa fa-cart-plus"></i> อัพเดทสต๊อก [F9]
							</a>
							
							<a class="btn btn-app bg-navy" id="b-history">
								<i class="fa fa-history"></i> ข้อมูลย้อนหลัง [F10]
							</a>
							
 
							<a class="btn btn-app bg-maroon pull-right" onclick="doSearch('Y')">
								<span class="badge bg-red"><? echo $pos_warn_no?></span>
								<i class="fa  fa-support"></i> แจ้งเตือนสินค้า
							</a>
	
					</div>
					<!-- /.box -->
					
				</div>

		</div>


	</div>


	
	<div class="row " >

		<div class="col-md-12 "  >

				<div class="box box-widget">
					<!-- <div class="box-header with-border">
					<h3 class="box-title">Different Width</h3>
					</div> -->
					<div class="box-body  bg-bw">

					 <form class="form-horizontal search-form" method="post" onsubmit="doSearch(); return false;"  id="searchform">

					<div class="row">
						
						<div class="col-xs-5">
							<div class="input-group">
								<input type="text" class="form-control "
								id="s-search" name="name" placeholder="รหัสสินค้า(บาร์โค้ด) / ชื่อสินค้า " >
								<span class="input-group-btn">
									<button type="button" class="btn btn-info btn-flat " onclick="doSearch()"><b><i class="fa fa-search"></i> ค้นหาข้อมูล</b></button>
								</span>
							</div>
						</div>


						<div class="col-xs-3">
							<div class="input-group">
							<span class="input-group-addon bg-gray"><b>หมวดหมู่</b></span>
							<!-- <label>Select</label> -->
							<select class="form-control " name="group" onchange="doSearch()">
								<option value=""><? echo $sel_all;?></option>
								<?   
									for ($i = 0; $i < count($pos_category); $i++)  {  
								?>
										<option value="<? echo $pos_category[$i]['cat_id']?>"><? echo $pos_category[$i]['cat_name']?></option>
								<?
									} 
								?>
							</select>
							</div>
						</div>
						
						<div class="col-xs-3">
							<div class="input-group">
							<span class="input-group-addon bg-gray"><b>สถานที่จัดเก็บ</b></span>
							<!-- <label>Select</label> -->
							<select class="form-control  "  name="location"  onchange="doSearch()">
								<option value=""><? echo $sel_all;?></option>
								<?   
									for ($i = 0; $i < count($pos_location); $i++)  {  
								?>
										<option value="<? echo $pos_location[$i]['loc_id']?>"><? echo $pos_location[$i]['loc_name']?></option>
								<?
									} 
								?>
							</select>
							</div>
						</div>
						

					</div>

					</form>
					
					</div>
					<!-- /.box-body -->
				</div>




<!-- -------------------------------------- -->

		  <div class="box box-widget "  > 
			 <!-- <div class="box-header with-border text-right">
	              <h3 class="box-title ">สินค้าทั้งหมด ( <label id="total-txt">0</label> ) รายการ</h3> -->
	              <!-- <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool btn-success btn-table"   data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> เพิ่ม
	                </button>
	              </div> -->
	            <!-- </div> -->
		 
		 	<div class="box-body  "  > 

	  		<table  id="result-table" class="table table-striped table-bordered table-hover dataTable nowrap" style="width:100%" >
				<thead  >
					<tr>
						<th>#</th>
						<th>รหัสสินค้า</th>
						<th>ชื่อสินค้า</th>
						<th>คงเหลือ</th>
						<th>หน่วยนับ</th>
						<th>หมวดหมู่</th>
						<!-- <th>ราคาต้นทุน</th> -->
						<th>ราคาขาย (บาท)</th>
						<th>สถานที่จัดเก็บ</th>
					</tr> 
					</thead>
 

				</table>

              </div>


            </div>




<!-- ------------------- TOP ------------------- -->


		</div>


<!-- -------------------------------------- -->
 
			
	</div>

 
<!-- -------------------------------------- -->

    <!-- </section> -->
            
</div> 


<?php include 'footer.php' ;?>

<script>

							
	var updateTime = function () {
		// var date = moment(new Date());
		// $('#m-date').html(date.format('LL'));
		// $('#m-time').html(date.format('hh:mm:ss a'));
		// datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
	};

	$(document).keydown(function(e) {

			// console.log('keyCode: ', e.keyCode);
			var is_modal = $('#stockProductModal,#packageProductModal,#editProductModal,#stockHistoryModal').is(':visible');

			if(!is_modal){
				
				// e.preventDefault();
				// return false;
			

				if (e.keyCode === 38 ){
					e.preventDefault();
					$("#s-search").focus();
				}
				if (e.keyCode === 46){
					e.preventDefault();
					delItem();
				}
				// if (e.keyCode === 123){
				// 	e.preventDefault();
				// 	openModalProduct();
				// }
				if (e.keyCode === 120){ // Update stock
					e.preventDefault();
					openModalStock();
				}
				if (e.keyCode === 121){ // openModalHistory
					e.preventDefault();
					openModalHistory();
				}
				if (e.keyCode === 112){
					e.preventDefault();
					openModalProduct();
				}

			}else{
				if (e.keyCode === 27 ){
					// $('#stockProductModal,#packageProductModal,#editProductModal,#stockHistoryModal').modal('hide');
				}

			}
			// if (e.keyCode === 37){
			// 	$("#p-disc").focus();
			// }
			// if (e.keyCode === 39){
			// 	$("#p-pay").focus();
			// }

			// check();
	});

	function check() {
		var b= $(window).height();  
		// $("#box-1").css("height",b-349);
		// $("#box-2").css("height",b-225);
		// $("#result-table").css("height",b-224);

		setTimeout(function(){

			buildTable(b-430); 

			// doSearch();

			// openModalProduct();

			},200);

	}

	 function delItem(){
		if(rsTable.data().length > 0 &&  rsTable.$('tr.selected').hasClass('selected')){
			var data = rsTable.row('.selected').data();

			// console.log(data['product_ID']);

			swal({
				title: "ต้องการลบสินค้า ["+data['product_ID']+"] ใช่หรือไม่ ?",
				type: "warning",
				showCancelButton: true,
				focusConfirm: true,
				showLoaderOnConfirm: true
			}, function () {

						
				$.ajax({
					type: 'POST',
					data: $('#product-form').serialize(),
					url: 'service/product_service.php?method=del_product',
					success: function(data) {

						swal({

							title: 'บันทึกรายการสินค้าสำเร็จ !',
							type: 'success',
							closeOnConfirm: false 
						}, function () {
							// $('#editProductModal').modal('hide')
							doSearch();
						}); 
					}

				});	


			});		
			// dataList.splice(rowi, 1); 
			//  doSearch();
		}else{
			swal("","กรุณาเลือกรายการสินค้า !", "warning");
		}
	 }


	$('#result-table').on( 'click', 'tr', function () {
		rsTable.$('tr.selected').removeClass('selected');
		$(this).addClass('selected');
	} );


	$('#b-del').click( function () {
		delItem();
	} );

	// window.onresize = function(event) {
	// 	check();
	// };
	function getNum(text){
		if(isNaN(parseFloat(text))){
			return 0;
		}else{
			return parseFloat(text);
		}
	}


	var rsTable ;	
	function buildTable(vheight) {
	 	rsTable = $('#result-table').DataTable({
			scrollY:     vheight,
			// "sScrollX": "100%",
			// "bScrollCollapse": true,
			// "sScrollXInner": "100%",
			language : DT_TH['language'],
			// searching:false,
			pageLength:   50,
			processing: true,
        	// serverSide: true,
			data:[],
		    columns: [
		     	{ 
					 "data": "product_ID",
					 "fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
						$(nTd).html(++iRow);
					}
	            },
		     	{ 
		     		"data": "serial_no"
					 , "className": "col-id" 
	            },
		     	{ 
		     		"data": "product_Name"
	            },
		     	{ 
					 "data": "qty"
					 , "className": "col-qty" 
					 , "fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
						$(nTd).html(oData['qty']);
						if(getNum(oData['qty']) < getNum(oData['min_qty'])){
							$(nTd).css('background-color', 'rgb(255, 135, 135)' );
						}
					}
	            },
				{ 
					"data": "unit_name"
					// , "className": "col-cat" 
			   },
				{ 
					"data": "cat_name"
			   },
		     	// { 
		     	// 	"data": "cost"
	            // },
		     	{ 
					 "data": "n_price"
					 , "className": "col-price" 
	            },
		     	{ 
		     		"data": "loc_name"
	            } 
		    ],
		    "aoColumnDefs": [
		      { "sClass": "text-center", "aTargets": [0,1,3,4,5,6,7] }
		    ],
		    ordering: false,
			destroy: true,
			rowCallback: function (row, data) {}
			// select: true
			// responsive: true,
			// "info":     false
		 });  

	}


	function doSearch(iswarn){
		
		_showLoading(true);

		iswarn = iswarn? iswarn : "";
		
		$.ajax({
			url: "service/product_service.php?method=search&warn="+iswarn,
			data: $('#searchform').serialize()
		}).done(function (result) {
			rsTable.clear().draw();
			_data = result;
			    rsTable.rows.add(result).draw();
			    _showLoading();
			}).fail(function (jqXHR, textStatus, errorThrown) { 
				_showLoading();
			});
		
		// $("#rs_table").show();
		
	};



	$('#result-table').on('dblclick','tr',function(e){

		var data = rsTable.row( this ).data();
		if(data) openModalProduct(data);

	})

	$('#b-add').click( function () {
		openModalProduct();
	});

	$('#b-update').click( function () {
		openModalStock();
	});

	$('#b-update').click( function () {
		openModalStock();
	});

	$('#b-history').click( function () {
		openModalHistory();
	});



	$(document).ready(function(){

		$("#menu-stock").addClass("active"); 

		check();

	//  updateTime();
	//  setInterval(updateTime, 1000);
	});


</script>



<?php include 'edit_product_modal.php' ;?>

<?php include 'stock_history_modal.php' ;?>

<?php include 'package_product_modal.php' ;?>

<?php include 'stock_product_modal.php' ;?>

<?php include 'stock_search_modal.php' ;?>

 


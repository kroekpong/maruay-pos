<?php include 'header.php' ;?>


<? 

if($_SESSION['user_info']['fn4']!="1")
{
		echo "<script>alert(' คุณไม่มีสิทธ์เข้าใช้งาน !'); </script>";
		print "<meta http-equiv='refresh' content='0;URL=main.php'>";
		exit();
}

?>

<div class="content-wrapper">
	
<section class="content-header">
      <h1>
	  <i class="fa fa-gears fa-lg"></i> ตั้งค่าระบบ 
        <small>> พารามิเตอร์พื้นฐาน</small>
      </h1>
    </section>
 

 <section class="content">


      <div class="row">

		<!-- left column -->
			<div class="col-md-4">
					<div class="box ">

						<div class="box-header with-border">
						<h3 class="box-title">หน่วยนับ</h3>
						</div>

						<div class="box-body">

						<table  id="h1-table" class="table table-striped table-bordered dataTable " style="width:100%;" >
						<thead  style="display:none;">
							<tr>
								<th >#</th>
								<th>ชื่อ</th>
							</tr> 
							</thead>
						</table>


						</div>

						<div class="box-footer">
						<button type="button" class="btn btn-primary" onclick="addParam('1')"><i class="fa fa-plus"></i> เพิ่มข้อมูล</button>
						</div>

					</div>

				</div>
	<!-- ---------------------------- -->
			<div class="col-md-4">
					<div class="box ">

						<div class="box-header with-border">
						<h3 class="box-title">หมวดหมู่</h3>
						</div>

						<div class="box-body">

						<table  id="h2-table" class="table table-striped table-bordered dataTable " style="width:100%;" >
						<thead style="display:none;">
							<tr>
								<th>#</th>
								<th>ชื่อ</th>
							</tr> 
							</thead>
						</table>

						</div>

						<div class="box-footer">
						<button type="button" class="btn btn-primary" onclick="addParam('2')"><i class="fa fa-plus"></i> เพิ่มข้อมูล</button>
						</div>

					</div>

				</div>

				<!-- ---------------------------- -->

			<div class="col-md-4">
					<div class="box ">

						<div class="box-header with-border">
						<h3 class="box-title">สถานที่จัดเก็บ</h3>
						</div>

						<div class="box-body">

							<table  id="h3-table" class="table table-striped table-bordered dataTable " style="width:100%;" >
							<thead style="display:none;">
								<tr>
									<th>#</th>
									<th>ชื่อ</th>
								</tr> 
								</thead>
							</table>
						</div>

						<div class="box-footer">
								<button type="button" class="btn btn-primary" onclick="addParam('3')"><i class="fa fa-plus"></i> เพิ่มข้อมูล</button>
						</div>

					</div>

				</div>


	<!-- ---------------------------- -->



		</div>

           



	</section>
	


</div>


<?php include 'footer.php' ;?>

<script>
 

	$(document).ready(function(){

		$("#menu-setting").addClass("active"); 

		var b= $(window).height();  
		var scrollY = b-320 ;

		buildTableUnit(scrollY);
		buildTableCategory(scrollY);
		buildTableLocation(scrollY);

	});

	function addParam(type){
		openModalParam(type);
	 }


	$('#h1-table').on('dblclick','tr',function(e){
		var data = tableUnit.row( this ).data();
		if(data) openModalParam('1' , data['unitType_ID'] , data['unitType_name'] );
	})
	$('#h2-table').on('dblclick','tr',function(e){
		var data = tableeCategory.row( this ).data();
		if(data) openModalParam('2',  data['category_ID'] , data['category_name'] );
	})
	$('#h3-table').on('dblclick','tr',function(e){
		var data = tableLocation.row( this ).data();
		if(data) openModalParam('3', data['location_ID'] , data['location_name'] );
	})


	function reloadTable(type){
		if(type == '1'){
			tableUnit.ajax.reload();
		}else if(type == '2'){
			tableeCategory.ajax.reload();
		}else if(type == '3'){
			tableLocation.ajax.reload();
		}

	}

	function doDelItm(type, code , product_Name){

	// if(_REST_CONFIRM>0){
		swal({
					title: "คุณต้องการลบ  [ "+product_Name+" ] ใช่หรือไม่ ?",
					type: "warning",
					showCancelButton: true,
					// focusConfirm: true,
					closeOnConfirm: false  ,
					animation: false
				}, function () {

					// saveUpdateStock('U','SA');
					var title ="";
					if(type == '1'){
						title = "หน่วยนับ" ;
					}else if(type == '2'){
						title = "หมวดหมู่" ;
					}else if(type == '3'){
						title = "สถานที่จัดเก็บ" ;
					}

								
					$.ajax({
						type: 'POST',
						data: { code : code },
						url: 'service/param_service.php?method=delete&type='+type+'&user_id='+'<? echo $pos_user_id?>',
						success: function(data) {
							swal.close();
							$.notify(" ลบรายการ "+title+" [ "+product_Name+" ] สำเร็จ !", "success");
							reloadTable(type);
						}
					});
		

				});	

		// }else{
		// 	swal("","กรุณาเลือกรายการสินค้า !", "warning");
		// }
	 }


 function buildTableUnit(scrollY) {

	tableUnit = $('#h1-table').DataTable({
		scrollY:   scrollY,
		lengthChange:false,
		searching:false,
		paging:   false,
		ajax:  "service/param_service.php?method=SEARCH_UNIT",
		columns:  	[ 
			{ 
					 "data": "unitType_ID",   
					 "fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
						var txt = '<button type="button" class="btn btn-danger btn-table" '+
						' onclick="doDelItm(1 , \''+sData+'\', \''+oData['unitType_name']+'\')" ><i class="fa fa-remove"></i> ลบ</button>' ;
						$(nTd).html(txt);
					}
	        },
			{ 
				"data": "unitType_name"  
			}
		], 
		aoColumnDefs: [
		  { "sClass": "text-center", "aTargets": [0] },
		  { "width": "10px", "targets": 0 },
		],
		language : DT_TH['language'] ,
		info: false,
		ordering: false,
		destroy: true 

	});  

}




 function buildTableCategory(scrollY) {

	tableeCategory = $('#h2-table').DataTable({
		scrollY:   scrollY,
		lengthChange:false,
		searching:false,
		paging:   false,
		ajax:  "service/param_service.php?method=SEARCH_CATEGORY",
		columns:  	[ 
			{ 
				"data": "category_ID", "width": "10%",
				"fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
						var txt = '<button type="button" class="btn btn-danger btn-table" '+
						' onclick="doDelItm( 2 , \''+sData+'\', \''+oData['category_name']+'\')" ><i class="fa fa-remove"></i> ลบ</button>' ;
						$(nTd).html(txt);
					}
			},
			{ 
				"data": "category_name"
			}
		], 
		aoColumnDefs: [
		  { "sClass": "text-center", "aTargets": [0] }
		],
		language : DT_TH['language'] ,
		info: false,
		ordering: false,
		destroy: true 

	});  

}


 function buildTableLocation(scrollY) {

	tableLocation = $('#h3-table').DataTable({
		scrollY:   scrollY,
		lengthChange:false,
		searching:false,
		paging:   false,
		ajax:  "service/param_service.php?method=SEARCH_LOCATION",
		columns:  	[ 
			{ 
				"data": "location_ID", "width": "10%",
				"fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
						var txt = '<button type="button" class="btn btn-danger btn-table" '+
						' onclick="doDelItm(3,  \''+sData+'\', \''+oData['location_name']+'\')" ><i class="fa fa-remove"></i> ลบ</button>' ;
						$(nTd).html(txt);
					}
			},
			{ 
				"data": "location_name"
			}
		], 
		aoColumnDefs: [
		  { "sClass": "text-center", "aTargets": [0] }
		],
		language : DT_TH['language'] ,
		info: false,
		ordering: false,
		destroy: true 

	});  

}



</script>


 
<?php include 'setting_param_modal.php' ;?>
<?php include 'header.php' ;?>

<? 

if($_SESSION['user_info']['fn4']!="1")
{
		echo "<script>alert(' คุณไม่มีสิทธ์เข้าใช้งาน !'); </script>";
		print "<meta http-equiv='refresh' content='0;URL=main.php'>";
		exit();
}

?>

<div class="content-wrapper setting">
	
<section class="content-header">
      <h1>
	  <i class="fa fa-gears fa-lg"></i> ตั้งค่าระบบ 
        <small>> ผู้ใช้งานระบบ </small>
      </h1>
    </section>
 

 <section class="content">
 


<!-- **************** -->

      <div class="row">

			<div class="col-md-12">
					<div class="box ">

						<!-- <div class="box-header with-border">
						<h3 class="box-title">ผู้ใช้งานระบบ</h3>
						
						</div> -->


						
					 <div class="box-header">
							<i class="fa fa-users"></i>

							<h3 class="box-title">ผู้ใช้งานระบบ</h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button type="button" class="btn btn-success" onclick="addUser()"
								 >	<i class="fa fa-user-plus"></i> เพิ่มข้อมูลผู้ใช้  </button>
							</div>
						<!-- /. tools -->
						</div>						

						<div class="box-body">

						<table  id="h1-table" class="table table-striped table-bordered dataTable " style="width:100%;" >
						<thead   >
							<tr>
								<th >#</th>
								<th>ชื่อ</th>
								<th>นามสกุล</th>
								<th>ชื่อผู้ใช้</th>
								<th>ตำแหน่ง</th>
								<th>โทรศัพท์</th>
								<th>เมนูขายสินค้า</th>
								<th>เมนูคลังสินค้า</th>
								<th>เมนูสรุปยอดขาย</th>
								<th>เมนูตั้งค่า</th>
							</tr> 
							</thead>
						</table>


						</div>

					</div>

				</div>

				
	 <!-- ------------------------- -->


		</div>

           



	</section>
	


</div>


<?php include 'footer.php' ;?>

<script>
 

	$(document).ready(function(){

		$("#menu-setting").addClass("active"); 

		var b= $(window).height();  
		var scrollY = b-310 ;

		setTimeout(function(){

		buildTable(scrollY);

		},200);


	});

	function addUser(){
		openModalUser();
	 }



	function reloadTable(type){
		tableUser.ajax.reload();
	}

	function doDelItm(type, employee_ID , name){

		swal({
				title: "คุณต้องการลบ  [ "+name+" ] ใช่หรือไม่ ?",
				type: "warning",
				showCancelButton: true,
				closeOnConfirm: false  ,
				animation: false
			}, function () {

				
				$.ajax({
					type: 'POST',
					data: { 
						employee_ID : employee_ID  
					},
					url: 'service/user_service.php?method=delete&user_id='+'<? echo $pos_user_id?>',
					success: function(data) {
						swal.close();
						$.notify(" ลบรายการ  [ "+name+" ] สำเร็จ !", "success");
						reloadTable(type);
					}
				});
	
			});	

	 }


	function getStatus (code) {
		var txt = "" ;
		if(code=="0"){
			txt = ' <small class="label label-danger"> ไม่ใช้งาน <i class="fa  fa-times-circle"></i></small> ' ;
		}else if(code=="1"){
			txt = ' <small class="label label-success"> ใช้งาน <i class="fa  fa-check-circle"></i></small> ' ;
		}
		return txt;
	}


	$('#h1-table').on('dblclick','tr',function(e){

		var data = tableUser.row( this ).data();
		if(data) openModalUser(data);

	});


 function buildTable (scrollY) {

	tableUser = $('#h1-table').DataTable({
		scrollY:   scrollY,
		lengthChange:false,
		searching:false,
		paging:   false,
		ajax:  "service/user_service.php?method=search",
		columns:  	[ 
			{ 
					 "data": "employee_ID",   
					 "fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
						var txt = "";
						if(oData['user_ID']!="admin"){
							txt = '<button type="button" class="btn btn-danger btn-table" '+
							' onclick="doDelItm(1 , \''+sData+'\', \''+oData['user_ID']+'\')" ><i class="fa fa-remove"></i> ลบ</button>' ;
						}
						$(nTd).html(txt);
					}
	        }, { 
				"data": "employee_name"  
	        }, { 
				"data": "employee_surname"  
	        }, { 
				"data": "user_ID"  
	        }, { 
				"data": "role"  
	        }, { 
				"data": "tel"  
	        }, { 
				"data": "fn1"  ,
				"fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
					$(nTd).html(getStatus(sData));
				}
	        }, { 
				"data": "fn2" ,
				"fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
					$(nTd).html(getStatus(sData));
				} 
	        }, { 
				"data": "fn3"  ,
				"fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
					$(nTd).html(getStatus(sData));
				}
	        }, { 
				"data": "fn4"  ,
				"fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
					$(nTd).html(getStatus(sData));
				}
			}
		], 
		aoColumnDefs: [
		  { "sClass": "text-center", "aTargets": [0,3,4,5,6,7,8,9] },
		//   { "width": "10px", "targets": 0 },
		],
		language : DT_TH['language'] ,
		info: false,
		ordering: false,
		destroy: true 

	});  

}




</script>

 
<?php include 'edit_user_modal.php' ;?>
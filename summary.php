<?php include 'header.php' ;?>

<? 

if($_SESSION['user_info']['fn3']!="1")
{
		echo "<script>alert(' คุณไม่มีสิทธ์เข้าใช้งาน !'); </script>";
		print "<meta http-equiv='refresh' content='0;URL=main.php'>";
		exit();
}

?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


<div class="content-wrapper">
	
	<!-- <section class="content"> -->

	<div class="row">

		<div class="col-md-12">
				<div class="box box-widget">

					<div class="box-body bg-bw">


												
							<!-- <div class="col-xs-3  box-history">
								
								<div class="input-group">
								<span class="input-group-addon bg-gray"><b>ประเภท</b></span>
								<select class="form-control input-lg" id="b-type" name="billtype" >
									<option value="1">สรุปรวมทุกบิลแยกวัน</option>
									<option value="2">สรุปแยกบิลแบบละเอียด</option>
									<option value="3">สรุปแยกบิลแบบย่อย</option>
									<option value="3">สรุปยอดสินค้าขายดี</option>
								</select>
								</div>
							</div>	  -->


							<div class="col-xs-4  box-history product-form">
								<div class="input-group input-daterange">
									<span class="input-group-addon bg-gray"><b>เลือกช่วงเวลา</b></span>
									<input id="date" name="date" type="text"
										class="form-control daterange input-lg" readonly="readonly"> 
										<span class="input-group-addon"> <span
										class="glyphicon glyphicon-calendar"></span>
									</span> 
									<input type="hidden" class="form-control" id="h-startDate" name="startDate"/>
									<input type="hidden" class="form-control" id="h-endDate" name="endDate"/>

								</div>
							</div>	


							<div class="col-md-6">

								<a class="btn btn-app bg-blue" id="b-b1" >
									<i class="fa fa-calendar"></i> สรุปรวมทุกบิลแยกวัน
								</a>
								
								<a class="btn btn-app bg-red"  id="b-b2" >
									<i class="fa fa-newspaper-o"></i> สรุปแยกบิลแบบละเอียด
								</a>
								
								<a class="btn btn-app bg-olive" id="b-b3" >
									<i class="fa fa-tasks"></i> สรุปแยกบิลแบบย่อย
								</a>
								
								<!-- <a class="btn btn-app bg-navy" id="b-b4">
									<i class="fa fa-line-chart"></i> สรุปยอดสินค้าขายดี
								</a> -->

							</div>
						

							 
					</div>

					
					
				</div>

		</div>





	</div>


	
	<div class="row " >

		<div class="col-md-12 "  >

				<!-- <div class="box box-widget"> -->
					<!-- <div class="box-header with-border">
					<h3 class="box-title">Different Width</h3>
					</div> -->
					<!-- <div class="box-body  "> -->

					<div class="row row-summary">
						
						<div class="col-md-3 box-summary alert  h-b1">
								 
							<label>ต้นทุนสินค้า</label>
							<input  class="form-control input-summary" id="h-t1"  readonly/>

						</div>
						
						<div class="col-md-3  box-summary alert  h-b2">
							<label>ส่วนลดรวมทั้งหมด</label>
							<input   class="form-control input-summary" id="h-t2" readonly />
						</div>
						
						<div class="col-md-3  box-summary alert h-b3">
							<label>รวมยอดขาย (ไม่หักต้นทุน หักส่วนลด)</label>
							<input  class="form-control input-summary" id="h-t3" readonly />
						</div>
						
						<div class="col-md-3   alert  h-b4">
							<label>กำไรหลักหักต้นทุน (หักส่วนลด)</label>
							<input class="form-control input-summary" id="h-t4" readonly />
						</div> 

				</div>




<!-- -------------------------------------- -->

		  <div class="box box-widget "  style="  padding: 10px;" > 
			 <!-- <div class="box-header with-border text-right">
	              <h3 class="box-title ">สินค้าทั้งหมด ( <label id="total-txt">0</label> ) รายการ</h3> -->
	              <!-- <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool btn-success btn-table"   data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> เพิ่ม
	                </button>
	              </div> -->
	            <!-- </div> -->
		 
		 	<div   id="b1-table"  style="display: none; "> 

					<table  id="h1-table" class="table table-striped table-bordered dataTable " style="width:100%;" >
						<thead >
							<tr>
								<th>รายการ</th>
								<th>ส่วนลดรวม (บาท)</th>
								<th>ยอดรวม (บาท)</th>
								<th>หักส่วนลดเหลือ (บาท)</th>
							</tr> 
							</thead>
						</table>
			</div> 
		 	<div   id="b2-table" style="display: none;" > 

					<table  id="h2-table" class="table table-striped table-bordered dataTable" style="width:100%;" >
						<thead >
							<tr>
								<th>#</th>
								<th>รหัสสินค้า</th>
								<th>ชื่อสินค้า</th>
								<th>ราคาทุน</th>
								<th>ราคาขาย</th>
								<th>ส่วนลดย่อย</th>
								<th>จำนวน</th>
								<th>รวมเป็นเงิน</th>
							</tr> 
							</thead>
						</table>
			</div> 
		 	<div  id="b3-table" style="display: none;"> 			
					<table  id="h3-table" class="table table-striped table-bordered dataTable" style="width:100%;" >
						<thead >
							<tr>
								<th>เลขที่ใบเสร็จ</th>
								<th>ส่วนลดรวม (บาท)</th>
								<th>ยอดรวม (บาท)</th>
								<th>หักส่วนลดเหลือ (บาท)</th>
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
 

	$(document).ready(function(){

		$("#menu-summary").addClass("active"); 


		$('.daterange').daterangepicker({
				forceUpdate: true,
				locale: {
					format: 'DD/MM/YYYY'  
				},
				ranges   : {
					'วันนี้'       : [moment(), moment()],
					'ย้อนหลัง 7 วัน' : [moment().subtract(6, 'days'), moment()],
					'เดือนนี้'  : [moment().startOf('month'), moment().endOf('month')],
					'เดือนที่แล้ว'  : [moment().subtract(1, 'month').startOf('month'), 
					moment().subtract(1, 'month').endOf('month')] ,
					'ปีนี้'  : [moment().startOf('year'), moment().endOf('year')]
					// 'Last 3 Month'  : [moment().subtract(2, 'month').startOf('month'), moment().endOf('month')]
				} 
			},
			function (start, end) {
				$('#h-startDate').val(start.format('DD/MM/YYYY'));
				$('#h-endDate').val(end.format('DD/MM/YYYY'));
			}
		
		);

	
		$('#h-startDate').val( moment().format('DD/MM/YYYY'));
		$('#h-endDate').val( moment().format('DD/MM/YYYY'));


		setTimeout(function(){

			$('#b1-table').show();
			buildTable('1');  

		},100);


	});



	function buildTable(type) {

		// console.log(type);

		var b= $(window).height();  
		var scrollY = b-460 ;
		// console.log(scrollY);
	
		if(type == '2'){

			var groupColumn = 0;
			vTable = $('#h2-table').DataTable({
				scrollY:   scrollY,
				lengthChange:false,
				searching:false,
				paging:   false,
				data:[],
				columns:  	[ 
					{ 
						"data": "saleHeader_ID"
					},
					{ 
						"data": "product_ID" ,  "width": "15%"
					},
					{ 
						"data": "product_Name"  ,  "width": "30%"
					},
					{ 
						"data": "cost",  "width": "5%"
						, render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
					},
					{ 
						"data": "price",  "width": "5%"
						, render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
					},
					{ 
						"data": "discount" , "width": "5%"
						, render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
					},
					{ 
						"data": "qty",  "width": "5%"
					},
					{ 
						"data": "amount", "width": "5%"
						, render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
					}
				], 
				aoColumnDefs: [
				  { "sClass": "text-center", "aTargets": [0,1,6] },
				  { "sClass": "text-right", "aTargets": [3,4,5,7] },
				  { "visible": false, "targets":  [0] }
				],
				ordering: false,
				destroy: true,
				// rowCallback: function (row, data) {},
				// info:     false,
				
				language : DT_TH['language'] ,
				dom: 'Bfrtip',
				buttons: [   {
					extend: 'excel',
                	title: 'สรุปแยกบิลแบบละเอียด'
				},  {
					extend: 'pdf',
                	title: 'สรุปแยกบิลแบบละเอียด'
				},
				{
					extend: 'print',
                	title: 'สรุปแยกบิลแบบละเอียด'
				} 
					],
				drawCallback: function ( settings ) {
					var api = this.api();
					var rows = api.rows( {page:'current'} ).nodes();
					var last=null;
					var data = api.column(groupColumn, {page:'current'} ).data();
					data.each( function ( group, i ) {
						
						if ( last !== group ) {
							var vdata  = data.data()[i];
							// console.log(vdata);
							var vamount = getPriceTxt(vdata.total_amount) + getPriceTxt(vdata.total_discount);

							$(rows).eq( i ).before(
								'<tr class="group"><td  class="text-center">'+group+'</td><td colspan="6">[ วันที่ '+vdata.create_date+' ] '
								+ '[ ส่วนลดท้ายใบเสร็จ '+getPriceFormat(vdata.total_discount)+' บาท ]  [ ยอดรวม '+getPriceFormat(vamount)+' บาท ]  [ หักส่วนลดเหลือ '+getPriceFormat(vdata.total_amount)+' บาท ] </td></tr>'
							);
		
							last = group;
						}
					} );
				}
			});  

		}else{

			var title = (type == '1')? "สรุปรวมทุกบิลแยกวัน" : "สรุปแยกบิลแบบย่อย" ;
		
			vTable = $('#h'+type+'-table').DataTable({
				
				scrollY:   scrollY,
				lengthChange:false,
				searching:false,
				paging:   false,
				data:[],
				columns:  	[ 
					{ 
					 "data": "name", "width": "10%"
					},
					{ 
						"data": "sum_discount", "width": "10%"
						, render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
					},
					{ 
						"data": "total_amount", "width": "10%"
						, render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
					},
					{ 
						"data": "net_amount", "width": "10%"
						, render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
					}
				], 
				aoColumnDefs: [
				  { "sClass": "text-center", "aTargets": [0] },
				  { "sClass": "text-right", "aTargets": [1,2,3] }
				//   { "visible": false, "targets": groupColumn }
				],
				ordering: false,
				destroy: true,
				// rowCallback: function (row, data) {},
				language : DT_TH['language'] ,
				dom: 'Bfrtip',
				buttons: [   {
					extend: 'excel',
                	title: title
				},  {
					extend: 'pdf',
                	title: title
				},
				{
					extend: 'print',
                	title: title
				} ]
			});  


		}


	} 



	function doSearchSummary(type){

		// if(name.trim() == ""){ return false};
		var method = "summary_day";
		if(type == '1'){
			method = "summary_day";
		}else if(type == '2'){
			method = "summary_detail";
		}else{
			method = "summary_bill";
		}

		_showLoading(true);

		$.ajax({
			url: "service/product_history_service.php",
			data:{ 
				method : method,
				startDate : $("#h-startDate").val(),
				endDate : $("#h-endDate").val()
			}
		}).done(function (result) {
			// _showLoading();
			var data = result['data'];
			if(data && data.length == 0){
				swal("","ไม่พบรายการสินค้า !", "warning");
			}else{
				$("#h-t1").val(priceFormat(result['total_cost']));
				$("#h-t2").val(priceFormat(result['total_discount']));
				$("#h-t3").val(priceFormat(result['total_amount']));
				$("#h-t4").val(priceFormat(result['total_profit']));
				_showLoading(false);
			}

			vTable.clear().draw();
			vTable.rows.add(data).draw();

		
		}).fail(function (jqXHR, textStatus, errorThrown) { 
			_showLoading();
		});

	};



	$('#b-b1').click( function () {
		$('#b1-table').show();
		$('#b2-table,#b3-table').hide();
		buildTable("1");
		doSearchSummary("1");
	} );


	$('#b-b2').click( function () {
		$('#b2-table').show();
		$('#b1-table,#b3-table').hide();
		buildTable("2");
		doSearchSummary("2");
	} );


	$('#b-b3').click( function () {
		$('#b3-table').show();
		$('#b2-table,#b1-table').hide();
		buildTable("3");
		doSearchSummary("3");
	} );






</script>


 
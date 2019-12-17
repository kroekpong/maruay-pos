
 

<!-- Modal -->
<div class="modal " tabindex="-1"  role="dialog" id="stockHistoryModal"   data-backdrop="static">
   <div class="modal-dialog modal-ku">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title"><i class="fa fa-history"></i>  ข้อมูลย้อนหลัง</h4>
           
                 
			</div>
			
            <div class="modal-body">
				
			<div class="row">
						<div class="col-md-12 " >
 


			<form class="form-horizontal product-form  " id="stock-history-form" method="post" >

						<div class="row">

							<!-- <div class="col-md-8" >
								  <div class="form-group">
                                      <label class="col-sm-4 control-label"> วันที่ทำรายการ</label>
                                      <div class="col-sm-8">                                          
                                 			 <input type="text" id="a-st-date"  class="form-control" value="" readonly>
                                      </div>
								  </div>
								  
								 
								

							</div>   	
 -->

								<div class="col-xs-4">
									<div class="input-group">
									<span class="input-group-addon bg-gray"><b>ประเภทข้อมูล</b></span>
									<!-- <label>Select</label> -->
									<select class="form-control " id="h-group" name="group" >
										<option value=""><? echo $sel_all;?></option>
										<option value="S">จ่ายออกปกติ</option>
										<option value="R">คืนสินค้า</option>
										<option value="U">อัพเดทสต๊อก</option>
									</select>
									</div>
								</div>	 
											
							<!-- 	<div class="col-xs-4">
								<div class="input-group">
									<input type="text" class="form-control " id="s-search" name="name" placeholder="รหัสสินค้า(บาร์โค้ด) / ชื่อสินค้า ">
									<span class="input-group-btn">
										<button type="button" class="btn btn-info btn-flat " onclick="doSearch()"><b><i class="fa fa-search"></i> ค้นหาสินค้า</b></button>
									</span>
									</div>
								</div>	 -->


											
								<div class="col-xs-4">
									<div class="input-group input-daterange">
										<input id="date" name="date" type="text"
											class="form-control daterange" readonly="readonly"> 
											<span class="input-group-addon"> <span
											class="glyphicon glyphicon-calendar"></span>
										</span> 
										<!-- <span class="input-group-addon">ถึง</span> <input id="endDate1"
											name="endDate1" type="text" class="form-control daterange" readonly="readonly"> -->
										<!-- <span class="input-group-addon"> <span
											class="glyphicon glyphicon-calendar"></span>
										</span> -->

										  <input type="hidden" class="form-control" id="h-startDate" name="startDate"/>
					 					  <input type="hidden" class="form-control" id="h-endDate" name="endDate"/>
					  
									</div>
								</div>	


								<div class="col-xs-2">
										<button type="button" class="btn btn-info btn-flat " 
										onclick="doSearchStockHistory()"><b><i class="fa fa-search"></i> ค้นหา/ประมวลผล </b></button>
								</div>
											
						</div>   		 
	</form>

<!-- ------------ -->

	</div>
</div>	  

		

 



			 <div class="row">
				<div class="col-md-12"  >

							<table  id="history-product-table" class="table table-bordered dataTable nowrap" style="width:100%" >
								<thead  >
									<tr>
										<th>#</th> 
										<th>ประเภทข้อมูล</th>
										<th>รหัสสินค้า</th>
										<th>ชื่อสินค้า</th>
										<th>คงเหลือเดิม</th>
										<th>จำนวน</th>
										<th>คงเหลือใหม่</th>
									</tr> 
							 </thead>
							 <tbody >

							  </tbody >
				

							</table>



					
								</div>	
					</div>




			
				<div class="modal-footer">
				
					<!-- <button type="button" class="btn btn-success" onclick="doUpdateStock()">
						<i class="fa fa-save"></i>&nbsp; บันทึกข้อมูล</button> -->
					
					<button type="button" class="btn btn-warning" data-dismiss="modal">
						<i class="fa fa-remove"></i>&nbsp; ปิดหน้าต่าง </button>
				</div>
				
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>


  <script>

	
			  
	var historyList = [];

	var updateTime = function () {
		var date = moment(new Date());
		$('#a-st-date').val(date.format('Do-MMMM-YYYY เวลา HH:mm:ss'));
		// $('#m-time').html(date.format('HH:mm:ss'));
		// datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
	};
	


	function clearStockHistory() {
		
		$('.daterange').daterangepicker({
				forceUpdate: true,
				locale: {
					format: 'DD/MM/YYYY'  
				},
				ranges   : {
					'วันนี้'       : [moment(), moment()],
					'ย้อนหลัง 7 วัน' : [moment().subtract(6, 'days'), moment()],
					'เดือนนี้'  : [moment().startOf('month'), moment().endOf('month')],
					'เดือนที่แล้ว'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
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
				
		$("#h-group").val('');

	}

	 

	function openModalHistory() {
		
		clearStockHistory() ;

		$("#stockHistoryModal").modal(); 
		var groupColumn = 0;
		stockHistoryTable = $('#history-product-table').DataTable({
			// scrollY:   '250px',

			
			//  scrollCollapse: true,
		 	lengthChange:false,
			searching:false,
			// paging:   false,
			data:[],
		   columns: [
		     	{ 
					 "data": "saleHeader_ID"
	            },
		     	{ 
					 "data": "sale_status_txt"
					 ,"fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
						var txt =  oData['sale_status_txt'];
						if(oData['transType'] == "R" ){
							txt = "<span class='col-sp-price'>" + txt + "</span>"
						}else if(oData['transType'] == "S" ){
							txt = "<span class='col-cata'>" + txt + "</span>"
						}else if(oData['transType'] == "U" ){
							txt = "<span class='col-return'>" + txt + "</span>"
						}
						$(nTd).html(txt);
					}
	            },
		     	{ 
		     		"data": "product_ID"
	            },
		     	{ 
		     		"data": "product_Name", "width": "40%"
	            },
		     	{ 
					 "data": "old_qty", "width": "10%"
	            },
		     	{ 
					 "data": "qty", "width": "10%"
	            },
				{ 
					"data": "new_qty", "width": "10%"
	            }
		      
		    ], 
		    "aoColumnDefs": [
			  { "sClass": "text-center", "aTargets": [1,2,4,5,6] },
			  { "visible": false, "targets": groupColumn }
		    ],
			ordering: false,
			destroy: true,
			rowCallback: function (row, data) {},
			// info:     false,
			
			language : DT_TH['language'] ,

			"drawCallback": function ( settings ) {
				var api = this.api();
				var rows = api.rows( {page:'current'} ).nodes();
				var last=null;
				var data = api.column(groupColumn, {page:'current'} ).data();
				data.each( function ( group, i ) {
					
					if ( last !== group ) {
						var vdata  = data.data()[i];
						// console.log(vdata);
						$(rows).eq( i ).before(
							'<tr class="group"><td >'+group+'</td><td colspan="5">[ วันที่ '+vdata.create_date_hdr+' ]</td></tr>'
						);
	
						last = group;
					}
				} );
        	}
		 });  


	} 
	 


	function doSearchStockHistory(vname){

		// var name = vname? vname : $("#history-search-product").val();
		// var product_ID = $('#a-product_ID').val();

		// if(name.trim() == ""){ return false};
		
		// _showLoading(true);
		
		$.ajax({
			url: "service/product_history_service.php?method=search",
			data:  $('#stock-history-form').serialize()
		}).done(function (data) {


	
					if(data.length > 0){


						// historyList.push(data[0]);
					// var vdata = data[0];
					// var isdup = true;
					// $.notify(" เพิ่มสินค้า [ "+vdata['product_Name']+" ] สำเร็จ !", "success");

					// historyList.forEach(dt => {
					// 	 if(dt['product_ID'] == vdata['product_ID']){
					// 		 var new_qty =  parseInt(dt['qty']) + parseInt(vdata['qty']);
					// 		 dt['qty'] = new_qty;
							//  dt['qty_condition'] =  vdata['qty_condition'] ;
							//  dt['wholesale_flg'] =  vdata['wholesale_flg'] ;
							//  dt['wholesale_price'] =  vdata['wholesale_price'] ;
							//  txt_total += dt['total_cost'];
						// 	vdata['total_cost'] =  dt['qty'] * vdata['cost']  ;
						//  txt_total += vdata['total_cost'];
						// 	 isdup = false;
						//  } 

					
						
					// });

					// if(isdup){ 
					// 	historyList.push(vdata);
					// }

					// doStockSearch();

				}else{
					// $.notify("ไม่พบรายการสินค้า [ "+name+ " ] !", "error");
					swal("","ไม่พบรายการสินค้า !", "warning");
					$("#history-search-product").focus().val('');
					// $('#search').focus();
				}

				
								
				stockHistoryTable.clear().draw();
				stockHistoryTable.rows.add(data).draw();


			    // _showLoading();
		}).fail(function (jqXHR, textStatus, errorThrown) { 
			// _showLoading();
		});
		
	};





	// $('#history-product-table').on( 'dblclick', 'tr', function () {
	// 		var data = stockHistoryTable.row( this ).data();
	// 		setStockHistory(data['product_ID']);

	// 		$("#stockHistoryModal").modal('hide'); 

	// });
   




</script>



  
  
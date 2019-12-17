
 

<!-- Modal -->
<div class="modal "  role="dialog" id="stockProductModal"   data-backdrop="static">
   <div class="modal-dialog modal-ku">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title"><i class="fa fa-cart-plus"></i>  อัพเดทสต๊อกสินค้า</h4>
           
                 
			</div>
			
            <div class="modal-body">
				
			<div class="row">
						<div class="col-md-12 " >
 


			<form class="form-horizontal product-form  well stock-well" method="post" >

						<div class="row">
							<div class="col-md-8" >
								  <div class="form-group">
                                      <label class="col-sm-4 control-label"> วันที่ทำรายการ</label>
                                      <div class="col-sm-8">                                          
                                 			 <input type="text" id="a-st-date"  class="form-control" value="" readonly>
                                      </div>
								  </div>

								  <div class="form-group">
                                      <label class="col-sm-4 control-label">เลขที่</label>
                                      <div class="col-sm-8">                                          
                                 			 <input type="text"  class="form-control" value="ระบบอัตโนมัติ" readonly>
                                      </div>
								  </div>
								  
								  <div class="form-group">
                                      <label class="col-sm-4 control-label">หมายเหตุ  </label>
                                      <div class="col-sm-8">                                          
                                 			 <input type="text" id="stock-remark"   class="form-control" value="">
                                      </div>
                                  </div>
								
								


							</div>   	


								<div class="col-md-4" >


									<div class="box box-solid" style=" height: 130px;">
										<div class="box-header with-border  text-center">
										<h4 class="box-title ">รวมราคาต้นทุน (บาท)</h4>
										</div>
										<!-- /.box-header -->
										<div class="box-body  text-center">
										<h2 id="txt-total-cost">0.00</h2>
										</div>
										<!-- /.box-body -->
									</div>


							</div>  		
											
						</div>   		

 

			<!-- <div class="row">
						<div class="col-md-12" > -->
						 <!-- <div class="box box-widget"> -->
							<!-- <div class="box-body  bg-bw"> -->

									<!-- <div class="col-xs-5"> -->
									<!-- <div class="input-group">
										<input type="text" class="form-control " id="s-search" name="name" placeholder="รหัสสินค้า(บาร์โค้ด) / ชื่อสินค้า ">
										<span class="input-group-btn">
											<button type="button" class="btn btn-info btn-flat " onclick="doSearch()"><b><i class="fa fa-search"></i> ค้นหาสินค้า</b></button>
										</span>
									</div> -->
									

								<!-- </div> -->
								<!-- </div> -->
							
					<!-- </div>
			 </div>	   -->

	</form>

<!-- ------------ -->

	</div>
</div>	  

		



			 <div class="row">
				<div class="col-md-12" >



				<div class="box box-widget">

					<div class="box-header text-center">
					<div class="form-group">
 						<label class="col-sm-3 control-label" style="padding-top: 6px;">รหัสสินค้า(บาร์โค้ด) </label>
						<div class="col-xs-8">
						<div class="input-group">
							
							<input type="text" class="form-control " id="stock-search-product" name="name" 
							placeholder="รหัสสินค้า(บาร์โค้ด) / ชื่อสินค้า ">
							<span class="input-group-btn">
								<button type="button" class="btn btn-info btn-flat "  id="btn-search-product" ><b><i class="fa fa-search"></i> ค้นหาสินค้า</b></button>
							</span>
						</div>
						</div>
						
						</div>
							</div>

			</div>	  

            
			 </div>
			</div>
 





			 <div class="row">
				<div class="col-md-12" >

			<table  id="stock-product-table" class="table table-striped table-bordered table-hover dataTable nowrap" style="width:100%" >
								<thead  >
									<tr>
										<th>#</th>
										<th>รหัสสินค้า</th>
										<th>ชื่อสินค้า</th>
										<th>จำนวน</th>
										<th>หน่วยนับ</th>
										<th>ราคาต้นทุน (บาท)</th>
										<th>รวมจำนวนเงิน</th>
									</tr> 
		 					</thead>
				

							</table>



					
								</div>	
					</div>




			
				<div class="modal-footer">
				
					<button type="button" class="btn btn-success" onclick="doUpdateStock()">
						<i class="fa fa-save"></i>&nbsp; บันทึกข้อมูล</button>
					
					<button type="button" class="btn btn-warning" data-dismiss="modal">
						<i class="fa fa-remove"></i>&nbsp; ปิดหน้าต่าง </button>
				</div>
				
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>


  <script>



	var stockList = [];

	var updateTime = function () {
		var date = moment(new Date());
		$('#a-st-date').val(date.format('Do-MMMM-YYYY เวลา HH:mm:ss'));
		// $('#m-time').html(date.format('HH:mm:ss'));
		// datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
	};
	


	function clearStockProduct() {
		updateTime();
		$("#stock-search-product,#stock-remark").val('');
		$("#stock-search-product").focus();
		$("#txt-total-cost").html('0.00');
		stockList = [];

	}


	function openModalStock(iRow) {
		
		clearStockProduct() ;
	

		$("#stockProductModal").modal(); 
	
		stockProductTable = $('#stock-product-table').DataTable({
			scrollY:   '150px',
			//  scrollCollapse: true,
			lengthChange:false,
			searching:false,
			paging:   false,
			data:[],
		    columns: [
				{ 
					 "data": "product_ID",
					 "fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
						var txt = '<button type="button" class="btn btn-danger btn-table" onclick="doDelItm('+iRow+', \''+oData['product_Name']+'\')" ><i class="fa fa-remove"></i> ลบ</button>' ;
						$(nTd).html(txt);
					}
	            },
		     	{ 
		     		"data": "product_ID"
					 , "className": "col-id", "width": "20%"
	            },
		     	{ 
		     		"data": "product_Name", "width": "40%"
	            },
		     	{ 
					 "data": "qty"
					 ,"className": "col-qty" 
	            },
				{ 
					"data": "unit_name"
	            },{ 
					 "data": "cost" 
					 , render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
				},{ 
					 "data": "total_cost" 
					 , render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
	            }
		      
		    ],
		    "aoColumnDefs": [
		      { "sClass": "text-center", "aTargets": [0,3,4,5,6] }
		    ],
			ordering: false,
			destroy: true,
			rowCallback: function (row, data) {},
			// info:     false,
			language : DT_TH['language'] 
		 });  


	}

	function doUpdateStock(){
		if(stockList.length >0){

			// if(_REST_CONFIRM>0){
				swal({
					title: "คุณต้องการ [บันทึกสต๊อกสินค้า] ใช่หรือไม่ ?",
					type: "warning",
					showCancelButton: true,
					// focusConfirm: true,
					closeOnConfirm: false  ,
					animation: false
				}, function () {
					saveUpdateStock('U','SA');
				});	

			// }else{
			// 		saveUpdateStock('U','SA');
			// }
			
		}else{
			swal("","ไม่พบรายการสินค้า !", "warning");
		}
	}


	function saveUpdateStock(sale_status, sale_type){
		var data = {
			saleType :	sale_type,
			total_amount :	getPriceTxt($("#txt-total-cost").html()),
			remark :	 $("#stock-remark").val(),
			sale_status :	sale_status,
			user_id : '<? echo $pos_user_id?>',
			items: JSON.stringify(stockList)  
		 }

		//  console.log(data);
		
		$.ajax({
				data: data,
				type: "post",
				async : false,
				url: "service/product_service.php?method=update_stock",
				success: function(data){

						stockList = [] ;
						
						// swal.close();

							// swal({
							// 	title: 'บันทึกรายการสินค้าสำเร็จ !',
							// 	type: 'success',
							// 	closeOnConfirm: false 
							// 	}, function () {
							// 	$('#stockProductModal').modal('hide')
							// 	doSearch();
							// }); 
						$('#stockProductModal').modal('hide')
						$.notify('อัพเดทสต๊อกสินค้า สำเร็จ !', 'success' );
						doSearch();
						

						// var nalert = $(".alert-container") ;
						// nalert.slideDown();
						// setTimeout(function() {
						// 	nalert.slideUp();
						//  }, 2000);

						//  $("#search").focus();
						
					// });	
 
				}
		});
	}

	
	function doDelItm(rowi,product_Name){
		if(rowi>=0){
			stockList.splice(rowi, 1); 
			$.notify(" ลบสินค้า [ "+product_Name+" ] สำเร็จ !", "info");

			doStockSearch();
		}else{
			swal("","กรุณาเลือกรายการสินค้า !", "warning");
		}
	 }



	function doSearchStockProduct(vname){

		var name = vname? vname : $("#stock-search-product").val();
		var product_ID = $('#a-product_ID').val();

		if(name.trim() == ""){ return false};
		
		// _showLoading(true);
		
		$.ajax({
			url: "service/product_service.php?method=search_sell",
			data:{ 
				name : name 
				// stock : 'Y'
			}
		}).done(function (data) {
	
					if(data.length > 0){
					// stockList.push(data[0]);
					var vdata = data[0];
					var isdup = true;
					$.notify(" เพิ่มสินค้า [ "+vdata['product_Name']+" ] สำเร็จ !", "info");

					stockList.forEach(dt => {
						 if(dt['product_ID'] == vdata['product_ID']){
							 var new_qty =  parseInt(dt['qty']) + parseInt(vdata['qty']);
							 dt['qty'] = new_qty;
							//  dt['qty_condition'] =  vdata['qty_condition'] ;
							//  dt['wholesale_flg'] =  vdata['wholesale_flg'] ;
							//  dt['wholesale_price'] =  vdata['wholesale_price'] ;
							//  txt_total += dt['total_cost'];
						// 	vdata['total_cost'] =  dt['qty'] * vdata['cost']  ;
						//  txt_total += vdata['total_cost'];
							 isdup = false;
						 } 

					
						
					});

					if(isdup){ 
						stockList.push(vdata);
					}

					doStockSearch();

				}else{
					// $.notify("ไม่พบรายการสินค้า [ "+name+ " ] !", "error");
					swal("","ไม่พบรายการสินค้า !", "warning");
					$("#stock-search-product").focus().val('');
					// $('#search').focus();
				}

			// stockProductTable.clear().draw();
			// _data = result;
			// stockProductTable.rows.add(result).draw();
			    // _showLoading();
		}).fail(function (jqXHR, textStatus, errorThrown) { 
			// _showLoading();
		});
		
	};


	function calStockPrice(){
		var txt_total = 0;
		stockList.forEach(data => {
			data['total_cost'] = getPriceTxt(data['qty']) * getPriceTxt(data['cost']);
			data['new_qty'] = getPriceTxt(data['qty']) +  getPriceTxt(data['old_qty'])  ;
			txt_total += getPriceTxt(data['total_cost']);
		});

		$("#txt-total-cost").html(txt_total.toFixed(2));
	}

	function doStockSearch(){
	 
		calStockPrice();

		stockProductTable.clear().draw();
		stockProductTable.rows.add(stockList).draw();

		$("#stock-search-product").val('');
 
	};


	
	$("#stock-search-product").on('keyup', function (e) {
		if (e.keyCode === 13) {
			doSearchStockProduct();
		}
	});

	$('#btn-search-product').click( function () {
		openModalStockSearchProduct();
	});

	$('#stock-product-table').on( 'dblclick', 'tr td', function () {

		var data = stockProductTable.row( this ).data();
		if(data){

	 		// _this = this;
			// console.log( _this);

			if($(this).hasClass('col-qty')){

					swal({
						html:true,
						title: "<i class='title'>แก้ไขจำนวนสินค้า</i>",
						text: data['product_Name'] ,
						type: "input",
						inputValue :  data['qty'] ,
						showCancelButton: true,
						focusConfirm: true,
						closeOnConfirm: false,
						animation: false
						// animation: "slide-from-top"
						// inputPlaceholder: "Write something"
						},
						function(inputValue){
						if (inputValue === false) return false;

						if (!getInteger(inputValue)  || inputValue <= 0 ) {
							swal.showInputError("ระบุจำนวนให้ถูกต้อง !");
							return false
						}

						data['qty'] = getPriceTxt(inputValue);
						doStockSearch();
						swal.close();

					});

				}

		}
	} );
	



	// $('#stock-product-table').on( 'dblclick', 'tr', function () {
	// 		var data = stockProductTable.row( this ).data();
	// 		setStockProduct(data['product_ID']);

	// 		$("#stockProductModal").modal('hide'); 

	// });
   




</script>



  
  

 

<!-- Modal -->
<div class="modal " tabindex="-1" role="dialog" id="editProductModal"  
 data-backdrop="static" style="background: rgba(0, 0, 0, 0);" >
   <div class="modal-dialog"   style="width: 70em;">
        <div class="modal-content" style="background-color: #fff0;" >
            <!-- <div class="modal-header" style="background-color: #fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title"><i class="fa fa-search"></i>  ค้นหาสินค้า</h4>
                 
			</div> -->
			
            <div class="modal-body" style=" background-color: #ffffffad; padding: 5px; ">
				
			
				<div class="row">
					<div class="col-md-12" >
				
            
						<!-- <h4> Name :  <label id="label_empName"></label></h4> -->
    					

                          <div class="panel-body">

                              <!-- <form class="form-horizontal " method="post" action="edit_user_pro.php" > -->

                              	<!-- <input type="hidden" id="check_update" name="check_update" value="1"> -->
                                <!-- <input type="hidden" id="emp_id" name="emp_id" value="<? echo $user['emp_id']?>"> -->
                                
									<!-- ID -->	
									<div class="input-group">
											<input type="text" class="form-control  input-p"
											id="search-product" placeholder="รหัสสินค้า, บาร์โค้ด ,ชื่อสินค้า " >
											<span class="input-group-btn">
												<button type="button" class="btn btn-info  " id="btn-product-add">
													<i class="fa fa-search"></i> ค้นหาสินค้า [Enter]</button>
											</span>
										</div>
									

							  <!-- </form> -->
							  </div>    	
					</div>             	
				</div>   		  

			 <div class="row">
				<div class="col-md-12" >

				<table  id="product-table" class="table table-striped table-bordered table-hover dataTable nowrap" style="width:100%" >
					<thead  >
						<tr>
							<th>รหัสสินค้า</th>
							<th>ชื่อสินค้า</th>
							<th>หน่วยนับ</th>
							<!-- <th>ราคาขาย (บาท)</th> -->
						</tr> 
						</thead>
	

				</table>


                       
                        
                        
            
			 </div>
			</div>
			
				<!-- <div class="modal-footer"> -->
				
					<!-- <button type="button" onclick="saveProduct()" class="btn btn-primary btn-lg" ><i class="fa fa-save"></i>&nbsp; Update</button> -->
					
					<!-- <button type="button" class="btn btn-warning" data-dismiss="modal">
						<i class="fa fa-remove"></i>&nbsp; ปิดหน้าต่าง [ESC]</button>
				</div> -->
				
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>


  <script>

	function openModalProduct(iRow) {

		$("#editProductModal").modal(); 

		$("#search-product").focus().val('');


		productTable = $('#product-table').DataTable({
			scrollY:   '200px',
			//  scrollCollapse: true,
			lengthChange:false,
			searching:false,
			paging:   false,
			data:[],
		    columns: [
				// { 
				// 	 "data": "product_ID",
				// 	 "fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
				// 		$(nTd).html(++iRow);
				// 	}
	            // },
		     	{ 
		     		"data": "product_ID"
					 , "className": "col-id", "width": "20%"
	            },
		     	{ 
		     		"data": "product_Name"
	            },
		     	// { 
				// 	 "data": "qty"
				// 	 , "className": "col-qty" 

	            // },
				{ 
					"data": "unit_name"
	            } 
		      
		    ],
		    "aoColumnDefs": [
		      { "sClass": "text-center", "aTargets": [0,2] }
		    ],
			ordering: false,
			destroy: true,
			rowCallback: function (row, data) {},
			info:     false,
			language : DT_TH['language'] 
		 });  


	}


	function doSearchProduct(){

		var name = $("#search-product").val();

		if(name.trim() == ""){ return false};
		
		_showLoading(true);
		
		$.ajax({
			url: "service/product_service.php?method=search",
			data:{ name : $("#search-product").val()}
		}).done(function (result) {
			productTable.clear().draw();
			// _data = result;
			productTable.rows.add(result).draw();
			    _showLoading();
		}).fail(function (jqXHR, textStatus, errorThrown) { 
			_showLoading();
		});
		
	};


	$('#btn-product-add').click( function () {
		doSearchProduct();
	} );
	
	
	$("#search-product").on('keyup', function (e) {
		if (e.keyCode === 13) {
			doSearchProduct();
		}
	});


	$('#product-table').on( 'dblclick', 'tr', function () {
			var data = productTable.row( this ).data();
			// console.log(data);
			// $.ajax({
			// 	url: "service/product_service.php?method=search",
			// 	data:{ name : $("#search-product").val()}
			// }).done(function (result) {
			// 	productTable.clear().draw();
			// 	// _data = result;
			// 	productTable.rows.add(result).draw();
			// 		_showLoading();
			// }).fail(function (jqXHR, textStatus, errorThrown) { 
			// 	_showLoading();
			// });
			

			loadProduct(data['product_ID']);

			doSearch();
	});
   
	

</script>



  
  
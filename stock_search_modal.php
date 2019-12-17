
 

<!-- Modal -->
<div class="modal "  role="dialog" id="stockSearchProductModal"   data-backdrop="static">
   <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title"><i class="fa fa-search"></i>  ค้นหาสินค้า (สต๊อก)</h4>
           
                 
			</div>
			
            <div class="modal-body">
				
			
				<div class="row">
					<div class="col-md-12" >
				
            
						<!-- <h4> Name :  <label id="label_empName"></label></h4> -->
    					

                          <div class="panel-body">

                              <!-- <form class="form-horizontal " method="post" action="edit_user_pro.php" > -->

                              	<!-- <input type="hidden" id="check_update" name="check_update" value="1"> -->
                                <!-- <input type="hidden" id="emp_id" name="emp_id" value="<? echo $user['emp_id']?>"> -->
                                
									<!-- ID -->	
									<div class="input-group">
											<input type="text" class="form-control input-lg input-p"
											id="stockSearch-search-product" placeholder="รหัสสินค้า, บาร์โค้ด ,ชื่อสินค้า " >
											<span class="input-group-btn">
												<button type="button" class="btn btn-info input-lg btn-lg" id="btn-stockSearch-product-add">
													<i class="fa fa-search"></i> ค้นหาสินค้า [Enter]</button>
											</span>
										</div>
									

							  <!-- </form> -->
							  </div>    	
					</div>             	
				</div>   		  

			 <div class="row">
				<div class="col-md-12" >

				<table  id="stockSearch-product-table" class="table table-striped table-bordered table-hover dataTable nowrap" style="width:100%" >
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
			
				<div class="modal-footer">
				
					<!-- <button type="button" onclick="clearStockSearchProduct()" class="btn btn-primary" data-dismiss="modal">
						<i class="fa fa-refresh"></i>&nbsp; ล้างข้อมูล</button> -->
					
					<button type="button" class="btn btn-warning" data-dismiss="modal">
						<i class="fa fa-remove"></i>&nbsp; ปิดหน้าต่าง </button>
				</div>
				
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>


  <script>

	function openModalStockSearchProduct(iRow) {

		$("#stockSearchProductModal").modal(); 

		$("#stockSearch-search-product").focus().val('');


		stockSearchProductTable = $('#stockSearch-product-table').DataTable({
			scrollY:   '250px',
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
			// info:     false,
			language : DT_TH['language'] 
		 });  


	}



	function doSearchStockSearchProduct(){

		var name = $("#stockSearch-search-product").val();
		var product_ID = $('#a-product_ID').val();

		if(name.trim() == ""){ return false};
		
		_showLoading(true);
		
		$.ajax({
			url: "service/product_service.php?method=search",
			data:{ 
				name : name , 
				// product_ID : product_ID ,
				// stockSearch : 'Y'
			}
		}).done(function (result) {
			stockSearchProductTable.clear().draw();
			// _data = result;
			stockSearchProductTable.rows.add(result).draw();
			    _showLoading();
		}).fail(function (jqXHR, textStatus, errorThrown) { 
			_showLoading();
		});
		
	};


	$('#btn-stockSearch-product-add').click( function () {
		doSearchStockSearchProduct();
	} );
	
	
	$("#stockSearch-search-product").on('keyup', function (e) {
		if (e.keyCode === 13) {
			doSearchStockSearchProduct();
		}
	});


	$('#stockSearch-product-table').on( 'dblclick', 'tr', function () {
			var data = stockSearchProductTable.row( this ).data();

			doSearchStockProduct(data['product_ID']);

			// $("#stockSearchProductModal").modal('hide'); 

	});
   
</script>



  
  
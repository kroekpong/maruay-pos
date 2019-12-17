  

  <?


	
	?>

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editProductModal" data-backdrop="static">
   <div class="modal-dialog modal-ku">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title"><i class="fa fa-edit"></i> เพิ่ม/แก้ไข ข้อมูลสินค้า</h4>
           
                 
            </div>
            <div class="modal-body">
             <div class="row">
				<div class="col-md-12" >
				
            
						<!-- <h4> Name :  <label id="label_empName"></label></h4> -->

                          <!-- <div class="panel-body"> -->

                              <form class="form-horizontal product-form" method="post" action=".php" id="product-form" >
								
							  <!-- New Row  -->
					<div class="row">
							<div class="col-md-6" >

                              	  <div class="form-group">
                                      <label class="col-sm-4 control-label">รหัสสินค้า (บาร์โค้ด) <font color="#FF0000" size="+1">*</font></label>
                                      <div class="col-sm-8">
										  <!-- <input type="text" id="" name="" class="form-control" value=""> -->
										  <div class="input-group">
											  <div class="input-group-btn">
												  <button id="b-auto"  type="button" class="btn btn-info"><i class="fa fa-cart-plus"></i>อัตโนมัติ</button>
											  </div>
											  <input type="hidden" id="a-auto-flg"  name="auto-flg" value="0" >
											  <input type="text" id="a-product_ID" name="product_ID" class="form-control">
											</div>
                                      </div>
								  </div>
								  
								  
								  
                              	  <div class="form-group">
                                      <label class="col-sm-4 control-label">หมวดหมู่สินค้า  </label>
                                      <div class="col-sm-8">
									  <select id="a-category_ID"  name="category_ID" class="form-control m-bot15">
                                              
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
								  

 									<div class="form-group">
                                      <label class="col-sm-4 control-label">สถานที่จัดเก็บ </label>
                                      <div class="col-sm-8">                                          
									 	 <select id="a-location_ID"  name="location_ID" class="form-control m-bot15">
											 <?   
												for ($i = 0; $i < count($pos_location); $i++)  {  
											?>
													<option value="<? echo $pos_location[$i]['loc_id']?>"><? echo $pos_location[$i]['loc_name']?></option>
											<?  }?>
										   </select>
                                      </div>
                                  </div>

	 							 <div class="form-group">
								 	  <label class="col-sm-4 control-label">ราคาต้นทุน <font color="#FF0000" size="+1">*</font></label>
                                      <div class="col-sm-8">        <div class="input-group">                                  
                                 			 <input type="text"  id="a-cost"  name="cost"    class="form-control decimal" value="">
											  <span class="input-group-addon"  > บาท </span></div>
											 </div>
                                  </div>
   
								  <div class="form-group">
								 	  <label class="col-sm-4 control-label">ราคาขายพิเศษ 1  </label>
                                      <div class="col-sm-8">      <div class="input-group">                                    
                                 			 <input type="text"  name="special_price_1"   id="a-special_price_1"   class="form-control decimal" value="">
									 
											  <span class="input-group-addon"  > บาท </span></div>
												</div>
								  </div>
								  
								 
								  <div class="form-group">
                                      <label class="col-sm-4 control-label"> จำนวนที่จะได้ราคาส่ง</label>
                                      <div class="col-sm-8">
										  <!-- <input type="text" id="" name="" class="form-control" value=""> -->
										  <div class="input-group">
											  <div class="input-group-btn">
												  <button id="b-qty_condition" type="button" class="btn btn-danger" 
												  style="width:60px" ><i class="fa fa-remove"></i> ปิด</button>
											  </div>
											  <input type="text"  class="form-control number" id="a-qty_condition" name="qty_condition"  disabled>
											  <input type="hidden" id="a-wholesale_flg"  name="wholesale_flg" value="0" >
											</div>
                                      </div>
								  </div>

								   <div class="form-group">
								 	  <label class="col-sm-4 control-label">เตือนสินค้าเหลือน้อยกว่า </label>
                                      <div class="col-sm-8">             
									  	<div class="input-group">
											<input  id="a-min_qty"   name="min_qty"    class="form-control number" value="0">          
											<span class="input-group-addon" id="min_qty-txt"> 
											</span>
										</div>                             
                                 			 <!-- <input type="text"  name="min_qty"    class="form-control number" value="0"> -->
                                      </div>
                                  </div>

							</div>

 <!-- ------------------------------   -->	

						<div class="col-md-6" >
								  

                            <!-- Name -->	
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label">ชื่อสินค้า  <font color="#FF0000" size="+1">*</font></label>
                                      <div class="col-sm-8">                                          
                                 			 <input type="text" id="a-product_Name"   name="product_Name"  class="form-control" value="">
                                      </div>
                                  </div>
                                  
                                  
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label">หน่วยนับ  </label>
                                      <div class="col-sm-8">                                          
									 	 <select   id="a-unitType_ID" name="unitType_ID"  class="form-control m-bot15">
										 	 <?   
												for ($i = 0; $i < count($pos_unit); $i++)  {  
											?>
											   <option value="<? echo $pos_unit[$i]['unit_id'] ?>"><? echo $pos_unit[$i]['unit_name'] ?></option>
											 <? } ?>
										   </select>
                                      </div>
                                  </div>
								  
								  <div class="form-group">
                                      <label class="col-sm-4 control-label">จำนวนคงเหลือ </label>
                                      <div class="col-sm-8">                                          
                                 			 <input type="text"  id="a-qty" name="qty"    class="form-control number" value="">
                                      </div>
								  </div>

								  
								
								  
								  <div class="form-group">
								 	  <label class="col-sm-4 control-label">ราคาขายปกติ <font color="#FF0000" size="+1">*</font></label>
                                      <div class="col-sm-8">   <div class="input-group">                                          
                                 			 <input type="text"  id="a-normal_price"  name="normal_price"   class="form-control decimal" value="">
											  <span class="input-group-addon"  > บาท </span></div>
												
										</div>
								  </div>
								  
								    
								  <div class="form-group">
								 	  <label class="col-sm-4 control-label">ราคาขายพิเศษ 2 </label>
                                      <div class="col-sm-8 ">     
									 	 <div class="input-group">                                     
                                 			 <input type="text" id="a-special_price_2"  name="special_price_2"    class="form-control decimal" value="">
												<span class="input-group-addon"  > บาท </span>
												</div>
										</div>
								  </div>
								  
								  <div class="form-group">
								 	  <label class="col-sm-4 control-label">ราคาขายส่ง </label>
                                      <div class="col-sm-8">     <div class="input-group">                                        
                                 			 <input type="text"  id="a-wholesale_price" name="wholesale_price"  disabled  class="form-control decimal" value="">
											  <span class="input-group-addon"  > บาท </span></div>
											</div>
                                  </div>
								  

						 </div>
					</div>

<!-- New Row  --> 
				 <hr>
			<div class="row">
							
							 
							 <div class="col-md-6" >
							 	<div class="form-group">
								 	  <label class="col-sm-4 control-label">แพคเกจสินค้าหลัก</label>
                                      <div class="col-sm-8">           
									  		<div class="input-group">
												  <input type="text"  class="form-control " id="a-parent_product_id" name="parent_product_id"  readonly>
												  <div class="input-group-btn">
													  <button id="b-package" type="button" class="btn btn-success"  >
														  <i class="fa fa-search"></i> ค้นหา</button>
												  </div>
												  <!-- <input type="hidden" id="a-product_package"  name="product_package"  > -->
											</div>                               
                                 			 <!-- <input type="text"  id="a-product_package" name="product_package"  disabled  class="form-control decimal" value=""> -->
                                      </div>
                                  </div>
							 </div>

							 <div class="col-md-6" >

								<div class="form-group">
									<label class="col-sm-4 control-label">จำนวนบรรจุ  </label>
									<div class="input-group">
										<input id="a-parent_sub_qty" name="parent_sub_qty"   class="form-control  number"   readonly>          
										<span class="input-group-addon" id="p-sub-qty-txt"> 
										</span>
									</div>
								</div>
					</div>
							 
</div>

				<!-- New Row  -->
        

                              </form>
                          </div>

                       
                        
                        
                        
				</div>             	
             <!-- </div>   	  -->
            
            
            </div>
            <div class="modal-footer">
            
            	<button type="button" onclick="saveProduct()" class="btn btn-primary" >
					<i class="fa fa-save"></i>&nbsp; บันทึก</button>
            	
                <button type="button" class="btn btn-warning" data-dismiss="modal">
					<i class="fa fa-remove"></i>&nbsp; ปิดหน้าต่าง</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>




  
  <script>

	function randomFixedId(length) {
		return Math.floor(Math.pow(10, length-1) + Math.random() * (Math.pow(10, length) - Math.pow(10, length-1) - 1));
	}

	function getSelectionStart(o) {
		if (o.createTextRange) {
			var r = document.selection.createRange().duplicate()
			r.moveEnd('character', o.value.length)
			if (r.text == '') return o.value.length
			return o.value.lastIndexOf(r.text)
		} else return o.selectionStart
	}

	function isNumberKey(el, evt){
		var charCode = (evt.which) ? evt.which : event.keyCode;
		var number = el.value.split('.');
		if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		//just one dot (thanks ddlab)
		if(number.length>1 && charCode == 46){
			return false;
		}
		//get the carat position
		var caratPos = getSelectionStart(el);
		var dotPos = el.value.indexOf(".");
		if( caratPos > dotPos && dotPos>-1 && (number[1].length > 1)){
			return false;
		}
		return true;
	}

	$(".decimal").on('keypress', function (e) {
		return isNumberKey(this, e);
	});

	$(".number").on('keypress', function (e) {
		return isNumberKey(this, e);
	});

  var isedit = false;
  function openModalProduct(pdata) {

	  	isedit = false;

	    $("#editProductModal").modal();

		$('#product-form')[0].reset(); 
		// console.log( _data[iRow]);
		$('#b-auto').removeClass("btn-success");
		$('#b-auto').addClass("btn-info");
		$('#b-auto').html("อัตโนมัติ");
		$('#a-auto-flg').val(0);

		$('#b-qty_condition').addClass("btn-danger");
		$('#b-qty_condition').removeClass("btn-success");
		$('#b-qty_condition').html("ปิด");
		

		$('#a-product_ID').prop('readonly', false);
		$('#a-qty_condition,#a-wholesale_price').prop('disabled', true);

		var txtdd = $('#a-unitType_ID option:selected').text();
	
		// console.log('pdata ',pdata);

		if(pdata)
		{	
			isedit = true;
			for (var key in pdata) {
				if (pdata.hasOwnProperty(key)) {
					$('#a-'+key).val( pdata[key]);
				}
			}
			txtdd = pdata['unit_name'];
		   if(pdata['wholesale_flg']>0){
				$('#a-wholesale_flg').val(0);
		   }else{
				$('#a-wholesale_flg').val(1);
		   }

			$('#b-auto').prop('disabled', true);
			$('#a-product_ID').prop('readonly', true);

			// console.log('pdata ',pdata);
			enableWholesale();

		}else{

			$('#b-auto').prop('disabled', false);
			$('#a-product_ID').prop('readonly', false);

			$('#a-wholesale_flg').val(1);
			enableWholesale();
		}

		$('#p-sub-qty-txt,#min_qty-txt').html(txtdd);

	

			// console.log('isedit ',isedit);


  }
 

	$('#a-unitType_ID').change( function () {
		$('#p-sub-qty-txt,#min_qty-txt').html($('#a-unitType_ID option:selected').text());
	});

	$('#b-package').click( function () {
		openModalPackageProduct();
	});


	$('#b-auto').click( function () {
		if($('#a-auto-flg').val() == 0){
			$('#a-auto-flg').val(1);
			$('#a-product_ID').val(randomFixedId(13));
			$('#a-product_ID').prop('readonly', true);
			$(this).removeClass("btn-info");
			$(this).addClass("btn-success");
			$(this).html("ระบุเอง");
		}else{
			$('#a-auto-flg').val(0);
			$('#a-product_ID').val("");
			$('#a-product_ID').prop('readonly', false);
			$(this).removeClass("btn-success");
			$(this).addClass("btn-info");
			$(this).html("อัตโนมัติ");
		}
	});

	function enableWholesale(){
		if($('#a-wholesale_flg').val() == 0){
			$('#a-qty_condition,#a-wholesale_price').prop('disabled', false);
			$('#a-wholesale_flg').val(1);
			$('#b-qty_condition').removeClass("btn-danger");
			$('#b-qty_condition').addClass("btn-success");
			$('#b-qty_condition').html("เปิด");
		}else{
			$('#a-qty_condition,#a-wholesale_price').prop('disabled', true);
			$('#a-qty_condition,#a-wholesale_price').val("");
			$('#a-wholesale_flg').val(0);
			$('#b-qty_condition').addClass("btn-danger");
			$('#b-qty_condition').removeClass("btn-success");
			$('#b-qty_condition').html("ปิด");
		}
	}

  	$('#b-qty_condition').click( function () {
		enableWholesale();
	});
	
	function setPackageProduct(product_ID){
		$('#a-parent_product_id').val(product_ID);
		$('#a-parent_sub_qty').prop('readonly', false);
		
	}
	function clearPackageProduct(){
		$('#a-parent_product_id,#a-parent_sub_qty').val('');
		$('#a-parent_sub_qty').prop('readonly', true);

	}


  	function saveProduct(){

		if($('#a-product_ID').val().length==0)
		{
			swal("","กรุณาระบุ รหัสสินค้า (บาร์โค้ด) ! ","warning");
			$('#a-product_ID').focus();
			return false;
		}
		if($('#a-product_Name').val().length==0)
		{
			swal("","กรุณาระบุ ชื่อสินค้า !","warning");
			$('#a-product_Name').focus();
			return false;
		}
		if($('#a-cost').val().length==0)
		{
			swal("","กรุณาระบุ ราคาต้นทุน (บาท) !","warning");
			$('#a-cost').focus();
			return false;
		}
		if($('#a-normal_price').val().length==0)
		{
			swal("","กรุณาระบุ ราคาขายปกติ (บาท) !","warning");
			$('#a-normal_price').focus();
			return false;
		}

		if($('#a-parent_product_id').val().length!=0 && $('#a-parent_sub_qty').val().length==0)
		{
			swal("","กรุณาระบุ จำนวนบรรจุ !","warning");
			$('#a-parent_sub_qty').focus();
			return false;
		}

	    var method = "save_product";
		if(isedit){
			method = "edit_product";
		}

		$.ajax({
            type: 'POST',
			data: $('#product-form').serialize(),
            url: 'service/product_service.php?method='+method+'&user_id='+'<? echo $pos_user_id?>',
            success: function(data) {

                // console.log(data['status']);
				if(data['status'] == "duplicate"){
					swal("","รหัสสินค้า ["+$('#a-product_ID').val()+"] มีอยู่แล้ว !" ,"warning");
				}else 	if(data['status'] == "success"){
					// swal({

					// 	title: 'บันทึกรายการสินค้าสำเร็จ !',
					// 	type: 'success',
					// 	closeOnConfirm: false 
					// }, function () {
					// 	$('#editProductModal').modal('hide')
					// 	doSearch();
					// }); 

					// setTimeout(function() {
						$('#editProductModal').modal('hide')
						$.notify('บันทึก รายการสินค้า สำเร็จ !', 'success' );
						doSearch();
					// }, 1000);

				}
			
            }
        });
  }
	   

	 
  </script>
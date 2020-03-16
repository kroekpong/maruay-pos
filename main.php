<?php include 'header.php' ;?>


<? 

if($_SESSION['user_info']['fn1']!="1")
{
		echo "<script>alert(' คุณไม่มีสิทธ์เข้าใช้งาน !'); </script>";
		print "<meta http-equiv='refresh' content='0;URL=login.php'>";
		exit();
}

?>

<div class="content-wrapper con-main">
	


	<!-- <section class="content"> -->

	<div class="row">

		<div class="col-md-12">
				<!-- Application buttons -->
				<div class="box box-widget">

					<div class="box-body bg-bw">

							<a class="btn btn-app bg-blue" id="b-save"  >
								<i class="fa fa-save"></i> บันทึกการขาย [F9]
							</a>
							
							<a class="btn btn-app bg-navy" id="b-submit"  >
								<i class="fa fa-print"></i> บันทึกและพิมพ์ [F12]
							</a>
							
							<?if($_SESSION['user_info']['fn4']=="1") { ?>	 
							<a class="btn btn-app bg-olive" id="b-return"  >
								<i class="fa fa-retweet"></i> คืนสินค้า [F5]
							</a>
							<?}?>
							<a class="btn btn-app bg-orange" id="b-del"  >
								<i class="fa fa-remove"></i> ลบสินค้า [Del]
							</a>

							<a class="btn btn-app bg-red" id="b-del-all" onclick="clearAll()"  >
								<i class="fa fa-trash-o"></i> ลบสินค้าทั้งหมด  
							</a>


							<a class="btn btn-app bg-purple pull-right" id="b-sell-return" >
							<span class="badge bg-green" id="return-count-txt">0</span>
								<i class="fa  fa-support"></i> คืนการขาย [F2]
							</a>

							<a class="btn btn-app bg-maroon btn-right" id="b-sell-break" >
								<i class="fa  fa-history"></i> พักการขาย [F1]
							</a>
	
					</div>
					<!-- /.box -->
					
				</div>

		</div>


	</div>


	
	<div class="row " >

		<div class="col-md-8  pd-r-0"  >

				<div class="box box-widget">
					<!-- <div class="box-header with-border">
					<h3 class="box-title">Different Width</h3>
					</div> -->
					<div class="box-body  bg-bw">
					<div class="row">
						<div class="col-xs-4 ">
							<div class="form-group no-margin">
						
							<!-- <label>Select</label> -->
							<select class="form-control input-lg input-p" id="p-type">
								<?  foreach ($pos_price_type as $c => $v) { 
								?>
										<option value="<? echo $c ?>"><? echo $v ?></option>
								<?
									// echo json_encode($ptype);
									} 
								?>
							</select>
							</div>
						</div>
						<div class="col-xs-8">
							<div class="input-group">
								<input type="text" class="form-control input-lg input-p"
								id="search" name="search" placeholder="รหัสสินค้า (บาร์โค้ด)" >
								<span class="input-group-btn">
									<button type="button" class="btn btn-info input-lg btn-lg" id="btn-product">
										<i class="fa fa-search"></i> ค้นหาสินค้า [F4]</button>
								</span>
							</div>
						</div>


					</div>
					</div>
					<!-- /.box-body -->
				</div>


<!-- -------------------------------------- -->

		  <div class="box box-widget"  > 
			 <div class="box-header with-border text-center">
	              <h3 class="box-title ">สินค้าทั้งหมด ( <label id="total-txt">0</label> ) รายการ</h3>
	              <!-- <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool btn-success btn-table"   data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> เพิ่ม
	                </button>
	              </div> -->
	            </div>
		 
		 	<div class="box-body  "  id="box-1" > 

	  		<table  id="result-table" class="table table-striped table-bordered table-hover nowrap" style="width:100%" >
				<thead  >
					<tr>
						<th>#</th>
						<th>รหัสสินค้า</th>
						<th>ชื่อสินค้า</th>
						<!-- <th>รายละเอียด</th> -->
						<th>จำนวน</th>
						<th>หน่วย</th>
						<th>ราคาขาย</th>
						<th>ส่วนลด</th>
						<th>รวมเป็นเงิน</th>
					</tr> 
					</thead>

				 

				</table>

              </div>


            </div>




<!-- ------------------- TOP ------------------- -->


		</div>


<!-- -------------------------------------- -->

		<div class="col-md-4  " >

				<div class="box box-widget   bg-bw"  id="box-2"  >

			<form class="form-inline" role="form" id="cal-form" action="" method="post">
					<!-- <div class="box-header with-border">
					<h3 class="box-title">คิดเงิน</h3>
					</div>		 -->
					<div class="box-body full-height "  >
					
						<div class="box-r alert alert-danger">
							<dl class="dl-horizontal">
								<dt>รวมเป็นเงิน (บาท)</dt>
								<dd><input id="p-total"   class="form-control input-price inline p-0" value="0.00" readonly >  </dd>
								<!-- <dt>ส่วนลดทั้งหมด (บาท)</dt>
								<dd><input id="p-total-dis"   class="form-control input-price inline p-0" value="0.00" readonly>  </dd> -->
								<dt>ยอดรวมทั้งหมด (บาท)</dt>
								<dd><input id="p-total-sum"   class="form-control input-price inline p-0" value="0.00"  name="total_amount" readonly>  </dd>
								<!-- <dd>0.00</dd> -->
								<dt>จำนวนเงินทอน (บาท)</dt>
								<dd><input id="p-change"   class="form-control input-price inline p-0" value="0.00"  readonly >  </dd>
								<!-- <dd>0.00</dd> -->
								
							</dl>
						</div>	

						<!-- <div class="box-r alert alert-danger">
						<div class="input-group">
								<dt><input type="text" class="form-control input-lg" > 
								 
								<select class="form-control input-lg" >
										<option value="1">บาท</option>
										<option value="2">เปอร์เซนต์</option>
									</select>    
								</dt>
								 
						</div>	 -->

<!-- <p>Normal split buttons:</p> -->
						<div class="box-r alert alert-warning">
								<div class="input-group">

									<div class="form-group ">
									<!-- <label>Date masks:</label> -->
										<input  id="p-disc" maxlength="50" class="form-control input-lg p-pay "
										 placeholder="ส่วนลดพิเศษ"   name="total_discount" >          
										 <input id="p-total-dis"  type="hidden" value="0" > 
									</div>

									<div class="form-group ">
											<select class="form-control input-lg input-p "  id="p-disc-type" >
												<option value="1"> บาท </option>
												<option value="2"> เปอร์เซนต์ </option>
											</select>        
									</div>
								</div>
						</div> 
							



						<div class="box-r alert alert-success">
								<!-- <div class="form-group "> -->
								<div class="input-group">
 
									<input id="p-pay"  style="width:250px;"  
									class="form-control input-lg p-pay " placeholder="ชำระเงิน"  >          
									<span class="input-group-addon">
											<i class="fa fa-money"></i> ชำระเงิน (บาท)   
									</span>
							</div>
						</div>	



					<div class="box-footer">
							<div class="row">

								<div class="col-sm-4 border-right pad-5">
									<div class="description-block">
										<h5 class="description-header"><i class="fa fa-user"></i> ตำแหน่ง</h5>
										<span class="description-text" id="m-role"><? echo $pos_role?></span>
									</div>
								</div>

								<div class="col-sm-4 border-right pad-5">
									<div class="description-block">
										<h5 class="description-header"><i class="fa fa-calendar-o"></i> วันที่</h5>
										<span class="description-text" id="m-date"></span>
									</div>
								</div>
								<!-- /.col -->
								<div class="col-sm-4 border-right pad-5">
									<div class="description-block">
										<h5 class="description-header"><i class="fa fa-clock-o"></i> เวลา</h5>
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

				</form>

			</div>
			

		</div>
			
	</div>

 
<!-- -------------------------------------- -->

    <!-- </section> -->
			
	<!-- <div class="alert alert-success">
  <strong>Success!</strong> Indicates a successful or positive action.
</div> -->

<div class="alert-container">
  <div class="alert alert-success">
    ทำรายการสำเร็จ !
  </div>
</div>

</div> 

<?php include 'footer.php' ;?>

<script >

	// var regexp = /^[0-9]+([,.][0-9]+)?$/g;
	var _tmpId ;	
	var rsTable ;	

	var updateTime = function () {
		var date = moment(new Date());
		$('#m-date').html(date.format('LL'));
		$('#m-time').html(date.format('HH:mm:ss'));
		// datetime.html(date.format('dddd, MMMM Do YYYY, h:mm:ss a'));
	};


	function check() {
		var b= $(window).height();  
		// $("#box-1").css("height",b-349);
		$("#box-2").css("height",b-225);
		// $("#result-table").css("height",b-224);

 		// console.log('window: ', b);

		// GoInFullscreen($("html").get(0));
		setTimeout(function(){

			 buildTable(b-419); 

			 doSearch();
		
		},200);

		
	}

	window.onresize = function(event) {

		check();


	};


	function buildTable(vheight) {
	 	rsTable = $('#result-table').DataTable({
			scrollY:     vheight,
			//  scrollCollapse: true,
			searching:false,
			paging:   false,
			data:[],
		    columns: [
				{ 
					 "data": "sorder",
					 "fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
						$(nTd).html(++iRow);
					}
	            },
		     	{ 
		     		"data": "product_ID"
					 , "className": "col-id" 
	            },
		     	{ 
		     		"data": "product_Name"
	            },
		     	{ 
					 "data": "qty"
					 , "className": "col-qty" 
	            },
				{ 
					"data": "unit_name"
			    },
				{ 
					"data": "sell_price"
					// , render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
					,"fnCreatedCell" : function(nTd, sData, oData, iRow, iCol) {
						var txt =  oData['sell_price'];
						if(oData['wholesale_flg'] == "1" && getPriceTxt(oData['qty']) >= getPriceTxt(oData['qty_condition']) ){
							txt = "<span class='col-sp-price'>" + oData['wholesale_price'] + "</span>"
						}
						$(nTd).html(txt);
					}

			   },
			   { 
					"data": "discount" , "className": "col-discount" 
					, render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
			   },
		     	{ 
					 "data": "total_price"
					 , render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
	            } 
		      
		    ],
		    "aoColumnDefs": [
		      { "sClass": "text-center", "aTargets": [0,1,4,5,6,7] },
			  { "orderable": false, "targets": [1,2,3,4,5,6,7]}
		    ],
			// ordering: false,
			destroy: true,
			rowCallback: function (row, data) {},
			info:     false,
			language : DT_TH['language'] 
		 });  

	
		//   rsTable.fnAdjustColumnSizing();

	}

	// function GoInFullscreen(element) {
	// 	if(element.requestFullscreen)
	// 		element.requestFullscreen();
	// 	else if(element.mozRequestFullScreen)
	// 		element.mozRequestFullScreen();
	// 	else if(element.webkitRequestFullscreen)
	// 		element.webkitRequestFullscreen();
	// 	else if(element.msRequestFullscreen)
	// 		element.msRequestFullscreen();
	// }
 



//    var _data = [] ;

	var dataList = [];


	function calPrice(){

		// $('#p-total').val();
		// var total_sum = $('#p-total-sum').val();
		var disc = getPriceTxt($('#p-disc').val());
		var pay =  getPriceTxt($('#p-pay').val());
		var dtype = $('#p-disc-type').val();

		
		// $('#p-change').val();

		var total_price = 0;
		var total_sum = 0;
		var total_change = 0;
		var total_dis = 0;
		dataList.forEach(data => {
			// console.log(data);
			var price =  getPriceTxt(data['sell_price']) ;
			if(data['wholesale_flg'] == "1" &&   getPriceTxt(data['qty']) >=  getPriceTxt(data['qty_condition']) ){
				price  = getPriceTxt(data['wholesale_price']) ;
			}

			data['total_price'] = (getPriceTxt(data['qty']) * price) - getPriceTxt(data['discount']);

			total_price += getPriceTxt(data['total_price']) ;
		});

		if(dtype == 1){
			total_dis =  disc;
		}else{
			total_dis =  (disc*total_price)/100;
		}

		total_sum = (total_price - total_dis);

		if(pay>0){
			total_change = (pay - total_sum);
		}

		

		$('#p-total').val(nformat(total_price.toFixed(2)));
		$('#p-total-dis').val(nformat(total_dis.toFixed(2)));
		$('#p-total-sum').val(nformat(total_sum.toFixed(2)));
		$('#p-change').val(nformat(total_change.toFixed(2)));

	}
	


	function loadProduct(name){
		
		if(name.trim()==""){
			swal("","โปรดระบุ รหัสสินค้า/บาร์โค้ด !", "warning");
			$('#search').focus();
			return false;
		}

 		$.ajax({
			type: 'POST',
			async : false,
			data: { 
				method: "search_sell",
				ptype: $('#p-type').val(),
				name: name,
			},
            url: 'service/product_service.php',
            success: function(data) {
				// console.log(data);
				
				if(data.length > 0){
					// dataList.push(data[0]);
					var vdata = data[0];
					// vdata['sorder'] = dataList.length+1;
					var isdup = true;
					dataList.forEach(dt => {
						 if(dt['product_ID'] == vdata['product_ID']){
							 var new_qty =  parseInt(dt['qty']) + parseInt(vdata['qty']);
							 dt['qty'] = new_qty;
							 dt['qty_condition'] =  vdata['qty_condition'] ;
							 dt['wholesale_flg'] =  vdata['wholesale_flg'] ;
							 dt['wholesale_price'] =  vdata['wholesale_price'] ;
							 dt['sell_price'] =  vdata['sell_price'] ;
							 isdup = false;
						 } 
					});

					if(isdup){ 
						dataList.push(vdata);
					}

				}else{
					swal("","ไม่พบรายการสินค้า !", "warning");
					$('#search').focus();
				}
            }
		});




	}



	function doSearch(){
		
		loadReturnList();
		
		var so = 1;
		dataList.forEach(dt => {
			dt['sorder'] = so++;
		});

		calPrice();

		rsTable.clear().draw();
		rsTable.rows.add(dataList).draw();
		rsTable.order( [ 0, 'desc' ] ).draw();

		$('#search').focus().val("");

		$('#total-txt').html(dataList.length);

		if(dataList.length > 0 ){
			$('#p-type').prop('disabled', true);
			$('#p-disc').prop('disabled', false);
			$('#p-disc-type').prop('disabled', false);
			$('#p-pay').prop('disabled', false);
		}else{
			$('#p-disc').prop('disabled', true);
			$('#p-disc-type').prop('disabled', true);
			$('#p-pay').prop('disabled', true);
			$('#p-type').prop('disabled', false);
			$('#cal-form')[0].reset(); 
		}
		
		
	};

	function validItem() {	
		if(rsTable.data().length > 0){
			return true;
		}else{
			swal("","ไม่พบรายการสินค้า !", "warning");
			return false;
		}

	};


	function clearAll(){
		if(validItem()){
			swal({
				title: "คุณต้องการ ( ลบสินค้าทั้งหมด ) ใช่หรือไม่ ?",
				type: "warning",
				showCancelButton: true,
				// closeOnConfirm: false  ,
				focusConfirm: true,
				showLoaderOnConfirm: true
			}, function () {

				
				dataList = [] ;

				doSearch();

			});		
		}

	}

	 function delItem(){
		if(rsTable.data().length > 0 &&  rsTable.$('tr.selected').hasClass('selected')){
			var rowi = rsTable.row('.selected').index();
			dataList.splice(rowi, 1); 
			var data = rsTable.row('.selected').data();
			$.notify(" ลบสินค้า [ "+data['product_Name']+" ] สำเร็จ !", "info");

			 doSearch();
		}else{
			swal("","กรุณาเลือกรายการสินค้า !", "warning");
		}
	 }

	$(document).keydown(function(e) {
			// e.preventDefault();
			// console.log('keyCode: ', e.keyCode); 
			if (e.keyCode === 27){
				$("#search").focus().val('');
			}

		var is_modal = $('#editProductModal,#restProductModal,#finishModal,.sweet-alert').is(':visible');
			// console.log('is_modal: ', is_modal);
		if(!is_modal){

			// console.log('keyCode: ', e.keyCode);
			if (e.keyCode >= 112 && e.keyCode <= 123 ){
				e.preventDefault();
			}

			if (e.keyCode === 38){
				$("#search").focus();
			}
			if (e.keyCode === 37){
				$("#p-disc").focus();
			}
			if (e.keyCode === 39){
				$("#p-pay").focus();
			}
			if (e.keyCode === 39){
				$("#p-pay").focus();
			}
			if (e.keyCode === 46){
				delItem();
			}
			if (e.keyCode === 112){
				e.preventDefault();
				doSellBreak();
			}
			if (e.keyCode === 113){
				doProductRestReturn();
			}
			if (e.keyCode === 115){
				openModalProduct();
			}
			
			if (e.keyCode === 116){
				doProductReturn();
			}
			
			if (e.keyCode === 120){
				e.preventDefault();
				if(validItem()){
					doSaveSubmit(false);
				}
			}

			if (e.keyCode === 123){
				e.preventDefault();
				if(validItem()){
					doSaveSubmit(true);
				}
			}

		}

		// console.log('1');

		selfin = true;
		if (e.keyCode === 13 && $('#finishModal').is(':visible')){
			var is_modal = $('#finishModal').is(':visible');
			$("#finishModal").modal('hide'); 
			$("#search").focus();
			// console.log('2');
			selfin =false;
		}

			// check();
	});

	var selfin = true;

	$("#search").on('keyup', function (e) {

		// console.log('3');

		var is_modal = $('#editProductModal,#restProductModal,#finishModal,.sweet-alert').is(':visible');
		if (e.keyCode === 13 && !is_modal && selfin) {

			var name = $('#search').val();
			// console.log('4');
			if(name.trim()==""){
				swal("","โปรดระบุ รหัสสินค้า/บาร์โค้ด !", "warning");
				$('#search').focus();
				return false;
			}


			var reg = new RegExp('^[a-zA-Z0-9.]+$');
			if (!reg.test(name)){
				swal("","กรุณาเปลี่ยนภาษา !", "warning");
				$('#search').focus().val('');
				return false;
			}
			

			loadProduct(name);

			doSearch();
		}

		// if ($('#finishModal').is(':visible')){
		// 	$("#finishModal").modal('hide'); 
		// }


	});



	function saveSubmit(sale_status, sale_type, print){
		var data = {
			saleType :	sale_type,
			priceType :	$("#p-type").val(),
			total_amount :	$("#p-total-sum").val(),
			total_discount : $("#p-total-dis").val(),
			sale_status :	sale_status,
			user_id : '<? echo $pos_user_id?>',
			pay : getPriceFormat($("#p-pay").val()),
			change : $('#p-change').val(),
			items: JSON.stringify(dataList)  
		 }

		//  console.log(data);
		
		
		$.ajax({
				data: data,
				type: "post",
				async : false,
				url: "service/sell_save.php?method=save",
				success: function(rdata){

					// var nalert = $(".alert-container") ;
					// nalert.slideDown();
					// setTimeout(function() {
					// 	nalert.slideUp();
					//  }, 2000);

					if(print){
						doPrintSlip	(rdata['inv_no'],data['pay'],data['change'] )
					}

					dataList = [] ;

					swal.close();

					doSearch();
					
					if(print && sale_status == 'S'){
						
						data['inv_no'] = rdata['inv_no'];
						
						_PDATA = data;
						openModalFinish(data);

					}else{
						var nalert = $(".alert-container") ;
						nalert.slideDown();
						setTimeout(function() {
							nalert.slideUp();
						}, 2000);
					}

					// $("#search").focus();

					$("#p-type").val('P0');

				}
				
		});
	}


    function doPrintSlip(inv_no,pay,change){
		var data = {
			inv : inv_no,
			pay : pay,
			change : change
		 }

		$.ajax({
			data :data,
			type: "post",
			url: "print.php",
			success: function(rs){
				// $("#return-count-txt").html(rs);
			}
		});

	}

	function doSaveSubmit(print){

		if (  getPriceTxt($("#p-pay").val()) <= 0){
			swal("","กรุณากรอกจำนวนเงินให้ถูกต้อง !", "warning");
			$("#p-pay").focus();
			return false;
		}

		if(_PRINT_CONFIRM>0){
			swal({
				title: "คุณต้องการ ( บันทึกการขายสินค้าทั้งหมด ) ใช่หรือไม่ ?",
				type: "warning",
				showCancelButton: true,
				closeOnConfirm: false  ,
				animation: false
			}, function () {
				saveSubmit('S' , 'INV', print);
			});	
		}else{
			saveSubmit('S' , 'INV', print);
		}
	}

	$("#p-pay").on('keyup', function (e) {
		if(validItem()){

			if (e.keyCode === 13) {
					doSaveSubmit(true);
			}

			calPrice();

		}else{
			$("#p-pay").val('');
		}


	});

	$("#p-disc").on('keyup', function (e) {
		if (e.keyCode === 13) {
			if(validItem()){
				$("#p-pay").focus();
			}
		}

		calPrice();
	});

	$('#p-disc-type').change( function () {
		calPrice();
	} );


	function checkKeyboard(ob,e){
        re = /\d|\w|[\.\$@\*\\\/\+\-\^\!\(\)\[\]\~\%\&\=\?\>\<\{\}\"\'\,\:\;\_]/g;
      a = e.key.match(re);
      if (a == null){
		// swal("","กรุณาเปลี่ยนภาษา !", "warning");
        // alert('Error 2:\nNon English keyboard layout is detected!\nSet the keyboard layout to English and try to fill out the field again.');
        // ob.val('');
		// e.preventDefault();
        return false;
      }
      return true;
    } 


	function nformat(num) {
		var num_parts = num.toString().split(".");
		num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		// num_parts[1] = parseFloat(num_parts[1]).toFixed(2);
		return num_parts.join(".");
	}

  	$('#result-table').on( 'click', 'tr', function () {
		rsTable.$('tr.selected').removeClass('selected');
		$(this).addClass('selected');
	} );
	

  	$('#result-table').on( 'dblclick', 'tr td', function () {
  	// $('#result-table').on( 'dblclick', 'tr td:eq(3)', function () {
		if(validItem()){
			var data = rsTable.row( this ).data();

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

						//document.getElementById('my-input').focus();
 
						data['qty'] = getPriceTxt(inputValue);
						doSearch();
						swal.close();

					});

				}else if($(this).hasClass('col-discount')){

					swal({
						html:true,
						title: "<i class='title'>แก้ไขส่วนลด</i>",
						text: data['product_Name'] ,
						type: "input",
						inputValue :  data['discount'] ,
						focusConfirm: true,
						showCancelButton: true,
						closeOnConfirm: false,
						animation: false
						// animation: "slide-from-top"
						// inputPlaceholder: "Write something"
						},
						function(inputValue){
						if (inputValue === false) return false;

						if (getPriceTxt(inputValue) < 0 ) {
							swal.showInputError("ระบุจำนวนให้ถูกต้อง !");
							return false
						}

						data['discount'] = getPriceTxt(inputValue);
						doSearch();
						swal.close();

					});

				}
	 
				$('.sweet-alert input').select();
		}
	} );
	


	
	$('#b-del').click( function () {
		delItem();
	} );
	
	$('#b-return').click( function () {
		doProductReturn();
	});

	$('#b-save').click( function () {
		if(validItem()){
			doSaveSubmit(false);
		}
	});
	
	
	$('#b-submit').click( function () {
		if(validItem()){
			doSaveSubmit(true);
		}
	});

	
	function doProductReturn(){
		if(rsTable.data().length > 0){
			swal("","ไม่สามารถทำรายการ [ คืนสินค้า ] ได้ในขณะนี้ กรุณาทำการบันทึก หรือ ลบสินค้าทั้งหมด !", "warning");
			return false;
		}else{
		 	location= 'return.php';
		}
	}

	function doProductRestReturn(){
		if(rsTable.data().length > 0){
			swal("","ไม่สามารถทำการ [ เรียกคืนการขาย ] ได้ในขณะนี้ กรุณาทำการบันทึก หรือ ลบสินค้าทั้งหมด !", "warning");
			return false;
		}else{
			openModalProductRest();
		}
	}
	
	$('#b-sell-return').click( function () {
		doProductRestReturn();
	} );
	
	
    function loadReturnList(){
		var data = {
			user_id : '<? echo $pos_user_id?>',
		 }

		$.ajax({
			data :data,
			type: "post",
			url: "service/product_service.php?method=return_count",
			success: function(rs){
				$("#return-count-txt").html(rs);
			}
		});

	}


	function doSellBreak(){
		if(validItem()){

			if(_REST_CONFIRM>0){
				swal({
					title: "คุณต้องการพักการขาย ใช่หรือไม่ ?",
					type: "warning",
					showCancelButton: true,
					focusConfirm: true,
					closeOnConfirm: false  ,
					animation: false
				}, function () {
					saveSubmit('W','TMP', false);
				});	

			}else{
					saveSubmit('W','TMP',false);
			}
			
		}
	}


	$('#b-sell-break').click( function () {
		doSellBreak();
	});
	
	
	$('#btn-product').click( function () {
		openModalProduct();
	});
	
	

	// $('.sweet-alert input').keypress( function () {
	// 	console.log(this.val());
	// 		// return getInteger(this.val());
	// });
	

	$(document).ready(function(){

		$("#menu-main").addClass("active"); 

		check();

		updateTime();

		 setInterval(updateTime, 1000);

		 $("#search").focus().val('');
 
		$(".alert-container").hide();
		
		$("input").attr("autocomplete", "off");
	 
		
		$('.modal').on('hidden.bs.modal', function () {
			$("#search").focus().val('');
		})
		
		 
	});

//   window.addEventListener('load', function() {
//         window.parent.postMessage(document.body.clientWidth + ";" + document.body.clientHeight);
//     }, false);


</script>


<?php include 'sell_product_modal.php' ;?>

<?php include 'rest_product_modal.php' ;?>

<?php include 'sell_finish_modal.php' ;?>
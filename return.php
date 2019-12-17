<?php include 'header.php' ;?>

<? 

if($_SESSION['user_info']['fn1']!="1")
{
		echo "<script>alert(' คุณไม่มีสิทธ์เข้าใช้งาน !'); </script>";
		print "<meta http-equiv='refresh' content='0;URL=main.php'>";
		exit();
}

?>

<div class="content-wrapper">
	
	<!-- <section class="content"> -->

	<div class="row">

		<div class="col-md-12">
				<!-- Application buttons -->
				<div class="box box-widget">

					<div class="box-body bg-bw">

						 
							<a class="btn btn-app bg-red" id="b-return-all"    >
								<i class="fa fa-trash-o"></i> คืนสินค้าทั้งหมด (ยกเลิกบิล)
							</a>

						 
							<a class="btn btn-app bg-teal" id="b-refresh"    >
								<i class="fa fa-refresh"></i> ค้นหาอีกครั้ง (ล้างข้อมูล)
							</a>


							<a class="btn btn-app bg-purple pull-right" id="b-sell-return"  onclick="location='main.php'">
							<!-- <span class="badge bg-green">0</span> -->
								<i class="fa  fa-barcode"></i> กลับสู่การขายสินค้า (ออก)
							</a>

							<!-- <a class="btn btn-app bg-maroon btn-right" id="b-sell-break" >
								<i class="fa  fa-history"></i> พักการขาย [F1]
							</a> -->
	
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
						<div class="col-xs-3">
							<label  class="control-label return-label">ระบุ [เลขที่ใบเสร็จ] </label>
						</div>

						<div class="col-xs-8">
							<div class="input-group">
								<span class="input-group-addon"> <strong> INV-  </strong>
								</span>
								<input type="text" class="form-control input-lg input-p"
								id="search" name="search" placeholder="เลขที่ใบเสร็จ " >
								<span class="input-group-btn">
									<button type="button" class="btn btn-info input-lg btn-lg" id="btn-search">
										<i class="fa fa-search"></i> ค้นหาใบเสร็จ [ENTER]</button>
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
								<dt>ยอดรวมทั้งหมด (บาท)</dt>
								<dd><input id="p-total-sum"   class="form-control input-price inline p-0" value="0.00"  readonly>  </dd>
								<!-- <dd>0.00</dd> -->
								<dt>ส่วนลดทั้งหมด (บาท)</dt>
								<dd><input id="p-disc"   class="form-control input-price inline p-0" value="0.00"  readonly >  </dd>
								<!-- <dd>0.00</dd> -->
								
							</dl>
						</div>	

						 <input id="p-total-dis"  type="hidden" value="0" > 
							
 

					</div>

				</form>

			</div>
			

		</div>
			
	</div>

 
<!-- -------------------------------------- -->

    <!-- </section> -->
<div class="alert-container">
  <div class="alert alert-success">
    ทำรายการสำเร็จ !
  </div>
</div>

</div> 




<?php include 'footer.php' ;?>

<script >

	// var regexp = /^[0-9]+([,.][0-9]+)?$/g;
	var rsTable ;	

 

	function check() {
		var b= $(window).height();  
		// $("#box-1").css("height",b-349);
		// $("#box-2").css("height",b-225);
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
					 "data": "product_ID",
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
					, render: $.fn.dataTable.render.number( ',', '.', 2, '' ) 
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
		      { "sClass": "text-center", "aTargets": [0,1,4,5,6,7] }
		    ],
			ordering: false,
			destroy: true,
			rowCallback: function (row, data) {},
			info:     false,
			language : DT_TH['language'] 
		 });  


	
		//   rsTable.fnAdjustColumnSizing();

	}
 

//    var _data = [] ;

	var dataList = [];

 
 function getPriceTxt(text){
		if(isNaN(parseFloat(text))){
			return 0;
		}else{
			return parseFloat(text);
		}
	}

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
			// console.log(data['total_price']);
			data['total_price'] = (getPriceTxt(data['qty']) * getPriceTxt(data['sell_price'])) - getPriceTxt(data['discount']);

			total_price += getPriceTxt(data['total_price']) ;
			// total_dis += getPriceTxt(data['discount']) ;
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

		

		$('#p-total').val(priceFormat(total_price.toFixed(2)));
		$('#p-total-dis').val(priceFormat(total_dis.toFixed(2)));
		// $('#p-total-sum').val(nformat(total_sum.toFixed(2)));
		$('#p-change').val(priceFormat(total_change.toFixed(2)));

	}
	
	function getInteger(str){
		return /^\d+$/.test(str);
	}


	
	function loadProduct(name){
		
		if(name.trim()==""){
			swal("","โปรดระบุ เลขที่ใบเสร็จ !", "warning");
			$('#search').focus();
			return false;
		}

 		$.ajax({
			type: 'POST',
			async : false,
			data: { 
				method: "search_sell_list",
				saleHeader_ID: name,
			},
            url: 'service/product_service.php',
            success: function(data) {
				
				if(data.length > 0){
					dataList = data;

					doSearch();
				}else{
					swal("","ไม่พบ เลขที่ใบเสร็จ !", "warning");
					$('#search').focus();
				}
				
            }
		});


	}



	function doSearch(){
		 

		calPrice();

		rsTable.clear().draw();
		rsTable.rows.add(dataList).draw();

		// $('#search').val("");

		$('#total-txt').html(dataList.length);

		if(dataList.length > 0 ){
			$('#search').prop('disabled', true);
			$('#btn-search').prop('disabled', true);

			$('#p-disc').val(priceFormat(dataList[0]['total_discount']));
			$('#p-total-sum').val(priceFormat(dataList[0]['total_amount']));
			// $('#b-return-all').attr('disabled', false);
		}else{
			$('#search').prop('disabled', false);
			$('#btn-search').prop('disabled', false);
		// 	$('#p-type').prop('disabled', false);
			$('#cal-form')[0].reset(); 
		}
		
		
	};


		
	$('#btn-search').click( function () {
			var name = $('#search').val();
			loadProduct(name);

	});
	


	function validItem() {	
		if(rsTable.data().length > 0){
			return true;
		}else{
			swal("","ไม่พบรายการสินค้า !", "warning");
			return false;
		}

	};

 
	 function delItem(){
		if(rsTable.data().length > 0 &&  rsTable.$('tr.selected').hasClass('selected')){
			var rowi = rsTable.row('.selected').index();
			dataList.splice(rowi, 1); 
			 doSearch();
		}else{
			swal("","กรุณาเลือกรายการสินค้า !", "warning");
		}
	 }


	$(document).keydown(function(e) {
			// e.preventDefault();
			// console.log('keyCode: ', e.keyCode);
			if (e.keyCode >= 112 && e.keyCode <= 123 ){
				e.preventDefault();
			}

			// if (e.keyCode === 38){
			// 	$("#search").focus();
			// }
			// if (e.keyCode === 37){
			// 	$("#p-disc").focus();
			// }
			// if (e.keyCode === 39){
			// 	$("#p-pay").focus();
			// }
			// if (e.keyCode === 39){
			// 	$("#p-pay").focus();
			// }
			// if (e.keyCode === 46){
			// 	delItem();
			// }

			// check();
	});

	$("#search").on('keyup', function (e) {
		if (e.keyCode === 13) {
		 
			var name = $('#search').val();
			loadProduct(name);
		}
	});

	

	$('#b-return-all').click( function () {

		if(rsTable.data().length > 0){
			doReturn();
		}else{
			swal("","ไม่พบรายการ คืนสินค้า !", "warning");
		}



	});
	

	$('#b-refresh').click( function () {
			location = 'return.php';

	});
	
	function saveSubmitReturn(){
		var data = {
			saleHeader_ID : "INV-"+ $("#search").val(),
			user_id : '<? echo $pos_user_id?>',
			items: JSON.stringify(dataList)  
		 }

		 console.log(data);
		
		$.ajax({
				data: data,
				type: "post",
				async : false,
				url: "service/sell_save.php?method=invoice_return",
				success: function(data){
 
						dataList = [] ;

						$('#search').val("");

						doSearch();

						swal.close();

						var nalert = $(".alert-container") ;

						nalert.slideDown();
						setTimeout(function() {
							nalert.slideUp();
						 }, 2000);
						
				}
		});
	}



	function doReturn (type){
 
		swal({
				title: "คุณต้องการ ( คืนสินค้าทั้งหมด และ ยกเลิกบิล ) ?",
				type: "warning",
				showCancelButton: true,
				closeOnConfirm: false  ,
				showLoaderOnConfirm: true
			}, function () {

				saveSubmitReturn();
 
			});	

	}
 



	$(document).ready(function(){

		$("#menu-main").addClass("active"); 

		$("#search").on('keyup', function (e) {
				if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')
		});


		// $("#saleHeader_ID").inputFilter(function(value) {
		// 	return /^\d*$/.test(value);
		// });

		check();

		// updateTime();

		// //  setInterval(updateTime, 1000);

			$(".alert-container").hide();
 

		 
	});


</script>
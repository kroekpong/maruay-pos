<?php include 'header.php' ;?>

        <div class="content-wrapper">

            
         <section class="content">


     <div class="row">  <div class="col-lg-12">
     

  <div class="box box-primary"  style="" id="rs_table"> 
			 <div class="box-header with-border">
	              <h4 class="box-title text-center"> <i class="fa fa-plus"></i> เพิ่มรายการ </h4>
	            </div>
		 
		 	<div class="box-body" id="rs-body"> 


	<form name="form1" id="myform" method="post" action="service/product_save.php" 
    data-toggle="validator" role="form" enctype="multipart/form-data">


	<!-- <input type="text" class="form-control " name="txtName" id="txtName"  placeholder="ระบุรหัสรายการ" class="required"  >
    <br> -->
	<!-- ภาพที่ : <input type="file" name="fileUpload1" accept="image/*"><br> -->
	<!-- ภาพที่ 2 : <input type="file" name="fileUpload2" accept="image/*"><br>
	ภาพที่ 3 : <input type="file" name="fileUpload3" accept="image/*"><br>
	ภาพที่ 4 : <input type="file" name="fileUpload4" accept="image/*"><br> -->
 


        <!-- <div class="box-body"> -->
                <div class="form-group">
                  <label for=" "> รหัสรายการ *</label>
                  <input type="text" class="form-control " name="txtName" id="txtName" 
                  placeholder="รหัสรายการ" class="required" required >
                </div>
                 
                <div class="form-group">
                  <label for=" ">ไฟล์รูปถ่าย *</label>
                  <!-- <input type="file" id="exampleInputFile"> -->
                  <input type="file" name="fileUpload1" accept="image/*" required>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
                <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label> -->
                <!-- </div> -->
              <!-- </div> -->

   
   <div class="box-footer">
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                <input name="hdnLine" type="hidden" value="4">
                 <button type="button" class="btn btn-primary btn-flat" onclick="doSave()">บันทึก</button>
              </div>


	</form>




 </div> </div>





 </div> </div>


  </section>
            






 </div>


 <script>


  $('#myform').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        }, fields: {
            txtName: {
                message: 'รหัสรายการ มีอยู่แล้วในระบบ',
                validators: {
                    notEmpty: {
                        message: 'กรุณาระบุ รหัสรายการ !'
                    },
                    remote: {
                        url: 'service/product_service.php?method=check',
                        type: 'POST',
                        delay: 500  
                    }
                    // stringLength: {
                    //     min: 6,
                    //     max: 30,
                    //     message: 'The username must be more than 6 and less than 30 characters long'
                    // },
                    // regexp: {
                    //     regexp: /^[a-zA-Z0-9]+$/,
                    //     message: 'The username can only consist of alphabetical and number'
                    // },
                    // different: {
                    //     field: 'password',
                    //     message: 'The username and password cannot be the same as each other'
                    // }
                }
            }
        }
    });


//   $( "#txtName" ).blur(function() {

//     var recipientnameval = $("#txtName").val();

//     recipientnameval = recipientnameval.toLowerCase();
//     var errorDiv = "<div class='form-error alert alert-danger fade in'>Please Insert valid data<div>"
//     if(recipientnameval=='abc')
//     {
//         // $('.form-group').append(errorDiv);
//     }else{
//         //  $('.form-error').remove();
//     }
// });


function doSave(){

    // if($("#myform").validate()) {
    //     return true;
    // } else {
    //     return false;
    // }

    if($('#txtName').val().trim() == "" ){
        swal('กรุณาระบุ รหัสรายการ !');
        return;
    }

    if ($('input[type=file]').get(0).files.length == 0 
        //  && $('input[type=file]').get(1).files.length == 0
        //  && $('input[type=file]').get(2).files.length == 0
        //  && $('input[type=file]').get(3).files.length == 0
    ) {
        swal('กรุณาระบุ รูปภาพ !');
        return;
    }

	swal({
			title: "ยืนยัน",
			text: "บันทึกรายการ ?",
			type: "info",
			showCancelButton: true,
            closeOnConfirm: false ,
            showLoaderOnConfirm: true
			}, function () {
                 $("#myform").submit();

     }); 
 


}


</script>
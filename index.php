<!-- <META HTTP-EQUIV="Refresh" CONTENT="0;URL=login.php"> -->


<script>


		//  window.open('../jsp/popupPage.jsp','targetWindow',
		//  'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1050,height=2000
_URL = "login.php";

var params  = 'width='+screen.width;
 params += ', height='+screen.height;
 params += ', top=0, left=0'
 params += ', fullscreen=yes';
 params += ', directories=no';
 params += ', location=no';
 params += ', menubar=no';
 params += ', resizable=no';
 params += ', scrollbars=no';
 params += ', status=no';
 params += ', toolbar=no';
 
var popup = window.open(_URL, "_blank", params);
if (popup == null)
   alert('Please change your popup settings');
else  {
  popup.moveTo(0, 0);
  popup.resizeTo(screen.width, screen.height);
}


</script>

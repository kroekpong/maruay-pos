<?php

include("constant.php");

?>

<br>phpversion : <?echo phpversion(); ?>
<br>pos_version : <?echo $pos_version; ?>
<br>pos_id : <?echo $pos_id; ?>
<br>pos_name : <?echo $pos_name; ?>
<br>printer : <?echo $printer; ?>
<br>printer_invoice : <?echo $printer_invoice; ?>
<br>printer_status : <?echo $printer_status==1? 'OK':'FAIL'; ?>
<br>pos_print_cf : <?echo $pos_print_cf; ?>
<br>pos_rest_cf : <?echo $pos_rest_cf; ?>
<br>$SETTINGS : <?echo json_encode($SETTINGS); ?>
<br>$connection : <?echo  ($connection==true); ?>

<br>$print check setup: <?
$handle = printer_open($printer);
var_dump($handle); ?>
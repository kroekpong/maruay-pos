<?php
  $handle = fopen("PRN", "w"); // note 1
  fwrite($handle, 'text to printer'); // note 2
  fwrite($handle, chr(27).chr(112).chr(0).chr(100).chr(250)); // note 3
  fclose($handle); // note 4
?>
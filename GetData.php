<?php
$conn=new mysqli("localhost:3307","root","Asdfg#143","nodemcu");
if($conn->connect_error){
  die("Failed to connect ".$conn->connect_error);
}
$sqlstoget="select * from medicine_timing where Status='ACTIVATED'";
$resulttoget=$conn->query($sqlstoget);
$rowtoget=mysqli_fetch_assoc($resulttoget);
$timeindatabase=$rowtoget['Time'];

//time zone set for INDIA
date_default_timezone_set('Asia/Kolkata');
//getting hour converting it into string
$hh = strval(date('H'));
//getting Minute converting it into string
$mm = strval(date('i'));
//manipulating time HH:MM in 24-hour format as same format time stored in database
$time = $hh . ":" . $mm;
//echo $time;
$status = 8;
if ($time==$timeindatabase){
  $status = 1;
}
echo $status;
?>
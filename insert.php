<?php
session_start();
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$address=$_POST['address'];
$mname=$_POST['mname'];

$input_date=$_POST['dob'];
$dob=date("Y-m-d",strtotime($input_date));

$phone=$_POST['phone'];
$sex=$_POST['sex'];

$education=$_POST['education'];
$cif=$_POST['cif'];
$acc=$_POST['acc'];
$branch_name=$_POST['branchname'];
$branch_code=$_POST['branchcode'];
$bank_name=$_POST['bank'];
$ifsc=$_POST['ifsc'];

$uid=$_SESSION['userid'];

 
$con=pg_connect("host=localhost dbname=groups user=postgres password=postgres");
        $res=pg_query($con,"select * from users");

//echo '$fname';

if($fname){
    $res=pg_query($con,"update users set fname='$fname' where uname=$uid");
}
if($mname){
    $res=pg_query($con,"update users set mname='$mname' where uname=$uid");
}
if($lname){
    $res=pg_query($con,"update users set lname='$lname' where uname=$uid");
}
if($dob){
    $res=pg_query($con,"update users set dob='$dob' where uname=$uid");
}
if($address){
    pg_query($con,"update users set address='$address' where uname=$uid");
}
if($age){
    $res=pg_query($con,"update users set age=$age where uname=$uid");
}
if($phone){
    $res=pg_query($con,"update users set phone=$phone where uname=$uid");
}
if($sex){
    $res=pg_query($con,"update users set sex='$sex' where uname=$uid");
}

if($education){
    $res=pg_query($con,"update users set education='$education' where uname=$uid");
}
if($cif){
    $res=pg_query($con,"update users set cif=$cif where uname=$uid");
}
if($acc){
    $res=pg_query($con,"update users set accno=$acc where uname=$uid");
}
if($branch_name){
    $res=pg_query($con,"update users set branch_name='$branch_name' where uname=$uid");
}
if($branch_code){
    $res=pg_query($con,"update users set branch_code=$branch_code where uname=$uid");
}
if($bank_name){
    $res=pg_query($con,"update users set bank_name='$bank_name' where uname=$uid");
}
if($ifsc){
    $res=pg_query($con,"update users set ifsc='$ifsc' where uname=$uid");
}





//$res=pg_query($con,"update user set fname='$fname',lname='$lname',age=$age,address='$address' where userid=$uid");
echo "SUCCESSFULLY SAVED";
header("Refresh:5; url=edituser.php");

?>

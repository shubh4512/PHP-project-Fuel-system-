<?php
session_start();
$user=$_POST['user'];
$pass=$_POST['pass'];
$check=0;
$id;

  //$con=pg_connect("localhost","root","") or die(pg_error($con));
  //$conn=pg_select_db($con,"groups");

$con=pg_connect("host=localhost dbname=groups user=postgres password=postgres");
$res=pg_query($con,"select * from admin");

while($row=pg_fetch_array($res)){
    if($row[0]==$user && $row[1]==$pass){
        $check=1;
        $_SESSION["adminuser"]=$user;
        header("Refresh:0,url=viewsheet.php?user=$user");
    }     
    }
if($check==0){
    echo "Invalid username or password";
    header("Refresh:2;url=adminlogin.html");
}
?>
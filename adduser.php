
<html>
    <head></head>

<body>

<?php

$user=$_POST['user'];
$pass=$_POST['password'];

$fname=$_POST['fname'];
$lname=$_POST['lname'];

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


$check=0;
$id;





  $con=pg_connect("host=localhost dbname=groups user=postgres password=postgres");
   $res=pg_query($con,"select *from users");
while($row=pg_fetch_row($res))
{
    if($row[1]==$user)
    {
        $check=1;
        echo "Sorry username already used";
        header("Refresh: 15 ;url=adduser.html");
    }     
}
    if($check==0)
    {
        pg_query($con,"insert into users (uname,password) values ('$user','$pass')");

        if($fname)
        {
            pg_query($con,"update users set fname='$fname' where uname='$user'");
        }
       
        if($lname)
        {
            pg_query($con,"update users set lname='$lname' where uname='$user'");
        }
        
        if($address)
        {
            pg_query($con,"update users set address='$address' where uname='$user'");
        }
       
        if($mname)
         {
            pg_query($con,"update users set mname='$mname' where uname='$user'");
         }
         if($dob)
         {
            pg_query($con,"update users set dob='$dob' where uname='$user'");
         }
        if($phone)
         {
            pg_query($con,"update users set phone=$phone where uname='$user'");
         }
        if($sex)
         {
            pg_query($con,"update users set sex='$sex' where uname='$user'");
         }
        
        if($education)
        {
            pg_query($con,"update users set education='$education' where uname='$user'");
        }
        if($cif)
        {
            pg_query($con,"update users set cif=$cif where uname='$user'");
        }
        if($acc)
        {
            pg_query($con,"update users set accno=$acc where uname='$user'");
        }
        if($branch_name)
        {
            pg_query($con,"update users set branch_name='$branch_name' where uname='$user'");
        }
        if($branch_code)
        {
            pg_query($con,"update users set branch_code=$branch_code where uname='$user'");
        }
        if($bank_name)
        {
            pg_query($con,"update users set bank_name='$bank_name' where uname='$user'");
        }
        if($ifsc)
        {
            pg_query($con,"update users set ifsc='$ifsc' where uname='$user'");
        }
       
        
        echo "successful signup";
    }


header("Refresh:2;url=edituser.php");
?>
</body>
</html>
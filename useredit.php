

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
    <a style="font-size: 20px;background-color: grey;border-radius: 5px; ">Admin home</a>
    <a href="viewsheet.php">View machine details</a>
    <a href="adduser.html">Add employee</a>
    <a href="edituser.php">Employee details</a>
    <a href="admindaily.php">Daily Sheet</a>
    <a href="logout.php" style="float:right; padding:3px;">logout</a>
</div><br>
<?php
$fname;
$mname;
$lname;
$address;

$phone;
$sex;

$education;
$cif;
$accno;
$branch_code;
$branch_name;
$bank_name;
$ifsc;


$uid=$_POST['uname'];

$_SESSION["userid"]=$uid;

 
$con=pg_connect("host=localhost dbname=groups user=postgres password=postgres");
$res=pg_query($con,"select * from users");
         



        while($row=pg_fetch_array($res))
        {
           //if($row[0]==$uid)
           //{
            
            $fname=$row[2];
            $lname=$row[4];
            
            $address=$row[5];
            $mname=$row[3];
            $viewdate=date("d-m-Y",strtotime($row[6]));
            $dob=$viewdate;
            $phone=$row[7];
            $sex=$row[8];   
           
            $education=$row[9];
            $cif=$row[10];
            $accno=$row[11];
            $branch_name=$row[13];
            $branch_code=$row[12];
            $bank_name=$row[14];
            $ifsc=$row[15];
          
            //}
        }
   

echo "$fname"   ;


echo ("<table border='1' class='stable'> ");

echo ("<tr><td colspan='2'>Personal details:</td></tr>
<form action='insert.php' method='POST'>
<tr><th>First name :</th><td><input type='text'  name='fname'  placeholder='$fname' >  </td></tr>
<tr><th>Middle name :</th><td><input type='text' name='mname'  placeholder='$mname' >  </td></tr>
<tr><th>Last name :</th><td><input type='text'   name='lname'  placeholder='$lname' >  </td></tr>");

if($dob)
{
 echo "<tr><th>DOB :</th><td> $dob </td></tr>";
}

echo(
"<tr><th>Update DOB :</th><td><input type='date' name='dob' ></td></tr>


<tr><th>Address :</th><td><input type='text' name='address' placeholder='$address'></td></tr>

<tr><th>Phone :</th><td><input type='number' name='phone' placeholder='$phone'></td></tr>
<tr><th>Sex :</th><td><select name='sex'>
<option value='' disabled selected>$sex</option>
<option value='Male'>Male</option>
<option value='Female'>Female</option>
<option value='Others'>Others</option>
</select></td></tr>


<tr><th>Education :</th><td><select name='education'>
<option value='' disabled selected>$education</option>
<option value='Matric'>Matric</option>
<option value='HS'>HS</option>
<option value='Graduate'>Graduate</option>
<option value='Post Graduate'>Post Grduate</option>
</select></td></tr>

<tr><td colspan='2'>Bank details: </td></tr>
<tr><th>CIF No :</th><td><input type='number' name='cif' placeholder='$cif'></td></tr>

<tr><th>A/C No :</th><td><input type='number' name='acc' placeholder='$accno'></td></tr>

<tr><th>Bank Name :</th><td><input type='text' name='bank' placeholder='$bank_name'></td></tr>

<tr><th>IFSC Code :</th><td><input type='text' name='ifsc' placeholder='$ifsc'></td></tr>

<tr><th>Branch Name :</th><td><input type='text' name='branchname' placeholder='$bank_name'></td></tr>

<tr><th>Branch Code :</th><td><input type='number' name='branchcode' placeholder='$branch_code'></td></tr>


</table>
<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class='sbutton' type='submit' value='Update details'>
</form>");

?>

</body>
</html>         
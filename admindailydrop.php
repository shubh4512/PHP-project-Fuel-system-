<?php
	session_start();
	if(!isset($_SESSION['adminuser']))
        {
            header("Refresh:2;url=adminlogin.html");
                die("LOGIN REQUIRED");
        }
?>
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
</div>
    <h1 >Daily report</h1>
<form action="#" method="POST">

Select which day's entry to be drop:
<select name="date">



  
<?php   
   $con=pg_connect("host=localhost dbname=groups user=postgres password=postgres");
   
     $count=0;
     $res=pg_query($con,"select distinct (udate) from m1");
     while($row=pg_fetch_array($res))
     {
        if($row[1]!='2018-05-31')
        {
          echo "<option value='$row[1]'>$row[0]</option>";
        }
    }
?>
</select>
&nbsp&nbsp;<input type="submit" value="delete" name="submit" class="sbutton">
</form>

<?php    
    if(isset($_POST['submit']))
    {
      $con=pg_connect("localhost","root","") or die(pg_error($con));
      $conn=pg_select_db($con,"groups");
      $input_date=$_POST['date'];
      $date=date("Y-m-d",strtotime($input_date));
      $res=pg_query($con,"delete from m1 where udate='$date'");
      $res=pg_query($con,"delete from m2 where udate='$date'");   
      echo "<script>document.writeln('ERROR 409*** SERVER UNDER CONSTRUCTION')</script>";
      header("Refresh:1;url=admindailydrop.php");
     }
?>


</body>
</html>
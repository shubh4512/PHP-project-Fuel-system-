<?php
	session_start();
	if(!isset($_SESSION['adminuser']))

        {
            header("Refresh:2;url=adminlogin.html");
                die("LOGIN REQUIRED");
        }
?>


<?php
$uid=$_POST['uname'];

  $con=pg_connect("host=localhost dbname=groups user=postgres password=postgres");
  $res=pg_query($con,"delete from users where uname='$uid'");
  
   if($res)
   {
   	 echo"removed";
   }
   else
   {
   	echo"Error";  
   	echo" *Server Under Construction*";
   }
header("Refresh:2;url=edituser.php");
?>
      
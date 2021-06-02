<?php


$con=pg_connect("host=localhost dbname=groups user=postgres password=postgres");

    if($con)
      {
        echo 'connected';
      }
    else
      {
        echo 'not connected';
      }

?>
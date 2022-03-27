<?php
    session_start();
    if(isset($_SESSION['username']) && !empty($_SESSION['username'])){

      if(isset($_GET['guide_id']) && !empty($_GET['guide_id'])){
            $guide_id=$_GET['guide_id'];

              require_once('db_connect.php');
            	$connect = mysqli_connect( HOST, USER, PASS, DB )
            		or die("Can not connect");

              $returnobj = mysqli_query( $connect, "DELETE FROM employee WHERE guide_id = $guide_id" )
                or die("Can not execute query");

              ?>
              <script>location.assign("guide_list.php");</script>
              <?php


        }
        else{
          ?>
          <script>alert("ID not found!");</script>
          <script>location.assign("guide_list.php");</script>
          <?php
        }
    }
    else{
      ?>
      <script>location.assign("login.php");</script>
      <?php
    }
?>

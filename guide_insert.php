<?php
    date_default_timezone_set( 'Asia/Dhaka' );

      if( isset($_FILES['gImage']) &&
          isset($_POST['name']) &&
          isset($_POST['nid_no']) &&
          isset($_POST['city']) &&
          isset($_POST['contact_no']) &&
          isset($_POST['bank_acc']) &&
          isset($_FILES['pv_Image']) &&
          !empty($_FILES['gImage']) &&
          !empty($_POST['name']) &&
          !empty($_POST['nid_no']) &&
          !empty($_POST['city']) &&
          !empty($_POST['contact_no']) &&
          !empty($_POST['bank_acc']) &&
          !empty($_FILES['pv_Image'])
        ){


          $name = $_POST['name'];
          $nid_no = $_POST['nid_no'];
          $city = $_POST['city'];
          $contact_no = $_POST['contact_no'];
          $bank_acc = $_POST['bank_acc'];



          if( isset($_POST['email']) &&
              isset($_POST['address']) &&
              !empty($_POST['email']) &&
              !empty($_POST['address'])
            ){
                $email = $_POST['email'];
                $address = $_POST['address'];
          }

          else {
            $email = 'empty';
            $addrees = 'empty';
          }

          $gImage=$_FILES['gImage'];
          $img_name=$gImage['name'];


          $img_tmp_path=$gImage['tmp_name'];
          $img_dst_path="gImage/$img_name";
          move_uploaded_file($img_tmp_path,$img_dst_path);

          $pv_Image=$_FILES['pv_Image'];
          $pv_img_name=$pv_Image['name'];

          $pv_img_tmp_path=$pv_Image['tmp_name'];
          $pv_img_dst_path="pv_Image/$img_name";
          move_uploaded_file($pv_img_tmp_path,$pv_img_dst_path);

          $joining_date = date('d-m-y');


          require_once('db_connect.php');
        	$connect = mysqli_connect( HOST, USER, PASS, DB )
        		or die("Can not connect");


          mysqli_query( $connect, "INSERT INTO guide VALUES(NULL, '$img_dst_path', '$name', $nid_no, $city, $contact_no, '$email', '$address', $bank_acc, '$pv_img_dst_path', '$joining_date', 0)")
            or die("Can not execute query");

          ?>
              <script>
              alert("Sent for validation.");
              location.assign("index.php");
              </script>
          <?php


        }
        else{
          ?>
          <script>
          alert("Please enter all required data");
          location.assign("guide_register.php");
          </script>

          <?php
        }

?>

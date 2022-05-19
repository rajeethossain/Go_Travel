<?php
$city = $_GET['city'];

try{

  $conn=new PDO("mysql:host=localhost:3306;dbname=go_travel;", "root", "");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $ex){
    ?>
    <script>alert("Database Error!");
    location.assign("index.php");</script>
    <?php
}

$sqlquary="SELECT* FROM area WHERE City_ID = $city";
$returnobj=$conn->query($sqlquary);
$returntable=$returnobj->fetchAll();

$string="";

 foreach($returntable as $row){

     $string=$string."<option value="."$row[Area_ID]".">"."$row[Area_Name]"."</option>";
}

echo  "$string";

?>

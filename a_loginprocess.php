<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(
        isset($_POST['username'])
        && isset($_POST['mypass'])
        && !empty($_POST['username'])
        && !empty($_POST['mypass'])
    ){

        $username=$_POST['username'];
        $pass=$_POST['mypass'];
        $access = 'admin';


        try{
            // PHP Data Object
            $conn=new PDO("mysql:host=localhost:3306;dbname=tcdc_db;","root","");
            ///setting 1 environment variable
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           // $enc_password = md5($pass);

            // checking Data
            $myquery="SELECT * FROM admin WHERE a_username = '$username' and password ='$pass'";


            $returnobj = $conn->query($myquery);  // the return object is pdo statement object

            if($returnobj->rowCount() == 1){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['access'] = $access;   //after session starts
                ?>
                <script>window.location.assign("guide_list.php");</script>
                <?php
            }
            else {
            ?>
                <script>alert("Wrong username and password.");</script>
                <script>window.location.assign("a_login.php");</script>
            <?php
            }

            }
            catch(PDOException $ex){
                ?>
                    <script>alert("Database error.");</script>
                    <script>window.location.assign("a_login.php");</script>
                <?php
            }
        }

    else
    {
        ?>
        <script>alert("Fill up all the information.");</script>
        <script>location.assign("a_login.php");</script>
    <?php
    }

}
else
{
    ?>
        <script>location.assign("a_login.php");</script>
    <?php
}


?>

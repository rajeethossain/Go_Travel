<?php

session_start();
if(
    isset($_SESSION['username'])
    && !empty($_SESSION['username'])
){
    unset($_SESSION['username']);
    session_destroy();

    ?>
        <script>alert("logged out successfully!");</script>
        <script>location.assign("index.html");</script>
    <?php

}
else{
    ?>
        <script>location.assign("index.html");</script>
    <?php
}

?>

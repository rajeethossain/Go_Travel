
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="Style/style.css">
</head>

<body>

    <form id="box" action="a_loginprocess.php" method="POST">

    <div style="font-size: 20px;margin: 10px;">Login As Admin</div>

        <label for="username">Username</label>:
        <input class="text" type="text" id="username" name="username">
        <br>
        <label for="mypass">Password</label>:
        <input class="text" type="password" id="mypass" name="mypass">
        <br>
        <br>
        <input id="button" type="submit" value="Log In">
        <input id="button" type="button" value="Back" onclick="login()">

        <script>
            function login(){
                location.assign('login.php');   ///default GET method
            }
        </script>
    </form>



</body>

</html>

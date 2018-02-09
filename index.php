<!DOCTYPE html>
<?php
session_start();

define("SERVER", "localhost");
define("USER", "root");
define("DB", "login");
define("PASS", "Illusion16");

$conn = mysqli_connect("SERVER", "USER", "DB", "PASS");

$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT * FROM users WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["user_id"] = $row['user_id'];
	} else {
	$message = "Invalid Username or Password!";
	}
} else {
    $result = mysqlI_query($conn,"SELECT * FROM users WHERE user_id='" . $_SESSION["phppot_demopage_459_user_id"] . "'");
    $row  = mysqli_fetch_array($result);
    ?>
    <form action="" method="post" id="frmLogout">
    <div class="member-dashboard">Welcome <?php echo ucwords($row['display_name']); ?>, You have successfully logged in!<br>
    Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
    </form>
    </div>
    </div>
    <?php }

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href='style.css'>
        <title>J-Addis</title>
        <style>

        </style>
    </head>
    <body>
        <form action="" method="post" id="frmLogin">
            <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
            <div class="field-group">
                <div><label for="login">Username</label></div>
                <div><input name="user_name" type="text" class="input-field"></div>
            </div>
            <div class="field-group">
                <div><label for="password">Password</label></div>
                <div><input name="password" type="password" class="input-field"> </div>
            </div>
            <div class="field-group">
                <div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>
            </div>
        </form>
    </body>
</html>

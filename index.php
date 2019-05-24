<?php
SESSION_START();

if(isset($_SESSION['eingeloggt'])) {
	header("Location: main.php");
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
require_once 'controller/abstractcontroller.php';
 
require_once 'class/template.php';
 
require_once 'controller/AdminController/AdminController.php';
require_once 'controller/UserController/UserController.php';
 
/* Model Klassen */
require_once 'model/player.php';
require_once 'model/userdata.php';

if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['login-uname'])) {
  $loginUsername=$_POST['login-uname'];
  //$pw_md5 = md5($_POST['login-passwort']);
  //$password=$pw_md5;
  $pass = $_POST["login-passwort"];
  #$pw_md5 = $_POST['login-passwort'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "main.php";
  $MM_redirectLoginFailed = "index.php#failed";
  $MM_redirecttoReferrer = true;
  $player = Player::byName($loginUsername);
	if(is_Object($player) ) 
	{
		if (strtoupper(md5($pass.$player->getSalt())) == strtoupper($player->getPasswort()) ) 
		{
			$_SESSION['eingeloggt'] = 1;
			$_SESSION['uname'] = $_POST['login-uname'];
			header("Location: " . $MM_redirectLoginSuccess );
			return;
		}
		else
		{
			header("Location: ". $MM_redirectLoginFailed );
		}
	/*
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
	$_SESSION['uname'] = $_POST['login-uname'];
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  } */
	
}
 
$loginUsername = $_POST['login-uname'];


}
$number = rand(1, 100);
if(isset($_GET["100"])) {
  $number = 100;
}
if($number == "100") {
  $stream = "https://semper-coding.de/sounds/2.mp3";
} else {
  $stream = "https://semper-coding.de/sounds/1.mp3";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Page">
    <title>Con Reallife Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/login.min.css">
</head>
<audio id="login-audio" loop autoplay>
  <source src="<?= $stream; ?>" type="audio/mpeg">
</audio>
<script>
function showUser(str) {
    if (str == "") {
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getimage.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<body>
<div id="particles-js"></div>
    <div id="login-container">
        <div class="mala">
            <center><h2>CON Reallife UCP</h2></center>
            <div class="login-card" style="margin-top:0;"><img src="dist/img/avatar_2x.png" class="profile-img-card">
                <p class="profile-name-card"> </p>
                <form class="form-signin" METHOD="POST" name="login">
                    <span class="reauth-email"> </span>
                    <input class="form-control" type="text" required="" placeholder="Nutzername" autofocus="" id="inputEmail" name="login-uname" onchange="showUser(this.value)">
                    <input class="form-control" type="password" required="" placeholder="Passwort" id="inputPassword" name="login-passwort">
                    <div
                        class="checkbox">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"></div>
            </div><button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Login</button></form>
        </div>
    </div>
    </div>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Links</h3>
                        <ul>
                            <li><a href="https://con-reallife.de" target="_blank">Forum</a></li>
                            <li><a href="ts3server://62.75.163.167?port=9987" target="_blank">Teamspeak</a></li>
                            <li><a href="mtasa://62.75.163.167:20256" target="_blank">MTA:SA Server</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Con Reallife</h3>
                        <p>Con Reallife ist ein Grand Theft Auto San Andreas Server welcher es sich zur aufgabe gemacht hat ein umfangreiches sowie wundervolles Spielerlebnis für seine Nutzer zur verfügung zu stellen.</p>
                    </div>
                </div>
                <p class="copyright">CON Reallife © 2016 - 2018</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script>
        var audio = document.getElementById("login-audio");
        audio.volume = 0.1;
    </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

<script>
    particlesJS.load('particles-js', 'particles.json',
    function(){
        console.log('particles.json loaded...')
    })
</script>
</body>

</html>
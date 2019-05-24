<?php // require_once('../Connections/ccp.php'); ?>
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

// *** Validate request to login to this site.
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Con Reallife | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
#particles-js{
  width: 100%;
  height: 100%;
  background-image: url("dist/img/bg.jpg");
  background-size: cover;
  background-color: #b61924;
  background-position: 50% 50%;
  background-repeat: no-repeat;
}

    </style>
  </head>
  <audio id="login-audio" loop autoplay>
  <source src="<?= $stream; ?>" type="audio/mpeg">
</audio> 
  <body id="particles-js" class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
      <a href="#"><b>Con Reallife</b> UCP</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body" style="box-shadow: 10px 10px 20px grey;">
        <p class="login-box-msg">Bitte loggen Sie sich ein!</p>
        <form METHOD="POST" name="login">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="In-Game Benutzername" name="login-uname" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="In-Game Passwort" name="login-passwort" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Einloggen</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
	

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });

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

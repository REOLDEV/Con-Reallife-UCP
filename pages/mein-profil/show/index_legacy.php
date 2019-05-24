<?php require_once('../../../lib/database.ucpsys'); ?>
<?php
require_once("phpqrcode/qrlib.php");
if(!$_SESSION['eingeloggt'] == 1) {header("Location: ../../../index.php");}

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

$SearchName = mysqli_escape_string($connection, $_GET["id"] );
$UName = $_SESSION['uname'];

$query_playersprofile_db = "SELECT * FROM players WHERE Name = '$SearchName'";
$playersprofile_db = mysqli_query($connection, $query_playersprofile_db) or die(mysqli_error());
$row_playersprofile_db = mysqli_fetch_assoc($playersprofile_db);
$totalRows_playersprofile_db = mysqli_num_rows($playersprofile_db);

$query_userdataprofile_db = "SELECT * FROM userdata WHERE Name = '$SearchName'";
$userdataprofile_db = mysqli_query($connection, $query_userdataprofile_db) or die(mysqli_error());
$row_userdataprofile_db = mysqli_fetch_assoc($userdataprofile_db);
$totalRows_userdataprofile_db = mysqli_num_rows($userdataprofile_db);

$query_ucpprofile_db = "SELECT * FROM ucp WHERE Name = '$SearchName'";
$ucpprofile_db = mysqli_query($connection, $query_ucpprofile_db) or die(mysqli_error());
$row_ucpprofile_db = mysqli_fetch_assoc($ucpprofile_db);
$totalRows_ucpprofile_db = mysqli_num_rows($ucpprofile_db);

$query_players_db = "SELECT * FROM players WHERE Name = '$UName'";
$players_db = mysqli_query($connection, $query_players_db) or die(mysqli_error());
$row_players_db = mysqli_fetch_assoc($players_db);
$totalRows_players_db = mysqli_num_rows($players_db);

$query_userdata_db = "SELECT * FROM userdata WHERE Name = '$UName'";
$userdata_db = mysqli_query($connection, $query_userdata_db) or die(mysqli_error());
$row_userdata_db = mysqli_fetch_assoc($userdata_db);
$totalRows_userdata_db = mysqli_num_rows($userdata_db);

$query_ucp_db = "SELECT * FROM ucp WHERE Name = '$UName'";
$ucp_db = mysqli_query($connection, $query_ucp_db) or die(mysqli_error());
$row_ucp_db = mysqli_fetch_assoc($ucp_db);
$totalRows_ucp_db = mysqli_num_rows($ucp_db);


    
#Includes
include ("../../../dist/includes/fraktion_abfragen.php");
include ("../../../dist/includes/server_stats.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Con Reallife | UCP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../dist/css/skins/skin-yellow.min.css">
	
	<link rel="stylesheet" href="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
	.label-supporter {
		background-color: #FFD700;
		color: #000000;
	}
	.label-moderator {
		background-color: #008000;
		color: #FFFFFF;
	}
	.label-super-moderator {
		background-color: #800080;
		color: #FFFFFF;
	}
	.label-administrator {
		background-color: #FFA500;
		color: #FFFFFF;
	}
	.label-stv-projektleiter {
		background-color: #B22222;
		color: #FFFFFF;
	}
	.label-projektleiter {
		background-color: #FF0000;
		color: #FFFFFF;
	}
	.label-entwicklung {
		background-color: #2F4F4F;
		color: #FFFFFF;
	}
</style>
  <body class="hold-transition skin-yellow">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../../main.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>C</b>CP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Con</b> Reallife UCP</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" style="float: left; background-color: transparent; background-image: none; color: white; padding: 15px 15px;" data-toggle="offcanvas" role="button">
            <i class="fas fa-bars"></i>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="../../../dist/img/samp/avatar/1-<?php echo $row_userdata_db['Skinid']; ?>.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $UName; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="../../../dist/img/samp/avatar/1-<?php echo $row_userdata_db['Skinid']; ?>.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $UName; ?> - <?php echo $row_userdata_db['SocialState']; ?>
                      <small>Registriert seit dem: <?php echo $row_players_db['RegisterDatum']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="../mein-profil.php" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="../../../logout.php" class="btn btn-default btn-flat">Abmelden</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../../dist/img/samp/avatar/1-<?php echo $row_userdata_db['Skinid']; ?>.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $UName; ?></p><?php isPlayerOnline($connection, $UName); ?>
            </div>
          </div>
          <!-- search form (Optional) -->
          <form action="../../search-player/index.php" method="get" class="sidebar-form" name="spieler-suchen-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Nach Spieler suchen...">
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
		  
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Mein Account</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="../index.php"><i class="fa fa-user"></i> <span>Mein Profil</span></a></li>
            <li><a href="../../meine-fahrzeuge/"><i class="fa fa-car"></i> <span>Meine Fahrzeuge</span></a></li>
            <li><a href="../../account-verwalten/"><i class="fa fa-pencil-alt"></i> <span>Account Verwalten</span></a></li>
            <li><a href="../../online-banking/"><i class="far fa-money-bill-alt"></i> <span>Online Banking</span></a></li>
			<?php if(isFraktion($UName, $connection) == true) { ?>
			<li class="header">Fraktion</li>
			<?php 
				$fraktionsname = getFraktionName($row_userdata_db['Fraktion'], $connection);
				echo '<li><a href="../../fraktion/"><i class="fa fa-users"></i> <span>'.$fraktionsname.'</span></a></li>'; ?>
			
			<?php } else {} ?>
			
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper fixed" style="min-height: 10px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Profil von <?php echo $row_userdataprofile_db['Name']; ?>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-warning">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="../../../dist/img/samp/avatar/1-<?php echo $row_userdataprofile_db['Skinid']; ?>.png" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $row_userdataprofile_db['Name']; ?></h3>
                  <p class="text-muted text-center"><?php echo $row_userdataprofile_db['SocialState']; ?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    <?php
							$PlayTimeHour = round($row_userdata_db['Spielzeit']/60);
							$PlayTimeMinute = round($row_userdata_db['Spielzeit']/120);
						?>
                      <b>Spielstzeit gesamt</b> <a class="pull-right"><?php echo $PlayTimeHour; ?> Stunden und <?php echo $PlayTimeMinute; ?> Minuten.</a>
                    </li>
                    <li class="list-group-item">
                      <b>Geld gesamt</b> <a class="pull-right"><?php echo $row_userdata_db['Geld']+$row_userdata_db['Bankgeld']; ?>€</a>
                    </li>
                    </li>
					<?php if($row_userdataprofile_db['Adminlevel'] > 0) {?>
					<li class="list-group-item">
						<?php
							$name = $row_userdataprofile_db['Name'];
							$rang = $row_userdataprofile_db["Adminlevel"];
							$bez = "";
							if($rang == 1){
							$bez = "Supporter";
							$labelcol = "supporter";
							}else if($rang == 2){
							$bez = "Moderator";
							$labelcol = "moderator";
							}else if($rang == 3){
							$bez = "Super Moderator";
							$labelcol = "super-moderator";
							}else if($rang == 4){
							$bez = "Administrator";
							$labelcol = "administrator";
							}else if($rang == 5){
							$bez = "Stellvertretender Projektleiter";
							$labelcol = "stv-projektleiter";
							}else if($rang == 6){
							$bez = "Projektleiter";
							$labelcol = "projektleiter";
							}else if($rang == 7){
							$bez = "Entwickler";
							$labelcol = "entwicklung"; }
						?>
						<center><span class='label label-<?php echo $labelcol; ?>'><?php echo $bez; ?></span></center>
					</li>

					<?php } else {} ?>

					
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              
            </div><!-- /.col -->
            <div class="col-md-9">
				<div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Über <?php echo $row_userdataprofile_db['Name']; ?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div><!-- /.box-tools -->
            </div>
						<div class="box-body">
							<?php if(!$row_ucpprofile_db['aboutmetext'] == "") {
							echo $row_ucpprofile_db['aboutmetext'];
							} else {
								echo "Der Spieler hat noch keine Beschreibung über sich verfasst.";
							}
							?>
						</div><!-- /.box-body -->
			  </div><!-- /.box -->	
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php //include ("~/dist/includes/footer.php"); ?>
      <?php include $_SERVER['DOCUMENT_ROOT']."/cp/dist/includes/footer.php"; ?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js"></script>
  </body>
</html>

<?php
mysqli_free_result($players_db);

mysqli_free_result($userdata_db);

mysqli_free_result($playersprofile_db);

mysqli_free_result($userdataprofile_db);

mysqli_free_result($ucp_db);

mysqli_free_result($ucpprofile_db);
?>

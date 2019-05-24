<?php //require_once('../../../Connections/ccp.php'); ?>
<?php
require_once("../../lib/database.ucpsys");

if(!$_SESSION['eingeloggt'] == 1) {header("Location: ../../index.php");}

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
$UName = $_SESSION['uname'];

$query_players_db = "SELECT * FROM players WHERE Name = '$UName'";
$players_db = mysqli_query($connection, $query_players_db) or die(mysqli_error());
$row_players_db = mysqli_fetch_assoc($players_db);
$totalRows_players_db = mysqli_num_rows($players_db);

$query_userdata_db = "SELECT * FROM userdata WHERE Name = '$UName'";
$userdata_db = mysqli_query($connection, $query_userdata_db) or die(mysqli_error());
$row_userdata_db = mysqli_fetch_assoc($userdata_db);
$totalRows_userdata_db = mysqli_num_rows($userdata_db);

$query_bonustable_db = "SELECT * FROM bonustable WHERE Name = '$UName'";
$bonustable_db = mysqli_query($connection, $query_bonustable_db) or die(mysqli_error());
$row_bonustable_db = mysqli_fetch_assoc($bonustable_db);
$totalRows_bonustable_db = mysqli_num_rows($bonustable_db);

#Includes
include ("../../dist/includes/fraktion_abfragen.php");
include ("../../dist/includes/private_user_stats.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Con Reallife | UCP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="../../dist/css/skins/skin-yellow.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
  /*.skin-img {
  position:absolute;
  clip:rect(auto auto 130px auto);
}*/

.info-box-icon-lg {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 100%;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 100px;
    background: rgba(0,0,0,0.2);
}
  </style>
<body class="hold-transition skin-yellow fixed">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="../../main.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>C</b>CP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Con</b> Reallife UCP</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" style="float: left; background-color: transparent; background-image: none; color: white; padding: 15px 15px;" data-toggle="offcanvas" role="button">
            <i class="fas fa-bars"></i>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="../../dist/img/samp/avatar/1-<?php echo $row_userdata_db['Skinid']; ?>.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $UName; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="../../dist/img/samp/avatar/1-<?php echo $row_userdata_db['Skinid']; ?>.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $UName; ?> - <?php echo $row_userdata_db['SocialState']; ?>
                      <small>Registriert seit dem: <?php echo $row_players_db['RegisterDatum']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="mein-profil.php" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="../../logout.php" class="btn btn-default btn-flat">Abmelden</a>
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

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../dist/img/samp/avatar/1-<?php echo $row_userdata_db['Skinid']; ?>.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $UName; ?></p><?php isPlayerOnline($connection, $UName); ?>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="../search-player/index.php" method="get" class="sidebar-form" name="spieler-suchen-form">
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
            <li class="active"><a href="#"><i class="fa fa-user"></i> <span>Mein Profil</span></a></li>
            <li><a href="../meine-fahrzeuge/"><i class="fa fa-car"></i> <span>Meine Fahrzeuge</span></a></li>
            <li><a href="../account-verwalten/"><i class="fa fa-pencil-alt"></i> <span>Account Verwalten</span></a></li>
            <li><a href="../online-banking/"><i class="far fa-money-bill-alt"></i> <span>Online Banking</span></a></li>
			<?php if(isFraktion($UName, $connection) == true) { ?>
			<li class="header">Fraktion</li>
			<?php 
				$fraktionsname = getFraktionName($row_userdata_db['Fraktion'], $connection);
				echo '<li><a href="../fraktion/"><i class="fa fa-users"></i> <span>'.$fraktionsname.'</span></a></li>'; ?>
			
			<?php } else {} ?>
			
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Account Informationen
            <small>Hier kannst du deine Account Informationen einsehen!</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="rows">
                <div class="col-md-3">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Das bin ich</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <center><img src="../../dist/img/samp/skins/1-skin_<?php echo $row_userdata_db['Skinid']; ?>.jpg" class="skin-img"></center>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-4">
                    <div class="info-box bg-green">
                        <span class="info-box-icon-lg"><i class="fas fa-dollar-sign"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Geld auf der Hand</span>
                            <span class="info-box-number"><?php echo $row_userdata_db['Geld']; ?> $</span>
                            <span class="info-box-text">Geld auf der Bank</span>
                            <span class="info-box-number"><?php echo $row_userdata_db['Bankgeld']; ?> $</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    <!-- Training Box -->
                    <div class="box box-warning">
  						<div class="box-header with-border">
                            <h3 class="box-title">Trainierte Eigenschaften</h3>
    						<div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
    						</div><!-- /.box-tools -->
  						</div><!-- /.box-header -->
  						<div class="box-body">
    						<table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Eigenschaft</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Lungenvolumen</td>
                                            <td>
												<?php if($Lungenvolumen == "buyed") { ?>
                                                    <span class="label label-success">Trainiert</span>
                                                <?php } else { ?>
                                                    <span class="label label-danger">Nicht trainiert</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Muskeln</td>
                                            <td>
												<?php if($Muskeln == "buyed") { ?>
                                                    <span class="label label-success">Trainiert</span>
                                                <?php } else { ?>
                                                    <span class="label label-danger">Nicht trainiert</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kondition</td>
                                            <td>
												<?php if($Kondition == "buyed") { ?>
                                                    <span class="label label-success">Trainiert</span>
                                                <?php } else { ?>
                                                    <span class="label label-danger">Nicht trainiert</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
  						</div><!-- /.box-body -->
					</div><!-- /.box -->
                   <!-- Skills Box -->
                    <div class="box box-warning">
  						<div class="box-header with-border">
                            <h3 class="box-title">Skill's</h3>
    						<div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
    						</div><!-- /.box-tools -->
  						</div><!-- /.box-header -->
  						<div class="box-body">
    						<table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Skill</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pistolen Skill</td>
                                            <td>
												<?php if($PistolSkill == "buyed") { ?>
                                                    <span class="label label-success">Vorhanden</span>
                                                <?php } else { ?>
                                                    <span class="label label-danger">Nicht vorhanden</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Deagle Skill</td>
                                            <td>
												<?php if($DeagleSkill == "buyed") { ?>
                                                    <span class="label label-success">Vorhanden</span>
                                                <?php } else { ?>
                                                    <span class="label label-danger">Nicht vorhanden</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Shotgun Skill</td>
                                            <td>
                                            	<?php if($ShotgunSkill == "buyed") { ?>
                                                    <span class="label label-success">Vorhanden</span>
                                                <?php } else { ?>
                                                    <span class="label label-danger">Nicht vorhanden</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MP5 Skill</td>
                                            <td>
                                            	<?php if($MP5Skill == "buyed") { ?>
                                                    <span class="label label-success">Vorhanden</span>
                                                <?php } else { ?>
                                                    <span class="label label-danger">Nicht vorhanden</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
  						</div><!-- /.box-body -->
					</div><!-- /.box -->
                </div>
            </div>
            <div class="rows">
            	<div class="col-md-4">
                <!-- Lizenzen Box -->
                	<div class="box box-warning">
  						<div class="box-header with-border">
                            <h3 class="box-title">Lizenzen</h3>
    						<div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
    						</div><!-- /.box-tools -->
  						</div><!-- /.box-header -->
  						<div class="box-body">
    						<table class="table table-bordered table-hover">
                            	<thead>
                                	<tr>
                                    	<th>Lizenz</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr>
                                    	<td>Autoführerschein</td>
                                        <td>
                                        	<?php if($CarLic == 1) { ?>
                                            	<span class="label label-success">Bestanden</span>
                                            <?php } else { ?>
                                            	<span class="label label-danger">Nicht bestanden</span>
                                            <?php } ?>
                                        </td>
                                   	</tr>
                                    <tr>
                                    	<td>Motorradführerschein</td>
                                        <td>
                                        	<?php if($MotorLic == 1) { ?>
                                         		<span class="label label-success">Bestanden</span>
                                        	<?php } else { ?>
                                            	<span class="label label-danger">Nicht bestanden</span>
                                        	<?php } ?>
                                        </td>
                                   	</tr>
                                    <tr>
                                        <td>Lkwführerschein</td>
                                        <td>
                                            <?php if($LKWLic == 1) { ?>
                                                <span class="label label-success">Bestanden</span>
                                            <?php } else { ?>
                                                <span class="label label-danger">Nicht bestanden</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Helikopterschein</td>
                                        <td>
                                            <?php if($HeliLic == 1) { ?>
                                                <span class="label label-success">Bestanden</span>
                                            <?php } else { ?>
                                                <span class="label label-danger">Nicht bestanden</span>
                                            <?php } ?>
                                    	</td>
                                    </tr>
                                    <tr>
                                        <td>Flugschein Klasse A</td>
                                        <td>
                                            <?php if($FlugLicA == 1) { ?>
                                                <span class="label label-success">Bestanden</span>
                                            <?php } else { ?>
                                                <span class="label label-danger">Nicht bestanden</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Flugschein Klasse B</td>
                                        <td>
                                            <?php if($FlugLicB == 1) { ?>
                                                <span class="label label-success">Bestanden</span>
                                            <?php } else { ?>
                                                <span class="label label-danger">Nicht bestanden</span>
                                            <?php } ?>
                                    	</td>
                                    </tr>
                                    <tr>
                                        <td>Motorbootschein</td>
                                        <td>
                                            <?php if($MBootLic == 1) { ?>
                                                <span class="label label-success">Bestanden</span>
                                            <?php } else { ?>
                                                <span class="label label-danger">Nicht bestanden</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Segelschein</td>
                                        <td>
                                            <?php if($SBootLic == 1) { ?>
                                                <span class="label label-success">Bestanden</span>
                                            <?php } else { ?>
                                                <span class="label label-danger">Nicht bestanden</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Waffenschein</td>
                                        <td>
                                            <?php if($WeaponLic == 1) { ?>
                                                <span class="label label-success">Bestanden</span>
                                            <?php } else { ?>
                                                <span class="label label-danger">Nicht bestanden</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Angelschein</td>
                                    	<td>
                                            <?php if($AngelLic == 1) { ?>
                                                <span class="label label-success">Bestanden</span>
                                            <?php } else { ?>
                                            	<span class="label label-danger">Nicht bestanden</span>
                                        	<?php } ?>
                                    	</td>
                                    </tr>
                                    <tr>
                                        <td>Personalausweis</td>
                            	        <td>
                                            <?php if($Perso == 1) { ?>
                                                <span class="label label-success">Vorhanden</span>
                                            <?php } else { ?>
                                            	<span class="label label-danger">Nicht vorhanden</span>
                                        	<?php } ?>
                                    	</td>
                                    </tr>
                                </tbody>
                	        </table>
  						</div><!-- /.box-body -->
					</div><!-- /.box -->
                </div>
            </div>
        </section><!-- /.content -->
	</div><!-- /.content-wrapper -->

      <!-- Main Footer --></div>
      <?php include ("../../dist/includes/footer.php"); ?>
<!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
<?php
mysqli_free_result($players_db);

mysqli_free_result($userdata_db);

mysqli_free_result($bonustable_db);
?>

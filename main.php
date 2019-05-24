<?php // require_once('../Connections/ccp.php'); ?>
<?php
require_once("lib/database.ucpsys");

$connection = mysqli_connect("mysql-mariadb-5-101.zap-hosting.com","zap347923-1","t1KyVS8u2U0GcPHz","zap347923-1");

if(!$_SESSION['eingeloggt'] == 1) {header("Location: index.php");}

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
$players_db = mysqli_query($connection, $query_players_db) or die(mysql_error());
$row_players_db = mysqli_fetch_assoc($players_db);
$totalRows_players_db = mysqli_num_rows($players_db);

$query_userdata_db = "SELECT * FROM userdata WHERE Name = '$UName'";
$userdata_db = mysqli_query($connection, $query_userdata_db) or die(mysqli_error());
$row_userdata_db = mysqli_fetch_assoc($userdata_db);
$totalRows_userdata_db = mysqli_num_rows($userdata_db);

$query_stats_db = "SELECT * FROM userdata";
$stats_db = mysqli_query($connection, $query_stats_db) or die(mysql_error());
$row_stats_db = mysqli_fetch_assoc($stats_db);
$totalRows_stats_db = mysqli_num_rows($stats_db);

$query_team_db = "SELECT * FROM userdata WHERE Adminlevel > '1' OR Name = 'NotNull'";
$team_db = mysqli_query($connection, $query_team_db) or die(mysql_error());
$row_team_db = mysqli_fetch_assoc($team_db);
$totalRows_team_db = mysqli_num_rows($team_db);

$query_ucp_personal_settings_db = "SELECT * FROM ucp_personal_settings WHERE Name = '$UName'";
$ucp_personal_settings_db = mysqli_query($connection, $query_ucp_personal_settings_db) or die(mysql_error());
$row_ucp_personal_settings_db = mysqli_fetch_assoc($ucp_personal_settings_db);
$totalRows_ucp_personal_settings_db = mysqli_num_rows($ucp_personal_settings_db);

$query_online_db = "SELECT * FROM loggedin";
$online_db = mysqli_query($connection, $query_online_db) or die(mysqli_error($connection));
#Includes
require_once("dist/includes/fraktion_abfragen.php");
require_once("dist/includes/server_stats.php");

if($row_ucp_personal_settings_db['Style'] == 0)
{
	#Standard Skin
	$UCP_STYLE = "skin-yellow";
	
} else if($row_ucp_personal_settings_db['Style'] == 1)
{
	#Standard Skin Hell
	$UCP_STYLE = "skin-yellow-light";
	
} else if($row_ucp_personal_settings_db['Style'] == 2)
{
	#Schwarz
	$UCP_STYLE = "skin-black";
} else if($row_ucp_personal_settings_db['Style'] == 3)
{
	#Schwarz Hell
	$UCP_STYLE = "skin-black-light";
} else if($row_ucp_personal_settings_db['Style'] == 5)
{
	#Blau
	$UCP_STYLE = "skin-blue";
} else if($row_ucp_personal_settings_db['Style'] == 6)
{
	#Blau Hell
	$UCP_STYLE = "skin-blue-light";
} else if($row_ucp_personal_settings_db['Style'] == 7)
{
	#Grün
	$UCP_STYLE = "skin-green";
} else if($row_ucp_personal_settings_db['Style'] == 8)
{
	#Grün Hell
	$UCP_STYLE = "skin-green-light";
} else if($row_ucp_personal_settings_db['Style'] == 9)
{
	#Lila
	$UCP_STYLE = "skin-purple";
} else if($row_ucp_personal_settings_db['Style'] == 10)
{
	#Lila Hell
	$UCP_STYLE = "skin-purple";
} else if($row_ucp_personal_settings_db['Style'] == 11)
{
	#Red
	$UCP_STYLE = "skin-red";
} else if($row_ucp_personal_settings_db['Style'] == 11)
{
	#Red Hell
	$UCP_STYLE = "skin-red-light";
}
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="dist/css/skins/<?php echo $UCP_STYLE; ?>.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
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

  .badge-yellow {
    background-color: yellow;
    color: white;
  }
</style>
<body class="hold-transition <?php echo $UCP_STYLE; ?> sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
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
                  <img src="dist/img/samp/avatar/1-<?php echo $row_userdata_db['Skinid']; ?>.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $UName; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="dist/img/samp/avatar/1-<?php echo $row_userdata_db['Skinid']; ?>.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $UName; ?> - <?php echo $row_userdata_db['SocialState']; ?>
                      <small>Registriert seit dem: <?php echo $row_players_db['RegisterDatum']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="pages/mein-profil/mein-profil.php" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Abmelden</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar fixed">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/samp/avatar/1-<?php echo $row_userdata_db['Skinid']; ?>.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $UName; ?></p> <?php isPlayerOnline($connection, $UName); ?>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="pages/search-player/index.php" method="get" class="sidebar-form" name="spieler-suchen-form">
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
            <li><a href="pages/mein-profil/"><i class="fa fa-user"></i> <span>Mein Profil</span></a></li>
            <li><a href="pages/meine-fahrzeuge/"><i class="fa fa-car"></i> <span>Meine Fahrzeuge</span></a></li>
            <li><a href="pages/account-verwalten/"><i class="fa fa-pencil-alt"></i> <span>Account Verwalten</span></a></li>
            <li><a href="pages/online-banking/"><i class="far fa-money-bill-alt"></i> <span>Online Banking</span></a></li>
			<?php if(isFraktion($UName, $connection) == true) { ?>
			<li class="header">Fraktion</li>
			<?php 
				$fraktionsname = getFraktionName($row_userdata_db['Fraktion'], $connection);
				echo '<li><a href="pages/fraktion/"><i class="fa fa-users"></i> <span>'.$fraktionsname.'</span></a></li>'; ?>
			
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
            <strong>Con</strong> Reallife
            <small>Eine kleine Serverstatistik</small>
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
            	<div class="col-md-4">
					<div class="info-box bg-green">
  						<span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>
  						<div class="info-box-content">
   							<span class="info-box-text">Es sind insgesamt</span>
    						<span class="info-box-number"><?php echo getMoney($connection); ?> $</span>
                            <span class="info-box-text">im umlauf.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
					<div class="info-box bg-yellow">
  						<span class="info-box-icon"><i class="fa fa-user-plus"></i></span>
  						<div class="info-box-content">
   							<span class="info-box-text">Es sind insgesamt</span>
    						<span class="info-box-number"><?php echo getMembers($connection);?> Spieler</span>
                            <span class="info-box-text">registriert.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
					<div class="info-box bg-blue">
  						<span class="info-box-icon"><i class="fa fa-car"></i></span>
  						<div class="info-box-content">
   							<span class="info-box-text">Es sind insgesamt</span>
    						<span class="info-box-number"><?php echo getVehicles($connection);?> Fahrzeuge</span>
                            <span class="info-box-text">auf den Straßen unterwegs.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row'>
				<div class='col-md-6'>
              	<!-- The time line -->
              		<ul class='timeline'>
                		<!-- timeline item -->
       					<?php echo getChangelog($connection); ?>
              		</ul>
           		</div><!-- /.col -->
            
            <div class='col-md-6'>
				<div class='box box-warning'>
					<div class='box-header'>
					  <h3 class='box-title'>Neuste Mitglieder</h3>
					</div><!-- /.box-header -->
					<div class='box-body no-padding'>
					  <table class='table'>
						<tr>
						  <th>Name</th>
						  <th>Registrierdatum</th>
						  <th>Geschlecht</th>
						</tr>
			<?php echo getLastPlayers($connection); ?>
					  </table>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->
				  <div class='box box-warning'>
                  	<div class='box-body no-padding'>
						<div class='box-header'>
					  		<h3 class='box-title'>Team Mitglieder</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div><!-- /.box-header -->
                  		<table class='table'>
				  			<thead>
                      			<tr>
                        			<th>Name</th>
                       				<th>Rang</th>
                      			</tr>
                    		</thead>
                    		<tbody>
                            	<?php do { ?>
                                	<?php
											$name = $row_team_db['Name'];
											$rang = $row_team_db["Adminlevel"];
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
											}else if($name == "NotNull"){
											$bez = "Entwickler";
											$labelcol = "entwicklung"; }
									?>
                            	  <tr>
                            	    <td><a href="pages/mein-profil/show/index.php?id=<?php echo $row_team_db['Name']; ?>"><?php echo $row_team_db['Name']; ?></a>  <?php isPlayerOnline($connection, $row_team_db['Name']); ?></td>
                            	    <td><span class='label label-<?php echo $labelcol; ?>'><?php echo $bez; ?></span></td>
                          	    </tr>
                            	  <?php } while ($row_team_db = mysqli_fetch_assoc($team_db)); ?>
                            </tbody>
                  		</table>
               		 </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class='box box-warning'>
                  	<div class='box-body no-padding'>
						<div class='box-header'>
					  		<h3 class='box-title'>Wer ist gerade Online...</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
            </div><!-- /.box-header -->
            <ul class="users-list clearfix">
            <?php while ($row = mysqli_fetch_assoc($online_db)) { ?>
              <?php
                $getLoginInfoSQL = "SELECT * FROM userdata WHERE Name = '".$row["Name"]. "'";
                $getLoginInfoQuery = mysqli_query($connection, $getLoginInfoSQL);
                $getLoginInfo = mysqli_fetch_assoc($getLoginInfoQuery);
              ?>
                <li>
                    <a href="pages/mein-profil/show/index.php?id=<?php echo $row['Name']; ?>" class="users-list-name">
										<img style="max-width: 150px; max-height: 150px;" alt="Profil Bild" src="dist/img/samp/avatar/1-<?php echo $getLoginInfo['Skinid']; ?>.png"><br/>
										<?php echo $row['Name']; ?>
									</a>								</li>
            <?php } ?></ul>
               		 </div><!-- /.box-body -->
              </div><!-- /.box -->
                    </div>
			</div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <?php include ("dist/includes/footer.php"); ?>
</div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
<?php
mysqli_free_result($players_db);

mysqli_free_result($userdata_db);

mysqli_free_result($stats_db);

mysqli_free_result($ucp_personal_settings_db);

mysqli_free_result($team_db);
?>
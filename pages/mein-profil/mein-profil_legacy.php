<?php require_once('../../lib/database.ucpsys'); ?>
<?php

if(!$_SESSION['eingeloggt'] == 1) {header("Location: ../../index.php");}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}



if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "aboutmefield")) {
  $insertName =  mysqli_escape_string($connection, $_POST['username']);
  $insertText =  mysqli_escape_string($connection, $_POST['abouttext']);
  $insertKey  =  mysqli_escape_string($connection, $_POST['primärfuckingschlüssel']);

  $updateSQL = "UPDATE ucp SET `Name` = '" .$insertName. "', aboutmetext = '" .$insertText. "' WHERE id = '" .$insertKey."' ";              
  $Result1 = mysqli_query($connection, $updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "mein-profil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "aboutmefield-new")) {
  $insertName = mysqli_escape_string($connection, $_POST['username']);
  $insertText = mysqli_escape_string($connection, $_POST['abouttext']);
  $insertSQL = "INSERT INTO ucp (`Name`, aboutmetext) VALUES ('" .$insertName. "', '" .$insertText. "')";
  $Result1 = mysqli_query($connection, $insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "mein-profil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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

$query_ucp_db = "SELECT * FROM ucp WHERE Name = '$UName'";
$ucp_db = mysqli_query($connection, $query_ucp_db) or die(mysqli_error());
$row_ucp_db = mysqli_fetch_assoc($ucp_db);
$totalRows_ucp_db = mysqli_num_rows($ucp_db);

#Includes
include ("../../dist/includes/fraktion_abfragen.php");
include ("../../dist/includes/server_stats.php")
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/skin-yellow.min.css">
	
	<link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
  <body class="hold-transition skin-yellow fixed">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../main.php" class="logo">
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
                      <a href="#" class="btn btn-default btn-flat">Profil</a>
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
          <!-- Sidebar user panel -->
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
            <li><a href="index.php"><i class="fa fa-user"></i> <span>Mein Profil</span></a></li>
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
      <div class="content-wrapper fixed" style="min-height: 10px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Mein Benutzerprofil
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-warning">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="../../dist/img/samp/avatar/1-<?php echo $row_userdata_db['Skinid']; ?>.png" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $UName; ?></h3>
                  <center><?php isPlayerOnline($connection, $UName); ?></center>
                  <p class="text-muted text-center"><?php echo $row_userdata_db['SocialState']; ?></p>

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
					<?php if($row_userdata_db['Adminlevel'] > 0) {?>
					<li class="list-group-item">
						<?php
							$name = $row_userdata_db['Name'];
							$rang = $row_userdata_db["Adminlevel"];
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
			<?php if($totalRows_ucp_db == 0) { ?>
					<div class="box box-warning">
					<form method="POST" action="<?php echo $editFormAction; ?>" name="aboutmefield-new">
						<div class="box-body">
							<textarea name="abouttext" id="about-me-field" placeholder="<?php echo $row_ucp_db['aboutmetext']; ?>" class="form-control"></textarea>
                            <input name="username" type="hidden" value="<?php echo $UName; ?>">
						</div><!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-success">Speichern</button>
						</div>
				        <input type="hidden" name="MM_insert" value="aboutmefield-new">
					</form>
			  </div><!-- /.box -->
            <?php } else if($totalRows_ucp_db == 1) { ?>
            <div class="box box-warning">
					<form method="POST" action="<?php echo $editFormAction; ?>" name="aboutmefield">
						<div class="box-body">
							<textarea name="abouttext" id="about-me-field" placeholder="<?php echo $row_ucp_db['aboutmetext']; ?>" class="form-control"></textarea>
                            <input name="username" type="hidden" value="<?php echo $UName; ?>">
                            <input name="prim&auml;rfuckingschl&uuml;ssel" type="hidden" value="<?php echo $row_ucp_db['id']; ?>">
						</div><!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-success">Speichern</button>
						</div>
					    <input type="hidden" name="MM_update" value="aboutmefield">
				  </form>
			  </div><!-- /.box -->	
              <?php } ?>	
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include ("../../dist/includes/footer.php"); ?>
</div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
	<!-- Editor -->
    <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
  </body>
</html>

<script type="text/javascript">
	$('#about-me-field').wysihtml5({
  toolbar: {
    "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
    "emphasis": true, //Italics, bold, etc. Default true
    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
    "html": false, //Button which allows you to edit the generated HTML. Default false
    "link": true, //Button to insert a link. Default true
    "image": false, //Button to insert an image. Default true,
    "color": false, //Button to change color of font  
    "blockquote": true //Blockquote  
  }
});
</script>

<?php
mysqli_free_result($players_db);

mysqli_free_result($userdata_db);

mysqli_free_result($ucp_db);
?>

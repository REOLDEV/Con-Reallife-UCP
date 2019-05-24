<?php require_once('../../../lib/database.ucpsys'); ?>
<?php
if(!$_SESSION['eingeloggt'] == 1) {header("Location: ../../../index.php");}


$SearchName = mysqli_escape_string($connection, $_GET["id"] );
$UName = $_SESSION['uname'];

$query_playersprofile_db = "SELECT * FROM players WHERE Name = '$SearchName'";
$playersprofile_db = mysqli_query($connection, $query_playersprofile_db) or die(mysqli_error($connection));
$row_playersprofile_db = mysqli_fetch_assoc($playersprofile_db);
$totalRows_playersprofile_db = mysqli_num_rows($playersprofile_db);

$query_playerspinwand_db = "SELECT * FROM ucp_profile_pinwand WHERE targetUser = '$SearchName'";
$playerspinwand_db = mysqli_query($connection, $query_playerspinwand_db) or die(mysqli_error($connection));
$row_playerspinwand_db = mysqli_fetch_assoc($playerspinwand_db);
$totalRows_playerspinwand_db = mysqli_num_rows($playerspinwand_db);

$query_pinwandplayerInfo_db = "SELECT * FROM userdata WHERE Name = '" .$row_playerspinwand_db["fromUser"]. "'";
$pinwandplayerInfo_db = mysqli_query($connection, $query_pinwandplayerInfo_db) or die(mysqli_error($connection));
$row_pinwandplayerInfo_db = mysqli_fetch_assoc($pinwandplayerInfo_db);
$totalRows_pinwandplayerInfo_db = mysqli_num_rows($pinwandplayerInfo_db);

$query_playeranchievment_db = "SELECT * FROM achievments WHERE Name = '$SearchName'";
$playeranchievment_db = mysqli_query($connection, $query_playeranchievment_db) or die(mysqli_error($connection));
$row_playeranchievment_db = mysqli_fetch_assoc($playeranchievment_db);
$totalRows_playeranchievment_db = mysqli_num_rows($playeranchievment_db);

$query_userdataprofile_db = "SELECT * FROM userdata WHERE Name = '$SearchName'";
$userdataprofile_db = mysqli_query($connection, $query_userdataprofile_db) or die(mysqli_error($connection));
$row_userdataprofile_db = mysqli_fetch_assoc($userdataprofile_db);
$totalRows_userdataprofile_db = mysqli_num_rows($userdataprofile_db);

$query_ucpprofile_db = "SELECT * FROM ucp WHERE Name = '$SearchName'";
$ucpprofile_db = mysqli_query($connection, $query_ucpprofile_db) or die(mysqli_error($connection));
$row_ucpprofile_db = mysqli_fetch_assoc($ucpprofile_db);
$totalRows_ucpprofile_db = mysqli_num_rows($ucpprofile_db);

$query_players_db = "SELECT * FROM players WHERE Name = '$UName'";
$players_db = mysqli_query($connection, $query_players_db) or die(mysqli_error($connection));
$row_players_db = mysqli_fetch_assoc($players_db);
$totalRows_players_db = mysqli_num_rows($players_db);

$query_userdata_db = "SELECT * FROM userdata WHERE Name = '$UName'";
$userdata_db = mysqli_query($connection, $query_userdata_db) or die(mysqli_error($connection));
$row_userdata_db = mysqli_fetch_assoc($userdata_db);
$totalRows_userdata_db = mysqli_num_rows($userdata_db);

$query_ucp_db = "SELECT * FROM ucp WHERE Name = '$UName'";
$ucp_db = mysqli_query($connection, $query_ucp_db) or die(mysqli_error($connection));
$row_ucp_db = mysqli_fetch_assoc($ucp_db);
$totalRows_ucp_db = mysqli_num_rows($ucp_db);
    
#Includes
include ("../../../dist/includes/fraktion_abfragen.php");
include ("../../../dist/includes/server_stats.php");

if(isset($_POST["new-message-submit"])) {
  $poster = mysqli_escape_string($connection, $_POST["new-message-username"]);
  $toUser = mysqli_escape_string($connection, $_POST["new-message-targetUser"]);
  $posterskin = mysqli_escape_string($connection, $_POST["new-message-skinID"]);
  $postmsg = mysqli_escape_string($connection, $_POST["new-message-msg"]);

  $insertSQL = "INSERT INTO ucp_profile_pinwand (targetUser, fromUser, fromUserSkinID, `message`) VALUES ('" .$toUser. "', '" .$poster. "', '" .$posterskin. "', '" .$postmsg. "')";
  mysqli_query($connection, $insertSQL);
  header("Location: ?id=" .$toUser. "&newpost=true");
}
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
  
  .nav-tabs-custom > .nav-tabs > li.active {
    border-top-color: #f39c12 !important;
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
          <?php if(isset($_GET["newpost"])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Perfekt!</strong> Der Pinnwandeintrag wurde gespeichert.
          </div>
        <?php  } ?>

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-warning">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../../dist/img/samp/avatar/1-<?php echo $row_userdataprofile_db['Skinid']; ?>.png" alt="Avatar">

              <h3 class="profile-username text-center"><?php echo $row_userdataprofile_db['Name']; ?></h3>
              <?php if($row_userdataprofile_db['Adminlevel'] > 0 OR $row_userdataprofile_db['Name'] == "NotNull") {?>
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
							}else if($name == 'NotNull'){
							$bez = "Entwickler";
							$labelcol = "entwicklung"; }
						?>
						<center><span class='label label-<?php echo $labelcol; ?>'><?php echo $bez; ?></span></center><br>

          <?php } else { ?>
            <p class="text-muted text-center"><?php echo $row_userdataprofile_db["SocialState"]; ?></p>
         <?php } ?>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Registriert seit</b> <a class="pull-right"><?php echo $row_playersprofile_db['RegisterDatum']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Letzter Login</b> <a class="pull-right"><?php echo $row_playersprofile_db['Last_login']; ?></a>
                </li>
                <?php
                  $PlayTimeHour = round($row_userdataprofile_db['Spielzeit']/60);
                  $PlayTimeMinute = round($row_userdataprofile_db['Spielzeit']/120);
						    ?>
                <li class="list-group-item">
                  <b>Gesamte Spielzeit</b> <a class="pull-right"><?php echo $PlayTimeHour; ?> Stunden und <?php echo $PlayTimeMinute; ?> Minuten</a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Freunde werden</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Über mich</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Gesammelte Anchievments</strong>

              <p class="text-muted">
                <?php if($row_playeranchievment_db["Treuer_Spieler"] == "1") {
                  echo '<span class="label label-gray"><i class="fa fa-child"></i> Treuer Spieler</span>';
                } ?>
                <?php if($row_playeranchievment_db["Eingestellt"] == "1") {
                  echo '<span class="label label-primary"><i class="fa fa-briefcase"></i> Eingestellt</span>';
                } ?>
                <?php if($row_playeranchievment_db["Volles_Rohr"] == "1") {
                  echo '<span class="label label-maroon"><i class="fa fa-fire"></i> Volles Rohr</span>';
                } ?>
                <?php if($row_playeranchievment_db["Teamplayer"] == "1") {
                  echo '<span class="label label-navy"><i class="fab fa-jenkins"></i> Teamplayer</span>';
                } ?>
                <?php if($row_playeranchievment_db["Beinhart"] == "1") {
                  echo '<span class="label label-purple"><i class="fa fa-gavel"></i> Beinhart</span>';
                } ?>
                <?php if($row_playeranchievment_db["Robin_Hood"] == "1") {
                  echo '<span class="label label-teal"><i class="fa fa-gift"></i> Robin Hood</span>';
                } ?>
                <?php if($row_playeranchievment_db["Sammler"] == "1") {
                  echo '<span class="label label-info"><i class="fa fa-trash"></i> Sammler</span>';
                } ?>
                <?php if($row_playeranchievment_db["Stammspieler"] == "1") {
                  echo '<span class="label label-danger"><i class="fa fa-id-card"></i> Stammspieler</span>';
                } ?>
                <?php if($row_playeranchievment_db["Glueck"] == "1") {
                  echo '<span class="label label-success"><i class="fa fa-leaf"></i> Glück</span>';
                } ?>
                <?php if($row_playeranchievment_db["Eigene_Beine"] == "1") {
                  echo '<span class="label label-orange"><i class="fa fa-blind"></i> Eigene_Beine</span>';
                } ?>
              </p>

              <hr>

              <strong><i class="far fa-file-alt margin-r-5"></i> Was ich sonst noch so zusagen habe</strong>

              <?php if(!$row_ucpprofile_db['aboutmetext'] == "") {
							echo "<p>" .$row_ucpprofile_db['aboutmetext']. "</p>";
							} else {
								echo "<p>Der Spieler hat noch keine Beschreibung über sich verfasst.</p>";
							}
							?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#pinnwand" data-toggle="tab"><i class="far fa-paper-plane"></i> Pinnwand</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="pinnwand">
                <hr>
                  <form name="new-message" class="form-horizontal" method="POST">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-10">
                        <input class="form-control input-sm" name="new-message-msg" required placeholder="Kommentar hinterlassen">
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" name="new-message-submit" class="btn btn-success pull-right btn-block btn-sm">Senden</button>
                      </div>
                    </div>
                    <input type="hidden" name="new-message-username" value="<?php echo $UName; ?>">
                    <input type="hidden" name="new-message-targetUser" value="<?php echo $row_userdataprofile_db['Name']; ?>">
                    <input type="hidden" name="new-message-skinID" value="<?php echo $row_userdata_db['Skinid']; ?>">
                  </form>
                <hr>
                <?php
                $loop = mysqli_query($connection, "SELECT * FROM ucp_profile_pinwand WHERE targetUser = '$SearchName'")
                or die (mysqli_error($connection));
             
             while ($row = mysqli_fetch_array($loop))
             {
             ?>
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../../dist/img/samp/avatar/1-<?php echo $row['fromUserSkinID']; ?>.png" alt="user image">
                        <span class="username">
                          <a href="index.php?id=<?php echo $row['fromUser']; ?>"><?php echo $row["fromUser"]; ?> <?php isPlayerOnline($connection, $row['fromUser']); ?></a>
                        </span>
                    <span class="description"><?php echo $row["timestamp"]; ?></span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                  <?php echo $row["message"]; ?>
                  </p>
                </div>
                <!-- /.post -->
                <?php } ?>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
      </div><!-- /.content-wrapper -->
      <?php //include ("~/dist/includes/footer.php"); ?>
      <?php include "../../../dist/includes/footer.php"; ?>
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

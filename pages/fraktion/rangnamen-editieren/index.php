<?php require_once('../../../lib/database.ucpsys'); ?>
<?php

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "rank0")) {
  $updateSQL = sprintf("UPDATE fraktionen SET rank0name=%s WHERE ID=%s",
                       GetSQLValueString($_POST['rank0text'], "text"),
                       GetSQLValueString($_POST['fid'], "int"));

  $Result1 = mysqli_query($connection, $updateSQL) or die(mysqli_error());

  $updateGoTo = "index.php#erfolg";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo));
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "rank1")) {
  $updateSQL = sprintf("UPDATE fraktionen SET rank1name=%s WHERE ID=%s",
                       GetSQLValueString($_POST['rank1text'], "text"),
                       GetSQLValueString($_POST['fid'], "int"));

  $Result1 = mysqli_query($connection, $updateSQL) or die(mysqli_error());

  $updateGoTo = "index.php#erfolg";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo));
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "rank2")) {
  $updateSQL = sprintf("UPDATE fraktionen SET rank2name=%s WHERE ID=%s",
                       GetSQLValueString($_POST['rank2text'], "text"),
                       GetSQLValueString($_POST['fid'], "int"));

  $Result1 = mysqli_query($connection, $updateSQL) or die(mysqli_error());

  $updateGoTo = "index.php#erfolg";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo));
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "rank3")) {
  $updateSQL = sprintf("UPDATE fraktionen SET rank3name=%s WHERE ID=%s",
                       GetSQLValueString($_POST['rank3text'], "text"),
                       GetSQLValueString($_POST['fid'], "int"));

  $Result1 = mysqli_query($connection, $updateSQL) or die(mysqli_error());

  $updateGoTo = "index.php#erfolg";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo));
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "rank4")) {
  $updateSQL = sprintf("UPDATE fraktionen SET rank4name=%s WHERE ID=%s",
                       GetSQLValueString($_POST['rank4text'], "text"),
                       GetSQLValueString($_POST['fid'], "int"));

  $Result1 = mysqli_query($connection, $updateSQL) or die(mysqli_error());

  $updateGoTo = "index.php#erfolg";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo));
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "rank5")) {
  $updateSQL = sprintf("UPDATE fraktionen SET rank5name=%s WHERE ID=%s",
                       GetSQLValueString($_POST['rank5text'], "text"),
                       GetSQLValueString($_POST['fid'], "int"));

  $Result1 = mysqli_query($connection, $updateSQL) or die(mysqli_error());

  $updateGoTo = "index.php#erfolg";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo));
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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

$mafia = "#000";
$sfpd = "#00FFFF";
$triaden = "#FF0000";
$terroristen = "#663300";
$reporter = "#FF8000";
$fbi = "#000099";
$aztecas = "#FFFF00";
$biker = "#07D200";
$cdefault = "#E600FF";
$font_color = "#323232";

function getFraktionColor($name){
	if($name == "Mafia"){
		return $this->mafia;
	}else if($name == "SFPD"){
		return $this->sfpd;
	}else if($name == "Triaden"){
		return $this->triaden;
	}else if($name == "Terroristen"){
		return $this->terroristen;
	}else if($name == "Reporter"){
		return $this->reporter;
	}else if($name == "FBI"){
		return $this->fbi;
	}else if($name == "Aztecas"){
		return $this->aztecas;
	}else if($name == "Biker"){
		return $this->biker;
	}else{
		return $this->cdefault;
	}
}

/*
	Fraktions 				Datenbank ID
	SAPD					1
	Camorra					2
	Ballas					3
	Terroristen >> Triaden	4
	Liberty Tree Redaktion	5
	FBI						6
	Seville Families		7
	Army					8
	The Lost MC				9
	Medic					10
*/


function getFraktionLabel($msg,$color, $connection){
	return "<span class='label label-default' style='background-color:{$color};color:{$this->font_color}'>{$msg}</span>";
}

function isFraktion($name, $connection){
	$query = mysqli_query($connection, "SELECT * FROM userdata WHERE Fraktion != '0' AND Name = '$name'") or die(mysqli_error());
	$result = mysqli_num_rows($query);
	if($result == 0){
		return false;
	}else{
		return true;
	}
}
	
	function getFraktionID($name, $connection){
		$query = mysqli_query($connection, "SELECT Fraktion FROM userdata WHERE Name = '$name'") or die(mysqli_error());
		while($row = mysqli_fetch_assoc($query)){
			$frak = $row["Fraktion"];
		}
		return $frak;
	}
	
	function getFraktionName($id, $connection){
		/*$query = mysql_query("SELECT * FROM fraktionen WHERE ID = '$id'") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$name = $row["Name"];
		}*/
		if($id == 1) {$name = 'SAPD';} else if($id == 2) {$name = 'Camorra';} else if($id == 3) {$name = 'Ballas';} else if($id == 4) {$name = 'Triaden';} else if($id == 5) {$name = 'Liberty Tree Redaction';} else if($id == 6) {$name = 'FBI';} else if($id == 7) {$name = 'Seville Families';} else if($id == 8) {$name = 'San Andreas Army';} else if($id == 9) {$name = 'The Lost MC';} else if($id == 10) {$name = 'San Andreas Medical Department';}
		return $name;
	}
	
	function getFraktionRang($name, $connection){
		$query = mysqli_query($connection, "SELECT FraktionsRang FROM userdata WHERE Name = '$name'") or die(mysqli_error());
		while($row = mysqli_fetch_assoc($query)){
			$frak = $row["FraktionsRang"];
		}
		return $frak;
	}
	
	function getFraktionKasse($id, $connection){
		$query = mysqli_query($connection, "SELECT * FROM fraktionen WHERE ID = '$id' OR Name = '$id'") or die(mysqli_error());
		while($row = mysqli_fetch_assoc($query)){
			$geld = $row["DepotGeld"];
		}
		return $geld;
	}
	
	function getFraktionDrogen($id, $connection){
		$query = mysqli_query($connection, "SELECT * FROM fraktionen WHERE ID = '$id' OR Name = '$id'") or die(mysqli_error());
		while($row = mysqli_fetch_assoc($query)){
			$drogen = $row["DepotDrogen"];
		}
		return $drogen;
	}
	
	function getFraktionMaterials($id, $connection){
		$query = mysqli_query($connection, "SELECT * FROM fraktionen WHERE ID = '$id' OR Name = '$id'") or die(mysqli_error());
		while($row = mysqli_fetch_assoc($query)){
			$mats = $row["DepotMaterials"];
		}
		return $mats;
	}
	
	function getFraktionMemberCount($id, $connection){
		$query = mysqli_query("SELECT * FROM userdata WHERE Fraktion = '$id'") or die(mysqli_error());
		$result = mysqli_num_rows($query);
		return $result;
	}
	
	function getGangarea($connection){
		echo "
			<section class='content-header'>
			  <h1>
				Ganggebiete
			  </h1>
			</section>

			<!-- Main content -->
			<section class='content'>
				<div class='callout callout-info'>
					<strong>Ganggebiete</strong>
					<p>Hier werden Ihnen alle Ganggebiete angezeigt</p>
			  </div>
			
			<div class='row'>
			<div class='col-md-12'>
			<div class='box'>
						<div class='box-header'>
					  <h3 class='box-title'>Ganggbiete</h3>
					</div><!-- /.box-header -->
						<table class='table table-bordered table-hover'>
							<thead>
								<tr>
									<th>Name</th>
									<th>Besitzer</th>
									<th>Einnahmen</th>
									<th>letzter Angriff</th>
								</tr>
							</thead>
							<tbody>";
	
		$query = mysqli_query("SELECT * FROM gangs ORDER BY BesitzerFraktion") or die(mysqli_error());
		while($row = mysqli_fetch_assoc($query, $connection)){
			$id = $row["BesitzerFraktion"];
			$name = $row["Name"];
			$einnahmen = $row["Einnahmen"];
			$last = $row["LastAttacked"];
			
			$fname = $this->getFraktionName($id, $connection);
			
			$color = $this->getFraktionColor($fname, $connection);
			$label = $this->getFraktionLabel($fname,$color, $connection);
			
			echo "<tr><td>{$name}</td><td>{$label}</td><td>{$einnahmen}</td><td>{$last}</td></tr>";
		}
		
		echo "</tbody></table></div></div></div></section>";
	}
	
	function getMyFraktion($name, $connection){
		$id = $this->getFraktionID($name, $connection);
		/*
			Fraktions 				Datenbank ID
			SAPD					1
			Camorra					2
			Ballas					3
			Terroristen >> Triaden	4
			Liberty Tree Redaktion	5
			FBI						6
			Seville Families		7
			Army					8
			The Lost MC				9
			Medic					10
		*/
		if($id == 0){ }else{
			$fname = $this->getFraktionName($id, $connection);
			$rang = $this->getFraktionRang($name, $connection);
			$kasse = $this->getFraktionKasse($id, $connection);
			$drogen = $this->getFraktionDrogen($id, $connection);
			$mats= $this->getFraktionMaterials($id, $connection);
			$count = $this->getFraktionMemberCount($id, $connection);
			
			if($drogen >= 1000){
				$drogen = $drogen / 1000;
				$drogen = "{$drogen} kg.";
			}else{
				$drogen = "{$drogen} gr.";
			}
			
			
			$members = "";
			
			// get all Members
			$query = mysqli_query($connection, "SELECT * FROM userdata WHERE Fraktion = '$id'") or die(mysqli_error());
			$result_user = mysqli_num_rows($query);
			while($row = mysqli_fetch_assoc($query)){
				$nname = $row["Name"];
				$rang = $row["FraktionsRang"];
				$members = "{$members} <tr><td>{$nname}</td><td>{$rang}</td></tr>";
			}
			
			$blacklist = "";
			
			// get blacklist
			$query2 = mysqli_query($connection, "SELECT * FROM blacklist WHERE Fraktion = '$id'") or die(mysql_error());
			$result_black = mysqli_num_rows($query2);
			while($row = mysqli_fetch_assoc($query2)){
				$bname = $row["Name"];
				$bein = $row["Eintraeger"];
				$blacklist = "{$blacklist} <tr><td>{$bname}</td><td>{$bein}</td></tr>";
			}
			
			$fkasse = "
				<div class='info-box bg-blue'>
					<span class='info-box-icon'><i class='far fa-money-bill-alt'></i></span>
					<div class='info-box-content'>
					  <span class='info-box-text'>Fraktionskasse</span>
					  <span class='info-box-number'>{$kasse} $</span>
					  <div class='progress'>
						<div class='progress-bar' style='width: 0%'></div>
					  </div>
					  <span class='progress-description'>
						Es befinden sich {$kasse} $ in der Fraktionskasse
					  </span>
					</div><!-- /.info-box-content -->
				  </div><!-- /.info-box -->
			";
			
			$fdrogen = "
				<div class='info-box bg-blue'>
					<span class='info-box-icon'><i class='fa fa-leaf'></i></span>
					<div class='info-box-content'>
					  <span class='info-box-text'>Fraktionsdrogen</span>
					  <span class='info-box-number'>{$drogen}</span>
					  <div class='progress'>
						<div class='progress-bar' style='width: 0%'></div>
					  </div>
					  <span class='progress-description'>
						Es befinden sich {$drogen} Drogen im Depot
					  </span>
					</div><!-- /.info-box-content -->
				  </div><!-- /.info-box -->
			";
			
			$fmats = "
				<div class='info-box bg-blue'>
					<span class='info-box-icon'><i class='fa fa-industry'></i></span>
					<div class='info-box-content'>
					  <span class='info-box-text'>Fraktionsmaterialien</span>
					  <span class='info-box-number'>{$mats}</span>
					  <div class='progress'>
						<div class='progress-bar' style='width: 0%'></div>
					  </div>
					  <span class='progress-description'>
						Es befinden sich {$mats} Materialien im Depot
					  </span>
					</div><!-- /.info-box-content -->
				  </div><!-- /.info-box -->
			";
			
			$fcount = "
				<div class='info-box bg-green'>
					<span class='info-box-icon'><i class='fa fa-users'></i></span>
					<div class='info-box-content'>
					  <span class='info-box-text'>Mitglieder</span>
					  <span class='info-box-number'>{$count}</span>
					  <div class='progress'>
						<div class='progress-bar' style='width: 0%'></div>
					  </div>
					  <span class='progress-description'>
						Es befinden sich {$count} Spieler in der Fraktion
					  </span>
					</div><!-- /.info-box-content -->
				  </div><!-- /.info-box -->
			";
			
			echo "
			<section class='content-header'>
			  <h1>
				Meine Fraktion
				<small>{$fname}</small>
			  </h1>
			</section>

			<!-- Main content -->
			<section class='content'>
				<div class='callout callout-info'>
					<strong>Hallo {$name}</strong>
					<p>Sie sind Mitglied der Fraktion {$fname}, Ihr aktueller Rang ist {$rang}</p>
			  </div>
			  <div class='row'>
				<div class='col-md-6'>
					<div class='box'>
						<div class='box-header'>
					  <h3 class='box-title'>Unsere Mitglieder ({$result_user})</h3>
					</div><!-- /.box-header -->
						<table class='table table-bordered table-hover'>
							<thead>
								<tr>
									<th>Name</th>
									<th>Rang</th>
								</tr>
							</thead>
							<tbody>
								{$members}
							</tbody>
						</table>
					</div>
					<div class='box'>
						<div class='box-header'>
					  <h3 class='box-title'>Blacklist ({$result_black})</h3>
					</div><!-- /.box-header -->
						<table class='table table-bordered table-hover'>
							<thead>
								<tr>
									<th>Name</th>
									<th>eingetragen von</th>
								</tr>
							</thead>
							<tbody>
								{$blacklist}
							</tbody>
						</table>
					</div>
				</div>
				<div class='col-md-6'>
					{$fkasse}
					{$fdrogen}
					{$fmats}
					{$fcount}
				</div>
			</section>
			";
		}
		
	}
$fraktionsid = getFraktionID($UName, $connection);
	
$query_ucp_fraktion_db = "SELECT * FROM ucp_fraktion WHERE id = '$fraktionsid'";
$ucp_fraktion_db = mysqli_query($connection, $query_ucp_fraktion_db) or die(mysqli_error());
$row_ucp_fraktion_db = mysqli_fetch_assoc($ucp_fraktion_db);
$totalRows_ucp_fraktion_db = mysqli_num_rows($ucp_fraktion_db);

$query_userdataall_db = "SELECT * FROM userdata ORDER BY userdata.Wanteds desc";
$userdataall_db = mysqli_query($connection, $query_userdataall_db) or die(mysqli_error());
$row_userdataall_db = mysqli_fetch_assoc($userdataall_db);
$totalRows_userdataall_db = mysqli_num_rows($userdataall_db);

$query_fraktionen_db = "SELECT * FROM fraktionen WHERE id = '$fraktionsid'";
$fraktionen_db = mysqli_query($connection, $query_fraktionen_db) or die(mysqli_error());
$row_fraktionen_db = mysqli_fetch_assoc($fraktionen_db);
$totalRows_fraktionen_db = mysqli_num_rows($fraktionen_db);

if(getFraktionRang($UName, $connection) < 5) { 
	$goto = "../";
	header(sprintf("Location: %s", $goto));
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
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="../../../dist/css/skins/skin-yellow.min.css">

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
<body class="hold-transition skin-yellow fixed" style="overflow: hidden;">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="../../../main.php" class="logo">
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
                      <a href="../../mein-profil/mein-profil.php" class="btn btn-default btn-flat">Profil</a>
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

          <!-- Sidebar user panel (optional) -->
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
            <li><a href="../../mein-profil/"><i class="fa fa-user"></i> <span>Mein Profil</span></a></li>
            <li><a href="../../meine-fahrzeuge/"><i class="fa fa-car"></i> <span>Meine Fahrzeuge</span></a></li>
            <li><a href="../../account-verwalten"><i class="fa fa-pencil-alt"></i> <span>Account Verwalten</span></a></li>
            <li><a href="../../online-banking/"><i class="far fa-money-bill-alt"></i> <span>Online Banking</span></a></li>
			<?php if(isFraktion($UName, $connection) == true) { ?>
			<li class="header">Fraktion</li>
			<?php 
				$fraktionsname = getFraktionName($row_userdata_db['Fraktion'], $connection);
				echo '<li class="active"><a href="#"><i class="fa fa-users"></i> <span>'.$fraktionsname.'</span></a></li>'; ?>
			
			<?php } else {} ?>
			
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
		
        <!-- Main content -->
        <section class="content">
				<?php /* ?>
        	<style>
  				#erfolg { display: none; } #erfolg:target{ display: block;}
  			</style>
        	
			<div class="rows">
				<div class="col-md-2"></div>
				<div class="col-md-8">
                	<div  class="alert alert-success alert-dismissible" role="alert" hidden>
            	<strong>Erfolgreich!</strong> Die Rangbezeicnung wurde aktualisiert
  			</div>
            
            <div class="alert alert-success alert-dismissible" role="alert" id="erfolg">
  <button type="button" class="close" data-dismiss="alert" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
  <strong>Erfolgreich!</strong> Die Rangbezeicnung wurde aktualisiert
</div>
					<div class="box box-warning">
                    	<div class="box-header with-border">
    						<h3 class="box-title">Rangnamen editieren</h3>
    							<div class="box-tools pull-right">
      								<a href="../" class="btn btn-box-tool"><i class="fa fa-times"></i></a>
    							</div><!-- /.box-tools -->
						<div class="box-body">
                        <strong>Rang 0</strong>
							<form method="POST" action="<?php echo $editFormAction; ?>" name="rank0">
								<div class="input-group">
								  <input type="text" name="rank0text" class="form-control" placeholder="<?php echo $row_fraktionen_db['rank0name']; ?>">
									<span class="input-group-btn">
										<button type="submit" id="rank0-button" class="btn btn-flat"><i class="fa fa-edit"></i></button>
									</span>
								</div>
                                <input name="fid" type="hidden" value="<?php echo $fraktionsid; ?>">
                                <input type="hidden" name="MM_update" value="rank0">
							</form>
                            <br/>
                          <strong>Rang 1</strong>
							<form method="POST" action="<?php echo $editFormAction; ?>" name="rank1">
								<div class="input-group">
								  <input type="text" name="rank1text" class="form-control" placeholder="<?php echo $row_fraktionen_db['rank1name']; ?>">
									<span class="input-group-btn">
										<button type="submit" id="rank1-button" class="btn btn-flat"><i class="fa fa-edit"></i></button>
									</span>
								</div>
                                <input name="fid" type="hidden" value="<?php echo $fraktionsid; ?>">
                                <input type="hidden" name="MM_update" value="rank1">
							</form>
                            <br/>
                            <strong>Rang 2</strong>
<form method="POST" action="<?php echo $editFormAction; ?>" name="rank2">
								<div class="input-group">
									<input type="text" name="rank2text" class="form-control" placeholder="<?php echo $row_fraktionen_db['rank2name']; ?>" required>
									<span class="input-group-btn">
										<button type="submit" id="rank2-button" class="btn btn-flat"><i class="fa fa-edit"></i></button>
									</span>
								</div>
                                <input name="fid" type="hidden" value="<?php echo $fraktionsid; ?>">
                                <input type="hidden" name="MM_update" value="rank2">
						  </form>
                            <br/>
                            <strong>Rang 3</strong>
                            <form method="POST" action="<?php echo $editFormAction; ?>" name="rank3">
							  <div class="input-group">
								<input type="text" name="rank3text" class="form-control" placeholder="<?php echo $row_fraktionen_db['rank3name']; ?>" required>
									<span class="input-group-btn">
										<button type="submit" id="rank3-button" class="btn btn-flat"><i class="fa fa-edit"></i></button>
									</span>
							  </div>
                                <input name="fid" type="hidden" value="<?php echo $fraktionsid; ?>">
                                <input type="hidden" name="MM_update" value="rank3">
						  </form>
                            <br/>
                            <strong>Rang 4</strong>
                            <form method="POST" action="<?php echo $editFormAction; ?>" name="rank4">
							  <div class="input-group">
								<input type="text" name="rank4text" class="form-control" placeholder="<?php echo $row_fraktionen_db['rank4name']; ?>" required>
									<span class="input-group-btn">
										<button type="submit" id="rank4-button" class="btn btn-flat"><i class="fa fa-edit"></i></button>
									</span>
							  </div>
                                <input name="fid" type="hidden" value="<?php echo $fraktionsid; ?>">
                                <input type="hidden" name="MM_update" value="rank4">
						  </form>
                            <br/>
                            <strong>Rang 5</strong>
<form method="POST" action="<?php echo $editFormAction; ?>" name="rank5">
								<div class="input-group">
									<input type="text" name="rank5text" class="form-control" placeholder="<?php echo $row_fraktionen_db['rank5name']; ?>" required >
									<span class="input-group-btn">
										<button type="submit" id="rank5-button" class="btn btn-flat"><i class="fa fa-edit"></i></button>
									</span>
								</div>
                                <input name="fid" type="hidden" value="<?php echo $fraktionsid; ?>">
                                <input type="hidden" name="MM_update" value="rank5">
						  </form>
					  </div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>
				<div class="col-md-2"></div>
			</div>
				<?php */ ?>
        </section><!-- /.content -->
	</div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      
</div><!-- ./wrapper -->
<?php include ("../../../dist/includes/footer.php"); ?>
<!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
         
<script>
		$(document).ready(function() {
    
      if(window.location.href.indexOf('#erfolg') != -1) {
        $('#erfolg').alert('show');
      }
    
    });
	 </script>
  </body>
</html>
<?php
mysqli_free_result($players_db);

mysqli_free_result($userdata_db);

mysqli_free_result($ucp_fraktion_db);

mysqli_free_result($userdataall_db);

mysqli_free_result($fraktionen_db);
?>

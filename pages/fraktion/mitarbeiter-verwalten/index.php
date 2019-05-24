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

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
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
		$query = mysqli_query($connection, "SELECT * FROM userdata WHERE Fraktion = '$id'") or die(mysqli_error());
		$result = mysqli_num_rows($query);
		return $result;
	}
	
	function getGangarea(){
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
	
		$query = mysqli_query($connection, "SELECT * FROM gangs ORDER BY BesitzerFraktion") or die(mysqli_error());
		while($row = mysqli_fetch_assoc($query)){
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
			$query2 = mysqli_query($connection, "SELECT * FROM blacklist WHERE Fraktion = '$id'") or die(mysqli_error());
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

$maxRows_userdataall_db = 5;
$pageNum_userdataall_db = 0;
if (isset($_GET['pageNum_userdataall_db'])) {
  $pageNum_userdataall_db = $_GET['pageNum_userdataall_db'];
}
$startRow_userdataall_db = $pageNum_userdataall_db * $maxRows_userdataall_db;

$query_userdataall_db = "SELECT * FROM userdata WHERE Fraktion = '$fraktionsid' ORDER BY FraktionsRang desc";
$query_limit_userdataall_db = sprintf("%s LIMIT %d, %d", $query_userdataall_db, $startRow_userdataall_db, $maxRows_userdataall_db);
$userdataall_db = mysqli_query($connection, $query_limit_userdataall_db) or die(mysqli_error());
$row_userdataall_db = mysqli_fetch_assoc($userdataall_db);

if (isset($_GET['totalRows_userdataall_db'])) {
  $totalRows_userdataall_db = $_GET['totalRows_userdataall_db'];
} else {
  $all_userdataall_db = mysqli_query($connection, $query_userdataall_db);
  $totalRows_userdataall_db = mysqli_num_rows($all_userdataall_db);
}
$totalPages_userdataall_db = ceil($totalRows_userdataall_db/$maxRows_userdataall_db)-1;

$query_fraktionen_db = "SELECT * FROM fraktionen WHERE id = '$fraktionsid'";
$fraktionen_db = mysqli_query($connection, $query_fraktionen_db) or die(mysqli_error());
$row_fraktionen_db = mysqli_fetch_assoc($fraktionen_db);
$totalRows_fraktionen_db = mysqli_num_rows($fraktionen_db);

$maxRows_ucp_fraktion_einladungen_db = 5;
$pageNum_ucp_fraktion_einladungen_db = 0;
if (isset($_GET['pageNum_ucp_fraktion_einladungen_db'])) {
  $pageNum_ucp_fraktion_einladungen_db = $_GET['pageNum_ucp_fraktion_einladungen_db'];
}
$startRow_ucp_fraktion_einladungen_db = $pageNum_ucp_fraktion_einladungen_db * $maxRows_ucp_fraktion_einladungen_db;

$query_ucp_fraktion_einladungen_db = "SELECT * FROM ucp_fraktion_einladung WHERE fid = '$fraktionsid'";
$query_limit_ucp_fraktion_einladungen_db = sprintf("%s LIMIT %d, %d", $query_ucp_fraktion_einladungen_db, $startRow_ucp_fraktion_einladungen_db, $maxRows_ucp_fraktion_einladungen_db);
$ucp_fraktion_einladungen_db = mysqli_query($connection, $query_limit_ucp_fraktion_einladungen_db) or die(mysqli_error());
$row_ucp_fraktion_einladungen_db = mysqli_fetch_assoc($ucp_fraktion_einladungen_db);

if (isset($_GET['totalRows_ucp_fraktion_einladungen_db'])) {
  $totalRows_ucp_fraktion_einladungen_db = $_GET['totalRows_ucp_fraktion_einladungen_db'];
} else {
  $all_ucp_fraktion_einladungen_db = mysqli_query($connection, $query_ucp_fraktion_einladungen_db);
  $totalRows_ucp_fraktion_einladungen_db = mysqli_num_rows($all_ucp_fraktion_einladungen_db);
}
$totalPages_ucp_fraktion_einladungen_db = ceil($totalRows_ucp_fraktion_einladungen_db/$maxRows_ucp_fraktion_einladungen_db)-1;

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
<body class="hold-transition skin-yellow fixed">
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
              <p><?php echo $UName; ?></p> <?php isPlayerOnline($connection, $UName); ?>
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
				echo '<li class="active"><a href="../"><i class="fa fa-users"></i> <span>'.$fraktionsname.'</span></a></li>'; ?>
			
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
        <style>
			/* Erfolge */
  			#erfolg { display: none; } #erfolg:target{ display: block;}
			#rga { display: none; }    #rga:target{ display: block;}
			#ezg { display: none; }    #ezg:target{ display: block;}
			/* Fehler */
			#bif { display: none; }    #bif:target{ display: block;}
			#dkdnse { display: none; } #dkdnse:target{ display: block;}
  		</style>
        
        <div class="alert alert-success alert-dismissible" role="alert" id="erfolg">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
  			<strong>Erfolgreich!</strong> Dem Spieler wurde eine Einladung gesendet.
		</div>
        
        <div class="alert alert-success alert-dismissible" role="alert" id="rga">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
  			<strong>Erfolgreich!</strong> Der Rang des Benutzers wurde geändert.
		</div>
        
        <div class="alert alert-success alert-dismissible" role="alert" id="ezg">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
  			<strong>Erfolgreich!</strong> Die Einladung in die Fraktion wurde zurückgezogen.
		</div>
        
        <div class="alert alert-danger alert-dismissible" role="alert" id="bif">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
  			<strong>Fehler!</strong> Der Spieler ist bereits in einer Fraktion.
		</div>
        
        <div class="alert alert-danger alert-dismissible" role="alert" id="dkdnse">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
  			<strong>Fehler!</strong> Du kannst dich nicht selber einladen.
		</div>
<?php
$queryString_userdataall_db = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_userdataall_db") == false && 
        stristr($param, "totalRows_userdataall_db") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_userdataall_db = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_userdataall_db = sprintf("&totalRows_userdataall_db=%d%s", $totalRows_userdataall_db, $queryString_userdataall_db);
?>
<div class="box box-warning">
  				<div class="box-header with-border">
    				<h3 class="box-title">Mitarbeiter verwalten</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      					<a href="../" class="btn btn-box-tool"><i class="fa fa-times"></i></a>
    				</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
  				<div class="box-body">
<table class="table table-bordered table-hover">
                            	<thead>
                                	<tr>
                                    	<th>Foto</th>
                                        <th>Name</th>
										<th>Rang</th>
										<th>Aktion</th>
                                    </tr>
                               	</thead>
                                <tbody>
<?php do { ?>
                            		  <tr>
                            		    <td style="width: 70px;">
                                        <center>
                            		      <img src="../../../dist/img/samp/avatar/1-<?php echo $row_userdataall_db['Skinid']; ?>.png" class="img-circle" alt="User Image" style="width: 50px; height: 50px;">                          		      
                                        </center>
                                          </td>
                            		    <td style="width: 70px;">
                            		      <a href="../../mein-profil/show/index.php?id=<?php echo $row_userdataall_db['Name']; ?>"><?php echo $row_userdataall_db['Name']; ?><?php isPlayerOnline($connection, $row_userdataall_db['Name']); ?></a>                          		      </td>
                            		    <td>
                            		      <?php 	if($row_userdataall_db['FraktionsRang'] == 0)
													{
														echo $row_fraktionen_db['rank0name'];
													} else if($row_userdataall_db['FraktionsRang'] == 1)
													{
														echo $row_fraktionen_db['rank1name'];
													} else if($row_userdataall_db['FraktionsRang'] == 2)
													{
														echo $row_fraktionen_db['rank2name'];
													} else if($row_userdataall_db['FraktionsRang'] == 3)
													{
														echo $row_fraktionen_db['rank3name'];
													} else if($row_userdataall_db['FraktionsRang'] == 4)
													{
														echo $row_fraktionen_db['rank4name'];
													} else if($row_userdataall_db['FraktionsRang'] == 5)
													{
														echo $row_fraktionen_db['rank5name'];
													} else 
													{
														echo "ERROR: UNGÜLTIGER RANG!";
													} ?>
                            		      (Rang: <?php echo $row_userdataall_db['FraktionsRang']; ?>) </td>
                            		    <td style="width: 210px;">
                                        	<form method="post" action="rauswerfen.php">
                                            	<button class="btn btn-danger btn-xs" type="submit" value="<?php echo 			$row_userdataall_db['Name']; ?>" name="name" style="float:left;">Rauswerfen</button>
                                            </form>
                                            <form method="post" action="changerang.php">
                                            	<button class="btn btn-warning btn-xs" type="submit" value="<?php echo $row_userdataall_db['Name']; ?>" name="name" style="float:left; margin-left: 10px;">Rang ändern</button>
                                            </form>
 										</td>
                          		    </tr>
                            		  <?php } while ($row_userdataall_db = mysqli_fetch_assoc($userdataall_db)); ?>
                   	  </tbody>
				  </table>
  				</div><!-- /.box-body -->
		<div class="box-footer">
                	<a href="adduser.php" class="btn btn-success"><i class="fa fa-user-plus"></i> Mitglied hinzufügen</a>
  					<div class="pull-right btn-group">
                  		<!-- Erste Seite -->
                    	<?php if ($pageNum_userdataall_db > 0) { // Anzeigen wenn nicht erste Seite ?>
                        	<?php if ($pageNum_userdataall_db > 1) { // Anzeigen wenn nicht zweite Seite ?>
                          <a href="<?php printf("%s?pageNum_userdataall_db=%d%s", $currentPage, 0, $queryString_userdataall_db); ?>" class="btn btn-default">
                            <i class="fa fa-angle-double-left"></i>  
                            <?php } // Anzeigen wenn nicht zweite Seite ?>                        </a>
                          <?php } // Anzeigen wenn nicht erste Seite ?>

                  		<!-- Nächste Seite -->
                        <?php if ($pageNum_userdataall_db > 0) { // Anzeigen wenn nicht erste Seite ?>
                          <a href="<?php printf("%s?pageNum_userdataall_db=%d%s", $currentPage, max(0, $pageNum_userdataall_db - 1), $queryString_userdataall_db); ?>" class="btn btn-default"> <i class="fa fa-angle-left"></i> </a>
                          <?php } // Anzeigen wenn nicht erst Seite ?>
                        <!-- Seite zurück -->
                        <?php if ($pageNum_userdataall_db < $totalPages_userdataall_db) { // Anzeigen wenn nicht letzte Seite ?>
                          <a href="<?php printf("%s?pageNum_userdataall_db=%d%s", $currentPage, min($totalPages_userdataall_db, $pageNum_userdataall_db + 1), $queryString_userdataall_db); ?>" class="btn btn-default"> <i class="fa fa-angle-right"></i> </a>
                          <?php } // Anzeigen wenn nicht letzte Seite ?>
                        <!-- Letzte Seite -->
                        <?php if ($pageNum_userdataall_db < $totalPages_userdataall_db) { // Anzeigen wenn nicht letzte Seite ?>
                        	<?php if ($pageNum_userdataall_db < $totalPages_userdataall_db - 1) { // Anzeigen wenn nicht vorletzte Seite ?>
                          <a href="<?php printf("%s?pageNum_userdataall_db=%d%s", $currentPage, $totalPages_userdataall_db, $queryString_userdataall_db); ?>" class="btn btn-default"> <i class="fa fa-angle-double-right"></i> </a>
                          	<?php } // Anzeigen wenn nicht vorletzte Seite ?>
						  <?php } // Anzeigen wenn nicht letzte Seite ?>
</div>
                </div><!-- box-footer -->
       	  </div>
            <?php if($totalRows_ucp_fraktion_einladungen_db == 0) {} else {?>
                <div class="box box-warning">
  				<div class="box-header with-border">
    				<h3 class="box-title">Unbestätigte einladungen</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      					<a href="../" class="btn btn-box-tool"><i class="fa fa-times"></i></a>
    				</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
  				<div class="box-body">                  
                  <table class="table table-bordered table-hover">
                  <thead>
                                	<tr>
                                    	<th>Foto</th>
                                        <th>Name</th>
										<th>Aktion</th>
                                    </tr>
                   	</thead>
                                <tbody>
                            		  <?php do { ?>
                                      	<?php
											$skinid_einladung = $row_ucp_fraktion_einladungen_db['empfaenger'];

											$query_ucp_fraktion_einladung_skin_db = "SELECT userdata.Skinid FROM userdata WHERE Name = '$skinid_einladung'";
											$ucp_fraktion_einladung_skin_db = mysqli_query($connection, $query_ucp_fraktion_einladung_skin_db) or die(mysqli_error());
											$row_ucp_fraktion_einladung_skin_db = mysqli_fetch_assoc($ucp_fraktion_einladung_skin_db);
											$totalRows_ucp_fraktion_einladung_skin_db = mysqli_num_rows($ucp_fraktion_einladung_skin_db);

$queryString_ucp_fraktion_einladungen_db = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_ucp_fraktion_einladungen_db") == false && 
        stristr($param, "totalRows_ucp_fraktion_einladungen_db") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_ucp_fraktion_einladungen_db = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_ucp_fraktion_einladungen_db = sprintf("&totalRows_ucp_fraktion_einladungen_db=%d%s", $totalRows_ucp_fraktion_einladungen_db, $queryString_ucp_fraktion_einladungen_db);
mysqli_free_result($ucp_fraktion_einladung_skin_db);
?>
                            		    <tr>
                           		          <td style="width: 70px;">
                                          <center>
                           		            <img src="../../../dist/img/samp/avatar/1-<?php echo $row_ucp_fraktion_einladung_skin_db['Skinid']; ?>.png" class="img-circle" alt="User Image" style="width: 50px; height: 50px;">                          		  </center>
                                            </td>
                            		      <td>
                            		        <a href="../../mein-profil/show/index.php?id=<?php echo $row_ucp_fraktion_einladung_skin_db['Skinid']; ?>"><?php echo $row_ucp_fraktion_einladungen_db['empfaenger']; ?></a>                          		      </td>
                            		      <td style="list-style: none; width: 210px;">
                                          	<form method="post" action="abortinvite.php">
                                            	<button class="btn btn-xs btn-danger" type="submit" value="<?php echo $row_ucp_fraktion_einladungen_db['empfaenger']; ?>" name="name">Einladung zurückziehen</button>
                                            </form>
                            		      </td>
                          		      </tr>
                            		    <?php } while ($row_ucp_fraktion_einladungen_db = mysql_fetch_assoc($ucp_fraktion_einladungen_db)); ?>
                   	  </tbody>
				  </table>
  				</div><!-- /.box-body -->
                <div class="box-footer">
               	  <div class="pull-right btn-group">
                  <!-- Erste Seite -->
                  <?php if ($pageNum_ucp_fraktion_einladungen_db > 0) { // Anzeigen wenn nicht erste Seite ?>
                      <?php if ($pageNum_ucp_fraktion_einladungen_db > 1) { // Anzeigen wenn nicht 2. Seite ?>
                  <a class="btn btn-default" href="<?php printf("%s?pageNum_ucp_fraktion_einladungen_db=%d%s", $currentPage, 0, $queryString_ucp_fraktion_einladungen_db); ?>">
                      <i class="fa fa-angle-double-left"></i>                    </a>
                      <?php } // Anzeigen wenn nicht 2. Seite ?>
                  <?php } // Anzeigen wenn nicht erste Seite ?>

                  <!-- Nächste Seite -->
                  <?php if ($pageNum_ucp_fraktion_einladungen_db > 0) { // Anzeigen wenn nicht erste Seite ?>
                  <a class="btn btn-default" href="<?php printf("%s?pageNum_ucp_fraktion_einladungen_db=%d%s", $currentPage, max(0, $pageNum_ucp_fraktion_einladungen_db - 1), $queryString_ucp_fraktion_einladungen_db); ?>">
                      <i class="fa fa-angle-left"></i>                      </a>
                    <?php } // Anzeigen wenn nicht erste Seite ?>

                  <!-- Seite zurück -->
                  <?php if ($pageNum_ucp_fraktion_einladungen_db < $totalPages_ucp_fraktion_einladungen_db) { // Anzeigen wenn nicht letzte Seite ?>
                    <a class="btn btn-default" href="<?php printf("%s?pageNum_ucp_fraktion_einladungen_db=%d%s", $currentPage, min($totalPages_ucp_fraktion_einladungen_db, $pageNum_ucp_fraktion_einladungen_db + 1), $queryString_ucp_fraktion_einladungen_db); ?>"> <i class="fa fa-angle-right"></i> </a>
                    <?php } // Anzeigen wenn nicht letze Seite ?>
					
                    <!-- Letzte Seite -->
                    <?php if ($pageNum_ucp_fraktion_einladungen_db < $totalPages_ucp_fraktion_einladungen_db) { // Anzeigen wenn nicht letzte Seite ?>
                    	<?php if ($pageNum_ucp_fraktion_einladungen_db < $totalPages_ucp_fraktion_einladungen_db - 1) { // Anzeigen wenn nicht vorletzte Seite ?>
                      <a class="btn btn-default" href="<?php printf("%s?pageNum_ucp_fraktion_einladungen_db=%d%s", $currentPage, $totalPages_ucp_fraktion_einladungen_db, $queryString_ucp_fraktion_einladungen_db); ?>"> <i class="fa fa-angle-double-right"></i> </a>
                      	<?php } // Anzeigen wenn nicht vorletzte Seite ?>
                      <?php } // Anzeigen wenn nicht letzte Seite ?>
</div>
  				</div><!-- box-footer -->
		  </div><!-- /.box -->
		  <?php } ?>
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
	  if(window.location.href.indexOf('#rga') != -1) {
        $('#rga').alert('show');
      }
	  if(window.location.href.indexOf('#ezg') != -1) {
        $('#ezg').alert('show');
      }
	  if(window.location.href.indexOf('#bif') != -1) {
        $('#bif').alert('show');
      }
	  if(window.location.href.indexOf('#dkdnse') != -1) {
        $('#dkdnse').alert('show');
      }
    
    });
	 </script>
<script type="text/javascript">
	iCurrentID = null;
	
	
	function setKickID(iID)
	{
		iCurrentID = iID;
		window.location.href = "rauswerfen.php?id=" + iCurrentID; 
	}
</script>
</body>
</html>
<?php
mysqli_free_result($players_db);

mysqli_free_result($userdata_db);

mysqli_free_result($ucp_fraktion_db);

mysqli_free_result($userdataall_db);

mysqli_free_result($fraktionen_db);

mysqli_free_result($ucp_fraktion_einladungen_db);


?>

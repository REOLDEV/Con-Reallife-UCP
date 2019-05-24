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

$query_userdata_db = "SELECT * FROM userdata WHERE Name = '$UName'";
$userdata_db = mysqli_query($connection, $query_userdata_db) or die(mysqli_error());
$row_userdata_db = mysqli_fetch_assoc($userdata_db);
$totalRows_userdata_db = mysqli_num_rows($userdata_db);

$query_vehicles_db = "SELECT * FROM vehicles WHERE Besitzer = '$UName'";
$vehicles_db = mysqli_query($connection, $query_vehicles_db) or die(mysqli_error());
$row_vehicles_db = mysqli_fetch_assoc($vehicles_db);
$totalRows_vehicles_db = mysqli_num_rows($vehicles_db);

$query_players_db = "SELECT * FROM players WHERE Name = '$UName'";
$players_db = mysqli_query($connection, $query_players_db) or die(mysqli_error());
$row_players_db = mysqli_fetch_assoc($players_db);
$totalRows_players_db = mysqli_num_rows($players_db);

$licht = $row_vehicles_db["Lights"];
$farbe = $row_vehicles_db["Farbe"];

$farbea = explode('|',$farbe);
$lichta = explode('|',$licht);

include ("../../dist/includes/fraktion_abfragen.php");
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
	.content {
		padding-bottom: 0px;
	}
  </style>
<body class="hold-transition skin-yellow" >
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
                      <a href="../mein-profil/mein-profil.php" class="btn btn-default btn-flat">Profil</a>
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
            <li><a href="../mein-profil/"><i class="fa fa-user"></i> <span>Mein Profil</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-car"></i> <span>Meine Fahrzeuge</span></a></li>
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
      <div class="content-wrapper" style="min-height: 10px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Meine Fahrzeuge
            <small>Hier kannst du Informationen über deine Fahrzeuge einsehen!</small>          </h1>
          </section>
        
        <!-- Main content -->
        <section class="content" id="wrapper" style="height: auto;">
        <?php if($totalRows_vehicles_db == 0) { ?>
          <div class="alert alert-danger">
                <h4><i class="icon fa fa-ban"></i> Fehler!</h4>
                Du besitzt keine Fahrzeuge!
              </div>
        <?php  } else  { ?>
            <?php do { ?>
            <div class="row">
                <div class="col-md-5">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php //CarID -> CarName 211 FUCKING Teile #2stunden verschwendet
if($row_vehicles_db['Typ'] < 400) {
	$CarName = "Fehlerhafte ID!";
} else if ($row_vehicles_db['Typ'] > 611) {
$CarName = "Fehlerhafte ID!";
} else if ($row_vehicles_db['Typ'] == 400) {
	$CarName = "Landstalker";
} else if ($row_vehicles_db['Typ'] == 401) {
	$CarName = "Bravura";
} else if ($row_vehicles_db['Typ'] == 402) {
	$CarName = "Buffalo";
} else if ($row_vehicles_db['Typ'] == 403) {
	$CarName = "Linerunner";
} else if ($row_vehicles_db['Typ'] == 404) {
	$CarName = "Perenniel";
} else if ($row_vehicles_db['Typ'] == 405) {
	$CarName = "Sentinel";
} else if ($row_vehicles_db['Typ'] == 406) {
	$CarName = "Dumper";
} else if ($row_vehicles_db['Typ'] == 407) {
	$CarName = "Firetruck";
} else if ($row_vehicles_db['Typ'] == 408) {
	$CarName = "Trashmaster";
} else if ($row_vehicles_db['Typ'] == 409) {
	$CarName = "Stretch";
} else if ($row_vehicles_db['Typ'] == 410) {
	$CarName = "Manana";
} else if ($row_vehicles_db['Typ'] == 411) {
	$CarName = "Infernus";
} else if ($row_vehicles_db['Typ'] == 412) {
	$CarName = "Voodoo";
} else if ($row_vehicles_db['Typ'] == 413) {
	$CarName = "Pony";
} else if ($row_vehicles_db['Typ'] == 414) {
	$CarName = "Mule";
} else if ($row_vehicles_db['Typ'] == 415) {
	$CarName = "Cheetah";
} else if ($row_vehicles_db['Typ'] == 416) {
	$CarName = "Ambulance";
} else if ($row_vehicles_db['Typ'] == 417) {
	$CarName = "Leviathan";
} else if ($row_vehicles_db['Typ'] == 418) {
	$CarName = "Moonbeam";
} else if ($row_vehicles_db['Typ'] == 419) {
	$CarName = "Esperanto";
} else if ($row_vehicles_db['Typ'] == 420) {
	$CarName = "Taxi";
} else if ($row_vehicles_db['Typ'] == 421) {
	$CarName = "Washington";
} else if ($row_vehicles_db['Typ'] == 422) {
	$CarName = "Bobcat";
} else if ($row_vehicles_db['Typ'] == 423) {
	$CarName = "Mr Whoopee";
} else if ($row_vehicles_db['Typ'] == 424) {
	$CarName = "BF Injection";
} else if ($row_vehicles_db['Typ'] == 425) {
	$CarName = "Hunter";
} else if ($row_vehicles_db['Typ'] == 426) {
	$CarName = "Premier";
} else if ($row_vehicles_db['Typ'] == 427) {
	$CarName = "Enforcer";
} else if ($row_vehicles_db['Typ'] == 428) {
	$CarName = "Securicar";
} else if ($row_vehicles_db['Typ'] == 429) {
	$CarName = "Banshee";
} else if ($row_vehicles_db['Typ'] == 430) {
	$CarName = "Predator";
} else if ($row_vehicles_db['Typ'] == 431) {
	$CarName = "Bus";
} else if ($row_vehicles_db['Typ'] == 432) {
	$CarName = "Rhino";
} else if ($row_vehicles_db['Typ'] == 433) {
	$CarName = "Barracks";
} else if ($row_vehicles_db['Typ'] == 434) {
	$CarName = "Hotknife";
} else if ($row_vehicles_db['Typ'] == 435) {
	$CarName = "Article Trailer";
} else if ($row_vehicles_db['Typ'] == 436) {
	$CarName = "Previon";
} else if ($row_vehicles_db['Typ'] == 437) {
	$CarName = "Coach";
} else if ($row_vehicles_db['Typ'] == 438) {
	$CarName = "Cabbie";
} else if ($row_vehicles_db['Typ'] == 439) {
	$CarName = "Stallion";
} else if ($row_vehicles_db['Typ'] == 440) {
	$CarName = "Rumpo";
} else if ($row_vehicles_db['Typ'] == 441) {
	$CarName = "RC Bandit";
} else if ($row_vehicles_db['Typ'] == 442) {
	$CarName = "Romero";
} else if ($row_vehicles_db['Typ'] == 443) {
	$CarName = "Packer";
} else if ($row_vehicles_db['Typ'] == 444) {
	$CarName = "Monster";
} else if ($row_vehicles_db['Typ'] == 445) {
	$CarName = "Admiral";
} else if ($row_vehicles_db['Typ'] == 446) {
	$CarName = "Squallo";
} else if ($row_vehicles_db['Typ'] == 447) {
	$CarName = "Seasparrow";
} else if ($row_vehicles_db['Typ'] == 448) {
	$CarName = "Pizzaboy";
} else if ($row_vehicles_db['Typ'] == 449) {
	$CarName = "Tram";
} else if ($row_vehicles_db['Typ'] == 450) {
	$CarName = "Article Trailer 2";
} else if ($row_vehicles_db['Typ'] == 451) {
	$CarName = "Turismo";
} else if ($row_vehicles_db['Typ'] == 452) {
	$CarName = "Speeder";
} else if ($row_vehicles_db['Typ'] == 453) {
	$CarName = "Reefer";
} else if ($row_vehicles_db['Typ'] == 454) {
	$CarName = "Tropic";
} else if ($row_vehicles_db['Typ'] == 455) {
	$CarName = "Flatbed";
} else if ($row_vehicles_db['Typ'] == 456) {
	$CarName = "Yankee";
} else if ($row_vehicles_db['Typ'] == 457) {
	$CarName = "Caddy";
} else if ($row_vehicles_db['Typ'] == 458) {
	$CarName = "Solair";
} else if ($row_vehicles_db['Typ'] == 459) {
	$CarName = "TopFun Van (Berkley's RC)";
} else if ($row_vehicles_db['Typ'] == 460) {
	$CarName = "Skimmer";
} else if ($row_vehicles_db['Typ'] == 461) {
	$CarName = "PCJ-600";
} else if ($row_vehicles_db['Typ'] == 462) {
	$CarName = "Faggio";
} else if ($row_vehicles_db['Typ'] == 463) {
	$CarName = "Freeway";
} else if ($row_vehicles_db['Typ'] == 464) {
	$CarName = "RC Baron";
} else if ($row_vehicles_db['Typ'] == 465) {
	$CarName = "RC Raider";
} else if ($row_vehicles_db['Typ'] == 466) {
	$CarName = "Glendale";
} else if ($row_vehicles_db['Typ'] == 467) {
	$CarName = "Oceanic";
} else if ($row_vehicles_db['Typ'] == 468) {
	$CarName = "Sanchez";
} else if ($row_vehicles_db['Typ'] == 469) {
	$CarName = "Sparrow";
} else if ($row_vehicles_db['Typ'] == 470) {
	$CarName = "Patriot";
} else if ($row_vehicles_db['Typ'] == 471) {
	$CarName = "Quad";
} else if ($row_vehicles_db['Typ'] == 472) {
	$CarName = "Coastguard";
} else if ($row_vehicles_db['Typ'] == 473) {
	$CarName = "Dinghy";
} else if ($row_vehicles_db['Typ'] == 474) {
	$CarName = "Hermes";
} else if ($row_vehicles_db['Typ'] == 475) {
	$CarName = "Sabre";
} else if ($row_vehicles_db['Typ'] == 476) {
	$CarName = "Rustler";
} else if ($row_vehicles_db['Typ'] == 477) {
	$CarName = "ZR-350";
} else if ($row_vehicles_db['Typ'] == 478) {
	$CarName = "Walton";
} else if ($row_vehicles_db['Typ'] == 479) {
	$CarName = "Regina";
} else if ($row_vehicles_db['Typ'] == 480) {
	$CarName = "Comet";
} else if ($row_vehicles_db['Typ'] == 481) {
	$CarName = "BMX";
} else if ($row_vehicles_db['Typ'] == 482) {
	$CarName = "Burrito";
} else if ($row_vehicles_db['Typ'] == 483) {
	$CarName = "Camper";
} else if ($row_vehicles_db['Typ'] == 484) {
	$CarName = "Marquis";
} else if ($row_vehicles_db['Typ'] == 485) {
	$CarName = "Baggage";
} else if ($row_vehicles_db['Typ'] == 486) {
	$CarName = "Dozer";
} else if ($row_vehicles_db['Typ'] == 487) {
	$CarName = "Maverick";
} else if ($row_vehicles_db['Typ'] == 488) {
	$CarName = "SAN News Maverick";
} else if ($row_vehicles_db['Typ'] == 489) {
	$CarName = "Rancher";
} else if ($row_vehicles_db['Typ'] == 490) {
	$CarName = "FBI Rancher";
} else if ($row_vehicles_db['Typ'] == 491) {
	$CarName = "Virgo";
} else if ($row_vehicles_db['Typ'] == 492) {
	$CarName = "Greenwood";
} else if ($row_vehicles_db['Typ'] == 493) {
	$CarName = "Jetmax";
} else if ($row_vehicles_db['Typ'] == 494) {
	$CarName = "Hotring Racer";
} else if ($row_vehicles_db['Typ'] == 495) {
	$CarName = "Sandking";
} else if ($row_vehicles_db['Typ'] == 496) {
	$CarName = "Blista Compact";
} else if ($row_vehicles_db['Typ'] == 497) {
	$CarName = "Police Maverickt";
} else if ($row_vehicles_db['Typ'] == 498) {
	$CarName = "Boxville";
} else if ($row_vehicles_db['Typ'] == 499) {
	$CarName = "Benson";
} else if ($row_vehicles_db['Typ'] == 500) {
	$CarName = "Mesa";
} else if ($row_vehicles_db['Typ'] == 501) {
	$CarName = "RC Goblin";
} else if ($row_vehicles_db['Typ'] == 502) {
	$CarName = "Hotring Racer";
} else if ($row_vehicles_db['Typ'] == 503) {
	$CarName = "Hotring Racer";
} else if ($row_vehicles_db['Typ'] == 504) {
	$CarName = "Bloodring Banger";
} else if ($row_vehicles_db['Typ'] == 505) {
	$CarName = "Rancher";
} else if ($row_vehicles_db['Typ'] == 506) {
	$CarName = "Super GT";
} else if ($row_vehicles_db['Typ'] == 507) {
	$CarName = "Elegant";
} else if ($row_vehicles_db['Typ'] == 508) {
	$CarName = "Journey";
} else if ($row_vehicles_db['Typ'] == 509) {
	$CarName = "Bike";
} else if ($row_vehicles_db['Typ'] == 510) {
	$CarName = "Mountain Bike";
} else if ($row_vehicles_db['Typ'] == 511) {
	$CarName = "Beagle";
} else if ($row_vehicles_db['Typ'] == 512) {
	$CarName = "Cropduster";
} else if ($row_vehicles_db['Typ'] == 513) {
	$CarName = "Stuntplane";
} else if ($row_vehicles_db['Typ'] == 514) {
	$CarName = "Tanker";
} else if ($row_vehicles_db['Typ'] == 515) {
	$CarName = "Roadtrain";
} else if ($row_vehicles_db['Typ'] == 516) {
	$CarName = "Nebula";
} else if ($row_vehicles_db['Typ'] == 517) {
	$CarName = "Majestic";
} else if ($row_vehicles_db['Typ'] == 518) {
	$CarName = "Buccaneer";
} else if ($row_vehicles_db['Typ'] == 519) {
	$CarName = "Shamal";
} else if ($row_vehicles_db['Typ'] == 520) {
	$CarName = "Hydra";
} else if ($row_vehicles_db['Typ'] == 521) {
	$CarName = "FCR-900";
} else if ($row_vehicles_db['Typ'] == 522) {
	$CarName = "NRG-500";
} else if ($row_vehicles_db['Typ'] == 523) {
	$CarName = "HPV1000";
} else if ($row_vehicles_db['Typ'] == 524) {
	$CarName = "Cement Truck";
} else if ($row_vehicles_db['Typ'] == 525) {
	$CarName = "Towtruck";
} else if ($row_vehicles_db['Typ'] == 526) {
	$CarName = "Fortune";
} else if ($row_vehicles_db['Typ'] == 527) {
	$CarName = "Cadrona";
} else if ($row_vehicles_db['Typ'] == 528) {
	$CarName = "FBI Truck";
} else if ($row_vehicles_db['Typ'] == 529) {
	$CarName = "Willard";
} else if ($row_vehicles_db['Typ'] == 530) {
	$CarName = "Forklift";
} else if ($row_vehicles_db['Typ'] == 531) {
	$CarName = "Tractor";
} else if ($row_vehicles_db['Typ'] == 532) {
	$CarName = "Combine Harvester";
} else if ($row_vehicles_db['Typ'] == 533) {
	$CarName = "Feltzer";
} else if ($row_vehicles_db['Typ'] == 534) {
	$CarName = "Remington";
} else if ($row_vehicles_db['Typ'] == 535) {
	$CarName = "Slamvan";
} else if ($row_vehicles_db['Typ'] == 536) {
	$CarName = "Blade";
} else if ($row_vehicles_db['Typ'] == 537) {
	$CarName = "Freight (Train)";
} else if ($row_vehicles_db['Typ'] == 538) {
	$CarName = "Brownstreak (Train)";
} else if ($row_vehicles_db['Typ'] == 539) {
	$CarName = "Vortex";
} else if ($row_vehicles_db['Typ'] == 540) {
	$CarName = "Vincent";
} else if ($row_vehicles_db['Typ'] == 541) {
	$CarName = "Bullet";
} else if ($row_vehicles_db['Typ'] == 542) {
	$CarName = "Clover";
} else if ($row_vehicles_db['Typ'] == 543) {
	$CarName = "Sadler";
} else if ($row_vehicles_db['Typ'] == 544) {
	$CarName = "Firetruck LA";
} else if ($row_vehicles_db['Typ'] == 545) {
	$CarName = "Hustler";
} else if ($row_vehicles_db['Typ'] == 546) {
	$CarName = "Intruder";
} else if ($row_vehicles_db['Typ'] == 547) {
	$CarName = "Primo";
} else if ($row_vehicles_db['Typ'] == 548) {
	$CarName = "Cargobob";
} else if ($row_vehicles_db['Typ'] == 549) {
	$CarName = "Tampa";
} else if ($row_vehicles_db['Typ'] == 550) {
	$CarName = "Sunrise";
} else if ($row_vehicles_db['Typ'] == 551) {
	$CarName = "Merit";
} else if ($row_vehicles_db['Typ'] == 552) {
	$CarName = "Utility Van";
} else if ($row_vehicles_db['Typ'] == 553) {
	$CarName = "Nevada";
} else if ($row_vehicles_db['Typ'] == 554) {
	$CarName = "Yosemite";
} else if ($row_vehicles_db['Typ'] == 555) {
	$CarName = "Windsor";
} else if ($row_vehicles_db['Typ'] == 556) {
	$CarName = 'Monster "A"';
} else if ($row_vehicles_db['Typ'] == 557) {
	$CarName = 'Monster "B"';
} else if ($row_vehicles_db['Typ'] == 558) {
	$CarName = "Uranus";
} else if ($row_vehicles_db['Typ'] == 559) {
	$CarName = "Jester";
} else if ($row_vehicles_db['Typ'] == 560) {
	$CarName = "Sultan";
} else if ($row_vehicles_db['Typ'] == 561) {
	$CarName = "Stratum";
} else if ($row_vehicles_db['Typ'] == 562) {
	$CarName = "Elegy";
} else if ($row_vehicles_db['Typ'] == 563) {
	$CarName = "Raindance";
} else if ($row_vehicles_db['Typ'] == 564) {
	$CarName = "RC Tiger";
} else if ($row_vehicles_db['Typ'] == 565) {
	$CarName = "Flash";
} else if ($row_vehicles_db['Typ'] == 566) {
	$CarName = "Tahoma";
} else if ($row_vehicles_db['Typ'] == 567) {
	$CarName = "Savanna";
} else if ($row_vehicles_db['Typ'] == 568) {
	$CarName = "Bandito";
} else if ($row_vehicles_db['Typ'] == 569) {
	$CarName = "Freight Flat Trailer (Train)";
} else if ($row_vehicles_db['Typ'] == 570) {
	$CarName = "Streak Trailer (Train)";
} else if ($row_vehicles_db['Typ'] == 571) {
	$CarName = "Kart";
} else if ($row_vehicles_db['Typ'] == 572) {
	$CarName = "Mower";
} else if ($row_vehicles_db['Typ'] == 573) {
	$CarName = "Dune";
} else if ($row_vehicles_db['Typ'] == 574) {
	$CarName = "Sweeper";
} else if ($row_vehicles_db['Typ'] == 575) {
	$CarName = "Broadway";
} else if ($row_vehicles_db['Typ'] == 576) {
	$CarName = "Tornado";
} else if ($row_vehicles_db['Typ'] == 577) {
	$CarName = "AT400";
} else if ($row_vehicles_db['Typ'] == 578) {
	$CarName = "DFT-30";
} else if ($row_vehicles_db['Typ'] == 579) {
	$CarName = "Huntley";
} else if ($row_vehicles_db['Typ'] == 580) {
	$CarName = "Stafford";
} else if ($row_vehicles_db['Typ'] == 581) {
	$CarName = "BF-400";
} else if ($row_vehicles_db['Typ'] == 582) {
	$CarName = "Newsvan";
} else if ($row_vehicles_db['Typ'] == 583) {
	$CarName = "Tug";
} else if ($row_vehicles_db['Typ'] == 584) {
	$CarName = "Petrol Trailer";
} else if ($row_vehicles_db['Typ'] == 585) {
	$CarName = "Emperor";
} else if ($row_vehicles_db['Typ'] == 586) {
	$CarName = "Wayfarer";
} else if ($row_vehicles_db['Typ'] == 587) {
	$CarName = "Euros";
} else if ($row_vehicles_db['Typ'] == 588) {
	$CarName = "Hotdog";
} else if ($row_vehicles_db['Typ'] == 589) {
	$CarName = "Club";
} else if ($row_vehicles_db['Typ'] == 590) {
	$CarName = "Freight Box Trailer (Train)";
} else if ($row_vehicles_db['Typ'] == 591) {
	$CarName = "Article Trailer 3";
} else if ($row_vehicles_db['Typ'] == 592) {
	$CarName = "Andromada";
} else if ($row_vehicles_db['Typ'] == 593) {
	$CarName = "Dodo";
} else if ($row_vehicles_db['Typ'] == 594) {
	$CarName = "RC Cam";
} else if ($row_vehicles_db['Typ'] == 595) {
	$CarName = "Launch";
} else if ($row_vehicles_db['Typ'] == 596) {
	$CarName = "Police Car (LSPD)";
} else if ($row_vehicles_db['Typ'] == 597) {
	$CarName = "Police Car (SFPD)";
} else if ($row_vehicles_db['Typ'] == 598) {
	$CarName = "Police Car (LVPD";
} else if ($row_vehicles_db['Typ'] == 599) {
	$CarName = "Police Ranger";
} else if ($row_vehicles_db['Typ'] == 600) {
	$CarName = "Picador";
} else if ($row_vehicles_db['Typ'] == 601) {
	$CarName = "S.W.A.T.";
} else if ($row_vehicles_db['Typ'] == 602) {
	$CarName = "Alpha";
} else if ($row_vehicles_db['Typ'] == 603) {
	$CarName = "Phoenix";
} else if ($row_vehicles_db['Typ'] == 604) {
	$CarName = "Glendale Shit";
} else if ($row_vehicles_db['Typ'] == 605) {
	$CarName = "Sadler Shit";
} else if ($row_vehicles_db['Typ'] == 606) {
	$CarName = 'Baggage Trailer "A"';
} else if ($row_vehicles_db['Typ'] == 607) {
	$CarName = 'Baggage Trailer "B"';
} else if ($row_vehicles_db['Typ'] == 608) {
	$CarName = "Tug Stairs Trailer";
} else if ($row_vehicles_db['Typ'] == 609) {
	$CarName = "Boxville";
} else if ($row_vehicles_db['Typ'] == 610) {
	$CarName = "Farm Trailer";
} else if ($row_vehicles_db['Typ'] == 611) {
	$CarName = "Utility Trailer";
}
echo $CarName; ?></h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div><!-- /.box-tools pull-right -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php if($row_vehicles_db['Typ'] > 611) { ?>
                            <center>
                                <img src="../../dist/img/samp/cars/1-0.png" style="width:300px; height: 200px;" alt="Fehlerhafte ID!">
                            </center>
                            <?php } else if($row_vehicles_db['Typ'] < 400) { ?>
                            <center>
                                <img src="../../dist/img/samp/cars/1-0.png" style="width:300px; height: 200px;" alt="Fehlerhafte ID!">
                            </center>
                            <?php } else {?>
                            <center>
                                <img src="../../dist/img/samp/cars/1-<?php echo $row_vehicles_db['Typ']; ?>.png" style="width:300px; height: 200px;" alt="Mein Auto">
                            </center>
                            <?php } ?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col-md-5 -->
                <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Informationen über das Fahrzeug</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div><!-- /.box-tools pull-right -->
                        </div><!-- /-box-header with-border -->
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td>Position</td>
                                        <td><a href="orten/index.php?x=<?php echo $row_vehicles_db['Spawnpos_X']; ?>&y=<?php echo $row_vehicles_db['Spawnpos_Y']; ?>">Jetzt orten!</a></td>
                                    </tr>
									<tr>
                                        <td>Gefahrene Kilometer</td>
                                        <td><?php echo $row_vehicles_db['Distance']; ?> Kilometer</td>
                                    </tr>
                                    <tr>
                                        <td>Slot</td>
                                        <td><?php echo $row_vehicles_db['Slot']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>ID</td>
                                        <td><?php echo $row_vehicles_db['id']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col-md-4 -->
				<div class="col-md-3">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tuning</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div><!-- /.box-tools pull-right -->
                        </div><!-- /-box-header with-border -->
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td>Farbe</td>
										<td><div style='background-color:rgb(<?php echo $farbea[1]; ?>,<?php echo $farbea[2]; ?>,<?php echo $farbea[3]; ?>);width:100%;height:auto;'><?php echo $farbea[1]; ?>,<?php echo $farbea[2]; ?>,<?php echo $farbea[3]; ?></div></td>
                                    </tr>
									<tr>
                                        <td>Licht</td>
										<td><div style='background-color:rgb(<?php echo $lichta[1]; ?>,<?php echo $lichta[2]; ?>,<?php echo $lichta[3]; ?>);width:100%;height:auto;'><?php echo $lichta[1]; ?>,<?php echo $lichta[2] ?>,<?php echo $lichta[3]; ?></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        <?php } while ($row_vehicles_db = mysqli_fetch_assoc($vehicles_db)); ?>
                            <?php } ?>
        </section></div>
                
          
        <!-- /.content-wrapper -->
              <!-- Main Footer -->
            <?php include ("../../dist/includes/footer.php"); ?>
      </div>
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
         
  <script>
  $(function(){
    $('#wrapper').slimScroll({
        height: 'auto'
    });
});
  </script>
  </body>
</html>
<?php
mysqli_free_result($userdata_db);

mysqli_free_result($vehicles_db);

mysqli_free_result($players_db);
?>

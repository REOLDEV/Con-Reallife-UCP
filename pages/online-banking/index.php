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

$query_userdataall_db = "SELECT * FROM userdata";
$userdataall_db = mysqli_query($connection, $query_userdataall_db) or die(mysqli_error());
$row_userdataall_db = mysqli_fetch_assoc($userdataall_db);
$totalRows_userdataall_db = mysqli_num_rows($userdataall_db);

$query_bonustable_db = "SELECT * FROM bonustable WHERE Name = '$UName'";
$bonustable_db = mysqli_query($connection, $query_bonustable_db) or die(mysqli_error());
$row_bonustable_db = mysqli_fetch_assoc($bonustable_db);
$totalRows_bonustable_db = mysqli_num_rows($bonustable_db);

$query_UCP_ueberweisung_db = "SELECT * FROM `ucp_ueberweisen` WHERE sender = '$UName' OR empfaenger = '$UName'";
$UCP_ueberweisung_db = mysqli_query($connection, $query_UCP_ueberweisung_db) or die(mysqli_error());
$row_UCP_ueberweisung_db = mysqli_fetch_assoc($UCP_ueberweisung_db);
$totalRows_UCP_ueberweisung_db = mysqli_num_rows($UCP_ueberweisung_db);

#Includes
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
                background: rgba(0, 0, 0, 0.2);
            }

        </style>
        <style>
            .ui-autocomplete {
                max-height: 100px;
                /* prevent horizontal scrollbar */
                overflow-x: hidden;
                background-image: url(../../dist/img/jquery-autocomplete-bg.png);
                color: white;
                max-width: 200px;
                list-style: none;
                padding: 5px;
                border: 1px solid black;
                font-weight: bold;
            }
            /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
            
            * html .ui-autocomplete {
                height: 100px;
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
                                                <?php echo $UName; ?> -
                                                    <?php echo $row_userdata_db['SocialState']; ?>
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
                                <p>
                                    <?php echo $UName; ?><?php isPlayerOnline($connection, $UName); ?>
                                </p>
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
                            <li><a href="../meine-fahrzeuge/"><i class="fa fa-car"></i> <span>Meine Fahrzeuge</span></a></li>
                            <li><a href="../account-verwalten/"><i class="fa fa-pencil-alt"></i> <span>Account Verwalten</span></a></li>
                            <li class="active"><a href="#"><i class="far fa-money-bill-alt"></i> <span>Online Banking</span></a></li>
                            <?php if(isFraktion($UName, $connection) == true) { ?>
                                <li class="header">Fraktion</li>
                                <?php 
				$fraktionsname = getFraktionName($row_userdata_db['Fraktion'], $connection);
				echo '<li><a href="../fraktion/"><i class="fa fa-users"></i> <span>'.$fraktionsname.'</span></a></li>'; ?>

                                    <?php } else {} ?>
                                        
                        </ul>
                        <!-- /.sidebar-menu -->
                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
            Online Banking
            <small>Hier kannst du Geld an andere Spieler überweisen!</small>
          </h1>
                    </section>

                    <!-- Main content -->
                    <section class="content">
                    <?php /* 
                        <div class="modal fade" id="ngg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Fehler bei Überweisung!</h4>
                                    </div>
                                    <div class="modal-body">
                                        Es ist ein Fehler bei Ihrer Überweisung entstanden!
                                        <div class="alert alert-danger" role="alert">
                                            Sie haben versucht mehr zu überweisen als auf Ihrem Konto verfügbar ist!
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <section class="content">
                            <div class="modal fade" id="kwert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Fehler bei Überweisung!</h4>
                                        </div>
                                        <div class="modal-body">
                                            Es ist ein Fehler bei Ihrer Überweisung entstanden!
                                            <div class="alert alert-danger" role="alert">
                                                Sie haben versucht 0€ zu überweisen! Dies ist nicht möglich.
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <section class="content">
                                <div class="modal fade" id="nzahl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Fehler bei Überweisung!</h4>
                                            </div>
                                            <div class="modal-body">
                                                Es ist ein Fehler bei Ihrer Überweisung entstanden!
                                                <div class="alert alert-danger" role="alert">
                                                    Sie haben versucht eine Negative Zahl zu überweisen!
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="kn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Fehler bei Überweisung!</h4>
                                            </div>
                                            <div class="modal-body">
                                                Es ist ein Fehler bei Ihrer Überweisung entstanden!
                                                <div class="alert alert-danger" role="alert">
                                                    Dieser Benutzer existiert nicht!
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="nsu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Fehler bei Überweisung!</h4>
                                            </div>
                                            <div class="modal-body">
                                                Es ist ein Fehler bei Ihrer Überweisung entstanden!
                                                <div class="alert alert-danger" role="alert">
                                                    Sie haben versucht sich selber Geld zu überweisen!
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box box-warning">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Bank Überweisung</h3>
                                            </div>
                                            <div class="box-body">
                                                <form action="addrecord.php" name="bank-form" method="post">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Name des Empfängers</label>
                                                        <input class="form-control" placeholder="Name" name="NAME" type="text" required id="tags">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Betrag (Aktuelles Guthaben:
                                                            <?php echo $row_userdata_db['Bankgeld']; ?>€)</label>
                                                        <input class="form-control" placeholder="Betrag z.B 500&euro;" name="Betrag" type="text" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Verwendungszweck</label>
                                                        <input class="form-control" placeholder="Verwendungszweck" name="Verwendungzweck" type="text" required>
                                                    </div>
                                                    <!-- /.box-body -->
                                                    <div class="box-footer">
                                                        <input class="btn btn-success" style="width:100%;" type="submit" value="Abschicken">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-13">
                                            <div class="box box-warning collapsed-box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Onlinebanking Übersicht</h3>
                                                    <div class="box-tools pull-right">
                                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                    <!-- /.box-tools -->
                                                </div>

                                                <div class="box-body">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Richtung</th>
                                                                <th>Sender</th>
                                                                <th>Empfänger</th>
                                                                <th>Betrag</th>
                                                                <th>Zweck</th>
                                                                <th>Löschen</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php do { ?>
                                                                <?php if($row_UCP_ueberweisung_db['visible'] == "1") { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <!-- Richtung -->
                                                                            <?php
                                                                                if($row_UCP_ueberweisung_db['sender'] == $UName)
                                                                                {
                                                                                    echo '<icon class="fa fa-minus-circle"></icon>';
                                                                                }
                                                                                else if($row_UCP_ueberweisung_db['empfaenger'] == $UName)
                                                                                {
                                                                                    echo '<icon class="fa fa-plus-circle"></icon>';
                                                                                }
                                                                                else { echo 'ERROR';}
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <!-- Sender -->
                                                                            <?php echo $row_UCP_ueberweisung_db['sender']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <!-- Empfänger -->
                                                                            <?php echo $row_UCP_ueberweisung_db['empfaenger']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <!-- Betrag -->
                                                                            <?php
                                                                                if($row_UCP_ueberweisung_db['sender'] == $UName)
                                                                                {
                                                                                    echo "-".$row_UCP_ueberweisung_db['menge']." €";
                                                                                }
                                                                                else if($row_UCP_ueberweisung_db['empfaenger'] == $UName)
                                                                                {
                                                                                    echo $row_UCP_ueberweisung_db['menge']." €";
                                                                                }
                                                                                else { echo 'ERROR';} ?>
                                                                        </td>
                                                                        <td>
                                                                            <!-- Zweck -->
                                                                            <?php echo $row_UCP_ueberweisung_db['zweck']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn btn-box-tool" onClick="setPageID(<?php echo $row_UCP_ueberweisung_db['id']; ?>)"><i class="fa fa-times"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } else {} ?>
                                                                        <?php } while ($row_UCP_ueberweisung_db = mysqli_fetch_assoc($UCP_ueberweisung_db)); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    */?>
                                    Deaktiviert!
                            </section>
                            <!-- /.content -->
                            </div>
                            <!-- /.content-wrapper -->
                            <!-- Main Footer -->
                            <?php include ("../../dist/includes/footer.php"); ?>
                                </div>
                                <!-- ./wrapper -->

                                <!-- REQUIRED JS SCRIPTS -->

                                <!-- jQuery 2.1.4 -->
                                <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
                                <!-- jQueryUI -->
                                <script src="../../plugins/jQueryUI/jquery-ui.min.js"></script>
                                <!-- Bootstrap 3.3.5 -->
                                <script src="../../bootstrap/js/bootstrap.min.js"></script>
                                <!-- AdminLTE App -->
                                <script src="../../dist/js/app.min.js"></script>

                                <script type="text/javascript">
                                    iCurrentID = null;


                                    function setPageID(iID, $connection) {
                                        iCurrentID = iID;
                                        window.location.href = "delrecord.php?id=" + iCurrentID;
                                    }

                                </script>

                                <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
                                <script>
                                    $(function() {
                                        var availableTags = [
                                            <?php do { ?>
                                            "<?php echo $row_userdataall_db['Name']; ?>"
                                            <?php if($totalRows_userdataall_db > 1) echo ","; ?>
                                            <?php } while ($row_userdataall_db = mysqli_fetch_assoc($userdataall_db)); ?>
                                        ];
                                        $("#tags").autocomplete({
                                            source: availableTags
                                        });
                                    });

                                    $(document).ready(function() {

                                        if (window.location.href.indexOf('#ngg') != -1) {
                                            $('#ngg').modal('show');
                                        }
                                        if (window.location.href.indexOf('#nsu') != -1) {
                                            $('#nsu').modal('show');
                                        }
                                        if (window.location.href.indexOf('#kn') != -1) {
                                            $('#kn').modal('show');
                                        }
                                        if (window.location.href.indexOf('#nzahl') != -1) {
                                            $('#nzahl').modal('show');
                                        }
                                        if (window.location.href.indexOf('#kwert') != -1) {
                                            $('#kwert').modal('show');
                                        }

                                    });

                                </script>
        </body>

        </html>
        <?php
mysqli_free_result($players_db);

mysqli_free_result($userdata_db);

mysqli_free_result($userdataall_db);

mysqli_free_result($bonustable_db);

mysqli_free_result($UCP_ueberweisung_db);
?>

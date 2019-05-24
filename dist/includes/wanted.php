<!-- Con Reallife Control Panel by Nadine Housten aka. Yannik Böltes -->
<?php
$maxRows_userdataall_db = 5;
$pageNum_userdataall_db = 0;
if (isset($_GET['pageNum_userdataall_db'])) {
  $pageNum_userdataall_db = $_GET['pageNum_userdataall_db'];
}
$startRow_userdataall_db = $pageNum_userdataall_db * $maxRows_userdataall_db;

$query_userdataall_db = "SELECT * FROM userdata WHERE Wanteds > 0 ORDER BY Wanteds desc";
$query_limit_userdataall_db = sprintf("%s LIMIT %d, %d", $query_userdataall_db, $startRow_userdataall_db, $maxRows_userdataall_db);
$userdataall_db = mysqli_query($connection, $query_limit_userdataall_db) or die(mysqli_error($connection));
$row_userdataall_db = mysqli_fetch_assoc($userdataall_db);

if (isset($_GET['totalRows_userdataall_db'])) {
  $totalRows_userdataall_db = $_GET['totalRows_userdataall_db'];
} else {
  $all_userdataall_db = mysqli_query($connection, $query_userdataall_db);
  $totalRows_userdataall_db = mysqli_num_rows($all_userdataall_db);
}
$totalPages_userdataall_db = ceil($totalRows_userdataall_db/$maxRows_userdataall_db)-1;

$currentPage = $_SERVER["PHP_SELF"];

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
<div class="col-md-6">
    <div class="box box-warning">
		<div class="box-header with-border">
			<h3 class="box-title">Gesucht</h3>
			<div class="box-tools pull-right">
				<span class="label label-danger"><?php echo $totalRows_userdataall_db ?>Spieler werden aktuell gesucht!</span>
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div><!-- /.box-header -->
  		<div class="box-body">
    		<table class="table table-bordered table-hover">
				<thead>					 
					<tr>
						<th>Wanteds</th>
                       	<th>Foto</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					<?php do { ?>
						<?php if($row_userdataall_db["Wanteds"] > 0) { ?>
							<tr>
								<td><?php echo $row_userdataall_db["Wanteds"]; ?></td>
								<td><img src="../../dist/img/samp/avatar/1-<?php echo $row_userdataall_db["Skinid"]; ?>.png" class="img-circle" alt="User Image" style="height: 50px; width: 50px;"></td>
								<td><a href="../mein-profil/show/index.php?id=<?php echo $row_userdataall_db["Name"]; ?>"><?php echo $row_userdataall_db["Name"]; ?> <?php isPlayerOnline($connection, $row_userdataall_db["Name"]); ?></a></td>
							</tr>
						<?php } else {} ?>
					<?php } while ($row_userdataall_db = mysqli_fetch_assoc($userdataall_db)); ?>
				</tbody>
			</table>
			<div class="box-footer">
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
		</div><!-- /.box-body -->
	</div>
</div>
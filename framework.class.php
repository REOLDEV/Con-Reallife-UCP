<?php

include("config/config.class.php");

$o_config = new config();
$o_main = new framework();

$connection = mysqli_connect($host, $user, $password, $database);

class framework{
	
	//////////////////////
	// variable	    //
	//////////////////////

	// general settings
	private $title = "CP";
	private $description = "Diese Seite wurde mit PHP OOP erstellt.";
	private $keywords = "PHP, OOP, PHP OOP";
	private $author = "CobraDE";
	private $language = "de";
	private $charset = "UTF-8";
	private $salt = "vPdfq9kYfGrLWCcB8u8JFKbQCU7XA2fdkpcQC2BsXR9aqq8qWtQReux5VeSXXbCXfezWDCGaXBkENYQZmUsN48Yek92VLJVTXCWu6YWduRL3Ueapq34TJuMsXU5aDywNuecdfXp8SG25yspxSAPqgZb44Eytw3XsR2QHqsXzzKsy8pxzrPeCHPETLrEmcB7jAPcmjA2qTnqJBkbQ82mLCwya8VF8WuQ2tFDXG8XzgdDcU7UzVKj7mm75XTbX95AQe2n6pPq2gGD3TtXDjkknsSCM9BwjkH8Nkwqz3ZpKXGgApSaN9CSpkKRF5KuLujCXTKZdSy83tvC8Bx3XW452fDRCjvsUsANN7x5XH4G5PrU46KwaUbSnhwGMNHKszKmz2Ea5ZpjaL9THkVhW3WBuKMUcBsPMeDcFyz63saNWHT5WGfvjAWSybW3wHCcGSahSMdSQWHLkCuKnVcP4WAnAuXCBFWAjLTq33CaJV5jmM89KJhk5kk85MZbSwGgYPwsKjWgeCYPPTYMz3SP5zw6ZUZStDWGGXRT6mkD5MrFJaqdyFpGug6HYWeey52gQScJBJTNypv4KwCWtczPxdT9BepbgRer9YLzAxYy4Btd7fxFkWdQHVXpfrzqvHSV2BqUAXMeSbXRFPQGLp4zpxhPTVVM73nxSvCQep5ueUKLePmAwGKNCVGYmBdew3NF4vVRaybXCppN9pAdqAqdt8SzEzPPb7CFDw9Um9pGj4gX6FETru7GcTZEKpPTMEBWPJpQBsmf8u8UcKkN2HSG6zfgqxAMgT6Cg4PWjpYxBSpxqxnKPeH2bbJ9qVnsq4rp2U8QwKqy9T3VWd83sm3RyUEDXTdDqUFwf5Tx7HgDECNygLsLxShUzCL7qmg8VjGdJYpNqxhLkPkB3HD9fuNWEJVm287egcada8vNSA2eFzMJzcWjRcUt7m7mnEuEQQf7xYP8UcAQxRTGWfp6drmpGfFvnzSbvN7czjayPt6mt9VZKzS8QaAYUSAU65nmw9hmscbgT";
	
	// page settings
	private $headline = "Server";
	private $small_headline = "SER"; // for mobile devices 
	private $subtitle = "Control Panel";
	private $dev = false;
	private $copyright = "CobraDE";
	private $developer = "CobraDE";
	private $developer_link = "https://www.mta-sa.org/user/7955-cobrade/";
	private $legend = true;
	private $online_player = true;
	private $version = "1.0.0";
	private $ip = "localhost";
	private $mta_version = "1.5";
	private $ts = "localhost";
	private $forum = "localhost/forum";
	private $website = "localhost";
	private $money_border = "1000000";

	// style settings
	private $css = array("bootstrap/css/bootstrap.min.css","https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css","https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css","dist/css/AdminLTE.min.css","dist/css/skins/_all-skins.min.css");
	
	// javascript settings
	private $javascript = array("plugins/jQuery/jQuery-2.1.4.min.js","bootstrap/js/bootstrap.min.js","plugins/slimScroll/jquery.slimscroll.min.js","plugins/fastclick/fastclick.min.js","dist/js/app.min.js","dist/js/demo.js");
	
	// Legend settings
	private $user = "default";
	private $ticket = "primary";
	private $supporter = "success";
	private $moderator = "info";
	private $admin = "warning";
	private $projektleitung = "danger";
	
	private $mafia = "#000";
	private $sfpd = "#00FFFF";
	private $triaden = "#FF0000";
	private $terroristen = "#663300";
	private $reporter = "#FF8000";
	private $fbi = "#000099";
	private $aztecas = "#FFFF00";
	private $biker = "#07D200";
	private $cdefault = "#E600FF";
	private $font_color = "#323232";
	
	//////////////////////
	// functions		//
	//////////////////////
	
	function getTitle(){
		return $this->title;
	}
	
	function getDescription(){
		return $this->description;
	}
	
	function getKeywords(){
		return $this->keywords;
	}
	
	function getAuthor(){
		return $this->author;
	}
	
	function getLanguage(){
		return $this->language;
	}
	
	function getCharset(){
		return $this->charset;
	}
	
	function getHeadline(){
		return $this->headline;
	}
	
	function getSmallHeadline(){
		return $this->small_headline;
	}
	
	function getSubtitle(){
		return $this->subtitle;
	}
	
	function getVersion(){
		return $this->version;
	}
	
	function getDev(){
		return $this->dev;
	}
	
	function getCopyright(){
		return $this->copyright;
	}
	
	function getDeveloper(){
		return $this->developer;
	}
	
	function getDeveloperLink(){
		return $this->developer_link;
	}
	
	function getIP(){
		return $this->ip;
	}
	
	function getMtaVersion(){
		return $this->mta_version;
	}
	
	function getTs(){
		return $this->ts;
	}
	
	function getForum(){
		return $this->forum;
	}
	
	function getWebsite(){
		return $this->website;
	}
	
	function getCSS(){
		$count = count($this->css);
		for($i=0;$i<$count;$i++){
			echo "<link rel='stylesheet' href='{$this->css[$i]}'>\n";
		}
	}
	
	function getJavascript(){
		$count = count($this->javascript);
		for($i=0;$i<$count;$i++){
			echo "<script src='{$this->javascript[$i]}'></script>\n";
		}
	}
	
	function getLegend(){
		if($this->legend){
			return true;
		}else{
			return false;
		}
	}
	
	function getOnlinePlayer(){
		if($this->online_player){
			return true;
		}else{
			return false;
		}
	}
	
	function getTeamColor($name){
		if($name == 0){
			return $this->user;
		}else if($name == 1){
			return $this->ticket;
		}else if($name == 2){
			return $this->supporter;
		}else if($name == 3){
			return $this->moderator;
		}else if($name == 4){
			return $this->admin;
		}else if($name == 5){
			return $this->projektleitung;
		}else{
			return $this->user;
		}
	}
	
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
	
	function getFraktionLabel($msg,$color){
		return "<span class='label label-default' style='background-color:{$color};color:{$this->font_color}'>{$msg}</span>";
	}
	
	function getAllOnlinePlayers(){
		$query = mysql_query("SELECT * FROM loggedin") or die(mysql_error());
		$result = mysql_num_rows($query);
		
		if($result >= 1){
			echo "<i>Online Players {$result}</i><div class='well well-sm'>";
			while($row = mysql_fetch_assoc($query)){
				$name = $row['Name'];
				$getTeam = mysql_query("SELECT Adminlevel FROM userdata WHERE Name = '$name'") or die (mysql_error());
				while($row = mysql_fetch_assoc($getTeam)){
					$rang = $row["Adminlevel"];
					$color = $this->getTeamColor($rang);
				}
				echo "<span class='label label-{$color}'>{$name}</span>\n";
			}
			echo "</div>";
		}
	}
	
	function error($headline,$msg){
		echo "
		<div class='container'>
			<div class='alert alert-warning' role='alert'><strong>{$headline}</strong> {$msg}</div>
		</div>
		";
	}
	
	function checkAccount($acc,$pw){
		$query = mysql_query("SELECT * FROM players WHERE Name = '$acc' AND Passwort='$pw'") or die(mysql_error());
		$result = mysql_num_rows($query);
		if($result >= 1){
			return true;
		}else{
			return false;
		}
	}
	
	function getRegisterDate($name){
		$query = mysql_query("SELECT RegisterDatum FROM players WHERE Name = '$name'") or die(mysql_error());
		$result = mysql_num_rows($query);
		if($result >= 1){
			while($row = mysql_fetch_assoc($query)){
				$date = $row["RegisterDatum"];
			}
			return "Mitglied seit {$date}";
		}else{
			return "Datum nicht verfügbar";
		}
	}
	
	function destroySession(){
		session_destroy();
	}
	
	function getVerschluesseln($string){
		return hash ("sha512", hash("sha512", $string));
	}
	
	function getVehicles(){
		$query = mysql_query("SELECT * FROM vehicles") or die(mysql_error());
		$result = mysql_num_rows($query);
		return $result;
	}
	
	function getMoney(){
		$query = mysql_query("SELECT Geld,Bankgeld FROM userdata") or die(mysql_error());
		$money = 0;
		while($row = mysql_fetch_assoc($query)){
			$geld = $row["Geld"];
			$bank = $row["Bankgeld"];
			$money = $money + $geld + $bank;
		}
		return $money;
	}
	
	function getMembers(){
		$query = mysql_query("SELECT * FROM userdata") or die(mysql_error());
		$result = mysql_num_rows($query);
		return $result;
	}
	
	function getTeamMembers(){
		$query = mysql_query("SELECT * FROM userdata WHERE Adminlevel != '0'") or die(mysql_error());
		$result = mysql_num_rows($query);
		return $result;
	}
	
	function getMoneyBorder(){
		return $this->money_border;
	}
	
	function isProjektleitung($name){
		$query = mysql_query("SELECT * FROM userdata WHERE Adminlevel = '4' AND Name = '$name'") or die(mysql_error());
		$result = mysql_num_rows($query);
		if($result >= 1){
			return true;
		}else{
			return false;
		}
	}
	
	function getChangelog(){
		$query = mysql_query("SELECT * FROM changelog ORDER BY ID DESC LIMIT 10") or die(mysql_error());
		$result = mysql_num_rows($query);
		if($result != 0){
			while($row = mysql_fetch_assoc($query)){
				$id = $row["ID"];
				$date = $row["Date"];
				$msg = $row["msg"];
				echo "
				<li>
                  <i class='fa fa-envelope bg-blue'></i>
                  <div class='timeline-item'>
                    <span class='time'><i class='fa fa-clock-o'></i> {$date}</span>
                    <h3 class='timeline-header'><a href='#'>Support Team</a> Changelog {$id}</h3>
                    <div class='timeline-body'>
                     {$msg}
                    </div>
                  </div>
                </li>
				";
			}
			echo "
				<li>
				<i class='fa fa-clock-o bg-gray'></i>
            </li>
			";
		}else{
			echo '
			<li>
				<i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> XX.XX</span>
                    <h3 class="timeline-header"><a href="#">Support Team</a> Changelog XX</h3>
                    <div class="timeline-body">
                     Es wurde noch kein Eintrag erstellt.
                    </div>
                  </div>
                </li>
			<li>
				<i class="fa fa-clock-o bg-gray"></i>
            </li>';
		}
	}
	
	function getLastPlayers(){
		$query = mysql_query("SELECT * FROM players ORDER BY ID DESC LIMIT 4") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$name = $row["Name"];
			$date = $row["RegisterDatum"];
			$gender = $row["Geschlecht"];
			if($gender == 0){
				$gender = "male";
			}else{
				$gender = "female";
			}
			
			echo "
				<tr>
					<td>{$name}</td>
					<td>{$date}</td>
					<td><i class='fa fa-{$gender}'></i></td>
				</tr>
			";
			
		}
	}
	
	function sHome(){
		echo "
		<section class='content-header'>
          <h1>
            {$this->getHeadline()}
            <small>{$this->getSubtitle()}</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class='content'>
		  <div class='callout callout-info'>
            <strong>IP: {$this->getIP()}</strong>
            <p>Version: {$this->getMtaVersion()}</p>
			<p>Teamspeak: {$this->getTs()}<br>Website: {$this->getWebsite()}<br>Forum: {$this->getForum()}</p>
          </div>
          <div class='callout callout-info'>
            <h4>{$_SESSION['acc']}</h4>
            <p>Sie befinden sich nun im Control Panel von  {$this->getHeadline()} {$this->getSubtitle()}. Sie können hier Informationen über Ihren Account sowie Statistiken des Server einsehen.</p>
          </div>
		  <!-- Small boxes (Stat box) -->
          <div class='row'>
            <div class='col-lg-3 col-md-6'>
              <!-- small box -->
              <div class='small-box bg-aqua'>
                <div class='inner'>
                  <h3>{$this->getVehicles()}</h3>
                  <p>Fahrzeuge</p>
                </div>
                <div class='icon'>
                  <i class='fa fa-car'></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class='col-lg-3 col-md-6'>
              <!-- small box -->
              <div class='small-box bg-green'>
                <div class='inner'>
                  <h3>{$this->getMoney()} $</h3>
                  <p>Geld</p>
                </div>
              </div>
            </div><!-- ./col -->
            <div class='col-lg-3 col-md-6'>
              <!-- small box -->
              <div class='small-box bg-yellow'>
                <div class='inner'>
                  <h3>{$this->getMembers()}</h3>
                  <p>Mitglieder</p>
                </div>
                <div class='icon'>
                  <i class='ion ion-person-add'></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class='col-lg-3 col-md-6'>
              <!-- small box -->
              <div class='small-box bg-red'>
                <div class='inner'>
                  <h3>{$this->getTeamMembers()}</h3>
                  <p>Team Mitglieder</p>
                </div>
                <div class='icon'>
                  <i class='ion ion-pie-graph'></i>
                </div>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
		  <div class='row'>
			<div class='col-md-6'>
              <!-- The time line -->
              <ul class='timeline'>
                <!-- timeline item -->";
        $this->getChangelog();
		echo "
              </ul>
            </div><!-- /.col -->
            <div class='col-md-6'>
				<div class='box'>
					<div class='box-header'>
					  <h3 class='box-title'>Neuste Mitglieder</h3>
					</div><!-- /.box-header -->
					<div class='box-body no-padding'>
					  <table class='table'>
						<tr>
						  <th>Name</th>
						  <th>Registrierdatum</th>
						  <th>Geschlecht</th>
						</tr>";
			$this->getLastPlayers();
			echo "
					  </table>
					</div><!-- /.box-body -->
				  </div><!-- /.box -->";
				  $this->getTeam();
				  echo "
				</div>
			</div>
        </section><!-- /.content -->";
	}
	
	function error404(){
		echo "
        <!-- Main content -->
        <section class='content'>
          <div class='error-page'>
            <h2 class='headline text-yellow'> 404</h2>
            <div class='error-content'>
              <h3><i class='fa fa-warning text-yellow'></i> Oops! Seite nicht gefunden.</h3>
              <p>
                Wir konnten die angegebene Seite nicht finden.
                Möchtest du zur <a href='../../index.html'>Hauptseite zurückkehren</a>.
              </p>
            </div><!-- /.error-content -->
          </div><!-- /.error-page -->
        </section><!-- /.content -->
		";
	}
	
	function sAdmin(){
		echo "
		<section class='content-header'>
          <h1>
            Administrations
            <small>Bereich</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class='content'>
		  <div class='callout callout-info'>
            <strong>Information</strong>
            <p>Auffällige Einträge werden rot markiert.</p>
          </div>
		   <form class='search-form' style='margin-bottom:10px;'>
                <div class='input-group'>
				  <input type='hidden' name='site' value='admin'>
                  <input type='text' name='search' class='form-control' placeholder='Spieler suchen'>
                  <div class='input-group-btn'>
                    <button type='submit' class='btn btn-warning btn-flat'><i class='fa fa-search'></i></button>
                  </div>
                </div><!-- /.input-group -->
            </form>
		<div class='row'>
			<div class='col-md-12'>
			  <div class='box'>
                <div class='box-body'>
                  <table id='example2' class='table table-bordered table-hover'>
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Geschlecht</th>
                        <th>Geld</th>
                        <th>Zuletzt Online</th>
                        <th>Serial</th>
                      </tr>
                    </thead>
                    <tbody>";
		$query = mysql_query("SELECT * FROM players ORDER BY ID DESC") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			
			$name = $row["Name"];
			$serial = $row["Serial"];
			$last_login = $row["Last_login"];
			$gender = $row["Geschlecht"];
			
			$query2 = mysql_query("SELECT * FROM userdata WHERE Name = '$name'") or die(mysql_error());
			$money = 0;
			while($row = mysql_fetch_assoc($query2)){
				
				$geld = $row["Geld"];
				$bank = $row["Bankgeld"];
				
				$money = $money + $geld + $bank;
			}
			
			if($money >= $this->getMoneyBorder()){
				$money = "<span class='label label-danger'>{$money} $</span>";
			}else{
				$money = "{$money} $";
			}
			
			if($gender == 0){
				$gender = "male";
			}else{
				$gender = "female";
			}
			
			echo "
			 <tr>
				<td><a href='main.php?site=admin&search={$name}'>{$name}</a></td>
				<td><i class='fa fa-{$gender}'></i></td>
                <td>{$money}</td>
				<td>{$last_login}</td>
                <td>{$serial}</td>
             </tr>
			";
			
        }     
		
		echo "
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div>
		</div>
		</section>
		";
	}
	
	function getDate($day,$month,$year){
		date_default_timezone_set("Europe/Berlin");
		 
		$datum1 = new DateTime("{$day}-{$month}-{$year}"); //Geburtsdatum
		$datum2 = new DateTime(date('Y')+'-'+date('m')+'-'+date('d')); //Aktuelles Datum
		 
		$interval = $datum2->diff($datum1);

		if($interval->format("%Y") < 18){
			return "<span class='label label-danger'>Unter 18 ({$interval->format('%Y')})</span>";
		}else{
			return "";
		}
	}
	
	function multiexplode ($delimiters,$string) {
   
		$ready = str_replace($delimiters, $delimiters[0], $string);
		$launch = explode($delimiters[0], $ready);
		return  $launch;
		
	}
	
	function mathTime($time){
		$new = $this->multiexplode(array(",","."),$time);
		$day = intval($new[0]);
		$month = $new[1];
		$year = $new[2];
		
		date_default_timezone_set("Europe/Berlin");
		 
		$datum1 = new DateTime("{$day}-{$month}-{$year}"); //Geburtsdatum
		$datum2 = new DateTime(date('Y')+'-'+date('m')+'-'+date('d')); //Aktuelles Datum

		$interval = $datum2->diff($datum1);
		
		$wochen = floor($interval->format('%d') / 7);
		$tage = ($interval->format('%d') % 7);
		
		if($interval->format("%Y") > 0){
			$y_new = "{$interval->format("%Y")} Jahren";
		}else{
			$y_new = "";
		}
		
		if($interval->format("%m") > 0){
			$m_new = "{$interval->format("%m")} Monaten";
		}else{
			$m_new = "";
		}
		
		if($interval->format("$tage") > 0){
			$t_new = "{$interval->format("$tage")} Tagen";
		}else{
			$t_new = "";
		}
		
		if($interval->format("$wochen") > 0){
			$w_new = "{$interval->format("$wochen")} Wochen";
		}else{
			$w_new = "";
		}

		return "{$day}.{$month}.{$year} - zuletzt online vor {$y_new} {$m_new} {$w_new} {$t_new}";

	}
	
	function sAdminEx($name){
		echo "
		<section class='content-header'>
          <h1>
            Administrations
            <small>Bereich</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class='content'>
		  <div class='callout callout-info'>
            <strong>Information</strong>
            <p>Auffällige Einträge werden rot markiert.</p>
          </div>
		  <div class='row'>
			<div class='col-md-12'> 
			";
	$query = mysql_query("SELECT * FROM players WHERE Name = '$name'") or die(mysql_error());
	$result = mysql_num_rows($query);
	
	if($result >= 1){
		echo "
		<div class='box'>
			<div class='box-header'>
					  <h3 class='box-title'>allgemein</h3>
					</div><!-- /.box-header -->
                <div class='box-body'>
                  <table id='example2' class='table table-bordered table-hover'>
                    <tbody>
		";
		while($row = mysql_fetch_assoc($query)){
		
			$name = $row["Name"];
			$serial = $row["Serial"];
			$last_login = $row["Last_login"];
			$gender = $row["Geschlecht"];
			$ip = $row["IP"];
			$day = $row["Geburtsdatum_Tag"];
			$month = $row["Geburtsdatum_Monat"];
			$year = $row["Geburtsdatum_Jahr"];
			
			$query2 = mysql_query("SELECT * FROM userdata WHERE Name = '$name'") or die(mysql_error());
			$money = 0;
			while($row = mysql_fetch_assoc($query2)){
				
				$geld = $row["Geld"];
				$bank = $row["Bankgeld"];
				
				$money = $money + $geld + $bank;
				
			}
			
			if($money >= $this->getMoneyBorder()){
				$money = "<span class='label label-danger'>{$money} $</span>";
			}else{
				$money = "{$money} $";
			}
			
			if($gender == 0){
				$gender = "male";
			}else{
				$gender = "female";
			}
			
			echo "
			 <tr>
				<td>Username</td>
				<td>{$name}</td>
             </tr>
			  <tr>
				<td>Geschlecht</td>
				<td><i class='fa fa-{$gender}'></i></td>
             </tr>
			 <tr>
				<td>Geburtstag</td>
				<td>{$day}.{$month}.{$year} {$this->getDate($day,$month,$year)}</td>
             </tr>
			  <tr>
				<td>Geld</td>
				<td>{$money}</td>
             </tr>
			  <tr>
				<td>Zuletzt Online</td>
				<td>{$this->mathTime($last_login)}</td>
             </tr>
			  <tr>
				<td>Serial</td>
				<td>{$serial}</td>
             </tr>
			 <tr>
				<td>IP</td>
				<td>{$ip}</td>
             </tr>
			";
			
		}
			echo "
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		";
		// Warnings
		echo "
		<div class='box'>
			<div class='box-header'>
					  <h3 class='box-title'>Informationen</h3>
					</div><!-- /.box-header -->
                <div class='box-body'>
                  <table id='example2' class='table table-bordered table-hover'>
                    <tbody>
		";
		
			$query3 = mysql_query("SELECT * FROM players WHERE IP = '$ip' AND Name != '$name'") or die(mysql_error());
			$result3 = mysql_num_rows($query3);
			if($result3 != 0){
				$output = "";
				while($row = mysql_fetch_assoc($query3)){
					
					$nname = $row["Name"];
					$output = "{$output} <a href='main.php?site=admin&search={$nname}'>{$nname}</a> ,";
					
				}
				echo "<tr>
					<td>Doppelaccounts</td>
					<td>{$output}</td>
				 </tr>";
			}else{
				echo "<tr>
					<td>Doppelaccounts</td>
					<td>keine</td>
				 </tr>";
			}
		
		echo "
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		";
	}else{
		echo "
			<div class='error-page'>
            <h2 class='headline text-yellow'> 404</h2>
            <div class='error-content'>
              <h3><i class='fa fa-warning text-yellow'></i> Oops!</h3>
              <p>
                <strong>{$name}</strong> wurde nicht in der Datenbank gefunden. Haben Sie sich verschrieben</a>.
              </p>
            </div><!-- /.error-content -->
          </div><!-- /.error-page -->
		";
	}

	echo"
			</div>
		  </div>
		  </section>";
	}
	
	function getTeam(){
		$query = mysql_query("SELECT * FROM userdata WHERE Adminlevel != '0'") or die(mysql_error());
		echo "
		<div class='box'>
                <div class='box-body no-padding'>
				<div class='box-header'>
					  <h3 class='box-title'>Team Mitglieder</h3>
					</div><!-- /.box-header -->
                  <table class='table'>
				  <thead>
                      <tr>
                        <th>Name</th>
                        <th>Rang</th>
                      </tr>
                    </thead>
                    <tbody>
		";
		while($row = mysql_fetch_assoc($query)){
			
			$name = $row["Name"];
			$rang = $row["Adminlevel"];
			$bez = "";
			
			if($rang == 1){
				$rang = $this->ticket;
				$bez = "Ticketbeauftragter";
			}else if($rang == 2){
				$rang = $this->supporter;
				$bez = "Supporter";
			}else if($rang == 3){
				$rang = $this->moderator;
				$bez = "Moderator";
			}else if($rang == 4){
				$rang = $this->admin;
				$bez = "Admin";
			}else if($rang == 5){
				$rang = $this->projektleitung;
				$bez = "Projektleitung";
			}
		
			echo "
			 <tr>
				<td>{$name}</td>
				<td><span class='label label-{$rang}'>{$bez}</span></td>
             </tr>";
		}
		echo "
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		";
	}
	
	function isFraktion($name){
		$query = mysql_query("SELECT * FROM Userdata WHERE Fraktion != '0' AND Name = '$name'") or die(mysql_error());
		$result = mysql_num_rows($query);
		if($result == 0){
			return false;
		}else{
			return true;
		}
	}
	
	function getFraktionID($name){
		$query = mysql_query("SELECT Fraktion FROM userdata WHERE Name = '$name'") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$frak = $row["Fraktion"];
		}
		return $frak;
	}
	
	function getFraktionName($id){
		$query = mysql_query("SELECT * FROM fraktionen WHERE ID = '$id'") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$name = $row["Name"];
		}
		return $name;
	}
	
	function getFraktionRang($name){
		$query = mysql_query("SELECT FraktionsRang FROM userdata WHERE Name = '$name'") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$frak = $row["FraktionsRang"];
		}
		return $frak;
	}
	
	function getFraktionKasse($id){
		$query = mysql_query("SELECT * FROM fraktionen WHERE ID = '$id' OR Name = '$id'") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$geld = $row["DepotGeld"];
		}
		return $geld;
	}
	
	function getFraktionDrogen($id){
		$query = mysql_query("SELECT * FROM fraktionen WHERE ID = '$id' OR Name = '$id'") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$drogen = $row["DepotDrogen"];
		}
		return $drogen;
	}
	
	function getFraktionMaterials($id){
		$query = mysql_query("SELECT * FROM fraktionen WHERE ID = '$id' OR Name = '$id'") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$mats = $row["DepotMaterials"];
		}
		return $mats;
	}
	
	function getFraktionMemberCount($id){
		$query = mysql_query("SELECT * FROM userdata WHERE Fraktion = '$id'") or die(mysql_error());
		$result = mysql_num_rows($query);
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
	
		$query = mysql_query("SELECT * FROM gangs ORDER BY BesitzerFraktion") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$id = $row["BesitzerFraktion"];
			$name = $row["Name"];
			$einnahmen = $row["Einnahmen"];
			$last = $row["LastAttacked"];
			
			$fname = $this->getFraktionName($id);
			
			$color = $this->getFraktionColor($fname);
			$label = $this->getFraktionLabel($fname,$color);
			
			echo "<tr><td>{$name}</td><td>{$label}</td><td>{$einnahmen}</td><td>{$last}</td></tr>";
		}
		
		echo "</tbody></table></div></div></div></section>";
	}
	
	function getMyFraktion($name){
		$id = $this->getFraktionID($name);
		
		if($id == 0){
			echo "
			<section class='content-header'>
			  <h1>
				Meine Fraktion
				<small>Zivilist</small>
			  </h1>
			</section>

			<!-- Main content -->
			<section class='content'>
				<div class='callout callout-info'>
					<strong>Hallo {$name}</strong>
					<p>Sie sind Zivilist</p>
			  </div>
			</section>";
		}else{
		
			$fname = $this->getFraktionName($id);
			$rang = $this->getFraktionRang($name);
			$kasse = $this->getFraktionKasse($id);
			$drogen = $this->getFraktionDrogen($id);
			$mats= $this->getFraktionMaterials($id);
			$count = $this->getFraktionMemberCount($id);
			
			if($drogen >= 1000){
				$drogen = $drogen / 1000;
				$drogen = "{$drogen} kg.";
			}else{
				$drogen = "{$drogen} gr.";
			}
			
			
			$members = "";
			
			// get all Members
			$query = mysql_query("SELECT * FROM userdata WHERE Fraktion = '$id'") or die(mysql_error());
			$result_user = mysql_num_rows($query);
			while($row = mysql_fetch_assoc($query)){
				$nname = $row["Name"];
				$rang = $row["FraktionsRang"];
				$members = "{$members} <tr><td>{$nname}</td><td>{$rang}</td></tr>";
			}
			
			$blacklist = "";
			
			// get blacklist
			$query2 = mysql_query("SELECT * FROM blacklist WHERE Fraktion = '$id'") or die(mysql_error());
			$result_black = mysql_num_rows($query2);
			while($row = mysql_fetch_assoc($query2)){
				$bname = $row["Name"];
				$bein = $row["Eintraeger"];
				$blacklist = "{$blacklist} <tr><td>{$bname}</td><td>{$bein}</td></tr>";
			}
			
			$fkasse = "
				<div class='info-box bg-blue'>
					<span class='info-box-icon'><i class='fa fa-money'></i></span>
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
	
	function getMyVehicleCount($name){
		$query = mysql_query("SELECT * FROM vehicles WHERE Besitzer = '$name'") or die(mysql_error());
		$result = mysql_num_rows($query);
		return $result;
	}
	
	function getMyVehicle($name){
		$query = mysql_query("SELECT * FROM userdata WHERE Name = '$name'") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$max = $row["MaximumCars"];
		}
		
		$veh = "";
		
		$query2 = mysql_query("SELECT * FROM vehicles WHERE Besitzer = '$name'") or die(mysql_error());
		$count = mysql_num_rows($query2);
		
		while($row = mysql_fetch_assoc($query2)){
			$typ = $row["Typ"];
			$farbe = $row["Farbe"];
			$benzin = round($row["Benzin"]);
			$licht = $row["Lights"];
			$farbe = $row["Farbe"];
			$x = $row["Spawnpos_X"];
			$y = $row["Spawnpos_Y"];
			
			$farbea = explode('|',$farbe);
			
			$lichta = explode('|',$licht);
			
			$img = "http://weedarr.wdfiles.com/local--files/veh/{$typ}.png";
			
			$veh = "{$veh}
				<div class='row'>
					<div class='col-md-3'>
						 <a href='#' class='thumbnail'>
							<img src='{$img}' style='width:100%;'></img>
						</a>
					</div>
					<div class='col-md-9'>
						<div class='box'>
							<div class='box-body no-padding'>
								<table class='table'>
									<tbody>
										<tr>
											<td>Typ</td>
											<td>{$typ}</td>
										</tr>
										<tr>
											<td>Benzin</td>
											<td>{$benzin} Liter</td>
										</tr>
										<tr>
											<td>Farbe</td>
											<td><div style='background-color:rgb({$farbea[1]},{$farbea[2]},{$farbea[3]});width:100%;height:auto;'>{$farbea[1]},{$farbea[2]},{$farbea[3]}</div></td>
										</tr>
										<tr>
											<td>Licht</td>
											<td><div style='background-color:rgb({$lichta[1]},{$lichta[2]},{$lichta[3]});width:100%;height:auto;'>{$lichta[1]},{$lichta[2]},{$lichta[3]}</div></td>
										</tr>
										<tr>
											<td>Orten</td>
											<td><a href='framework/map.php?x={$x}&y={$y}'>Lage</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			";
			
			$lichta = "";
		}
		
		$max_be = $count * 10;
		
		$car = "
			<div class='info-box bg-green'>
                <span class='info-box-icon'><i class='fa fa-car'></i></span>
                <div class='info-box-content'>
                  <span class='info-box-text'>Fahrzeuge</span>
                  <span class='info-box-number'>{$count} Fahrzeuge</span>
                  <div class='progress'>
                    <div class='progress-bar' style='width: {$max_be}%'></div>
                  </div>
                  <span class='progress-description'>
                    Sie haben schon {$count} von {$max} Fahrzeugen gekauft.
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
		";
		
		echo "
		<section class='content-header'>
          <h1>
            Meine Fahrzeuge
            <small>Übersicht</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class='content'>
			<div class='callout callout-info'>
				<strong>Hallo {$name}</strong>
				<p>Sie befinden sich hier auf ihrer Fahrzeug Seite, hier werden Ihnen alle Informationen über ihre Fahrzeuge angezeigt.</p>
          </div>
		  <div class='row'>
			<div class='col-md-12'>
				{$car}
			</div>
		  </div>
		  {$veh}
		</section>
		";
	}
	
	function getMyAccount($name){
		$query = mysql_query("SELECT * FROM userdata WHERE Name = '$name'") or die(mysql_error());
		while($row = mysql_fetch_assoc($query)){
			$wanteds = $row["Wanteds"];
			$auto = $row["Autofuehrerschein"];
			$motorrad = $row["Motorradtfuehrerschein"];
			$lkw = $row["LKWfuehrerschein"];
			$heli = $row["Helikopterfuehrerschein"];
			$fluga = $row["FlugscheinKlasseA"];
			$flugb = $row["FlugscheinKlasseB"];
			$motor = $row["Motorbootschein"];
			$segel = $row["Segelschein"];
			$angel = $row["Angelschein"];
			$perso = $row["Perso"];
			$kills = $row["Kills"];
			$tode = $row["Tode"];
			$geld = $row["Geld"];
			$bank = $row["Bankgeld"];
		}
		
		$query2 = mysql_query("SELECT * FROM bonustable WHERE Name = '$name'") or die(mysql_error());
		while($row = mysql_fetch_assoc($query2)){
			$lunge = $row["Lungenvolumen"];
			$muskeln = $row["Muskeln"];
			$kondition = $row["Kondition"];
			$boxen = $row["Boxen"];
			$kungfu = $row["KungFu"];
			$street = $row["Streetfighting"];
			$pistolen = $row["PistolenSkill"];
			$deagle = $row["DeagleSkill"];
			$shotgun = $row["ShotgunSkill"];
			$assault = $row["AssaultSkill"];
			$mp = $row["MP5Skills"];
		}
		
		// Skills
		if($lunge == ""){
			$lunge = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$lunge = "<span class='label label-danger'>{$lunge}</span>";
		}
		
		if($muskeln == ""){
			$muskeln = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$muskeln = "<span class='label label-danger'>{$muskeln}</span>";
		}
		
		if($kondition == ""){
			$kondition = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$kondition = "<span class='label label-danger'>{$kondition}</span>";
		}
		
		if($boxen == ""){
			$boxen = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$boxen = "<span class='label label-danger'>{$boxen}</span>";
		}
		
		if($kungfu == ""){
			$kungfu = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$kungfu = "<span class='label label-danger'>{$kungfu}</span>";
		}
		
		if($street == ""){
			$street = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$street = "<span class='label label-danger'>{$street}</span>";
		}
		
		if($pistolen == ""){
			$pistolen = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$pistolen = "<span class='label label-danger'>{$pistolen}</span>";
		}
		
		if($deagle == ""){
			$deagle = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$deagle = "<span class='label label-danger'>{$deagle}</span>";
		}
		
		if($shotgun == ""){
			$shotgun = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$shotgun = "<span class='label label-danger'>{$shotgun}</span>";
		}
		
		if($assault == ""){
			$assault = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$assault = "<span class='label label-danger'>{$assault}</span>";
		}
		
		if($mp == ""){
			$mp = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$mp = "<span class='label label-danger'>{$mp}</span>";
		}
		
		$char = "
		<div class='box'>
			<table class='table table-bordered table-hover'>
				<thead>
					<tr>
						<th>Charakter</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Lungenvolumen</td>
						<td>{$lunge}</td>
					</tr>
					<tr>
						<td>Muskeln</td>
						<td>{$muskeln}</td>
					</tr>
					<tr>
						<td>Kondition</td>
						<td>{$kondition}</td>
					</tr>
				</tbody>
			</table>
		</div>
		"; 
		
		$fight = "
		<div class='box'>
			<table class='table table-bordered table-hover'>
				<thead>
					<tr>
						<th>Kampfstil</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Boxen</td>
						<td>{$boxen}</td>
					</tr>
					<tr>
						<td>KungFu</td>
						<td>{$kungfu}</td>
					</tr>
					<tr>
						<td>Streetfight</td>
						<td>{$street}</td>
					</tr>
				</tbody>
			</table>
		</div>
		"; 
		
		$skills = "
		<div class='box'>
			<table class='table table-bordered table-hover'>
				<thead>
					<tr>
						<th>Skill</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Pistolenskill</td>
						<td>{$pistolen}</td>
					</tr>
					<tr>
						<td>Deagleskill</td>
						<td>{$deagle}</td>
					</tr>
					<tr>
						<td>Shotungskill</td>
						<td>{$shotgun}</td>
					</tr>
					<tr>
						<td>Assaultskill</td>
						<td>{$assault}</td>
					</tr>
					<tr>
						<td>MP5skill</td>
						<td>{$mp}</td>
					</tr>
				</tbody>
			</table>
		</div>
		";
		
		// Bar
		$bar = "
			   <div class='info-box bg-green'>
                <span class='info-box-icon'><i class='fa fa-money'></i></span>
                <div class='info-box-content'>
                  <span class='info-box-text'>Bargeld</span>
                  <span class='info-box-number'>{$geld} $</span>
                  <div class='progress'>
                    <div class='progress-bar' style='width: 0%'></div>
                  </div>
                  <span class='progress-description'>
                    Sie haben {$geld} $ Bar dabei
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
		";
		
		// Bank
		$bank = "
               <div class='info-box bg-green'>
                <span class='info-box-icon'><i class='fa fa-money'></i></span>
                <div class='info-box-content'>
                  <span class='info-box-text'>Bankgeld</span>
                  <span class='info-box-number'>{$bank} $</span>
                  <div class='progress'>
                    <div class='progress-bar' style='width: 0%'></div>
                  </div>
                  <span class='progress-description'>
                    Sie haben {$bank} $ auf Ihrem Konto
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
		";

		// Kill / Death
		if($kills == 0){
			$kd_r = 0;
		}elseif($tode == 0){
			$kd_r = $kills;
		}else{
			$kd_r = $kills / $tode;
		}
		
		$kd = "
			<div class='info-box bg-blue'>
                <span class='info-box-icon'><i class='fa fa-bar-chart'></i></span>
                <div class='info-box-content'>
                  <span class='info-box-text'>Kill / Death</span>
                  <span class='info-box-number'>Kills {$kills} - Deaths {$tode}</span>
                  <div class='progress'>
                    <div class='progress-bar' style='width: 0%'></div>
                  </div>
                  <span class='progress-description'>
                    Sie haben eine KD von {$kd_r}
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
		";
		
		// Wanteds
		if($wanteds >= 1){
			$progress = 100/6;
			$pr_wa = $progress * $wanteds;
			
			$star = "";
			for($i=0;$i<$wanteds;$i++){
				$star = "{$star} <i class='fa fa-star'></i>";
			}
			
			$s_wanted = "
			 <div class='info-box bg-red'>
                <span class='info-box-icon'><i class='fa fa-frown-o'></i></span>
                <div class='info-box-content'>
                  <span class='info-box-text'>Wanteds</span>
                  <span class='info-box-number'>{$star}</span>
                  <div class='progress'>
                    <div class='progress-bar' style='width: {$pr_wa}%'></div>
                  </div>
                  <span class='progress-description'>
                    Sie haben {$wanteds} Wanteds
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
			";
		}else{
			$s_wanted = "
			 <div class='info-box bg-green'>
                <span class='info-box-icon'><i class='fa fa-smile-o'></i></span>
                <div class='info-box-content'>
                  <span class='info-box-text'>Wanteds</span>
                  <span class='info-box-number'>{$wanteds}</span>
                  <div class='progress'>
                    <div class='progress-bar' style='width: 0%'></div>
                  </div>
                  <span class='progress-description'>
                    Sie haben keine Wanteds
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
			";
		}
		
		// Scheine
		if($auto == 0){
			$auto = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$auto = "<span class='label label-success'>vorhanden</span>";
		}
		
		if($motorrad == 0){
			$motorrad = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$motorrad = "<span class='label label-success'>vorhanden</span>";
		}
		
		if($lkw == 0){
			$lkw = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$lkw = "<span class='label label-success'>vorhanden</span>";
		}
		
		if($heli == 0){
			$heli = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$heli = "<span class='label label-success'>vorhanden</span>";
		}
		
		if($fluga == 0){
			$fluga = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$fluga = "<span class='label label-success'>vorhanden</span>";
		}
		
		if($flugb == 0){
			$flugb = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$flugb = "<span class='label label-success'>vorhanden</span>";
		}
		
		if($motor == 0){
			$motor = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$motor = "<span class='label label-success'>vorhanden</span>";
		}
		
		if($segel == 0){
			$segel = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$segel = "<span class='label label-success'>vorhanden</span>";
		}
		
		if($angel == 0){
			$angel = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$angel = "<span class='label label-success'>vorhanden</span>";
		}
		
		if($perso == 0){
			$perso = "<span class='label label-danger'>nicht vorhanden</span>";
		}else{
			$perso = "<span class='label label-success'>vorhanden</span>";
		}
		
		
		$scheine = "
		<div class='box'>
			<table class='table table-bordered table-hover'>
				<thead>
					<tr>
						<th>Lizenz</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Autoführerschein</td>
						<td>{$auto}</td>
					</tr>
					<tr>
						<td>Motorradführerschein</td>
						<td>{$motorrad}</td>
					</tr>
					<tr>
						<td>Lkwführerschein</td>
						<td>{$lkw}</td>
					</tr>
					<tr>
						<td>Helikopterschein</td>
						<td>{$heli}</td>
					</tr>
					<tr>
						<td>Flugschein Klasse A</td>
						<td>{$fluga}</td>
					</tr>
					<tr>
						<td>Flugschein Klasse B</td>
						<td>{$flugb}</td>
					</tr>
					<tr>
						<td>Motorbootschein</td>
						<td>{$motor}</td>
					</tr>
					<tr>
						<td>Segelschein</td>
						<td>{$segel}</td>
					</tr>
					<tr>
						<td>Angelschein</td>
						<td>{$angel}</td>
					</tr>
					<tr>
						<td>Personalausweis</td>
						<td>{$perso}</td>
					</tr>
				</tbody>
			</table>
		</div>
		";
		
		
		echo "
		<section class='content-header'>
          <h1>
            Mein Account
            <small>Allgemein</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class='content'>
			<div class='callout callout-info'>
				<strong>Hallo {$name}</strong>
				<p>Sie befinden sich hier auf ihrer Account Seite, hier werden Ihnen alle Informationen über ihren Account angezeigt.</p>
          </div>
		  <div class='row'>
			<div class='col-md-6'>
				{$bar}
				{$bank}
				{$char}
				{$fight}
				{$skills}
			</div>
			<div class='col-md-6'>
				{$s_wanted}
				{$scheine}
				{$kd}
			</div>
		</section>
		";
	}
	
	function getImmo(){
		$query = mysql_query("SELECT * FROM houses WHERE Besitzer = 'none' ORDER BY Mindestzeit") or die(mysql_error());
		$result = mysql_num_rows($query);
		
		if($result == 0){
			
			echo "
			<section class='content-header'>
			  <h1>
				Immobilien Markt 24
				<small>kaufe Immobilien</small>
			  </h1>
			</section>

			<!-- Main content -->
			<section class='content'>
				<div class='callout callout-info'>
					<strong>Hallo {$_SESSION["acc"]}</strong>
					<p>Sie können sich hier freie Immobilien anschauen.</p>
			  </div>
			  <div class='row'>
				<div class='col-md-12'>
					<div class='alert alert-danger' role='alert'>Es sind momentan keine Immobilien zum verkauf.</div>
				</div>
			</section>
			
			";
		
		}else{
		
			$house = "";
			
			while($row = mysql_fetch_assoc($query)){
				$preis = $row["Preis"];
				$mindest = $row["Mindestzeit"];
				$interior = $row["CurrentInterior"];
				$kasse = $row["Kasse"];
				$miete = $row["Miete"];
				$x = $row["SymbolX"];
				$y = $row["SymbolY"];
				$house = "{$house} <tr><td>{$preis} $</td><td>{$mindest} Stunden</td><td>{$interior}</td><td>{$kasse} $</td><td>{$miete} $</td><td><a href='framework/map.php?x={$x}&y={$y}'>Lage</a></td></tr>";
			}
			
			echo "
			<section class='content-header'>
			  <h1>
				Immobilien Markt 24
				<small>kaufe Immobilien</small>
			  </h1>
			</section>

			<!-- Main content -->
			<section class='content'>
				<div class='callout callout-info'>
					<strong>Hallo {$_SESSION["acc"]}</strong>
					<p>Sie befinden sich hier auf ihrer Immobilien Seite, hier werden Ihnen alle Informationen über ihre Immobilie angezeigt.</p>
			  </div>
			  <div class='row'>
				<div class='col-md-12'>
					<div class='box'>
							<div class='box-header'>
						  <h3 class='box-title'>freie Immobilien ({$result})</h3>
						</div><!-- /.box-header -->
							<table class='table table-bordered table-hover'>
								<thead>
									<tr>
										<th>Preis</th>
										<th>Mindestspielzeit</th>
										<th>Interior</th>
										<th>Kasse</th>
										<th>Miete</th>
										<th>Lage</th>
									</tr>
								</thead>
								<tbody>
									{$house}
								</tbody>
							</table>
						</div>
				</div>
			</section>
			
			";
		
		}
	}
	
	function getMyImmo($name){
		$query = mysql_query("SELECT * FROM houses WHERE Besitzer = '$name'") or die(mysql_error());
		$result = mysql_num_rows($query);
		
		if($result == 0){
			
			echo "
			<section class='content-header'>
			  <h1>
				Meine Immobilie
				<small>my home is my castle</small>
			  </h1>
			</section>

			<!-- Main content -->
			<section class='content'>
				<div class='callout callout-info'>
					<strong>Hallo {$name}</strong>
					<p>Sie befinden sich hier auf ihrer Immobilien Seite, hier werden Ihnen alle Informationen über ihre Immobilie angezeigt.</p>
			  </div>
			  <div class='row'>
				<div class='col-md-12'>
					<div class='alert alert-danger' role='alert'>Sie haben noch keine Immobilie</div>
				</div>
			</section>
			
			";
		
		}else{
	
			while($row = mysql_fetch_assoc($query)){
				$preis = $row["Preis"];
				$mindest = $row["Mindestzeit"];
				$interior = $row["CurrentInterior"];
				$kasse = $row["Kasse"];
				$miete = $row["Miete"];
				$x = $row["SymbolX"];
				$y = $row["SymbolY"];
			}
	
			echo "
			<section class='content-header'>
			  <h1>
				Meine Immobilie
				<small>my home is my castle</small>
			  </h1>
			</section>

			<!-- Main content -->
			<section class='content'>
				<div class='callout callout-info'>
					<strong>Hallo {$name}</strong>
					<p>Sie befinden sich hier auf ihrer Immobilien Seite, hier werden Ihnen alle Informationen über ihre Immobilie angezeigt.</p>
			  </div>
			  <div class='row'>
				<div class='col-md-12'>
					<div class='box'>
							<div class='box-header'>
						  <h3 class='box-title'>Meine Immobilie</h3>
						</div><!-- /.box-header -->
							<table class='table table-bordered table-hover'>
								<tbody>
									<tr>
										<td>Preis</td>
										<td>{$preis} $</td>
									</tr>
									<tr>
										<td>Mindestzeit</td>
										<td>{$mindest} Stunden</td>
									</tr>
									<tr>
										<td>Interior</td>
										<td>{$interior}</td>
									</tr>
									<tr>
										<td>Kasse</td>
										<td>{$kasse} $</td>
									</tr>
									<tr>
										<td>Miete</td>
										<td>{$miete} $</td>
									</tr>
									<tr>
										<td>Lage</td>
										<td><a href='framework/map.php?x={$x}&y={$y}'>Lage</a></td>
									</tr>
								</tbody>
							</table>
						</div>
				</div>
			</section>
			
			";
		}
	}

}

?>

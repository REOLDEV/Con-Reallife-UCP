<?php
session_unset();
session_destroy();
setcookie(session_name(), "weg damit", 0, "/");
header ("Location: index.php");
?>
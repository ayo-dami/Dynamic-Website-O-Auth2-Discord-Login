<?php

require('./inc/config.php');

if ( isset($_SESSION['discord_web']) ) {
   session_destroy();
}

header('location: ./');

?>

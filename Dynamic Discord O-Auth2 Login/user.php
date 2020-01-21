<?php

require('./inc/config.php');

if( isset($_SESSION['discord_web']) ) {
	$user = website::classThis($_SESSION['discord_web']);
?>

<pre>
<h2>Hola! <?php echo $user->username;?></h2>
<b>ID Cuenta:</b>       <?php echo $user->user_id;?> 
<b>Correo Cuenta:</b>   <?php echo $user->email;?> 
<b>Cuenta Discord:</b>  <?php echo $user->username;?>#<?php echo $user->discriminator;?> 
<b>Token Auth:</b>      <?php echo $user->access_token;?> 
<b>Token Refresh:</b>   <?php echo $user->refresh_token;?> 

<img src="https://cdn.discordapp.com/avatars/<?php echo $user->user_id;?>/<?php echo $user->avatar_id;?>.png" style="width: 52px">

<?php echo($user->flags); /* https://discordapp.com/developers/docs/resources/user#user-object-user-flags */ ?>

<?php
switch ($user->premium_type) {
	case '1': echo '<b>Discord Nitro:</b>   Classic'; break;
	case '2': echo '<b>Discord Nitro:</b>   Full'; break;
	default:  echo '<b>Discord Nitro:</b>   Nope'; break;
} ?>



<a href="./logout.php">Borrar Sesión</a></p>

<?php 
} else {
	header('location: index.php');
}

?>

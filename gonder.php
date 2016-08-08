<?php
include "ayar.php";
date_default_timezone_set('Europe/Istanbul');

$IP = GetIP();
$kayit_tarihi   = date("Y-m-d H:i:s");
$adsoyad        = $_POST['adsoyad'];
$telefon        = $_POST['telefon'];
$email          = $_POST['email'];
$mesaj          = $_POST['mesaj'];

function GetIP(){
	if(getenv("HTTP_CLIENT_IP")) {
 		$ip = getenv("HTTP_CLIENT_IP");
 	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 		$ip = getenv("HTTP_X_FORWARDED_FOR");
 		if (strstr($ip, ',')) {
 			$tmp = explode (',', $ip);
 			$ip = trim($tmp[0]);
 		}
 	} else {
 	$ip = getenv("REMOTE_ADDR");
 	}
	return $ip;
}

$mesaj = nl2br($mesaj);

$kayit = mysql_query("INSERT INTO defter (adsoyad, telefon, email, mesaj, tarih, ip) VALUES ('$adsoyad', '$telefon', '$email', '$mesaj', '$kayit_tarihi','$IP')");

if ($kayit)

{

echo "";

} else 

{

echo "hata";

}
?>

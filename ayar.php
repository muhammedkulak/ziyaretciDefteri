<?php
$host="localhost";
$db="ziyaretci";
$user="root";
$pass="root";

$conn = mysql_connect ("$host", "$user", "$pass") or die ("MySql Baglantisinda Hata");
@mysql_select_db ("$db") or die ("Üye Veritabanina Baglanilamadi");
 
?>
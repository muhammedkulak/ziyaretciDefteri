<?php
include "ayar.php";
$conn = new mysqli('localhost', 'root', 'root', 'ziyaretci') 
or die ('Cannot connect to db');

    $result = $conn->query("select id, adsoyad, mesaj, email, tarih from defter order by tarih DESC");
    
    while ($row = $result->fetch_assoc()) {
        unset($id, $name, $mesaj);
        $id     = $row['id'];
        $name   = $row['adsoyad'];
        $mesaj  = $row['mesaj'];
        $tarih  = $row['tarih'];
        $email  = $row['email'];
        echo '<ul>';
        echo '<label style="float:left;">'.$name.'</label><p>('.$email.')</p><p style="float:right;">'.$tarih.'</p>';
        echo '<p style="word-wrap: break-word;">'.$mesaj.'</p>'; 
        echo '<hr></ul>';
}  
?>
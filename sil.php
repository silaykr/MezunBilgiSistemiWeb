<?php
include("baglanti.php");
$silinecekID= $_GET['id'];

$sonuc=mysqli_query($baglanti,"DELETE from genelbilgiler  where ogrenciNo=".$silinecekID);
 
if($sonuc>0){
   echo "Başarıyla silindi";
   header("location: mezunBilgileriniGoster.php");
 }
else
    echo "Bir sorun oluştu silinemedi";
 
?>
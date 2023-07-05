<?php
$host ="localhost";
$kullaniciAdi = "root";
$sifre = "";
$eMail = "";
$tc = "";
$veritabani = "mezunbilgisistemi";
$tablo = "giris";

$baglanti = mysqli_connect($host, $kullaniciAdi, $sifre);

if($baglanti){
  // echo "baglanti sağlandi";
}

else {
    //echo "Bağlanti yok";
}

@mysqli_select_db($baglanti, $veritabani) or die("Veri tabanına bağlanamadık");

?>
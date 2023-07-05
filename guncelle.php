<?php
include("ustbar.php");
include("baglanti.php");
//session_start();

$bolum = $_SESSION["bolum"];
$guncellenecekID = $_GET['id'];

$sql1 = ("SELECT * FROM genelbilgiler WHERE ogrenciNo=" . $guncellenecekID);
$sql2 = ("SELECT * FROM isbilgileri WHERE ogrenciNo=" . $guncellenecekID);
$sql3 = ("SELECT * FROM egitimbilgileri WHERE ogrenciNo=" . $guncellenecekID);

$result1 = mysqli_query($baglanti, $sql1);
$result2 = mysqli_query($baglanti, $sql2);
$result3 = mysqli_query($baglanti, $sql3);

if (mysqli_num_rows($result1) > 0) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data[] = $row1;
    }
}
if (mysqli_num_rows($result2) > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $data[] = $row2;
    }
}
if (mysqli_num_rows($result3) > 0) {
    while ($row3 = mysqli_fetch_assoc($result3)) {
        $data[] = $row3;
    }
}

if (isset($_POST["guncelle"])) {
    $ogrenciNo = $_POST["ogrenciNo"];
    $ad = ucfirst(preg_replace('/[^a-zA-ZğüşıöçĞÜŞİÖÇ\s]+/', '', $_POST["ad"]));
    $soyad = strtoupper(preg_replace('/[^a-zA-ZğüşıöçĞÜŞİÖÇ\s]+/', '', $_POST["soyad"]));
    $mezuniyetTarihi = $_POST["mezuniyetTarihi"];
    $bolum = $_POST["bolum"];
    $cepTelefonu = $_POST["cepTelefonu"];
    $evTelefonu = $_POST["evTelefonu"];
    $ePosta = $_POST["ePosta"];
    $evUlke = $_POST["evUlke"];
    $evSehir = $_POST["evSehir"];
    $evAdres = $_POST["evAdres"];
    $notlar = $_POST["notlar"];


    $ıseGirisTarihi = $_POST["ıseGirisTarihi"];
    $ıstenAyrilisTarihi = $_POST["ıstenAyrilisTarihi"];
    $kamuOzel = $_POST["kamuOzel"];
    $sektor = $_POST["sektor"];
    $unvan = $_POST["unvan"];
    $Pozisyon = $_POST["Pozisyon"];
    $sirket = $_POST["sirket"];


    $universite = $_POST["universite"];
    $akademikEğitim = $_POST["akademikEğitim"];
    $baslangicTarihi = $_POST["baslangicTarihi"];
    $bitisTarihi = $_POST["bitisTarihi"];
    $uniSehir = $_POST["uniSehir"];
    $uniUlke = $_POST["uniUlke"];
    $bolum = $_POST["bolum"];

    mysqli_query($baglanti, "SET FOREIGN_KEY_CHECKS=0");

    $ekle1 = "UPDATE `genelbilgiler` SET `ad`='$ad',`soyad`='$soyad',`mezuniyetTarihi`='$mezuniyetTarihi',`cepTelefonu`='$cepTelefonu',`evTelefonu`='$evTelefonu'
    ,`ePosta`='$ePosta',`evUlke`='$evUlke',`evSehir`='$evSehir',`evAdres`='$evAdres' ,`notlar`='$notlar',`bolum`='$bolum'WHERE ogrenciNo=" . $guncellenecekID;

    $ekle2 = "UPDATE `isbilgiler` SET `ıseGirisTarihi`='$ıseGirisTarihi',`ıstenAyrilisTarihi`='$ıstenAyrilisTarihi',`kamuOzel`='$kamuOzel',`sektor`='$sektor'
    ,`unvan`='$unvan',`Pozisyon`='$Pozisyon',`sirket`='$sirket' WHERE ogrenciNo=" . $guncellenecekID;

    $ekle3 = "UPDATE `egitimbilgiler` SET `universite`='$universite',`akademikEğitim`='$akademikEğitim',`baslangicTarihi`='$baslangicTarihi'
    ,`bitisTarihi`='$bitisTarihi',`uniSehir`='$uniSehir',`uniUlke`='$uniUlke' WHERE ogrenciNo=" . $guncellenecekID;

    $calistirekle1 = mysqli_query($baglanti, $ekle1);
    $calistirekle2 = mysqli_query($baglanti, $ekle2);
    $calistirekle3 = mysqli_query($baglanti, $ekle3);

    if ($calistirekle1 && $calistirekle2 && $calistirekle3) {
        header("location: anasayfa.php");
    } else {
        echo "olmadı";
    }
}

mysqli_query($baglanti, "SET FOREIGN_KEY_CHECKS=1");
mysqli_close($baglanti);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="yenikayit.css">
    <title>Güncelle</title>
    <style>
        .form {
            display: none;
        }

        .form:target {
            display: block;
        }

        #guncelle {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            background-color: #ACBCFF;
            color: #ffffff;
            cursor: pointer;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }

        #guncelle:hover {
            background-color: #AEE2FF;
            color: #ffffff;
        }

        #bilgi {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            background-color: #ACBCFF;
            color: #ffffff;
            cursor: pointer;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }

        #bilgi:hover {
            background-color: #AEE2FF;

        }

        body {
            background-color: #DDE6ED;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-md-12 text-center">
            <div class="kutu">
                <div class="buton">
                    <a id="bilgi" href="#genel">Genel Bilgileri</a>
                    <a id="bilgi" href="#is">İş Bilgileri</a>
                    <a id="bilgi" href="#egitim">Eğitim Bilgileri</a>
                </div>
                <form action="#" method="POST">
                    <table class='table table-bordered table-hover'>
                        <tr class='table-primary'>
                            <th>




                                <?php
                                foreach ($data as $row3) {
                                    echo '
                <div id="egitim" class="form">
                    <div class="egitim-kutu">
                        <div class="table-primary">
                        <span class="baslik">Eğitim Bilgileri</span>
                        <input class="form-control"  type="text" value="' . @$row3['universite'] . '" placeholder="Üniversite" name="universite" id="universite">
                        <select name="akademikEğitim" class="form-control"  name="akademikEğitim">
                            <option selected> Doktora
                            <option> Yüksek Lisans
                        </select>
                        <input type="date" class="form-control"  value="' . @$row3['baslangicTarihi'] . '" placeholder="Üniversite Başlangıç Tarihi" name="baslangicTarihi" id="baslangicTarihi">
                        <input type="date" class="form-control"  value="' . @$row3['bitisTarihi'] . '" placeholder="Üniversite Bitiş Tarihi" name="bitisTarihi" id="bitisTarihi">
                        <input type="text"  class="form-control" value="' . @$row3['uniSehir'] . '" placeholder="Üniversitenin Şehiri" name="uniSehir" id="uniSehir">
                        <input type="text" class="form-control"  value="' . @$row3['uniUlke'] . '" placeholder="Üniversitenin Ülkesi" name="uniUlke" id="uniUlke">
                        <input type="text" class="form-control"  value="' . @$row3['notlar'] . '" placeholder="Notlar" name="notlar" id="notlar">
                        <input type="text" class="form-control"  value="' . @$row3['bolum'] . '" placeholder="Bölüm" name="bolum" id="bolum">

                        </div>
                        </div>

                </div>
                     ';
                                }
                                ?>

                                <?php
                                foreach ($data as $row2) {
                                    echo '
                <div id="is" class="form">
                <div class="is-kutu">
                    <span class="baslik">İş Bilgileri</span>
                    <input class="form-control"  type="date" value="' . @$row2['ıseGirisTarihi'] . '" placeholder="İşe Giriş Tarihi" name="ıseGirisTarihi" id="ıseGirisTarihi">
                    <input class="form-control"  type="date" value="' . @$row2['ıstenAyrilisTarihi'] . '" placeholder="İşten Çıkış Tarihi" name="ıstenAyrilisTarihi" id="ıstenAyrilisTarihi">
                    <select class="form-control"  name="kamuOzel" name="kamuOzel">
                        <option selected> kamuOzel
                        <option> Özel
                    </select>
                    <input class="form-control"  type="text" value="' . @$row2['sektor'] . '" placeholder="Sektör" name="sektor" id="sektor">
                    <input class="form-control"  type="text" value="' . @$row2['unvan'] . '" placeholder="Ünvan" name="unvan" id="unvan">
                    <input class="form-control"  type="text" value="' . @$row2['Pozisyon'] . '" placeholder="Pozisyon" name="Pozisyon" id="Pozisyon">
                    <input class="form-control"  type="text" value="' . @$row2['sirket'] . '" placeholder="Şirket" name="sirket" id="sirket">

                    </div>
                </div>
                     ';
                                }
                                ?>
                                <?php
                                foreach ($data as $row1) {
                                    echo '
                <div id="genel" class="form">
                <div class="genel-kutu">
                    <span class="baslik">Genel Bilgileri</span>
                    <input class="form-control"  type="text" value="' . @$row1['ogrenciNo'] . '" placeholder="Öğrenci Numarası" size="8" name="ogrenciNo" id="ogrenciNo">
                    <input class="form-control"  type="text" value="' . @$row1['ad'] . '" placeholder="İsim" name="ad" id="ad">
                    <input class="form-control"  type="text" value="' . @$row1['soyad'] . '" placeholder="Soyisim" name="soyad" id="soyad">
                    <input class="form-control"  type="date" value="' . @$row1['mezuniyetTarihi'] . '" placeholder="Mezuniyet Tarihi" name="mezuniyetTarihi" id="mezuniyetTarihi">
                     ';
                                ?>
                                    <?php
                                    if ($bolum != "Bölüm Sorumlusu") {
                                        echo "  <select class='form-control'  name='bolum' id='bolum'>
                                        <option selected> $bolum
                                    </select>";
                                    } else {
                                        echo '  <input class="form-control"  type="text" value="' . @$row1['bolum'] . '" placeholder="Bölüm" name="bolum" id="bolum">';
                                    }
                                    ?>
                                <?php
                                    echo '
                    <input class="form-control"  type="tel" id="cepTelefonu" value="' . @$row1['cepTelefonu'] . '" placeholder="Cep Telefonu" name="cepTelefonu" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                    <input class="form-control"  type="tel" id="evTelefonu" value="' . @$row1['evTelefonu'] . '" placeholder="Ev Telefonu" name="evTelefonu" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                    <input class="form-control"  type="email" value="' . @$row1['ePosta'] . '" placeholder="E-Posta" name="ePosta" id="ePosta">
                    <input class="form-control"  type="text" value="' . @$row1['evUlke'] . '" placeholder="Ev Ülke" name="evUlke" id="evUlke">
                    <input class="form-control"  type="text" value="' . @$row1['evSehir'] . '" placeholder="Ev Şehir" name="evSehir" id="evAdres">
                    <textarea  class="form-control" name="evAdres" id="evAdres" value="' . @$row1['evAdres'] . '" placeholder="Adres" cols="15" rows="5"></textarea>
                </div>
                </div>

                     ';
                                }

                                ?>
                                <input class="tus" type="submit" value="Güncelle" name="guncelle" id="guncelle">

                            </th>
                        </tr>
                </form>

            </div>

</body>

</html>
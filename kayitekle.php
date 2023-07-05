<?php
include("ustbar.php");
include("baglanti.php");    
//session_start();
$bolum = $_SESSION["bolum"];



if (isset($_POST["kayit"])) {
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


    $sql1 = "INSERT INTO `genelbilgiler`(`ogrenciNo`, `ad`, `soyad`, `mezuniyetTarihi`, `cepTelefonu`, `evTelefonu`, `ePosta`, `evUlke`, `evSehir`, `evAdres`, `notlar`, `bolum`) VALUES 
    ('$ogrenciNo','$ad','$soyad','$mezuniyetTarihi','$cepTelefonu','$evTelefonu','$ePosta','$evUlke','$evSehir','$evAdres','$notlar','$bolum')";

    $sql2 = "INSERT INTO `isbilgileri`(`ogrenciNo`, `ıseGirisTarihi`, `ıstenAyrilisTarihi`, `kamuOzel`, `sektor`, `unvan`, `Pozisyon`, `sirket`) VALUES 
    ('$ogrenciNo','$ıseGirisTarihi','$ıstenAyrilisTarihi','$kamuOzel','$sektor','$unvan','$Pozisyon','$sirket')";

    $sql3 = "INSERT INTO `egitimbilgileri`(`ogrenciNo`, `universite`, `akademikEğitim`, `baslangicTarihi`, `bitisTarihi`, `uniSehir`, `uniUlke`) VALUES 
    ('$ogrenciNo','$universite','$akademikEğitim','$baslangicTarihi','$bitisTarihi','$uniSehir','$uniUlke')";

    $calistirsql1 = mysqli_query($baglanti, $sql1);
    $calistirsql2 = mysqli_query($baglanti, $sql2);
    $calistirsql2 = mysqli_query($baglanti, $sql3);

    if ($calistirsql1 && $calistirsql2 && $calistirsql2) {
        echo "Veriler başarıyla kaydedildi.";
    } else {
        echo "Hata: " . $baglanti->error;
    }

    $baglanti->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="yenikayit.css">
    <title>Öğrenci Kayıt</title>
    <style>
        .form {
            display: none;
        }

        .form:target {
            display: block;
        }

        .form {
            display: none;
        }

        .form:target {
            display: block;
        }

        body {
            background-color: #DDE6ED;
        }

        #button {
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

        #button:hover {
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
    </style>
</head>

<html>

<body>
    <div class="container">
        <div class="col-md-12 text-center">
            <div class="kutu">
                <div class="buton">
                    <a id="bilgi" href="#egitim">Eğitim Bilgileri</a>
                    <a id="bilgi" href="#is">İş Bilgileri</a>
                    <a id="bilgi" href="#genel">Genel Bilgileri</a>
                </div>
                <form action="#" method="POST">
                    <table class='table table-bordered table-hover'>
                        <tr class='table-primary'>
                            <th>
                                <input type="text" class="form-control" placeholder="Üniversite" name="universite" id="universite">
                                <select class="form-control" name="akademikEğitim" name="akademikEğitim">
                                    <option selected> Doktora
                                    <option> Yüksek Lisans
                                </select>
                                <input type="date" class="form-control" placeholder="Üniversite Başlangıç Tarihi" name="baslangicTarihi" id="baslangicTarihi">
                                <input type="date" class="form-control" placeholder="Üniversite Bitiş Tarihi" name="bitisTarihi" id="bitisTarihi">
                                <input type="text" class="form-control" placeholder="Üniversitenin Şehiri" name="uniSehir" id="uniSehir">
                                <input type="text" class="form-control" placeholder="Üniversitenin Ülkesi" name="uniUlke" id="uniUlke">

            </div>
        </div>

        <div id="is" class="form">
            <div class="is-kutu">
                <span class="baslik">İş Bilgileri</span>
                <input type="date" class="form-control" placeholder="İşe Giriş Tarihi" name="ıseGirisTarihi" id="ıseGirisTarihi">
                <input type="date" class="form-control" placeholder="İşten Çıkış Tarihi" name="ıstenAyrilisTarihi" id="ıstenAyrilisTarihi">
                <select class="form-control" name="kamuOzel" name="kamuOzel">
                    <option selected> kamuOzel
                    <option> Özel
                </select>
                <input class="form-control" type="text" placeholder="Sektör" name="sektor" id="sektor">
                <input class="form-control" type="text" placeholder="Ünvan" name="unvan" id="unvan">
                <input class="form-control" type="text" placeholder="Pozisyon" name="Pozisyon" id="Pozisyon">
                <input class="form-control" type="text" placeholder="Şirket" name="sirket" id="sirket">

            </div>
        </div>

        <div id="genel" class="form">
            <div class="genel-kutu">
                <span class="baslik">Genel Bilgileri</span>
                <input class="form-control" type="text" placeholder="Öğrenci Numarası" size="8" name="ogrenciNo" id="ogrenciNo">
                <input class="form-control" type="text" placeholder="İsim" name="ad" id="ad">
                <input class="form-control" type="text" placeholder="Soyisim" name="soyad" id="soyad">
                <input class="form-control" type="date" placeholder="Mezuniyet Tarihi" name="mezuniyetTarihi" id="mezuniyetTarihi">

                <?php
                if ($bolum != "Bölüm Sorumlusu") {
                    echo "  <select name='bolum' class='form-control' id='bolum'>
                                        <option selected> $bolum
                                    </select>";
                } else {
                    echo '<input type="text" class="form-control" placeholder="Bölüm" name="bolum" id="bolum">';
                }
                ?>
                <input type="tel" class="form-control" id="cepTelefonu" placeholder="Cep Telefonu" name="cepTelefonu" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                <input type="tel" class="form-control" id="evTelefonu" placeholder="Ev Telefonu" name="evTelefonu" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                <input type="email" class="form-control" placeholder="E-Posta" name="ePosta" id="ePosta">
                <input type="text" class="form-control" placeholder="Ev Ülke" name="evUlke" id="evUlke">
                <input type="text" class="form-control" placeholder="Ev Şehir" name="evSehir" id="evSehir">

                <textarea class="form-control" name="evAdres" id="evAdres" placeholder="Adres" cols="15" rows="5"></textarea>
                <textarea class="form-control" name="notlar" id="notlar" placeholder="Notlar" cols="15" rows="5"></textarea>

            </div>
        </div>
        <input class="tus" id="button" class="btn btn-primary" class="col-md-12" type="submit" value="Kayıt" name="kayit" id="kayit">
        <input class="tus" id="button" class="btn btn-secondary" type="reset" value="Sıfırla">
        </form>
    </div>
    </div>
</body>

</html>
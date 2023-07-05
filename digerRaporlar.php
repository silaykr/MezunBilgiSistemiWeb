<?php
include("ustbar.php");
include("baglanti.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

body{
    background-color: #DDE6ED;
}

        .my-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 40px;
            
            /* Üst boşluğu ayarla */


        }

        .sil {
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

        .sil:hover {
            background-color: #AEE2FF;
            color: #ffffff;
        }

        .my-table th,
        .my-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .my-table th {
        }

        #adSoyad{
            background-color: #9DB2BF;

        }

        .button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            background-color: #ACBCFF;
            color: #ffffff;
            cursor: pointer;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .button:hover {
            background-color: #AEE2FF;

        }
    </style>
</head>

<body>

    <table class="my-table">
        <tr>

            <form action="#" method="POST">
                <th> <input class="button" type="submit" value="Doktora Yapan Öğrencileri Listele" name="doktora" id="doktora"></th>
                <th> <input class="button" type="submit" value="Türkiyede Doktora Yapan Öğrencileri Listele" name="trdoktora" id="trdoktora"></th>
                <th> <input class="button" type="submit" value="Yurtdışında Doktora Yapan Öğrencileri Listele" name="ydoktora" id="ydoktora"></th>
                <th> <input class="button" type="submit" value="Mezuniyetinin Ardından 3-5 Yıl İçinde İşe Girenler" name="mezunis" id="mezunis"></th>
        </tr>
        <tr>


            <th> <input class="button" type="submit" value="Yüksek Lisans Yapan Öğrenciler" name="lisans" id="lisans"></th>
            <th> <input class="button" type="submit" value="Türkiyede Yüksek Lisans Yapan Öğrenciler" name="trlisans" id="trlisans"></th>
            <th> <input class="button" type="submit" value="Yurtdışında Yüksek Lisans Yapan Öğrenciler" name="ydlisans" id="ylisans"></th>
            <th> <input class="button" type="submit" value="Mezuniyetinin Ardından 10 Yıl İçinde Yönetici Konumuna Gelenler" name="yonetici" id="yonetici"></th>
        </tr>
        </form>
</body>

</html>

<?php


function yazdir($sql)
{
    include("baglanti.php");
    $result = mysqli_query($baglanti, $sql);
    $data = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    echo "<table  class='my-table'>";
    echo "<tr id='adSoyad'>";
    echo    "<th>Öğrenci Numarası</th>";
    echo    "<th>İsim</th>";
    echo    "<th>Soyisim</th>";
    echo    "<th>Akademik Eğitim</th>";
    echo    "<th>İşlemler</th>";
    echo "</tr>";
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row["ogrenciNo"] . "</td>";
        echo "<td>" . $row["ad"] . "</td>";
        echo "<td>" . $row["soyad"] . "</td>";
        echo "<td>" . $row["akademikEğitim"] . "</td>";
        echo '<td> <a class="sil" href="sil.php?id=' . $row['ogrenciNo'] . '" onclick="return uyari();">Sil</a> </td>';
        echo "</tr>";
    }
    echo "</table>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["doktora"])) {
        $doktora = "SELECT e.ogrenciNo, e.akademikEğitim, g.ad, g.soyad FROM egitimbilgileri AS e INNER JOIN genelbilgiler AS g ON e.ogrenciNo = g.ogrenciNo WHERE e.akademikEğitim = 'Doktora'";
        yazdir($doktora);
    }
    if (isset($_POST["trdoktora"])) {
        $trdoktora = "SELECT e.ogrenciNo, e.akademikEğitim, g.ad, g.soyad FROM egitimbilgileri AS e INNER JOIN genelbilgiler AS g ON e.ogrenciNo = g.ogrenciNo WHERE e.akademikEğitim = 'Doktora' AND uniUlke='Türkiye'";
        yazdir($trdoktora);
    }
    if (isset($_POST["ydoktora"])) {
        $ydoktora = "SELECT e.ogrenciNo, e.akademikEğitim, g.ad, g.soyad FROM egitimbilgileri AS e INNER JOIN genelbilgiler AS g ON e.ogrenciNo = g.ogrenciNo WHERE e.akademikEğitim = 'Doktora' AND uniUlke <>'Türkiye'";
        yazdir($ydoktora);
    }
    if (isset($_POST["mezunis"])) {
        $mezunis = "SELECT gb.ad, gb.soyad, eb.ogrenciNo, eb.mezuniyetTarihi, ib.ıseGirisTarihi FROM egitimbilgileri AS eb INNER JOIN isbilgileri AS ib ON eb.ogrenciNo = ib.ogrenciNo INNER JOIN genelbilgiler AS gb ON gb.ogrenciNo = eb.ogrenciNo WHERE DATEDIFF(ib.ıseGirisTarihi, eb.mezuniyetTarihi) >= 1095 AND DATEDIFF(ib.ıseGirisTarihi, eb.mezuniyetTarihi) <= 1825;     ";
        yazdir($mezunis);
    }
    if (isset($_POST["lisans"])) {
        $lisans = "SELECT e.ogrenciNo, e.akademikEğitim, g.ad, g.soyad FROM egitimbilgileri AS e INNER JOIN genelbilgiler AS g ON e.ogrenciNo = g.ogrenciNo WHERE e.akademikEğitim = 'Yüksek Lisans'";
        yazdir($lisans);
    }
    if (isset($_POST["trlisans"])) {
        $trlisans = "SELECT e.ogrenciNo, e.akademikEğitim, g.ad, g.soyad FROM egitimbilgileri AS e INNER JOIN genelbilgiler AS g ON e.ogrenciNo = g.ogrenciNo WHERE e.akademikEğitim = 'Yüksek Lisans' AND uniUlke='Türkiye'";
        yazdir($trlisans);
    }
    if (isset($_POST["ydlisans"])) {
        $ydlisans = "SELECT e.ogrenciNo, e.akademikEğitim, g.ad, g.soyad FROM egitimbilgileri AS e INNER JOIN genelbilgiler AS g ON e.ogrenciNo = g.ogrenciNo WHERE e.akademikEğitim = 'Yüksek Lisans' AND uniUlke <>'Türkiye'";
        yazdir($ydlisans);
    }
    if (isset($_POST["yonetici"])) {
        $yonetici = "SELECT gb.ad, gb.soyad, eb.ogrenciNo, eb.mezuniyetTarihi, eb.akademikEğitim, ib.ıseGirisTarihi FROM egitimbilgileri AS eb INNER JOIN isbilgileri AS ib ON eb.ogrenciNo = ib.ogrenciNo INNER JOIN genelbilgiler AS gb ON gb.ogrenciNo = eb.ogrenciNo WHERE ib.unvan = 'Yönetici' AND DATEDIFF(ib.ıseGirisTarihi, eb.mezuniyetTarihi) <= 3652;";
        yazdir($yonetici);
    }
}
?>
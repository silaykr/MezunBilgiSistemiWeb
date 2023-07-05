<?php
include("ustbar.php");
include("baglanti.php");


//session_start();
$kullaniciAd = $_SESSION["kullaniciAd"];
$bolum = $_SESSION["bolum"];
if($bolum=="Bölüm Sorumlusu"){
    $sql = "SELECT * FROM genelbilgiler";
}
else{
    $sql = "SELECT * FROM genelbilgiler WHERE bolum = '$bolum'";
}
$result = mysqli_query($baglanti, $sql);
$data = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
}
mysqli_close($baglanti);
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mezun Bilgilerini Göster</title>
    <link rel="stylesheet" href="ustbar.php">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    .my-table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 40px; 

}
body{
    background-color: #DDE6ED;
}

.my-table th, .my-table td {
  border: 1px solid black;
  padding: 8px;
  text-align: center;
}

.my-table th {
  background-color: #9DB2BF;
}

.sil{
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

.sil:hover{
  background-color: #AEE2FF;
  color: #ffffff;
}

.ogrenciNo{
text-decoration: none;
color: black;

display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  text-align: center;
  border: none;
  border-radius: 4px;
  background-color: #ACBCFF;
  cursor: pointer;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
}

.ogrenciNo:hover{
  color: black;
}


    </style>
</head>

<body>


    <section>
    <?php
    echo"<div class=''>";
          echo "<table  class='table table-bordered table-hover'>";
          echo"<tr class='table-primary'>";
          echo    "<th colspan='1'>Öğrenci Numarası</th>";
          echo    "<th colspan='1'>İsim</th>";
          echo    "<th colspan='1'>Soyisim</th>";
          echo    "<th colspan='1'>Mezun Tarihi</th>";
          echo    "<th colspan='1'>E-Posta</th>";
          echo    "<th colspan='1'>Cep Telefonu</th>";
          echo    "<th colspan='1'>Ev Telefonu</th>";
          echo    "<th colspan='1'>Ülke</th>";
          echo    "<th colspan='1'>Şehir</th>";
          echo    "<th colspan='1'>Adres</th>";
          echo    "<th colspan='1'>İslemler</th>";

          echo"</tr>";
          foreach ($data as $row) {
              echo"<tr class='table-secondary'>";
              echo '<td><a class="ogrenciNo" href="guncelle.php?id=' . $row['ogrenciNo'] . '">' . $row["ogrenciNo"] . "</a></td>";
              echo "<td>" . $row["ad"] . "</td>";
              echo "<td>" . $row["soyad"] . "</td>";
              echo "<td>" . $row["mezuniyetTarihi"] . "</td>";
              echo "<td>" . $row["ePosta"] . "</td>";
              echo "<td>" . $row["cepTelefonu"] . "</td>";
              echo "<td>" . $row["evTelefonu"] . "</td>";
              echo "<td>" . $row["evUlke"] . "</td>";
              echo "<td>" . $row["evSehir"] . "</td>";
              echo "<td>" . $row["evAdres"] . "</td>";
              echo '<td> <a class="sil" href="sil.php?id='.$row['ogrenciNo'].'" onclick="return uyari();">Sil</a> </td>';
              echo"</tr>";
          }
          echo "</table>";
          ?>
    </table>
    </section>

    <article>

    </article>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
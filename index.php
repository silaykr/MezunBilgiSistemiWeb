<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>

</head>

<body>

    <?php
   
    include("baglanti.php");
    if (isset($_POST["giris"])) {
        $ePosta = $_POST["eMail"];
        $sifre = $_POST["sifre"];
        if (isset($ePosta) && isset($sifre)) {
            $secim = "SELECT * FROM giris WHERE eMail = '$ePosta' AND sifre='$sifre'";
            $calistir = mysqli_query($baglanti, $secim);
            $kayitsayisi = mysqli_num_rows($calistir);

            if ($kayitsayisi == 1) {
                $row = $calistir->fetch_assoc();
                $kullaniciAd = $row["kullaniciAd"];
                $bolum = $row["bolum"];
                session_start();
                $_SESSION["ePosta"] = $ePosta;
                $_SESSION["sifre"] = $sifre;
                $_SESSION["bolum"] = $bolum;
                $_SESSION["kullaniciAd"] = $kullaniciAd;


                header("location: mezunBilgileriniGoster.php");
            } else {
                echo "giriş başarısız";
            }
        }
    }
    ?>


    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">


                            <form method="POST" action="#">
                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Giriş</h2>
                                    <p class="text-white-50 mb-5">Lütfen E-mail'inizi ve şifrenizi giriniz.</p>

                                    <div class="mb-4">
                                        <input type="text" id="eMail" name="eMail" placeholder="E-Mail'nizi Giriniz..." class="form-control form-control-lg" />
                                        <label class="form-label" for="eMail">E-mail</label>
                                    </div>

                                    <div class="mb-4">
                                        <input type="password" id="sifre" name="sifre" placeholder="Şifrenizi Giriniz..." class="form-control form-control-lg" />
                                        <label class="form-label" for="sifre">Şifre</label>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" name="giris" id="giris" type="submit">Giriş</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>
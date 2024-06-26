<?php
require_once "../functions.php";
$idKelas = $_GET['classId'];
$idUser = $_GET['id'];
$harga = $_GET['harga'];
$durasi = $_GET['durasi'];
$idOrder = $_GET['idOrder'];
$syn = "SELECT * FROM USER WHERE userId = $idUser";
$users = query($syn);
$syn = "SELECT * FROM KELAS WHERE idKelas = $idKelas"; 
$kelas = query($syn);



if(count($users) == 0 || count($kelas) == 0){
    // echo "<script>document.location.href = 'homeLearner.php?id=$idUser'</script>";
    echo "<script>document.location.href = 'error.php?status=queryError'</script>";
}


function generateCode() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        $length = 12;

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = rand(0, strlen($characters) - 1);
            $code .= $characters[$randomIndex];
        }

        return $code;
}

function requestVAToBank($harga){
    global $idOrder;
    $vaOrder = generateCode();
    $order = new Order();
    $order->setVA($idOrder, $vaOrder);
}

function pembayaranSelesai(){

}


requestVAToBank($harga);

$order = new Order();
$virtualAccount = $order->getVA($idOrder);


?>

<script>
    // Function to start the countdown timer
    function startCountdown(duration, display) {
        var timer = duration, minutes, seconds;
        timer = duration;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = 0;
                console.log(0);

                // Create an AJAX request to a PHP file
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_order.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Handle response received from the server
                        console.log(this.responseText);
                    }
                };
                // Send the request with the idOrder parameter
                xhr.send("idOrder=" + encodeURIComponent(<?php echo $idOrder; ?>));
            }

            if(timer <= 590){
                console.log("Pembayaran sudah dilakukan");
                window.location.href = "orderList.php?id=<?php echo $idUser; ?>";
            }

        }, 1000);
    }

    window.onload = function () {
        var tenMinutes = 10 * 60, // Change 10 to whatever minutes you need
            display = document.getElementById('countdown');
        startCountdown(tenMinutes, display);
    };
</script>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>TutorTap - Home</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="../styles/styles.css" rel="stylesheet" />
</head>

<body class="montserratRegular">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    </head>

    <body>
        <div class="navbar w-100 bg-ouryellow ">
        <div class="container-fluid d-flex justify-content-between">
            <div class="container w-25 d-flex justify-content-center">
                <a href="">
                    <img src="../images/skilltap logo+brand.png" class="rounded-pill" style="width:200px; background-color:black" alt="">
                </a>
            </div>
            <div class="input-group w-50">
                <input type="text" class="form-control montserratRegular" placeholder="Search Classes" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-dark montserratSemiBold" type="button">Search</button>
                </div>
            </div>

            <div class="container w-25 px-5 row" style="color:black;">
                <div class="container col-3">
                    <a href="">
                    <i class="bi bi-envelope-fill text-dark" style="font-size: 30px; "></i></a></th>
                    </a>
                </div>
                <div class="container col-3">
                    <a href="">
                    <i class="bi bi-filter text-dark" style="font-size: 30px;"></i></a></th>
                    </a>
                </div>
                <div class="container col-3">
                    <a href="">
                    <i class="bi bi-cart-fill text-dark" style="font-size: 30px;"></i></a></th>
                    </a>
                </div>
                <div class="container col-3">
                    <a href="">
                    <i class="bi bi-list text-dark" style="font-size: 30px;"></i></a></th>
                    </a>
                </div>
            </div>
        </div>
    </div>
        <div class="container-fluid text-center mt-5 montserratBold ">
            <h1 class="montserratBold pb-3">Pembayaran BCA</h1>
        </div>

        <div class="container-fluid text-center mt-5">
            <h1>Virtual Account</h1>
        </div>

        <div class="container-fluid text-center">
            <h1 class="montserratExtraBold" style="font-size: 100px;"><?php echo $virtualAccount; ?> <i class="bi bi-copy"></i></h1>
        </div>

        <div class="container-fluid text-center mb-5">
            <h1>Rp.<?php echo $harga * $durasi ?></h1>
        </div>

        <!-- countdown -->
        <div class="container-fluid text-center">
            <h1 id="countdown" class="text-danger"></h1>
        </div>

              

    </body>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2024 Company, Inc</p>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">

                <img src="../images/skilltap logo+brand.png" alt="" style="width: 30%; height:30%;">
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
        </footer>
    </div>

</html>

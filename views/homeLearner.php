<?php
require_once "../functions.php";

$kelas = new Kelas();
$datas = $kelas->getAllKelas();

$id = $_GET['id'];
?>

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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="../styles/styles.css" rel="stylesheet" />
</head>

<body class="montserratRegular">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
                        <a href="chat.php?id=9999&receiverId=1">
                            <i class="bi bi-envelope-fill text-dark" style="font-size: 30px; "></i></a></th>
                        </a>
                    </div>
                    <div class="container col-3">
                        <a href="">
                            <i class="bi bi-filter text-dark" style="font-size: 30px;"></i></a></th>
                        </a>
                    </div>
                    <div class="container col-3">
                        <a href="orderList.php?id=<?php echo $id; ?>">
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
            <h1 class="montserratBold">Discover Classes</h1>
        </div>

        <div class="container-fluid p-5">
            <div class="row p-3">
                <?php foreach ($datas as $data) : ?>
                    <div class="card col-6 p-4 shadow-lg p-3 bg-white rounded">
                        <!-- ini benerin hrefnya nanti -->
                        <a href="classDetail.php?id=<?php echo $id; ?>&classId=<?php echo $data['idKelas']; ?>" style="color: inherit; text-decoration: none;">
                            <img class="card-img-top" src="../images/<?php echo $data['fotoKelas']; ?>" alt="Card image cap" style="height: 400px; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title montserratBold" style="font-size:35px"><?php echo $data['namaKelas']; ?></h5>
                                <h1 class="card-title montserratRegular mb-5" style="font-size:20px">
                                Siwalankerto, Surabaya
                                </h1>
                                <p class="card-text"><?php echo $data['deskripsiKelas']; ?></p>
                                <p class="card-text montserratSemiBold" style="font-size: 30px;">Rp. <?php echo $data['hargaKelas']; ?>/<?php echo $data['durasiKelas'] ?></p>

                                <!-- REVIEW BELUM! -->
                                <!-- <div class="card-text" style="display: flex; align-items: center;">
                                <i class="bi bi-star-fill" style="font-size: 30px; color: #FFCC01;"></i>
                                <span style="margin-left: 10px;">5.0 - 35 reviews</span>
                            </div> -->


                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

        <!-- <div class="card mb-3">
            <img class="card-img-top" src="../images/20221003_133232.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
                    This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div> -->


        <div class="container-fluid bg-ouryellow d-flex justify-content-center py-3">
            <div class="btn-group w-50 py-5">
                <button type="button" class="btn btn-outline-dark " style="font-size: 25px;" onclick="window.location.href='homeTutor.php?id=<?php echo $id; ?>'">
                    <h1>Tutor</h1>
                </button>
                <button type="button" class="btn btn-outline-dark" style="font-size: 25px;" onclick="window.location.href='homeLearner.php?id=<?php echo $id; ?>'">
                    <h1>Learner</h1>
                </button>
            </div>
        </div>
        </div>

    </body>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2024 Company, Inc</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">

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
<?php
    session_start();
    require "koneksi.php";
    
    $queryRequest = mysqli_query($con, "SELECT * FROM request_feature");
    $datarequest = mysqli_num_rows($queryRequest);

    $queryReport = mysqli_query($con, "SELECT * FROM report_bug");
    $datareport = mysqli_num_rows($queryReport);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--style css -->
    <link rel="stylesheet" href="./asset/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Feedback | Request Feature and Report Bug</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="./asset/img/logo.jpg" width="75px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Boards
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="requestfeature.php">Request Feature</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="reportbug.php">Report Bug</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="roadmap.php" >Roadmap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Changelog</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>
    <div class="container" style="margin-top: 50px;margin-bottom: 50px;">
        <div class="row justify-content-around" style="font-weight:bold; font-size:large; text-align:center;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="background-color: #f9810a; border-radius: 25px; ">
                <a href="requestfeature.php" class="flex" >
                    <div class="block" style="margin-top:5px;">
                        <p>Request Feature</p>
                        <i class="hovicon effect-1 sub-b"><?php echo $datarequest; ?></i>
                    </div>
                </a>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="background-color: #f9810a; border-radius: 25px; "  >
                <a href="reportbug.php" class="flex">                    
                    <div class="block" style="margin-top:5px;">
                        <p>Report Bug</p>
                        <i class="hovicon effect-1 sub-b"><?php echo $datareport; ?></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="form">
        <div class="container-fluid">
            <h4  style="font-weight: bold; text-align:center;">Roadmap</h4>
        </div> 
        <div class="text-roadmap">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="float:left; text-align:center;">
                <div class="btn-group">
                    <div class="text">
                        <h5>REQUEST FEATURE</h5>
                    </div>
                    
                </div>
                <form action="" method="post" enctype="multipart/form-data" style="text-align:center;">
                    <table class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="float:left;">
                        <?php
                            if($datarequest==0){
                        ?>
                            <div class="container" >
                                <tr>
                                    <td colspan="4" class="text-center">List Request Feature Tidak Ada</td>
                                </tr>
                            </div>
                                
                        <?php
                            }
                            else{
                                $jumlah = 1;
                                while($datarequest=mysqli_fetch_array($queryRequest)){
                        ?>
                            <div class="row" style="margin-right:25px; margin-bottom:15px;">
                                <div class="form-control">
                                    <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" style="float:left ; margin-top:15px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-clipboard-heart" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M5 1.5A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm5 0a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Z"/>
                                            <path d="M3 1.5h1v1H3a1 1 0 0 0-1 1V14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3.5a1 1 0 0 0-1-1h-1v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z"/>
                                            <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.31 8 6.982Z"/>
                                        </svg>
                                    </div>
                                    <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" style="float:right; text-align:start;">
                                        <a type="text" style="font-size:25px ; cursor:pointer; text-decoration:none; color:black; font-weight:bold;" href="requestfeaturedetail.php?requestfeature=<?php echo $datarequest['id_request']; ?>" > <?php echo $datarequest['topik_request'];?></a>
                                        <p style="font-size:15px ; font-weight:lighter;"><?php echo $datarequest['deskripsi_request'];?></p>
                                        <div class="icon col-2" style="float:left; font-weight:lighter;font-size:12px;">
                                            <?php echo $datarequest['date']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <?php
                                        $jumlah++;
                                        }
                             }
                        ?>  
                        </table>
                    </form>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="float:right;text-align:center;">
                <div class="btn-group">
                    <div class="text">
                        <h5 >REPORT BUG</h5>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data" style="text-align:center;">
                        <table class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="float:left;">
                        <?php
                            if($datareport==0){
                        ?>
                            <div>
                                <tr>
                                    <td colspan="4" >List Report Bug Tidak Ada</td>
                                </tr>
                            </div>
                        <?php
                            }
                            else{
                                $jumlah = 1;
                                while($datareport=mysqli_fetch_array($queryReport)){
                        ?>
                            <div class="row" style="margin-right:25px; margin-bottom:15px;">
                                <div class="form-control">
                                    <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2" style="float:left ; margin-top:15px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-clipboard-heart" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M5 1.5A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm5 0a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Z"/>
                                            <path d="M3 1.5h1v1H3a1 1 0 0 0-1 1V14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3.5a1 1 0 0 0-1-1h-1v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z"/>
                                            <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.31 8 6.982Z"/>
                                        </svg>
                                    </div>
                                    <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10" style="float:right; text-align:start;">
                                        <a type="text" style="font-size:25px ; cursor:pointer; text-decoration:none; color:black; font-weight:bold;" href="reportbugdetail.php?reportbug=<?php echo $datareport['id_report']; ?>" > <?php echo $datareport['topik_report'];?></a>
                                        <p style="font-size:15px ; font-weight:lighter;"><?php echo $datareport['deskripsi_report'];?></p>
                                        <div class="icon col-2" style="float:left; font-weight:lighter;font-size:12px;">
                                            <?php echo $datareport['date']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <?php
                                        $jumlah++;
                                        }
                             }
                        ?>         
                        </table>
                    </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
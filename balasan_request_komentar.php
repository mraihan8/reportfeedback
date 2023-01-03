<?php
    //Mengirimkan Token Keamanan Ajax Request (Csrf Token)
    session_start();
    require "koneksi.php";

    //database request 
    $queryrequest = mysqli_query($con, "SELECT * FROM request_feature " );
    $datarequest = mysqli_num_rows($queryrequest);
    
    //database panggilan
    $query = mysqli_query($con, "SELECT * FROM komentar_request WHERE komentar_id = " . $_GET['balaskomentar']);
    $data = mysqli_fetch_array($query);

    //database komentar
    $querykomentar = mysqli_query($con,"SELECT * FROM komentar_request WHERE komentar_id = " . $_GET['balaskomentar']);
    $datakomentar = mysqli_num_rows($querykomentar);  
    
    //database balasan
    $querybalasan = mysqli_query($con, "SELECT * FROM balasan_request_komentar WHERE komentar_id = " . $_GET['balaskomentar']); 
    $databalasan = mysqli_num_rows($querybalasan);  
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
                        <a class="nav-link dropdown-toggle" href="requestfeature.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: bold;"> 
                            Request Feature
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="requestfeature.php" style="font-weight: bold;">Request Feature</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="reportbug.php">Report Bug</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="roadmap.php">Roadmap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Changelog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style=" margin-top: 20px; margin-left: 20px;">
            <li class="breadcrumb-item">
                <a href="home.php" class="breadcrumb-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item" ><a type="text" style="cursor:pointer; text-decoration:none;" class="breadcrumb-text" href="requestfeature.php">Request Feature</a></li>
            <li class="breadcrumb-item" ><a type="text" style="cursor:pointer; text-decoration:none;" class="breadcrumb-text" href="requestfeaturedetail.php?requestfeature=<?php echo $data['id_request']; ?>   ">Detail Request Feature</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Balasan Komentar Feature</li>
        </ol>
    </nav>
    <form action="" method="post" enctype="multipart/form-data">
        <?php
                $datarequest = mysqli_fetch_array($queryrequest);
        ?> 
            <div class="nav">
                <div class="judul container" style="margin-bottom:1px ; margin-top:10px;">
                    <div class="row" style="margin-left:15px;">
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="float:left ; padding-right:1px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-clipboard-heart" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5 1.5A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm5 0a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Z"/>
                                <path d="M3 1.5h1v1H3a1 1 0 0 0-1 1V14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3.5a1 1 0 0 0-1-1h-1v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z"/>
                                <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.31 8 6.982Z"/>
                            </svg>
                        </div>
                        <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8" style="float:left ; padding-left:1px;">
                            <h2 style="text-align:start; font-size:25px"><?php echo $datarequest['topik_request']; ?></h2>
                        </div>
                        <div class="date container" style="margin-top:2px; margin-bottom:5px; margin-left:15px">
                            <div class="icon" style="float:left; font-weight:bold;font-size:15px; ">
                                <?php echo $datarequest['date']; ?>
                            </div>
                        </div>  
                    </div>
                </div>
                
                <div class="deskripsi container" style="margin-top:15px; margin-bottom:15px">
                    <div class="row" style="text-align:start ; margin-left:10px;">
                            <h4 style="font-weight:normal; font-size:15px;"><p style="float:left ; font-weight:bold;">Deskrisi: &nbsp;</p><?php echo $datarequest['deskripsi_request']; ?></h4>
                    </div>
                </div>
                    <div class="image container" style="margin-top:15px; margin-bottom:5px">
                            <a class="row" style="margin-left:10px ; width:150px;" target="_blank" href="./image/<?php echo $datarequest['image_bukti'] ?>">
                                <img src="./image/<?php echo $datarequest['image_bukti'] ?>" alt="" >
                            </a>   
                    </div>             
                <div class="username container" style="margin-top:5px; margin-bottom:1px;">
                    <div class="row username" >
                        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1" style="float:left; text-align:right; padding-left:1px; padding-right:1px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="30" fill="currentColor" class="bi bi-houses-fill" viewBox="0 0 16 16">
                                <path d="M7.207 1a1 1 0 0 0-1.414 0L.146 6.646a.5.5 0 0 0 .708.708L1 7.207V12.5A1.5 1.5 0 0 0 2.5 14h.55a2.51 2.51 0 0 1-.05-.5V9.415a1.5 1.5 0 0 1-.56-2.475l5.353-5.354L7.207 1Z"/>
                                <path d="M8.793 2a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Z"/>
                            </svg>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="float:left ;">
                            <p style="font-weight:normal; text-align:left; font-size:20px;"><?php echo $datarequest['username'] ?></p>
                        </div> 
                    </div>
                </div>
            </div>                
    </form> 

    <form action="" method="post" enctype="multipart/form-data">
            <div class="nav">
                <?php
                        $datakomentar = mysqli_fetch_array($querykomentar);
                ?> 
                <div class="judul container" style="margin-bottom:1px ; margin-top:5px;"><hr>
                <h2  style="font-size: 20px;">Komentar :</h2><hr>
                    <div class="row">
                        <div class="username container">
                            <label for="exampleFromControl" style="float: left; font-weight:bold;">NAMA KOMENTAR <label style="font-weight: normal;"> : <?php echo $datakomentar['username_pengirim'];?></label></label>
                        </div>
                        <div class="komentar container"> 
                            <label for="exampleFromControl" style="float: left; font-weight:bold;">ISI KOMENTAR <label style="font-weight: normal;"> : <?php echo $datakomentar['komentar'];?></label></label>
                        </div>
                    </div>
                </div>        
                 
            </div>              
    </form>
    <div class="container "><hr>
            <h2  style="font-size: 20px;">Form Balasan Komentar :</h2><hr>
            <form method="POST" id="form_komentar">
                <div class="form-group">
                    <input type="text" name="username_balasan" id="username_pengirim" class="form-control" placeholder="Masukkan Nama Anda" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email_balasan" id="email_balasan" class="form-control" placeholder="Masukkan Email Anda" required>
                </div>
                <div class="form-group">
                    <textarea name="komentar" id="komentar" class="form-control" placeholder="Tulis Komentar Anda " rows="5"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="komentar_id" id="komentar_id">
                    
                    <input type="submit" name="submitbalas" id="submitbalas" class="btn btn-info" value="Submit">
                </div>
            <?php     
                if(isset($_POST['submitbalas'])){
                    $username_balasan = $_POST['username_balasan'];
                    $email_balasan = $_POST['email_balasan'];
                    $komentar = $_POST['komentar'];
                    $komentar_id = $_GET['balaskomentar'];
                   
                  
                    if($email_balasan=='' || $username_balasan==''|| $komentar==''){ 
                        echo "Email, Username, komentar wajib diisi";
                    }else{
                        echo mysqli_error($con);
                    }
                    $queryTambah = mysqli_query($db1, "INSERT INTO balasan_request_komentar (username_balasan,email_balasan,komentar,komentar_id) VALUES('$username_balasan', '$email_balasan', '$komentar','$komentar_id')");                                    
                    if($queryTambah){ 
                        echo "Report berhasil di kirim" ;
            ?>
                    <meta http-equiv="refresh" content="1;" />
            <?php
                    }else{
                        echo mysqli_error($con);
                    }
                }
            ?>
            </form>
            <hr>
            <h4 class="mb-3">Komentar Balasan :</h4>
            <div id="display_comment"></div>
            <?php
                    if($databalasan==0){
                ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak Ada Komentar</td>
                        </tr>
                <?php
                    }
                    else{
                        $jumlah = 1;
                        while($databalasan=mysqli_fetch_array($querybalasan)){
                ?>
                        <div class="media border p-3 mb-2">
                            <div class="media-body">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <h4> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                            </svg>
                                            <b><?php echo $databalasan['username_balasan']; ?></b> <small> Posted on <i><?php echo $databalasan['date']; ?></i></small>
                                        </h4>
                                        <p style="margin-left:30px;"><?php echo $databalasan['komentar']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                        $jumlah++;
                        }
                    }
                ?>              
        </div>
     <!--Script query js -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Script query js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
         
</body>
</html>
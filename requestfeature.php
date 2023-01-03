<?php
    session_start();
    require "koneksi.php";

    $queryrequest = mysqli_query($con, "SELECT * FROM request_feature");
    $datarequest = mysqli_num_rows($queryrequest);

    //database panggilan
    $query = mysqli_query($con, "SELECT * FROM komentar_request WHERE id_request = komentar_id" );
    $data = mysqli_fetch_array($query);

    $querykomentar = mysqli_query($con, "SELECT * FROM komentar_request" );
    $datakomentar = mysqli_fetch_array($querykomentar);

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString; }
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
        <nav class="feature">
            <div class="container-fluid">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="float:left ; ">
                        <div class="form1">
                            <div class="form-control" style="margin-top:15px ; padding-bottom:25px ;">
                                <div class="form-group">
                                    <div>
                                        <h5>New Request</h5>
                                        <span style="font-weight:normal ;">We value your feedback. You can vote for existing posts, discuss them or add your own.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tittle</label>
                                    <input type="text" class="form-control" name="topik_request" placeholder="Something Short" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" name="deskripsi_request" placeholder="Write about your post in more detail here" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                                        </svg>Attach images
                                        <input class="form-control" type="file" name="image_bukti" accept="/image/*" aria-label="Upload" aria-describedby="inputGroupFileAddon03">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name</label>
                                    <input type="text" class="form-control" name="username" placeholder="Your name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Your Email Address" required>
                                </div>
                                <div class="form-group">
                                    <div class="submit" style=" text-align:center;">
                                        <button type="submit" name="kirim" class="btn btn-send" style="background-color:#f9810a ;">Submit Add Request</button>
                                    </div>
                                </div>
                                <?php
                                    if(isset($_POST['kirim'])){
                                        $username = $_POST['username'];
                                        $email = $_POST['email'];
                                        $topik_request = $_POST['topik_request'];
                                        $deskripsi_request = $_POST['deskripsi_request'];
                                        
                                        $target_dir = "image/";
                                        $name_file = basename ($_FILES["image_bukti"]["name"]);
                                        $target_file = $target_dir . $name_file;
                                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                        $image_size = $_FILES["image_bukti"]["size"];
                                        $random_name = generateRandomString(10);
                                        $new_name = $random_name . "." . $imageFileType;

                                        if($email=='' || $username==''|| $topik_request=='' || $deskripsi_request==''){ 
                                            echo "Email, Username, Tittle, Deskripsi wajib diisi";
                                        }else{
                                            if($name_file!=''){
                                                if($image_size > 5000000){
                                                    echo "File tidak boleh lebih dari 5mb";
                                                }
                                                else{
                                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
                                                        echo "File Wajib bertipe JPG atau PNG atau Gif";
                                                    }
                                                    else{
                                                        move_uploaded_file($_FILES["image_bukti"]["tmp_name"], $target_dir . $new_name);
                                                    }
                                                }
                                            }
                                        }
                                        //query insert list
                                        $queryTambah = mysqli_query($con, "INSERT INTO request_feature (email,username,topik_request,deskripsi_request,image_bukti) VALUES('$email', '$username', '$topik_request', '$deskripsi_request','$new_name')");

                                        if($queryTambah){ 
                                            echo "Report berhasil di kirim" ;
                                ?>
                                            <meta http-equiv="refresh" content="1; url=home.php" />
                                <?php
                                        }else{
                                            echo mysqli_error($con);
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>    
                    <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8" style="float:right;">
                        <div class="form2">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="text" style="margin-bottom:50px; text-align:center;">
                                    <h3>REQUEST FEATURE</h3>
                                </div>
                            <?php
                                if($datarequest==0){
                            ?>
                                    <tr>
                                        <td colspan="4" class="text-center">List Request Feature Tidak Ada</td>
                                    </tr>
                            <?php
                                }
                                else{
                                    $jumlah = 1;
                                    while($datarequest=mysqli_fetch_array($queryrequest)){
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
                            </form>
                        </div>
                    </div>
                </form>
                
            </div>
        </nav>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    </body>
</html>
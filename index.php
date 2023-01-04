<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUGAS UJIAN AKHIR SEMESTER SISTEM INFORMASI GEOGRAFIS</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
            <?php
            include "db_conn.php"; 

            error_reporting(0);
            session_start();
            if(isset($_POST['login'])){
                $user = $_POST['USERNAME'];
                $pass = $_POST['PASSWORD'];
                $sql = oci_parse($conn, "SELECT USERNAME,PASSWORD FROM USERS WHERE USERNAME='$user' AND PASSWORD='$pass'");       
                oci_execute($sql);
                $row = oci_fetch_all($sql, $res);
                if($row){
                        $_SESSION['user']=$user;
                        $_SESSION['time_start_login'] = time();
                        header("location: map.html");
                }else{
                    echo "Password atau username anda salah";
                }
            }
        ?>
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="#"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Silahkan masukkan username dan password anda. </p>

                    <form action="map.html">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>
<?php 
include "db_conn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])){
  $namakec = $_POST['KECAMATAN'];
  $sembuh = $_POST['SEMBUH'];
  $isolasi = $_POST['ISOLASI'];
  $perawatan = $_POST['PERAWATAN'];
  $md = $_POST['MD'];
  $jmlpddk = $_POST['JMLPDDK'];
  $ttlks = $_POST['TOTALKS'];
  $ttltp = $_POST['TOTALTP'];

  $oci = "UPDATE SOLO 
  SET KECAMATAN ='$namakec', SEMBUH ='$sembuh', ISOLASI ='$isolasi', PERAWATAN ='$perawatan', MD ='$md', JMLPDDK = '$jmlpddk', TOTALKS = '$ttlks', TOTALTP = '$ttltp'
  WHERE ID ='$id'";

  $result = oci_parse($conn,$oci);
  oci_execute($result,OCI_DEFAULT);
  oci_commit($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUGAS UJIAN AKHIR SEMESTER SISTEM INFORMASI GEOGRAFIS</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
<div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/logo/covid.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-map-fill"></i>
                                <span>Peta</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                          <a href="#" class='sidebar-link'>
                              <i class="bi bi-stack"></i>
                              <span>Atributes</span>
                          </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                          <a href="#" class='sidebar-link'>
                              <i class="bi bi-info-square-fill"></i>
                              <span>Legenda</span>
                          </a>                            
                          </li>

                        <li class="sidebar-title">Form &amp; Tabel</li>

                        <li class="sidebar-item">
                            <a href="table.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Tabel Data</span>
                            </a>
                        </li>

                        <li class="sidebar-item active">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Form Edit Data</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div> 
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>FORM EDIT DATA</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index_baru.html">Form & Table</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Klik Submit Untuk Ubah Data</h4>
                                </div>
                                <?php
                                $oci = "SELECT KECAMATAN,SEMBUH,ISOLASI,PERAWATAN,MD,JMLPDDK,TOTALKS,TOTALTP FROM SOLO WHERE ID = '$id'";
                                $result = oci_parse($conn, $oci);
                                oci_execute($result);
                                $row = oci_fetch_assoc($result); 
                                ?>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form method="POST" class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="KECAMATAN" class="required">
                                                            Kecamatan
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input class="form-control" 
                                                                    type="text" name="KECAMATAN" 
                                                                    id="KECAMATAN" value="<?php echo $row['KECAMATAN'] ?>" readonly>                                                                                                                                        
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-map-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="SEMBUH" class="required">
                                                            Sembuh
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input class="form-control"
                                                                type="number" name="SEMBUH" id="SEMBUH" placeholder="10466"
                                                                    value="<?php echo $row['SEMBUH'] ?>">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-heart"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="ISOLASI" class="required">
                                                            Isolasi
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input class="form-control"
                                                                    type="number" name="ISOLASI" id="ISOLASI" placeholder="14"
                                                                    value="<?php echo $row['ISOLASI'] ?>" >                                                                    
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="PERAWATAN" class="required">
                                                            Perawatan
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input class="form-control"
                                                                    type="number" name="PERAWATAN" id="PERAWATAN" placeholder="2"
                                                                    value="<?php echo $row['PERAWATAN'] ?>">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-emoji-smile"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="MD" class="required">
                                                            Meninggal Dunia
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input class="form-control"
                                                                    type="number" name="MD" id="MD" placeholder="335"
                                                                    value="<?php echo $row['MD'] ?>">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-emoji-frown"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="MD" class="required">
                                                            Jumlah Penduduk
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input class="form-control"
                                                                    type="number" name="JMLPDDK" id="JMLPDDK" placeholder="149084"
                                                                    value="<?php echo $row['JMLPDDK'] ?>">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-people"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="MD" class="required">
                                                            Total Kasus
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input class="form-control"
                                                                    type="number" name="TOTALKS" id="TOTALKS" placeholder="10817"
                                                                    value="<?php echo $row['TOTALKS'] ?>" readonly>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person-check-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="MD" class="required">
                                                            Total Tidak Terpapar
                                                        </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input class="form-control"
                                                                    type="number" name="TOTALTP" id="TOTALTP" placeholder="138267"
                                                                    value="<?php echo $row['TOTALTP'] ?>" readonly>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person-dash-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>         

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                </div>
            </div>
        </div>

    </div>

  <!-- JS -->
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>

<script type="text/javascript">
    
    $("#SEMBUH").keyup(function() {
        var a = parseFloat($("ISOLASI").val());
        var b = parseFloat($("PERAWATAN").val());
        var c = parseFloat($("MD").val());
        var d = parseFloat($("SEMBUH").val());
        var e = a + b + c + d;
        $("#TOTALKS").val(e);
    });

    $("#ISOLASI").keyup(function() {
        var a = parseFloat($("SEMBUH").val());
        var b = parseFloat($("PERAWATAN").val());
        var c = parseFloat($("MD").val());
        var d = parseFloat($("ISOLASI").val());
        var e = a + b + c + d;
        $("#TOTALKS").val(e);
    });

    $("#PERAWATAN").keyup(function() {
        var a = parseFloat($("SEMBUH").val());
        var b = parseFloat($("ISOLASI").val());
        var c = parseFloat($("MD").val());
        var d = parseFloat($("SEMBUH").val());
        var e = a + b + c + d;
        $("#TOTALKS").val(e);
    });

    $("#MD").keyup(function() {
        var a = parseFloat($("SEMBUH").val());
        var b = parseFloat($("ISOLASI").val());
        var c = parseFloat($("PERAWATAN").val());
        var d = parseFloat($("MD").val());
        var e = a + b + c + d;
        $("#TOTALKS").val(e);
    });

    $("#JMLPDDK").keyup(function() {
        var a = parseFloat($("JMLPDDK").val());
        var b = parseFloat($("TOTALKS").val());
        var c = a - b
        $("#TOTALTP").val(c);
    });


</script>

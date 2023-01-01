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
                              <i class="bi bi-info-circle-fill"></i>
                              <span>Legenda</span>
                          </a>                            
                        </li>

                        <li class="sidebar-title">Forms &amp; Tabel</li>

                        <li class="sidebar-item active ">
                            <a href="table.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Tabel Data</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Form Edit Data</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Sessions</li>

                        <li class="sidebar-item">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-door-open-fill"></i>
                                <span>Logout</span>
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
                            <h3>TABEL DATA COVID 19 SURAKARTA</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Form & Table</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Data</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Daftar Tabel
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Sembuh</th>
                                        <th>Isolasi</th>
                                        <th>Perawatan</th>
                                        <th>Meninggal Dunia</th>
                                        <th>Jumlah Penduduk</th>
                                        <th>Total Kasus</th>
                                        <th>Total Tidak Terpapar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "db_conn.php";

                                    $oci = "SELECT ID, KECAMATAN, SEMBUH, ISOLASI, PERAWATAN, MD, JMLPDDK, TOTALKS, TOTALTP FROM SOLO";
                                    $result = oci_parse($conn,$oci);
                                    oci_execute($result);
                                    while($row = oci_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row['ID'] ?></td>
                                        <td><?php echo $row['KECAMATAN'] ?></td>
                                        <td><?php echo $row['SEMBUH'] ?></td>
                                        <td><?php echo $row['ISOLASI'] ?></td>
                                        <td><?php echo $row['PERAWATAN'] ?></td>
                                        <td><?php echo $row['MD'] ?></td>
                                        <td><?php echo $row['JMLPDDK'] ?></td>
                                        <td><?php echo $row['TOTALKS'] ?></td>
                                        <td><?php echo $row['TOTALTP'] ?></td>
                                        <td>
                                                            <a href="edit.php?id=<?php echo $row['ID'] ?>" class="edit"><i class="bi bi-pencil-square"></i></a>
                                                            <a href="hapus.php?id=<?php echo $row['ID'] ?>" class="delete" onclick="return confirm('Anda yakin untuk mengahpus data ini?')"><i class="bi bi-trash-fill"></i></a>
                                        </td>
                                        </tr>

                                        <?php

                                            }
                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Kelompok Cemara</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="#">Kelompok Cemara</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>

<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" type="image/x-icon" href="img/ICON_ANANDACHICKEN.png" />

    <title>Kelola Hutang</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php 
require 'koneksi.php';
require 'sidebar.php'; 

$pendapatan = mysqli_query($koneksi, "SELECT id_hutang FROM hutang");
$pendapatan = mysqli_num_rows($pendapatan);
if(empty($pendapatan)){
  $pendapatan = 0;
}

$pengeluaran = mysqli_query($koneksi, "SELECT id_pengeluaran FROM pengeluaran");
$pengeluaran = mysqli_num_rows($pengeluaran);
if(empty($pengeluaran)){
  $pengeluaran = 0;
}

//untuk data chart area
$sekarang =mysqli_query($koneksi, "SELECT jumlah FROM hutang
WHERE tgl_hutang = CURDATE()");
$sekarang = mysqli_fetch_array($sekarang);

$satuhari =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang = DATE_SUB(DATE(NOW()), INTERVAL 1 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
$satuhari= mysqli_fetch_array($satuhari);

$duahari =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang = DATE_SUB(DATE(NOW()), INTERVAL 2 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
$duahari= mysqli_fetch_array($duahari);

$tigahari =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang = DATE_SUB(DATE(NOW()), INTERVAL 3 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
$tigahari= mysqli_fetch_array($tigahari);

$empathari =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang = DATE_SUB(DATE(NOW()), INTERVAL 4 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
$empathari= mysqli_fetch_array($empathari);

$limahari =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang = DATE_SUB(DATE(NOW()), INTERVAL 5 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
$limahari= mysqli_fetch_array($limahari);

$enamhari =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang = DATE_SUB(DATE(NOW()), INTERVAL 6 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
$enamhari= mysqli_fetch_array($enamhari);

$tujuhhari =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang = DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
$tujuhhari= mysqli_fetch_array($tujuhhari);

$satuminggu = mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 1 WEEK) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
$satuminggu = mysqli_fetch_array($satuminggu);

$duaminggu = mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 2 WEEK) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
$duaminggu = mysqli_fetch_array($duaminggu);

$tigaminggu = mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 3 WEEK) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
$tigaminggu = mysqli_fetch_array($tigaminggu);

$empatminggu = mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 4 WEEK) AND DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)");
$empatminggu = mysqli_fetch_array($empatminggu);

$satubulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$satubulan= mysqli_fetch_array($satubulan);

$duabulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 2 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$duabulan= mysqli_fetch_array($duabulan);

$tigabulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 3 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$tigabulan= mysqli_fetch_array($tigabulan);

$empatbulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 4 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$empatbulan= mysqli_fetch_array($empatbulan);

$limabulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 5 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$limabulan= mysqli_fetch_array($limabulan);

$enambulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 6 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$enambulan= mysqli_fetch_array($enambulan);

$tujuhbulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 7 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$tujuhbulan= mysqli_fetch_array($tujuhbulan);

$delapanbulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 8 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$delapanbulan= mysqli_fetch_array($delapanbulan);

$sembilanbulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 9 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$sembilanbulan= mysqli_fetch_array($sembilanbulan);

$sepuluhbulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 10 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$sepuluhbulan= mysqli_fetch_array($sepuluhbulan);

$sebelasbulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 11 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$sebelasbulan= mysqli_fetch_array($sebelasbulan);

$duabelasbulan =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 12 MONTH) AND DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)");
$duabelasbulan= mysqli_fetch_array($duabelasbulan);

$satutahun =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 1 YEAR) AND DATE_SUB(DATE(NOW()), INTERVAL 1 YEAR)");
$satutahun= mysqli_fetch_array($satutahun);

$duatahun =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 2 YEAR) AND DATE_SUB(DATE(NOW()), INTERVAL 1 YEAR)");
$duatahun= mysqli_fetch_array($duatahun);

$tigatahun =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 3 YEAR) AND DATE_SUB(DATE(NOW()), INTERVAL 1 YEAR)");
$tigatahun= mysqli_fetch_array($tigatahun);

$empattahun =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 4 YEAR) AND DATE_SUB(DATE(NOW()), INTERVAL 1 YEAR)");
$empattahun= mysqli_fetch_array($empattahun);

$limatahun =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 5 YEAR) AND DATE_SUB(DATE(NOW()), INTERVAL 1 YEAR)");
$limatahun= mysqli_fetch_array($limatahun);

$enamtahun =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 6 YEAR) AND DATE_SUB(DATE(NOW()), INTERVAL 1 YEAR)");
$enamtahun= mysqli_fetch_array($enamtahun);

$tujuhtahun =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 7 YEAR) AND DATE_SUB(DATE(NOW()), INTERVAL 1 YEAR)");
$tujuhtahun= mysqli_fetch_array($tujuhtahun);

$delapantahun =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 8 YEAR) AND DATE_SUB(DATE(NOW()), INTERVAL 1 YEAR)");
$delapantahun= mysqli_fetch_array($delapantahun);

$sembilantahun =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 9 YEAR) AND DATE_SUB(DATE(NOW()), INTERVAL 1 YEAR)");
$sembilantahun= mysqli_fetch_array($sembilantahun);

$sepuluhtahun =mysqli_query($koneksi, "SELECT jumlah FROM hutang WHERE tgl_hutang BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 10 YEAR) AND DATE_SUB(DATE(NOW()), INTERVAL 1 YEAR)");
$sepuluhtahun= mysqli_fetch_array($sepuluhtahun);


?>
    <!-- Main Content -->
    <div id="content">

        <?php $halamanaktif = "Hutang";?>
        <?php require 'navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Grafik Hutang</h1>
            <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal"
                data-target="#myModalTambah"><i class="fa fa-plus"> Hutang</i></button><br>
            <!-- Content Row -->
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7" id="hari">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Hutang Minggu Ini</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Ubah</div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" onclick="togglechart(2)">Perbulan</a>
                                    <a class="dropdown-item" href="#" onclick="togglechart(3)">Pertahun</a>
                                    <a class="dropdown-item" href="#" onclick="togglechart(4)">10 tahun</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-7 hidden" id="minggu">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Hutang Bulan Ini</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Ubah</div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" onclick="togglechart(1)">PerMinggu</a>
                                    <a class="dropdown-item" href="#" onclick="togglechart(3)">Pertahun</a>
                                    <a class="dropdown-item" href="#" onclick="togglechart(4)">10 tahun</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-7 hidden" id="bulan">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Hutang Tahun Ini</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Ubah</div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" onclick="togglechart(1)">PerMinggu</a>
                                    <a class="dropdown-item" href="#" onclick="togglechart(2)">perbulan</a>
                                    <a class="dropdown-item" href="#" onclick="togglechart(4)">10 tahun</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-7 hidden" id="tahun">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Hutang 10 Tahun Ini</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Ubah</div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" onclick="togglechart(1)">PerMinggu</a>
                                    <a class="dropdown-item" href="#" onclick="togglechart(2)">Perbulan</a>
                                    <a class="dropdown-item" href="#" onclick="togglechart(3)">perTahun</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                .hidden {
                    display: none;
                }
                </style>

                <script>
                function togglechart(chartId) {
                    var hari = document.getElementById("hari");
                    var minggu = document.getElementById("minggu");
                    var bulan = document.getElementById("bulan");
                    var tahun = document.getElementById("tahun");

                    switch (chartId) {
                        case 1:
                            hari.classList.remove("hidden");
                            minggu.classList.add("hidden");
                            bulan.classList.add("hidden");
                            tahun.classList.add("hidden");
                            break;
                        case 2:
                            hari.classList.add("hidden");
                            minggu.classList.remove("hidden");
                            bulan.classList.add("hidden");
                            tahun.classList.add("hidden");
                            break;
                        case 3:
                            hari.classList.add("hidden");
                            minggu.classList.add("hidden");
                            bulan.classList.remove("hidden");
                            tahun.classList.add("hidden");
                            break;
                        case 4:
                            hari.classList.add("hidden");
                            minggu.classList.add("hidden");
                            bulan.classList.add("hidden");
                            tahun.classList.remove("hidden");
                            break;
                        default:
                            hari.classList.add("hidden");
                            minggu.classList.add("hidden");
                            bulan.classList.add("hidden");
                            tahun.classList.add("hidden");
                    }
                }
                </script>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Perbandingan</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Pendapatan
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-danger"></i> Pengeluaran
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div id="myModalTambah" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- konten modal-->
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Hutang</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- body modal -->
                        <form action="tambah-hutang.php" method="get">
                            <div class="modal-body">
                                Jumlah :
                                <input type="text" class="form-control angka" name="jumlah" required="required">
                                Tanggal :
                                <input type="date" class="form-control" name="tgl_hutang" required="required">
                                Penghutang :
                                <input type="text" class="form-control" name="penghutang" required="required">
                                Alasan :
                                <input type="text" class="form-control" name="alasan" required="required">
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Tambah</button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Hutang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <!-- <th>No.urut</th> -->
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Alasan</th>
                                <th>Penghutang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <!-- <tfoot>
                    <tr>
					<th>No.urut</th>
                      <th>Jumlah</th>
                      <th>Tanggal</th>
                      <th>Alasan</th>
                      <th>Penghutang</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot> -->
                        <tbody>
                            <?php 
$query = mysqli_query($koneksi,"SELECT * FROM hutang where jumlah > 1000 ORDER BY tgl_hutang DESC");
// $no = 1;

// if(empty(()))
while ($data = mysqli_fetch_assoc($query)) 
{
?>
                            <tr>
                                <!-- <td>< ?=is_null($data)?></td> -->
                                <!-- <td>< ?php echo $data['jumlah'] ?></td> -->
                                <td>Rp. <?= number_format($data['jumlah'], 2, ',', '.'); ?></td>
                                <td><?php echo $data['tgl_hutang'] ?></td>
                                <td><?php echo $data['alasan'] ?></td>
                                <td><?php echo $data['penghutang'] ?></td>
                                <td>
                                    <!-- Button untuk modal -->
                                    <a href="#" type="button" class=" fa fa-edit btn btn-danger btn-md"
                                        data-toggle="modal" data-target="#myModal<?php echo $data['id_hutang']; ?>"></a>
                                </td>
                            </tr>
                            <!-- Modal Edit Hutang-->
                            <div class="modal fade" id="myModal<?php echo $data['id_hutang']; ?>" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Ubah Data Hutang</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="proses-edit-hutang.php" method="get">

                                                <?php
$id = $data['id_hutang']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM hutang WHERE id_hutang='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


                                                <input type="hidden" name="id_hutang"
                                                    value="<?php echo $row['id_hutang']; ?>">

                                                <div class="form-group">
                                                    <label>Jumlah</label>
                                                    <input type="text" name="jumlah" class="form-control angka"
                                                        value="<?php echo $row['jumlah']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input type="date" name="tgl_hutang" class="form-control"
                                                        value="<?php echo $row['tgl_hutang']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Alasan</label>
                                                    <input type="text" name="alasan" class="form-control"
                                                        value="<?php echo $row['alasan']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Penghutang</label>
                                                    <input type="text" name="penghutang" class="form-control"
                                                        value="<?php echo $row['penghutang']; ?>">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Ubah</button>
                                                    <a href="hapus-hutang.php?id_hutang=<?=$row['id_hutang'];?>"
                                                        onclick="return hapusData()" class="btn btn-danger">Hapus</a>
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Keluar</button>
                                                </div>
                                                <?php 
}
?>

                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>





                            <?php               
} 
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php require 'logout-modal.php';?>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito',
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart1");
    var myHariChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["7 hari lalu", "6 hari lalu", "5 hari lalu", "4 hari lalu", "3 hari lalu", "2 hari lalu",
                "1 hari lalu"
            ],
            datasets: [{
                label: "Hutang",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php 
              if( empty($tujuhhari['0']) ){
                echo 0;
              }
              else{
                echo $tujuhhari['0'];
              }
            ?>,
                    <?php 
              if( empty($enamhari['0']) ){
                echo 0;
              }
              else{
                echo $enamhari['0'];
              }
            ?>,
                    <?php 
              if( empty($limahari['0']) ){
                echo 0;
              }
              else{
                echo $limahari['0'];
              }
            ?>,
                    <?php 
              if( empty($empathari['0']) ){
                echo 0;
              }
              else{
                echo $empathari['0'];
              }
            ?>,
                    <?php 
              if( empty($tigahari['0']) ){
                echo 0;
              }
              else{
                echo $tigahari['0'];
              }
            ?>,
                    <?php 
              if( empty($duahari['0']) ){
                echo 0;
              }
              else{
                echo $duahari['0'];
              }
            ?>,
                    <?php 
              if( empty($satuhari['0']) ){
                echo 0;
              }
              else{
                echo $satuhari['0'];
              }
            ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return 'Rp.' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
    var ctx2 = document.getElementById("myAreaChart2");
    var myMingguChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ["4 minggu lalu", "3 minggu lalu", "2 minggu lalu",
                "1 minggu lalu"
            ],
            datasets: [{
                label: "Hutang",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php 
              if( empty($empatminggu['0']) ){
                echo 0;
              }
              else{
                echo $empatminggu['0'];
              }
            ?>,
                    <?php 
              if( empty($tigaminggu['0']) ){
                echo 0;
              }
              else{
                echo $tigaminggu['0'];
              }
            ?>,
                    <?php 
              if( empty($duaminggu['0']) ){
                echo 0;
              }
              else{
                echo $duaminggu['0'];
              }
            ?>,
                    <?php 
              if( empty($satuminggu['0']) ){
                echo 0;
              }
              else{
                echo $satuminggu['0'];
              }
            ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return 'Rp.' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });

    var ctx3 = document.getElementById("myAreaChart3");
    var myBulanChart = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: ["12 bulan lalu", "11 bulan lalu", "10 bulan lalu", "9 bulan lalu", "8 bulan lalu",
                "7 bulan lalu", "6 bulan lalu", "5 bulan lalu", "4 bulan lalu", "3 bulan lalu",
                "2 bulan lalu",
                "1 bulan lalu"
            ],
            datasets: [{
                label: "Hutang",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php 
              if( empty($duabelasbulan['0']) ){
                echo 0;
              }
              else{
                echo $duabelasbulan['0'];
              }
            ?>,
                    <?php 
              if( empty($sebelasbulan['0']) ){
                echo 0;
              }
              else{
                echo $sebelasbulan['0'];
              }
            ?>,
                    <?php 
              if( empty($sepuluhbulan['0']) ){
                echo 0;
              }
              else{
                echo $sepuluhbulan['0'];
              }
            ?>,
                    <?php 
              if( empty($sembilanbulan['0']) ){
                echo 0;
              }
              else{
                echo $sembilanbulan['0'];
              }
            ?>,
                    <?php 
              if( empty($delapanbulan['0']) ){
                echo 0;
              }
              else{
                echo $delapanbulan['0'];
              }
            ?>,
                    <?php 
              if( empty($tujuhbulan['0']) ){
                echo 0;
              }
              else{
                echo $tujuhbulan['0'];
              }
            ?>,
                    <?php 
              if( empty($enambulan['0']) ){
                echo 0;
              }
              else{
                echo $enambulan['0'];
              }
            ?>,
                    <?php 
              if( empty($limabulan['0']) ){
                echo 0;
              }
              else{
                echo $limabulan['0'];
              }
            ?>,
                    <?php 
              if( empty($empatbulan['0']) ){
                echo 0;
              }
              else{
                echo $empatbulan['0'];
              }
            ?>,
                    <?php 
              if( empty($tigabulan['0']) ){
                echo 0;
              }
              else{
                echo $tigabulan['0'];
              }
            ?>,
                    <?php 
              if( empty($duabulan['0']) ){
                echo 0;
              }
              else{
                echo $duabulan['0'];
              }
            ?>,
                    <?php 
              if( empty($satubulan['0']) ){
                echo 0;
              }
              else{
                echo $satubulan['0'];
              }
            ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return 'Rp.' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });

    var ctx4 = document.getElementById("myAreaChart4");
    var myBulanChart = new Chart(ctx4, {
        type: 'line',
        data: {
            labels: ["10 tahun lalu", "9 tahun lalu", "8 tahun lalu",
                "7 tahun lalu", "6 tahun lalu", "5 tahun lalu", "4 tahun lalu", "3 tahun lalu",
                "2 tahun lalu", "1 tahun lalu"
            ],
            datasets: [{
                label: "Hutang",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php 
              if( empty($sepuluhtahun['0']) ){
                echo 0;
              }
              else{
                echo $sepuluhtahun['0'];
              }
            ?>,
                    <?php 
              if( empty($sembilantahun['0']) ){
                echo 0;
              }
              else{
                echo $sembilantahun['0'];
              }
            ?>,
                    <?php 
              if( empty($delapantahun['0']) ){
                echo 0;
              }
              else{
                echo $delapantahun['0'];
              }
            ?>,
                    <?php 
              if( empty($tujuhtahun['0']) ){
                echo 0;
              }
              else{
                echo $tujuhtahun['0'];
              }
            ?>,
                    <?php 
              if( empty($enamtahun['0']) ){
                echo 0;
              }
              else{
                echo $enamtahun['0'];
              }
            ?>,
                    <?php 
              if( empty($limatahun['0']) ){
                echo 0;
              }
              else{
                echo $limatahun['0'];
              }
            ?>,
                    <?php 
              if( empty($empattahun['0']) ){
                echo 0;
              }
              else{
                echo $empattahun['0'];
              }
            ?>,
                    <?php 
              if( empty($tigatahun['0']) ){
                echo 0;
              }
              else{
                echo $tigatahun['0'];
              }
            ?>,
                    <?php 
              if( empty($duatahun['0']) ){
                echo 0;
              }
              else{
                echo $duatahun['0'];
              }
            ?>,
                    <?php 
              if( empty($satutahun['0']) ){
                echo 0;
              }
              else{
                echo $satutahun['0'];
              }
            ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return 'Rp.' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
    </script>

    <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito',
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Pendapatan", "Pengeluaran"],
            datasets: [{
                data: [<?php echo $pendapatan ?>, <?php echo $pengeluaran ?>],
                backgroundColor: ['#4e73df', '#e74a3b'],
                hoverBackgroundColor: ['#2e59d9', '#e74a3b'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
    </script>

    <script type="text/javascript">
    function validasi() {
        if (document.getElementById("sumber").value == "none") {
            alert("Pilih sumber!");
            return false;
        } else {
            return true;
        }
    }

    function hapusData() {
        var hapus = confirm("Anda yakin ingin menghapus?");
        if (hapus) {
            return true;
        } else {
            return false;
        }
    }
    </script>

    <script language="javascript">
    $('input.kalimat').keyup(function(event) {
        if (event.which >= 37 && event.which <= 40) {
            return;
        }

        $(this).val(function(index, value) {
            return value
                .replace(/([^a-zA-Z\s])/g, "").replace(/([\s]{2,})/g, " ");

        });

    });

    $('input.kalimat').focusout(function(event) {
        if (event.which >= 37 && event.which <= 40) {
            return;
        }

        $(this).val(function(index, value) {
            return value
                .replace(/([^a-zA-Z\s])/g, "").replace(/([\s]{2,})/g, "");

        });

    });

    //saat kursor input field aktif
    $('input.angka').keyup(function(event) {
        if (event.which >= 37 && event.which <= 40) {
            return;
        }

        $(this).val(function(index, value) {
            //menghapus semua karakter yang bukan angka
            return value
                .replace(/([^0-9])/g, "");

        });

    });

    $('input.angka').focusout(function(event) {
        if (event.which >= 37 && event.which <= 40) {
            return;
        }

        $(this).val(function(index, value) {
            //menghapus semua karakter yang bukan angka
            return value
                .replace(/([^0-9])/g, "");

        });

    });
    </script>
</body>

</html>
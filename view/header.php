<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>IDEA</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="../assets_forum/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets_forum/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="../assets_forum/assets/css/argon.css?v=1.1.0" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
  .navbar {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: #fff;
    transition: box-shadow 0.3s ease;
  }

  .navbar-shadow {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
  }

  /* Tambahkan efek bayangan saat navbar diklik */
  .navbar-toggler:focus {
    box-shadow: 0 0 0 0.2rem rgba(159, 237, 215, 0.5), 0 4px 6px rgba(0, 0, 0, 0.1),
      0 2px 4px rgba(0, 0, 0, 0.1);
    outline: none;
  }

  /* Tambahkan efek bayangan pada navbar saat di-scroll */
  .navbar-scrolled {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
  }

  .cke_inner {
    display: none !important;
  }

  .dropdown-menu {
    margin-top: 10px !important;

  }

  .btn {
    background-color: #9FEDD7;
  }

  .form-control {
    width: 2000px;
    /* Atur lebar kolom sesuai kebutuhan */
  }

  /* Warna header */
  /* header {
    background-color: #026670;
  } */

  /* Warna button */
  .nav-link-icon {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s, border-color 0.3s, box-shadow 0.3s;
  }

  .nav-link-icon:hover {
    background-color: #8FDBC9;
    border-color: #8FDBC9;
  }

  .nav-link-icon:focus {
    background-color: #8FDBC9;
    border-color: #8FDBC9;
    box-shadow: 0 0 0 0.2rem rgba(159, 237, 215, 0.5), 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.1);
    outline: none;
  }

  .dropdown-toggle:focus {
    box-shadow: 0 0 0 0.2rem rgba(159, 237, 215, 0.5), 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.1);
    outline: none;
  }


  /* Warna dropdown item */
  .dropdown-item {
    background-color: #9FEDD7;
  }

  .dropdown-item:hover {
    color: white;
    background-color: #9FEDD7;
  }
</style>

<?php
include '../koneksi.php';
session_start();
$file = basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION['member_status'])) {

  // halaman yg dilindungi jika member belum login
  $lindungi = array('member.php', '../action/member_logout.php', 'member_profil.php', 'member_password.php');
  // periksa halaman, jika belum login ke halaman di atas, maka alihkan halaman
  if (in_array($file, $lindungi)) {
    header("location:../index.php");
  }
  if ($file == "posting.php") {
    header("location:masuk.php?alert=login-dulu");
  }
} else {

  // halaman yg tidak boleh diakses jika member sudah login
  $lindungi = array('masuk.php', 'daftar.php');
  // periksa halaman, jika sudah dan mengakses halaman di atas, maka alihkan halaman
  if (in_array($file, $lindungi)) {
    header("location:member.php");
  }
}

?>

<body>

  <header>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark mb-4 fixed-top">
      <script>
        window.addEventListener('scroll', function() {
          var navbar = document.getElementById('navbar');
          var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

          if (scrollTop > 0) {
            navbar.classList.add('navbar-shadow');
          } else {
            navbar.classList.remove('navbar-shadow');
          }
        });
      </script>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5">
            <img src="../assets_forum/img/sistem/logo.png" class="mt-3" height="50px" weight="50px">
            <a class="navbar-brand float-right mt-2" href="../index.php#tabel" style="font-size:25pt;font-weight:bold; color: #026670;">
              <b>IDEA</b>
            </a>
          </div>
          <div class="col-lg-7">
            <div class="form-group mt-3">
              <form action="../index.php" method="get">
                <div class="input-group input-group-alternative mb-1">
                  <input class="form-control" name="cari" placeholder="Cari diskusi di sini ..." type="text">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-default">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand mt-1 ml-3">
                <a href="../index.php">
                  <img src="../assets_forum/img/sistem/logo.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>


          <ul class="navbar-nav ml-lg-auto">

            <li class="nav-item dropdown mr-4">
              <div class="btn-group">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:10pt;font-weight:medium; background-color: #898682; color: white; border-radius: 50px;">Kategori Diskusi</button>
                <div class="dropdown-menu">
                  <?php
                  $data = mysqli_query($koneksi, "SELECT * FROM kategori");
                  while ($d = mysqli_fetch_array($data)) {
                  ?>
                    <a class="dropdown-item" href="kategori.php?id=<?php echo $d['kategori_id']; ?>"><?php echo $d['kategori_nama']; ?></a>
                  <?php
                  }
                  ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../index.php">Tampilkan Semua</a>
                </div>
              </div>
            </li>

            <?php
            if (isset($_SESSION['member_status'])) {
              $id_member = $_SESSION['member_id'];
              $member = mysqli_query($koneksi, "select * from member where member_id='$id_member'");
              $c = mysqli_fetch_assoc($member);
            ?>

              <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" style="padding:7px;font-size:11pt;font-weight:bold; color:#026670;" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                  <?php
                  if ($c['member_foto'] == "") {
                  ?>
                    <img class="img-fluid rounded-circle shadow" style="width: 22px;height: 22px" src="../assets_forum/img/sistem/member.png">
                  <?php
                  } else {
                  ?>
                    <img class="img-fluid rounded-circle shadow" style="width: 22px;height: 22px" src="../assets_forum/img/member/<?php echo $c['member_foto'] ?>">
                  <?php
                  }
                  ?>
                  &nbsp;
                  <?php echo $c['member_nama']; ?>
                  <i class="fa fa-caret-down"></i>
                  <span class="nav-link-inner--text d-lg-none">Settings</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                  <a class="dropdown-item" href="member.php">Dashboard</a>
                  <a class="dropdown-item" href="member_profil.php">Profil</a>
                  <a class="dropdown-item" href="member_password.php">Ganti Password</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../action/member_logout.php">Logout</a>
                </div>
              </li>

            <?php
            } else {
            ?>
              <li class="nav-item">
                <a class="nav-link nav-link-icon" style="padding:7px;font-size:10pt;font-weight:bold; background-color: #83BCAB; border-color: white; border-radius: 50px;" href="masuk.php">
                  &nbsp;
                  <i class="fa fa-sign-in"></i> &nbsp; LOGIN
                  &nbsp;
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-link-icon" style="padding:7px;font-size:10pt;font-weight:bold; background-color: #82BAC2; border-color: white; border-radius: 50px;" href="daftar.php">
                  &nbsp;
                  <i class="fa fa-sign-out"></i> &nbsp; DAFTAR
                  &nbsp;
                </a>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
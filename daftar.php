<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi Member Baru</title>
  <!-- Add your CSS styles or include Bootstrap CSS -->
  <link rel="stylesheet" href="path/to/your/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    /* Custom styles for daftar.php */

    body {
      background-color: white;
      /* background-color: #A75D5D; */
    }


    .container {
      padding-top: 60px;
      border-radius: 10px;
    }

    .card {
      border: none;
      border-radius: 15px;
      background-color: #A75D5D;
    }

    .card-header {
      background-color: #fff;
      border-bottom: none;
      font-weight: bold;
      font-size: 24px;
      border-radius: 10px;
    }

    .card-body {
      background-color: hsla(0, 0%, 100%, 0.55);
      backdrop-filter: blur(30px);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 40px rgba(0, 0, 0, 0.2);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-control {
      border-radius: 10px;
    }

    .btn-primary {
      border-radius: 10px;
    }

    .btn-link {
      color: #dc3545;
    }

    .text-danger {
      color: #dc3545;
    }

    .w-100 {
      width: 100%;
    }

    .rounded-4 {
      border-radius: 6px;
    }

    .shadow-4 {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<body>
  <!-- Section: Design Block -->
  <section class="text-center text-lg-start">
    <style>
      .cascading-right {
        margin-right: -50px;
      }

      @media (max-width: 991.98px) {
        .cascading-right {
          margin-right: 0;
        }
      }
    </style>

    <div class="container py-4">
      <div class="row g-0 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card cascading-right" style="background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px);">
            <div class="card-body p-5 shadow-9 text-center">
              <h2>I D E A</h2>
              <h2 class="fw-bold mb-5">Daftar Member Baru</h2>
              <?php
              if (isset($_GET['alert'])) {
                if ($_GET['alert'] == "duplikat") {
              ?>
                  <div class="alert alert-danger alert-dismissible fade show text-danger" role="alert">
                    <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                    <span class="alert-inner--text"><strong>Gagal!</strong> Email sudah pernah digunakan, silahkan gunakan email yang lain!</span>
                  </div>
              <?php
                }
              }
              ?>
              <form action="daftar_act.php" method="post">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="">Nama Lengkap</label>
                      <input type="text" class="form-control" required="required" name="nama" placeholder="Masukkan nama lengkap ..">
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="">Email</label>
                      <input type="email" class="form-control" required="required" name="email" placeholder="Masukkan email ..">
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="">Nomor HP / Whatsapp </label>
                  <input type="number" class="form-control" required="required" name="hp" placeholder="Masukkan nomor HP/Whatsapp ..">
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="">Alamat Lengkap</label>
                  <input type="text" class="form-control" required="required" name="alamat" placeholder="Masukkan alamat lengkap ..">
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="">Password</label>
                  <input type="password" class="form-control" required="required" name="password" placeholder="Masukkan password ..">
                  <small class="text-muted">Password ini digunakan untuk login ke akun anda.</small>
                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block" value="Daftar">
                  <p class="btn btn-link btn-block">Sudah punya akun? <a href="masuk.php" class="text-danger">Masuk</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_tfokm5sa.json" background="transparent" speed="1" style="width: 625px; height: 625px;" loop autoplay></lottie-player>
        </div>

      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
  <!-- Add your JavaScript scripts or include Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+V05bA6PZ8elAvjOzF8g63ZfC+qGz4B+2/nO8DKre0Koeb6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-jeEuY/zsF6/DI0Kcr6f7f2E1dfH1oCnwtzf3oXZcDhIpN4qGBjckWNABynVccuCi" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6p0m5h5+Y9J6Bk2n0gBImB8I1fo4J6hDh" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>

</html>
<?php include 'footer.php'; ?>
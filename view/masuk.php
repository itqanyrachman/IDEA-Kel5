<?php include 'header.php'; ?>

<section class="hv-100">
  <div class="container py-5 mb-4" style="margin-top: 60px;">
    <div class="row d-flex justify-content-center align-items-center h-100 mb-4 shadow-9">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem; background-color: white; box-shadow: 0 4px 40px rgba(0, 0, 0, 0.2); margin-top: 40px;">
          <div class="row g-0 d-flex justify-content-center align-items-center">
            <div class=" col-md-6 col-lg-5 d-none d-md-block mb-4">
              <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_xlmz9xwm.json" background="transparent" speed="1" style="width: 440px; height: 440px;" loop autoplay></lottie-player>
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center mb-4">
              <div class="card-body p-4 p-lg-5 text-black">
                <?php
                if (isset($_GET['alert'])) {
                  if ($_GET['alert'] == "terdaftar") {
                ?>
                    <div class="alert alert-success alert-dismissible fade show text-success" role="alert">
                      <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                      <span class="alert-inner--text"><strong>Pendaftaran Berhasil.</strong> Silahkan login!</span>
                    </div>
                  <?php
                  } elseif ($_GET['alert'] == "gagal") {
                  ?>
                    <div class="alert alert-danger alert-dismissible fade show text-danger" role="alert">
                      <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                      <span class="alert-inner--text"><strong>Email dan Password salah!</strong> coba lagi!</span>
                    </div>
                  <?php
                  } elseif ($_GET['alert'] == "login-dulu") {
                  ?>
                    <div class="alert alert-warning alert-dismissible fade show text-warning" role="alert">
                      <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                      <span class="alert-inner--text"><strong>Warning!</strong> <br /> Silahkan login terlebih dulu untuk membuat diskusi baru!</span>
                    </div>
                <?php
                  }
                }
                ?>
                <form action="../action/masuk_act.php" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h1 fw-bold mb-0">I D E A</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk ke akun Anda</h5>

                  <div class="form-outline mb-4">
                    <input type="username" class="form-control form-control-lg" name="username" required="required" placeholder="Email" />
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" class="form-control form-control-lg" name="password" required="required" placeholder="Password" />
                  </div>

                  <div class="pt-1 mb-4">
                    <input type="submit" class="btn btn-dark btn-lg block" value="Masuk">
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Belum punya akun? <a href="daftar.php" style="color: #393f81;">Daftar disini</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include 'footer.php'; ?>
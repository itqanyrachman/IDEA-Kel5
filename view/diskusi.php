<?php include 'header.php'; ?>

<div class="container-fluid">

  <div class="row">

    <div class="col-lg-12">

      <div class="card pt-5">
        <div class="card-body pt-5">

          <?php
          $id = $_GET['id'];
          $data = mysqli_query($koneksi, "select * from posting,kategori,member where posting_member=member_id and kategori_id=posting_kategori and posting_id='$id'");
          while ($d = mysqli_fetch_array($data)) {
            $id_posting = $d['posting_id'];

            // update dibaca
            $posting = mysqli_query($koneksi, "select * from posting where posting_id='$id_posting'");
            $pp = mysqli_fetch_assoc($posting);
            $dibaca = $pp['posting_dibaca'];
            $dibaca_update = $dibaca + 1;
            mysqli_query($koneksi, "update posting set posting_dibaca='$dibaca_update' where posting_id='$id_posting'")

          ?>

            <div class="badge badge-primary"><?php echo $d['kategori_nama'] ?></div>
            <div class="badge badge-danger"><i class="fa fa-eye"></i>&nbsp; <?php echo $d['posting_dibaca'] ?></div>

            <h2><?php echo $d['posting_judul'] ?></h2>

            <hr>

            <div class="clearfix">

              <div class="pull-left">
                <a href="detail_member.php?id=<?php echo $d['member_id']; ?>">
                  <?php
                  if ($d['member_foto'] == "") {
                  ?>
                    <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="../assets_forum/img/sistem/member.png">
                  <?php
                  } else {
                  ?>
                    <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="../assets_forum/img/member/<?php echo $d['member_foto'] ?>">
                  <?php
                  }
                  ?>
                  <b><span class="ml-2 text-dark"><?php echo $d['member_nama'] ?></span></b>
                </a>
              </div>

              <div class="pull-right pt-2">
                <small class="text-muted"><i><?php echo date('d-M-Y H:i:s', strtotime($d['posting_tanggal'])) ?></i></small>
              </div>

            </div>

            <br />

            <p><?php echo $d['posting_isi'] ?></p>

            <hr>

            <div class="alert alert-primary mb-5">
              <center><b class="text-white m-0">KOMENTAR</b></center>
            </div>

            <?php
            $diskusi = mysqli_query($koneksi, "select * from diskusi,member where diskusi_posting='$id_posting' and diskusi_member=member_id");
            if (mysqli_num_rows($diskusi) > 0) {
              while ($dis = mysqli_fetch_array($diskusi)) {
            ?>

                <div class="clearfix">

                  <div class="pull-left">
                    <a href="detail_member.php?id=<?php echo $dis['member_id']; ?>">
                      <?php
                      if ($dis['member_foto'] == "") {
                      ?>
                        <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="../assets_forum/img/sistem/member.png">
                      <?php
                      } else {
                      ?>
                        <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="../assets_forum/img/member/<?php echo $dis['member_foto'] ?>">
                      <?php
                      }
                      ?>
                      <span class="ml-2 text-dark"><b><?php echo $dis['member_nama'] ?></b></span>
                    </a>
                  </div>

                  <div class="pull-right pt-2">
                    <small class="text-muted"> <i><?php echo date('d-M-Y H:i:s', strtotime($dis['diskusi_tanggal'])) ?></i></small>
                  </div>

                </div>

                <br />

                <div class="clearfix">
                  <span class="pull-left"><?php echo $dis['diskusi_isi'] ?></span>

                  <a class="pull-right" href="reply_diskusi.php?id=<?php echo $dis['diskusi_id']; ?>">
                    <div class="badge badge-info">
                      <i class="fa fa-comment"></i>&nbsp;
                      <?php
                      $id_diskusi = $dis['diskusi_id'];
                      $jumlah_reply = mysqli_query($koneksi, "select * from reply where reply_diskusi='$id_diskusi'");
                      echo mysqli_num_rows($jumlah_reply);
                      ?>
                    </div>
                  </a>
                </div>

              <?php
              }
            } else {
              ?>
              <div class="mb-5 text-center">Belum ada komentar di diskusi ini.</div>
            <?php
            }
            ?>

            <hr>
            <?php
            if (isset($_SESSION['member_status'])) {
            ?>
              <form action="../action/diskusi_act.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="posting" value="<?php echo $id_posting; ?>">
                <div class="form-group">
                  <b>Tulis komentar</b>
                  <textarea class="form-control" id="editor_forum" required name="isi" rows="5" placeholder="Masukkan komentar baru .."></textarea>
                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block mb-3" onClick="return confirm('Apakah Anda yakin untuk memposting komentar ini?')" value="Posting Komentar">
                </div>
              </form>
            <?php
            } else {
            ?>
              <div class="alert alert-info text-center"><b>Silahkan Login Untuk Komentar / Diskusi</b>. <br><a href="masuk.php">Login Member</a></div>
            <?php
            }
            ?>

          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
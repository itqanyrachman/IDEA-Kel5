<?php include 'header.php'; ?>


<div class="container-fluid">

    <div class="row">

        <div class="col-lg-12">

            <div class="card pt-5">
                <div class="card-body pt-5">

                    <?php
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "select * from diskusi,member where diskusi_id='$id' and diskusi_member=member_id");
                    while ($d = mysqli_fetch_array($data)) {
                        $id_diskusi = $d['diskusi_id'];
                    ?>
                        <div class="clearfix">

                            <div class="pull-left">
                                <a href="detail_member.php?id=<?php echo $d['member_id']; ?>">
                                    <?php
                                    if ($d['member_foto'] == "") {
                                    ?>
                                        <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="assets_forum/img/sistem/member.png">
                                    <?php
                                    } else {
                                    ?>
                                        <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="assets_forum/img/member/<?php echo $d['member_foto'] ?>">
                                    <?php
                                    }
                                    ?>
                                    <b><span class="ml-2 text-dark"><?php echo $d['member_nama'] ?></span></b>
                                </a>
                            </div>

                            <div class="pull-right pt-2">
                                <small class="text-muted"><i><?php echo date('d-M-Y H:i:s', strtotime($d['diskusi_tanggal'])) ?></i></small>
                            </div>

                        </div>

                        <br />

                        <p><?php echo $d['diskusi_isi'] ?></p>

                        <hr>

                        <div class="alert alert-primary mb-5">
                            <center><b class="text-white m-0">REPLY</b></center>
                        </div>

                        <?php
                        $reply = mysqli_query($koneksi, "select * from reply,member where reply_diskusi='$id_diskusi' and reply_member=member_id");
                        if (mysqli_num_rows($reply) > 0) {
                            while ($dis = mysqli_fetch_array($reply)) {
                        ?>


                                <div class="clearfix">

                                    <div class="pull-left">
                                        <a href="detail_member.php?id=<?php echo $dis['member_id']; ?>">
                                            <?php
                                            if ($dis['member_foto'] == "") {
                                            ?>
                                                <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="assets_forum/img/sistem/member.png">
                                            <?php
                                            } else {
                                            ?>
                                                <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="assets_forum/img/member/<?php echo $dis['member_foto'] ?>">
                                            <?php
                                            }
                                            ?>
                                            <span class="ml-2 text-dark"><b><?php echo $dis['member_nama'] ?></b></span>
                                        </a>
                                    </div>

                                    <div class="pull-right pt-2">
                                        <small class="text-muted"> <i><?php echo date('d-M-Y H:i:s', strtotime($dis['reply_tanggal'])) ?></i></small>
                                    </div>

                                </div>

                                <br />

                                <p><?php echo $dis['reply_isi'] ?></p>

                                <hr />
                            <?php
                            }
                        } else {
                            ?>
                            <div class="mb-5 text-center">Belum ada reply di komentar ini.</div>
                        <?php
                        }
                        ?>

                        <b>Beri Reply</b>

                        <hr>
                        <?php
                        if (isset($_SESSION['member_status'])) {
                        ?>
                            <form action="reply_diskusi_act.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="posting" value="<?php echo $id_diskusi; ?>">
                                <div class="form-group">
                                    <b>Tulis Reply</b>
                                    <textarea class="form-control" id="editor_forum" required="required" name="isi" rows="5" placeholder="Masukkan komentar baru .."></textarea>
                                </div>

                                <div class="form-group">

                                    <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modal-notification">Posting Reply</button>

                                    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                            <div class="modal-content bg-gradient-danger">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="modal-title-notification">Perhatian!</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="py-3 text-center">
                                                        <i class="ni ni-bell-55 ni-3x"></i>
                                                        <h4 class="heading mt-4">APAKAH ANDA YAKIN INGIN MEMPOSTING DISKUSI INI ?</h4>
                                                        <p>Klik 'Oke, Posting Sekarang!' untuk memposting diskusi, dan klik 'Batalkan' untuk membatalkan posting.</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Batalkan</button>
                                                    <input type="submit" class="btn btn-white" value="Oke, Posting Sekarang!">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
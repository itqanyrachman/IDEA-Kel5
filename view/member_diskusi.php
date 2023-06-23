<?php include 'header.php'; ?>

<div class="container pt-5">

    <div class="row pt-5">

        <?php include 'member_menu.php'; ?>

        <div class="col-lg-9">

            <div class="card">
                <div class="card-header">
                    <h6 class="m-0">Komentar Saya</h6>
                </div>
                <div class="card-body">
                    <?php
                    $id_member = $_SESSION['member_id'];
                    $diskusi = mysqli_query($koneksi, "select * from posting,diskusi where posting_id=diskusi_posting and diskusi_member='$id_member'");
                    if (mysqli_num_rows($diskusi) > 0) {
                        while ($d = mysqli_fetch_array($diskusi)) {
                    ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col-lg-5">Judul Diskusi</th>
                                        <th class="col-lg-5">Isi Komentar</th>
                                        <th><i class="fa fa-comment"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="diskusi.php?id=<?php echo $d['posting_id']; ?>"><?php echo $d['posting_judul'] ?></a>
                                            <br /><i><small>
                                                    <?php echo date('d-M-Y H:i:s', strtotime($d['posting_tanggal'])) ?>
                                                </small></i>
                                        </td>
                                        <td>
                                            <a href="reply_diskusi.php?id=<?php echo $d['diskusi_id']; ?>"><?php echo $d['diskusi_isi'] ?></a>
                                            <br /><i><small>
                                                    <?php echo date('d-M-Y H:i:s', strtotime($d['diskusi_tanggal'])) ?>
                                                </small></i>
                                        </td>
                                        <td>
                                            <div class="badge badge-info">
                                                <?php
                                                $id_diskusi = $d['diskusi_id'];
                                                $jumlah_reply = mysqli_query($koneksi, "select * from reply where reply_diskusi='$id_diskusi'");
                                                echo mysqli_num_rows($jumlah_reply);
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-sm fa fa-trash" href="../action/member_hapus_diskusi.php?id=<?php echo $d['diskusi_id']; ?>" onClick="return confirm('Apakah Anda yakin untuk menghapus komentar ini?')"></a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                                ?>
                                <div class="mb-5 text-center">Kamu belum memposting diskusi.</div>
                            <?php
                        }
                            ?>
                                </tbody>
                            </table>
                            <br />
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
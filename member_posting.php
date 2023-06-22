<?php include 'header.php'; ?>

<div class="container pt-5">

    <div class="row pt-5">

        <?php include 'member_menu.php'; ?>

        <div class="col-lg-9">

            <div class="card">
                <div class="card-header">
                    <h6 class="m-0">Diskusi Saya</h6>
                </div>
                <div class="card-body">
                    <?php
                    $id_member = $_SESSION['member_id'];
                    $posting = mysqli_query($koneksi, "select * from posting where posting_member='$id_member'");
                    if (mysqli_num_rows($posting) > 0) {
                        while ($d = mysqli_fetch_array($posting)) {
                    ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col-lg-5">Judul Diskusi</th>
                                        <th class="col-lg-5">Isi Diskusi</th>
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
                                            <a href="diskusi.php?id=<?php echo $d['posting_id']; ?>"><?php echo $d['posting_isi'] ?></a>
                                            <br /><i><small>
                                                    <?php echo date('d-M-Y H:i:s', strtotime($d['posting_tanggal'])) ?>
                                                </small></i>
                                        </td>
                                        <td>
                                            <div class="badge badge-info">
                                                <?php
                                                $id_posting = $d['posting_id'];
                                                $jumlah_diskusi = mysqli_query($koneksi, "select * from diskusi where diskusi_posting='$id_posting'");
                                                echo mysqli_num_rows($jumlah_diskusi);
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-sm fa fa-trash" href="member_hapus_posting.php?id=<?php echo $d['posting_id']; ?>" onClick="return confirm('Apakah Anda yakin untuk menghapus diskusi ini?')"></a>
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
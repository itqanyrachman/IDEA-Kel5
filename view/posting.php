<?php include 'header.php'; ?>

<div class="container-fluid pt-5">

    <div class="row pt-5">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h6 class="m-0">Tulis Posting Diskusi Baru</h6>
                </div>
                <div class="card-body">


                    <form action="../action/posting_act.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="">Judul Diskusi</label>
                            <input type="text" class="form-control" required name="judul" placeholder="Masukkan judul diskusi ..">
                        </div>

                        <div class="form-group">
                            <label for="">Kategori Diskusi</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">- Pilih Kategori Diskusi</option>
                                <?php
                                $data = mysqli_query($koneksi, "select * from kategori");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <option value="<?php echo $d['kategori_id'] ?>"><?php echo $d['kategori_nama'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Diskusi</label>
                            <textarea id="editor_forum" type="text" class="form-control" required name="isi" placeholder="Masukkan isi diskusi .."></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block mb-3" onClick="return confirm('Apakah Anda yakin untuk memposting diskusi ini?')" value="Posting Diskusi">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
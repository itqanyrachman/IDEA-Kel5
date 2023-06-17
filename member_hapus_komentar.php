<?php
include 'koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from diskusi where diskusi_id='$id'");
mysqli_query($koneksi, "delete from reply where reply_diskusi='$id'");

header("location:member_komentar.php?");

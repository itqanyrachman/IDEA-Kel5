<?php
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from diskusi where diskusi_posting='$id'");
mysqli_query($koneksi, "delete from posting where posting_id='$id'");

header("location:../view/member_posting.php?");

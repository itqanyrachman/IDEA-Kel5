<?php
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from diskusi where diskusi_id='$id'");

header("location:../view/member_diskusi.php?");

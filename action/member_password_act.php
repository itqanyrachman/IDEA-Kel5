<?php
// menghubungkan dengan koneksi
include '../koneksi.php';

session_start();

$id = $_SESSION['member_id'];
$password = $_POST['password'];

mysqli_query($koneksi, "update member set member_password='$password' where member_id='$id'");

header("location:../view/member_password.php?alert=sukses");

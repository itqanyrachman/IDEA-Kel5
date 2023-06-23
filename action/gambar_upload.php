<?php
include '../koneksi.php';

if ($_FILES['file']['name']) {
    if (!$_FILES['file']['error']) {
        $name = md5(rand(100, 200));
        $ext = explode('.', $_FILES['file']['name']);
        $filename = $name . '.' . $ext[1];
        $destination = '../assets_forum/img/diskusi/' . $filename;
        //change this directory
        $location = $_FILES["file"]["tmp_name"];
        move_uploaded_file($location, $destination);
        echo 'localhost/idea-kel5/assets_forum/img/diskusi/' . $filename;
        //change this URL
    } else {
        echo  $message = 'Ooops! Upload anda memiliki beberapa error:  ' . $_FILES['file']['error'];
    }
}

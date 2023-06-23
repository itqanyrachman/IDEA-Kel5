<?php
$src = $_POST['src'];

$aa = explode("/", $src);
$aaa = end($aa);

if (unlink("../assets_forum/img/diskusi/" . $aaa)) {
	echo 'File Delete Successfully';
}
echo $src;

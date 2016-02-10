<?php
$db = mysqli_connect('localhost', 'root', '','rebro') or
die(mysqli_connect_error());
// 下が本番用です
// $db = mysqli_connect('mysql457.db.sakura.ne.jp', 'rebro', '2016rebro_db','rebro_db') or
// die(mysqli_connect_error());
mysqli_set_charset($db, 'utf8');
?>
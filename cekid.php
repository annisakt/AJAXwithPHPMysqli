<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'user'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$userid = $_GET['q'];

$query = mysqli_query($conn, "select userid from tabeluser where userid='$userid'");

if(mysqli_num_rows($query)==0){
    echo "$userid belum ada yang pakai";
}else{
    echo "$userid sudah ada yang pakai";
}
?> 
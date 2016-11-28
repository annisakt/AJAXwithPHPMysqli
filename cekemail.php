<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'user'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$alamat = $_GET['e'];

$query = mysqli_query($conn, "select email from tabeluser where email='$alamat'");

if(mysqli_num_rows($query)==0){
    echo "$alamat belum ada yang pakai";
}
else
{
    echo "$alamat sudah ada yang pakai";
}
?>
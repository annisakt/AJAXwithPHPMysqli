<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'user'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$nm = $_GET['n'];

$query = mysqli_query($conn, "select id_nama from tabeluser where id_nama='$nm'";

if(mysqli_num_rows($query)==0){
    echo "$nm belum ada yang pakai";
}else{
    echo "$nm sudah ada yang pakai";
}
?> 
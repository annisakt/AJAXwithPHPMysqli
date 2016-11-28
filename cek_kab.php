<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'user'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$prov = $_GET['k'];
$query = mysqli_query($conn, "SELECT kabu.id_kab , kabu.kabupaten FROM kabu , prov WHERE kabu.id_prov = prov.id_prov and prov.id_prov=$prov"); 
if(mysqli_num_rows($query)>0){
    echo "<select>";
    while($row=mysqli_fetch_array($query))
    {
        echo "<option value='$row[0]'>$row[1]<br>";
    }
    echo "</select>";
    }
   else
   {
    echo "tidak ada kota yang match dengan $prov";
   }
?>



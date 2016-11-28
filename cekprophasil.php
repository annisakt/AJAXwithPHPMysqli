<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'user'; // Nama Database
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$query = mysqli_query($conn, "select id_prov,prov from prov"); 
?>
<html>
<head>
<body bgcolor="blue navy">
<script> 
var drz, kata, x; 

function cekid(){ 
    kata = document.getElementById("userid").value; 
    if(kata.length>2){ 
        document.getElementById("teks").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cekid.php"; 
        url=url+"?q="+kata; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus(); 
         } 
} 
function cekemail(){ 
    email = document.getElementById("email").value; 
    if(email.length>2){ 
        document.getElementById("teks2").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cekemail.php"; 
        url=url+"?e="+email; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged2; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus2(); 
         } 
} 
// //function ceknama(){ 
//    nama = document.getElementById("id_nama").value; 
//     if(nama.length>0){ 
//         document.getElementById("teks5").innerHTML = "checking..."; 
//         drz = buatajax(); 
//         var url="nama.php"; 
//         url=url+"?n="+nama; 
//         url=url+"&sid="+Math.random(); 
//         drz.onreadystatechange=stateChanged5; 
//         drz.open("GET",url,true); 
//         drz.send(null); 
//     }else{ 
//        fokus5(); 
//       } 
function cekumur(){ 
    umur = document.getElementById("umur").value; 
    if(umur.length>0){ 
        document.getElementById("teks3").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cekumur.php"; 
        url=url+"?u="+umur; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged3; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus3(); 
         } 
} 
function cek_kec(){ 
    kec = document.getElementById("prov").value; 
    if(kec.length>0){ 
        document.getElementById("teks4").innerHTML = "checking..."; 
        drz = buatajax(); 
        var url="cek_kab.php"; 
        url=url+"?k="+kec; 
        url=url+"&sid="+Math.random(); 
        drz.onreadystatechange=stateChanged4; 
        drz.open("GET",url,true); 
        drz.send(null); 
    }else{ 
        fokus4(); 
         } 
} 
function buatajax(){ 
    if (window.XMLHttpRequest){ 
        return new XMLHttpRequest(); 
    } 
    if (window.ActiveXObject){ 
        return new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    return null; 
} 
 function stateChanged(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks").innerHTML = data; 
    } 
} 
function stateChanged2(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks2").innerHTML = data; 
    } 
} 
function stateChanged3(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks3").innerHTML = data; 
    } 
} 
function stateChanged4(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks4").innerHTML = data; 
    } 
} 
function stateChanged5(){ 
var data; 
    if (drz.readyState==4){ 
        data=drz.responseText; 
        document.getElementById("teks5").innerHTML = data; 
    } 
}
function fokus5(){ 
    document.getElementById("id_nama").focus(); 
}
function fokus(){ 
    document.getElementById("userid").focus(); 
} 
function fokus2(){ 
    document.getElementById("email").focus(); 
}
function fokus3(){ 
    document.getElementById("umur").focus(); 
}  
function fokus4(){ 
    document.getElementById("prov").focus(); 
}  
function cekempty(){ 
    nama = document.getElementById("id_nama").value; 
    if(nama.length==0){ 
        document.getElementById("teks5").innerHTML = "Field ini Wajib diisi"; 
        }else{
            ceknama();
        }
    }
</script> 
</head>
<body>
<form> 
<table cellpadding="8">
<center><h1><font color="red">FORM PENDAFTARAN</font></h1>
<center><tr><td>Nama<td>:<td><input type=text name=id_nama id=id_nama onblur=ceknama()> 
<span id=teks5 style="color:red;font-size:8pt"></span> <br></td></tr></center>
<center><tr><td>User ID<td>:<td><input type=text name=userid id=userid onblur=cekid()> 
<span id=teks style="color:red;font-size:8pt"></span> <br> </td></tr></center>
<center><tr><td>Email<td>:<td><input type=text name=email id=email onblur=cekemail() >
<span id=teks2 style="color:red;font-size:8pt"></span> <br> </td></tr></center>
<center><tr><td>Umur<td>:<td><input type=text name=umur id=umur onblur=cekumur() >
<span id=teks3 style="color:red;font-size:8pt"></span> <br> </td></tr></center>
</center><tr><td>Provinsi<td>:
<?php 
    if(mysqli_num_rows($query)>0){
    echo "<td><select name='prov' id='prov' onchange=cek_kec()>";
    echo "<option value='0'>Pilih<br>";
    while($row=mysqli_fetch_array($query))
    {
        echo "<option value='$row[0]'>$row[1]<br>";
    }
    echo "</select>";
    }
?>
<span id=teks4 style="color:red;font-size:8pt"></span> <br> </td></tr></center>
</option>
</center>
</table>
</form> 
</body>
</html>
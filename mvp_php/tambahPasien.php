<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TambahPasien.php");


$tp = new TambahPasien();
$data = $tp->tampil();


if(isset($_POST['submit'])){
    $tp->tambah($_POST);
}





<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/UpdatePasien.php");

$id = $_GET['id_edit'];
$tp = new UpdatePasien();
$data = $tp->tampil($id);

if(isset($_POST['submit'])){
    $tp->update($_POST, $id);
}





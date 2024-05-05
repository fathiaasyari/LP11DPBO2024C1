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

if (isset($_POST['add'])) {
    $tp->add($_POST);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tp->tampilUpdate($id);
} else if (isset($_POST['update'])) {
    $tp->update($_POST);
} else {
    $data = $tp->read();
}

<?php

include("config.php");

if( isset($_GET['id']) ){

    $id = $_GET['id'];

    // Retrieve the file name from the database
    $sql = "SELECT foto FROM calon_siswa WHERE id=$id";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $fileName = $row['foto'];

    // Delete the file from the "uploads" folder
    $filePath = 'uploads/' . $fileName;
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    // Delete the entry from the database
    $sql = "DELETE FROM calon_siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if( $query ){
        header('Location: list-siswa.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>

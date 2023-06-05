<?php

include("config.php");

if(isset($_POST['daftar'])){
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $foto = $_FILES['foto'];

    // Extract the original file name
    $originalFileName = $_FILES['foto']['name'];

    // Generate a unique file name
    $uniqueFileName = uniqid() . '.' . pathinfo($originalFileName, PATHINFO_EXTENSION);

    // Specify the file destination
    $fileDestination = 'uploads/' . $uniqueFileName;

    // Move the uploaded file to the destination folder
    if(move_uploaded_file($_FILES['foto']['tmp_name'], $fileDestination)) {
        $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$uniqueFileName')";
        $query = mysqli_query($db, $sql);

        if( $query ) {
            header('Location: index.php?status=sukses');
        } else {
            header('Location: index.php?status=gagal');
        }
    } else {
        echo "Error uploading file. Please try again.";
    }
} else {
    die("Akses dilarang...");
}

?>

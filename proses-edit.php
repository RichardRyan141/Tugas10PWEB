<?php

include("config.php");

if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $foto = $_FILES['foto'];

    // Check if a new file is uploaded
    if(!empty($foto['name'])) {
        // Delete the old picture from the "uploads" folder
        $sql = "SELECT foto FROM calon_siswa WHERE id=$id";
        $query = mysqli_query($db, $sql);
        $result = mysqli_fetch_assoc($query);
        $oldPicture = $result['foto'];
        if(!empty($oldPicture)) {
            unlink('uploads/' . $oldPicture);
        }

        // Extract the original file name
        $originalFileName = $_FILES['foto']['name'];

        // Generate a unique file name
        $uniqueFileName = uniqid() . '.' . pathinfo($originalFileName, PATHINFO_EXTENSION);

        // Specify the file destination
        $fileDestination = 'uploads/' . $uniqueFileName;

        // Move the uploaded file to the destination folder
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $fileDestination)) {
            $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', foto='$uniqueFileName' WHERE id=$id";
            $query = mysqli_query($db, $sql);

            if( $query ) {
                header('Location: list-siswa.php');
            } else {
                die("Gagal menyimpan perubahan...");
            }
        } else {
            echo "Error uploading file. Please try again.";
        }
    } else {
        // No new file uploaded, update other fields only
        $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
        $query = mysqli_query($db, $sql);

        if( $query ) {
            header('Location: list-siswa.php');
        } else {
            die("Gagal menyimpan perubahan...");
        }
    }
} else {
    die("Akses dilarang...");
}

?>

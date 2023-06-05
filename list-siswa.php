<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <ul>
          <li><a href="index.php">Halaman Utama</a></li>
          <li><a href="form-daftar.php">Daftar Baru</a></li>
          <li><a href="list-siswa.php">Pendaftar</a></li>
        </ul>
    </nav>    
    <header>
        <h1>List Pendaftar</h1>
    </header>

    <br>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah Asal</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM calon_siswa";
            $query = mysqli_query($db, $sql);
            $counter = 1; // Initialize a counter variable

            while($siswa = mysqli_fetch_array($query)){
                echo "<tr>";

                echo "<td>".$counter."</td>";
                echo "<td><img src='uploads/" . $siswa['foto'] . "' width='100' height='100'></td>";
                echo "<td>".$siswa['nama']."</td>";
                echo "<td>".$siswa['alamat']."</td>";
                echo "<td>".$siswa['jenis_kelamin']."</td>";
                echo "<td>".$siswa['agama']."</td>";
                echo "<td>".$siswa['sekolah_asal']."</td>";


                echo "<td>";
                echo "<a href='form-edit.php?id=".$siswa['id']."'>Edit</a> | ";
                echo "<a href='hapus.php?id=".$siswa['id']."'>Hapus</a>";
                echo "</td>";

                echo "</tr>";
                $counter++;
            }
            ?>
        </tbody>
    </table>

    <div class="total">
        <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    </div>

    <button onclick="exportToPDF()">Export to PDF</button>
    
    <script>
        function exportToPDF() {
            window.location = 'export.php';
        }
    </script>

    </body>
</html>

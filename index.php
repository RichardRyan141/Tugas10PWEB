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
      <h1>Pendaftaran Siswa Baru</h1>
      <h1>SMK Coding</h1>
    </header>
    <div id="status">
      <?php if (isset($_GET['status'])): ?>
        <p>
            <?php
            if ($_GET['status'] == 'sukses') {
                echo "Pendaftaran siswa baru berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
            ?>
        </p>
      <?php endif; ?>
    </div>
  </body>
</html>
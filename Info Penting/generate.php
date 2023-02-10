<?php
  // buat koneksi dengan database mysql
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $link   = mysqli_connect($dbhost,$dbuser,$dbpass);

  //periksa koneksi, tampilkan pesan kesalahan jika gagal
  if(!$link){
    die ("Koneksi dengan database gagal: ".mysqli_connect_errno().
         " - ".mysqli_connect_error());
  }

  //buat database kampusku jika belum ada
  $query = "CREATE DATABASE IF NOT EXISTS kampusku";
  $result = mysqli_query($link, $query);

  if(!$result){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  else {
    echo "Database <b>'kampusku'</b> berhasil dibuat... <br>";
  }

  //pilih database kampusku
  $result = mysqli_select_db($link, "kampusku");

  if(!$result){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  else {
    echo "Database <b>'kampusku'</b> berhasil dipilih... <br>";
  }

  // cek apakah tabel mahasiswa sudah ada. jika ada, hapus tabel
  $query = "DROP TABLE IF EXISTS mahasiswa";
  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'mahasiswa'</b> berhasil dihapus... <br>";
  }

  // buat query untuk CREATE tabel mahasiswa
  $query  = "CREATE TABLE mahasiswa 
            (nim CHAR(10), 
            nama VARCHAR(100), 
            tempat_lahir VARCHAR(50), 
            tanggal_lahir DATE,
            fakultas VARCHAR(50), 
            jurusan VARCHAR(50),
            ipk DECIMAL(3,2), PRIMARY KEY (nim)) ";

  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'mahasiswa'</b> berhasil dibuat... <br>";
  }

  // buat query untuk INSERT data ke tabel mahasiswa
  $query  = "INSERT INTO mahasiswa VALUES ";
  $query .= "('1462000035', 'Gugus Pradita', 'Jombang', '2000-01-19', ";
  $query .= "'Teknik', 'Teknik Informatika', 3.6), ";
  $query .= "('1462000055', 'Ryan Ardiansya', 'Kediri', '1999-10-22', ";
  $query .= "'Teknik', 'Teknik Informatika', 3.5), ";
  $query .= "('1462000013', 'M. Rizal Dwi', 'Kediri', '1998-12-31', ";
  $query .= "'Teknik', 'Teknik Informatika', 3.6), ";
  $query .= "('1462000101', 'M. Zidan', 'Sidoarjo', '2001-06-28', ";
  $query .= "'Teknik', 'Teknik Informatik', 3.7), ";
  $query .= "('1462000091', 'Diko Akhbar F', 'Madiun', '2002-04-02', ";
  $query .= "'Teknik','Teknik Informatika', 3.5)";

  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'mahasiswa'</b> berhasil diisi... <br>";
  }

  // cek apakah tabel admin sudah ada. jika ada, hapus tabel
  $query = "DROP TABLE IF EXISTS admin";
  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'admin'</b> berhasil dihapus... <br>";
  }

  // buat query untuk CREATE tabel admin
  $query  = "CREATE TABLE admin (username VARCHAR(50), password CHAR(40))";
  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'admin'</b> berhasil dibuat... <br>";
  }

  // buat username dan password untuk admin
  $username = "gugus";
  $password = sha1("rahasia"); // enkripsi password menggunakan sha1

  // buat query untuk INSERT data ke tabel admin
  $query  = "INSERT INTO admin VALUES ('$username','$password')";

  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'admin'</b> berhasil diisi... <br>";
  }

  // tutup koneksi dengan database mysql
  mysqli_close($link);
?>

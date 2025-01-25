<?php
ob_start(); // Memulai output buffering

include '../CONFIG/koneksi.php';

if (isset($_POST['register'])) {
    // Mendapatkan data dari formulir
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Validasi formulir
    if (empty($fullname) || empty($email) || empty($phonenumber) || empty($password) || empty($confirmpassword)) {
        echo "<script>alert('Harap isi semua field.');</script>";
        exit;
    }

    if ($password !== $confirmpassword) {
        echo "<script>alert('Password dan Konfirmasi Password tidak cocok.');</script>";
        exit;
    }

    // Validasi tambahan sesuai kebutuhan (misalnya, validasi email, panjang karakter, dll.)
    // Anda dapat menambahkan validasi tambahan di sini sesuai kebutuhan

    // Proses data
    // Simpan data registrasi ke database

    // Membuat query untuk memeriksa apakah email sudah terdaftar
    $query = "SELECT * FROM tabel_pengguna WHERE email = '$email'";

    // Menjalankan query
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar.');</script>";
        exit;
    }

    // Jika email belum terdaftar, lakukan proses penyimpanan data ke database
    $query = "INSERT INTO tabel_pengguna (fullname, email, phonenumber, password, confirmpassword) VALUES ('$fullname', '$email', '$phonenumber', '$password', '$confirmpassword')";

    // Menjalankan query
    if ($koneksi->query($query) === TRUE) {
        echo "<script>alert('Registrasi berhasil!');</script>";
        // Anda dapat menambahkan kode lain di sini, seperti pengalihan ke halaman login
    } else {
        echo "<script>alert('Error: " . $query . "<br>" . $koneksi->error . "');</script>";
    }

    ob_end_flush(); // Mengakhiri output buffering

    // Pengalihan ke halaman formlogin.php
    echo "<script>window.location.href = '/TUGAS_WEB_1/formlogin.php';</script>";
    exit; // Menghentikan eksekusi skrip
}

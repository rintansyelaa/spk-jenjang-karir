<?php
// 1. Pengaturan Header agar mengizinkan akses data (CORS) dan format JSON
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// 2. Konfigurasi Database MySQL
$host = "localhost";
$username = "root";
$password = "";
$db_name = "spk_karir"; // Nama database Anda di phpMyAdmin

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $db_name);

// Cek apakah koneksi database berhasil
if ($conn->connect_error) {
    echo json_encode([
        "status" => "error",
        "message" => "Koneksi database gagal: " . $conn->connect_error
    ]);
    exit();
}

// 3. Mengambil data JSON yang dikirim oleh JavaScript Fetch
$json_data = file_get_contents("php://input");
$data = json_decode($json_data, true);

// Cek apakah data yang dikirim kosong atau tidak lengkap
if (empty($data['nama'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Data tidak lengkap. Nama wajib diisi!"
    ]);
    exit();
}

// 4. Mengamankan data input sebelum dimasukkan ke database
$nama = $conn->real_escape_string($data['nama']);
$pilihan_awal = isset($data['pilihan']) ? $conn->real_escape_string($data['pilihan']) : 'Belum Menentukan';
$c1 = isset($data['c1']) ? floatval($data['c1']) : 0.0;
$c2 = isset($data['c2']) ? floatval($data['c2']) : 0.0;
$c3 = isset($data['c3']) ? floatval($data['c3']) : 0.0;
$c4 = isset($data['c4']) ? floatval($data['c4']) : 0.0;
$c5 = isset($data['c5']) ? floatval($data['c5']) : 0.0;

// 5. Perintah SQL untuk menyimpan ke tabel kuesioner_mandiri
$query = "INSERT INTO kuesioner_mandiri (nama, pilihan_awal, c1, c2, c3, c4, c5) VALUES ('$nama', '$pilihan_awal', $c1, $c2, $c3, $c4, $c5)";

// 6. Eksekusi Query dan Kirim Respon Balik ke JavaScript
if ($conn->query($query) === TRUE) {
    echo json_encode([
        "status" => "success",
        "message" => "Data kuesioner berhasil disimpan ke MySQL!"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Gagal menyimpan ke tabel: " . $conn->error
    ]);
}

// Tutup koneksi database
$conn->close();
?>
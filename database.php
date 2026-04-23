<?php

class Database {
    public $db;
    private $host     = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "parfum_store";

    public function __construct() {
        try {
            $this->db = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->db->connect_error) {
                echo "Gagal terkoneksi ke database.";
                exit();
            }
            $this->createTable();
        } catch (mysqli_sql_exception $e) {
            echo "Kesalahan terjadi pada database.";
            exit();
        }
    }

    public function __destruct() {
        $this->db->close();
    }

    private function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS produk (
            id        INT(11) AUTO_INCREMENT PRIMARY KEY,
            nama      VARCHAR(150) NOT NULL,
            brand     VARCHAR(100) NOT NULL,
            kategori  ENUM('Pria','Wanita','Unisex') DEFAULT 'Unisex',
            harga     DECIMAL(12,2) NOT NULL,
            stok      INT(5) DEFAULT 0,
            deskripsi TEXT
        )";
        $this->db->query($sql);
    }

    // CREATE
    public function insertProduk($nama, $brand, $kategori, $harga, $stok, $deskripsi) {
        $stmt = $this->db->prepare("INSERT INTO produk (nama, brand, kategori, harga, stok, deskripsi) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdis", $nama, $brand, $kategori, $harga, $stok, $deskripsi);
        return $stmt->execute();
    }

    // READ ALL
    public function getAllProduk() {
        $data   = [];
        $result = $this->db->query("SELECT * FROM produk ORDER BY id DESC");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // READ ONE
    public function getProduk($id) {
        $stmt = $this->db->prepare("SELECT * FROM produk WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // UPDATE
    public function updateProduk($id, $nama, $brand, $kategori, $harga, $stok, $deskripsi) {
        $stmt = $this->db->prepare("UPDATE produk SET nama=?, brand=?, kategori=?, harga=?, stok=?, deskripsi=? WHERE id=?");
        $stmt->bind_param("sssdisi", $nama, $brand, $kategori, $harga, $stok, $deskripsi, $id);
        return $stmt->execute();
    }

    // DELETE
    public function deleteProduk($id) {
        $stmt = $this->db->prepare("DELETE FROM produk WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

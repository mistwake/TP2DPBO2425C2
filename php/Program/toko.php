<?php
// ====== Class Barang ======
class Barang
{
    protected $id;
    protected $nama;
    protected $harga;

    public function __construct($id, $nama, $harga)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNama()
    {
        return $this->nama;
    }
    public function getHarga()
    {
        return $this->harga;
    }
}

// ====== Class Elektronik ======
class Elektronik extends Barang
{
    protected $merk;
    protected $garansi;

    public function __construct($id, $nama, $harga, $merk, $garansi)
    {
        parent::__construct($id, $nama, $harga);
        $this->merk = $merk;
        $this->garansi = $garansi;
    }

    public function getMerk()
    {
        return $this->merk;
    }
    public function getGaransi()
    {
        return $this->garansi;
    }
}

// ====== Class Gadget ======
class Gadget extends Elektronik
{
    private $jenis;
    private $os;
    private $ram;
    private $storage;
    private $gambar;

    public function __construct($id, $nama, $harga, $merk, $garansi, $jenis, $os, $ram, $storage, $gambar)
    {
        parent::__construct($id, $nama, $harga, $merk, $garansi);
        $this->jenis = $jenis;
        $this->os = $os;
        $this->ram = $ram;
        $this->storage = $storage;
        $this->gambar = $gambar;
    }

    public function getJenis()
    {
        return $this->jenis;
    }
    public function getOS()
    {
        return $this->os;
    }
    public function getRam()
    {
        return $this->ram;
    }
    public function getStorage()
    {
        return $this->storage;
    }
    public function getGambar()
    {
        return $this->gambar;
    }
}

// ====== Session Data ======
session_start();
if (!isset($_SESSION['daftar'])) {
    $_SESSION['daftar'] = [
        new Gadget(1, "Galaxy S24", 15000000, "Samsung", 24, "HP", "Android", 12, 256, "uploads/galaxy.jpg"),
        new Gadget(2, "iPhone 15", 20000000, "Apple", 12, "HP", "iOS", 8, 128, "uploads/iphone.jpg"),
        new Gadget(3, "Xiaomi Book S", 9000000, "Xiaomi", 18, "Laptop", "Windows", 8, 512, "uploads/xiaomi.jpg"),
        new Gadget(4, "Pixelbook", 13000000, "Google", 24, "Laptop", "ChromeOS", 16, 256, "uploads/pixelbook.jpg"),
        new Gadget(5, "Oppo Pad", 12000000, "Oppo", 18, "Tablet", "Android", 8, 256, "uploads/oppo.jpg"),
    ];
}

// ====== Tambah Data ======
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $nama = $_POST['nama'];
    $harga = intval($_POST['harga']);
    $merk = $_POST['merk'];
    $garansi = intval($_POST['garansi']);
    $jenis = $_POST['jenis'];
    $os = $_POST['os'];
    $ram = intval($_POST['ram']);
    $storage = intval($_POST['storage']);

    // Upload gambar
    $gambar = "uploads/placeholder.png"; // default
    if (!empty($_FILES['gambar']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) mkdir($targetDir); // bikin folder kalau belum ada
        $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile);
        $gambar = $targetFile;
    }

    // cek id unik
    foreach ($_SESSION['daftar'] as $g) {
        if ($g->getId() == $id) {
            $error = "ID sudah digunakan!";
            break;
        }
    }

    if (!isset($error)) {
        $_SESSION['daftar'][] = new Gadget($id, $nama, $harga, $merk, $garansi, $jenis, $os, $ram, $storage, $gambar);
        $success = "Data berhasil ditambahkan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Toko Elektronik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f9f9f9;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background: #fff;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        img {
            max-width: 80px;
            border-radius: 6px;
        }

        .form-container {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            width: 50%;
            margin: auto;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 4px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            margin-top: 10px;
            background: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background: #0056b3;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }

        .error {
            text-align: center;
            margin-top: 10px;
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Toko Elektronik</h1>

    <!-- Form Tambah -->
    <div class="form-container">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group"><label>ID</label><input type="number" name="id" required></div>
            <div class="form-group"><label>Nama</label><input type="text" name="nama" required></div>
            <div class="form-group"><label>Harga</label><input type="number" name="harga" required></div>
            <div class="form-group"><label>Merk</label><input type="text" name="merk" required></div>
            <div class="form-group"><label>Garansi (bulan)</label><input type="number" name="garansi" required></div>
            <div class="form-group"><label>Jenis</label><input type="text" name="jenis" required></div>
            <div class="form-group"><label>OS</label><input type="text" name="os" required></div>
            <div class="form-group"><label>RAM (GB)</label><input type="number" name="ram" required></div>
            <div class="form-group"><label>Storage (GB)</label><input type="number" name="storage" required></div>
            <div class="form-group"><label>Gambar</label><input type="file" name="gambar"></div>
            <button class="btn" type="submit">Tambah Data</button>
        </form>
        <?php if (isset($success)) echo "<div class='message'>$success</div>"; ?>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
    </div>

    <!-- Tabel Data -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Merk</th>
            <th>Garansi</th>
            <th>Jenis</th>
            <th>OS</th>
            <th>RAM</th>
            <th>Storage</th>
            <th>Gambar</th>
        </tr>
        <?php foreach ($_SESSION['daftar'] as $g): ?>
            <tr>
                <td><?= $g->getId(); ?></td>
                <td><?= $g->getNama(); ?></td>
                <td><?= number_format($g->getHarga(), 0, ",", "."); ?></td>
                <td><?= $g->getMerk(); ?></td>
                <td><?= $g->getGaransi(); ?> bln</td>
                <td><?= $g->getJenis(); ?></td>
                <td><?= $g->getOS(); ?></td>
                <td><?= $g->getRam(); ?> GB</td>
                <td><?= $g->getStorage(); ?> GB</td>
                <td><img src="<?= $g->getGambar(); ?>" alt="<?= $g->getNama(); ?>"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
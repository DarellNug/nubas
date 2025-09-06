<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "spp_db");
$hasil = null;

if (isset($_GET['pilih'])) {
    $nama = mysqli_real_escape_string($conn, $_GET['pilih']);
    $sql = "SELECT nama, kelas FROM data_siswa WHERE nama = '$nama' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $kelas = strtoupper(trim($row['kelas']));

        if (in_array($kelas, ["X-AK", "XI-AK-1", "XI-AK-2", "XI-AK-3", "XII-AK-1", "XII-AK-2", "XII-AK-3"])) {
            $spp = 400000;
        } elseif (in_array($kelas, ["X-F", "XI-F"])) {
            $spp = 300000;
        } elseif (in_array($kelas, ["X-PPLG", "XI-PPLG"])) {
            $spp = 200000;
        } else {
            $spp = 0;
        }

        $_SESSION['spp'] = $spp;
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['kelas'] = $row['kelas'];

        $hasil = "
        <div class='result-box'>
            <h3>Nama: {$row['nama']}</h3>
            <p>Kelas: {$row['kelas']}</p>
            <p>SPP: Rp " . number_format($spp, 0, ',', '.') . "</p>
            <a href='spp.php'>Cari lagi</a>
        </div>";
    } else {
        $hasil = "<p>Data tidak ditemukan.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pengaplikasian IF-ELSE</title>
    <style>
        body {
            background-color: #000033;
            color: #00FF99;
            font-family: 'Courier New', monospace;
            margin: 0;
            padding: 20px;
            background-image: repeating-linear-gradient(
                45deg,
                rgba(0, 255, 153, 0.05) 0px,
                rgba(0, 255, 153, 0.05) 2px,
                transparent 2px,
                transparent 4px
            );
        }
        h2, h3 {
            color: #FFFF33;
            text-shadow: 2px 2px #FF00FF;
        }
        form, .result-box {
            background-color: #111144;
            border: 3px solid #00FF99;
            padding: 15px;
            margin-top: 20px;
            box-shadow: 4px 4px #FF00FF;
        }
        input[type="text"] {
            background-color: #000;
            color: #00FF99;
            border: 2px solid #FFFF33;
            padding: 8px;
            font-family: 'Courier New', monospace;
        }
        button {
            background-color: #FF00FF;
            color: #FFFF33;
            border: 3px outset #FFFF33;
            padding: 8px 15px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #FFFF33;
            color: #FF00FF;
            border: 3px inset #FF00FF;
        }
        a {
            color: #00FFFF;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: #FF00FF;
            text-decoration: underline;
        }
        .blink {
            animation: blink 1s steps(2, start) infinite;
        }
        @keyframes blink {
            to { visibility: hidden; }
        }
    </style>
</head>
<body>
    <h2 class="blink">Berapa Sumbangan Pembinaan Pendidikan (SPP) yang wajib kalian bayar setiap bulan?</h2>

    <?php
    if ($hasil) {
        echo $hasil;
    } else {
        ?>
        <form method="POST">
            <input type="text" name="nama" placeholder="Ketik namamu..." required>
            <button type="submit" name="search">Cari</button>
        </form>
        <?php
        if (isset($_POST['search'])) {
            $nama = mysqli_real_escape_string($conn, $_POST['nama']);
            $sql = "SELECT nama FROM data_siswa WHERE nama LIKE '%$nama%'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<h3>Pilih Nama:</h3>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p><a href='spp.php?pilih=" . urlencode($row['nama']) . "'>" . htmlspecialchars($row['nama']) . "</a></p>";
                }
            } else {
                echo "<p>Tidak ada hasil.</p>";
            }
        }
    }
    ?>
</body>
</html>
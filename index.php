<?php

require_once('koneksi.php');
$sql = "SELECT * FROM ppdb";
$result = $conn->query($sql);

$ppdb = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td{
            padding: 12px;
            text-align: center;;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            color: lightskyblue;
            font-weight: bold;
            text-transform: uppercase;
            background-color:#f4f4f4;
        }

        th input[type="text"], th select {
            width: 90%;
            padding: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
            font-size: 14px;
            margin-top: 5px;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 12px;
            color: #fff;
            font-size: 12px;
            display: inline-block;
            font-weight: bold;
        }

        .badge.negeri {
            background-color: #4CAF50;
        }

        .badge.swasta {
            background-color: #ff5722;
        }

        .badge.ikut {
            background-color: #4caf50;
        }

        .badge.tidak-ikut {
            background-color: #ff5722;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        .h1 {
            background-color: red;
            border: 15px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            border-radius: 15px;
            color: white;
            font-size: 16px;
            padding: 15px;
        }

        .box {
            border: 1px solid black;
            padding: 20px;
            border-radius: 20px;
            text-align: center;
            display: inline-block;
            margin: 20px;
            cursor: pointer;
            transition: background-color 0.1s ease-in-out;
            transition: all 0. 3s ease;
        }


        .box:hover {
            background-color: orange;
            box-shadow: 0px 5px 10px rgba(0,0,0,0.2);
            transform: translateY(-5px);
        }
        .box.active {
            background-color: #f3dd14;
        }

        .container {
            background-color: #f3dd14;
            color: black;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .h2 {
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-size: 14px;
            padding: 15px;
        }

        .container-text {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

    </style>
</head>
<body>
    <div>
        <div class="header">
            <header class="container-text">
            <h1 style="font-size: 20px; color: white;">PPDB Karanganyar</h1>
            <input type="text" placeholder style="Ketikkan Nama/NIK....">
            </header>
        </div>
        <center>
            <img src="asset/ppdb2.jpg" alt="hihi" style="width: 1000px; height: auto;">
        </center>
        <h1 class ="h1">Selamat datang di Website resmi PPDB Online SD dan SMP KABUPATEN KARANGANYAR Tahun Pelajaran 2024/2025</h1>
        <center>
        <img src="asset/ppdb3.jpg" alt="hai" style="width: 350px; height: auto;">
        </center>
        <div class="box" onclick="changeColor(this)">
            <p>Jalur Afirmasi - Disabilitas</p>
        </div>
    
        <div class="box" onclick="changeColor(this)">
            <p>Jalur Afirmasi - Ekonomi Tidak Mampu</p>
        </div>

        <div class="box" onclick="changeColor(this)">
            <p>Jalur Zonasi</p>
        </div>

        <div class="box" onclick="changeColor(this)">
            <p>Jalur Prestasi</p>
        </div>

        <div class="box" onclick="changeColor(this)">
            <p>Jalur Pindahan Tugas Orang Tua</p>
        </div>
        <div>
            <h2 class="h2">Selamat datang di Website resmi PPDB Online SD dan SMP KABUPATEN KARANGANYAR Tahun Pelajaran 2024/2025</h2>
    </div>

        <h1>DAFTAR SEKOLAH</h1>
    </div>
    <table>
        <tr>
            <th>#</th>
            <th>KODE</th>
            <th>NAMA SEKOLAH</th>
            <th>KELURAHAN</th>
            <th>KECAMATAN</th>
            <th>STATUS SEKOLAH</th>
            <th>IKUT PPDB</th>
        </tr>
        <?php
            foreach ($ppdb as $key => $row) {
                $statusBadge = $row['status_sekolah'] == 'Negeri' ? 'badge negeri' : 'badge swasta';
                $ppdbBadge = $row['ikut_ppdb'] == 'ya' ? 'badge ikut' : 'badge tidak-ikut'
        ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $row['kode']; ?></td>
                <td><?php echo $row['nama_sekolah']; ?></td>
                <td><?php echo $row['kelurahan']; ?></td>
                <td><?php echo $row['kecamatan']; ?></td>
                <td><span class="<?php echo $statusBadge; ?>"><?php echo $row['status_sekolah']; ?></span></td>
                <td><span class="<?php echo $ppdbBadge; ?>"><?php echo $row['ikut_ppdb']; ?></span></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
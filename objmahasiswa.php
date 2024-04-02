<?php
require_once 'Mahasiswa.php';

$daftar_kampus = [
    "Universitas Bikin Kerenz",
    "Universitas Kece Baday",
    "Universitas Cindo",
    "Universitas Classic"
];

$daftar_matkul = [
    "UIUX",
    "JavaScript ",
    "Data Science",
    "Kalkulus"
];

$hasil_output = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kampus = $_POST['kampus'];
    $matkul = $_POST['matkul'];
    $nilai = $_POST['nilai'];


    $mahasiswa = new Mahasiswa($nim, $nama, $kampus, $matkul, $nilai);


    $hasil_output = "<h2 align='center'>Daftar Nilai Ujian Mahasiswa</h2>";
    $hasil_output .= "<table border='1' width='50%' align='center'>";
    $hasil_output .= "<thead><tr><th>NIM</th><th>Nama</th><th>Kampus</th><th>Mata Kuliah</th><th>Nilai</th><th>Status</th><th>Grade</th><th>Predikat</th></tr></thead>";
    $hasil_output .= "<tbody>";
    $hasil_output .= "<tr><td>{$mahasiswa->nim}</td><td>{$mahasiswa->nama}</td><td>{$mahasiswa->kampus}</td><td>{$mahasiswa->matkul}</td><td>{$mahasiswa->nilai}</td><td>{$mahasiswa->getStatus()}</td><td>{$mahasiswa->getGrade()}</td><td>{$mahasiswa->getPredikat()}</td></tr>";
    $hasil_output .= "</tbody></table>";
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Ujian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: black;
        }
        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], select {
            width: calc(100% - 6px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #1e90ff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container" id="form-section">
        <h2 align="center">Form Nilai Ujian</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="kampus">Kampus:</label>
                <select id="kampus" name="kampus" required>
                    <option value="">Pilih Kampus</option>
                    <?php
                    foreach ($daftar_kampus as $kampus) {
                        echo "<option value='$kampus'>$kampus</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="matkul">Mata Kuliah:</label>
                <select id="matkul" name="matkul" required>
                    <option value="">Pilih Mata Kuliah</option>
                    <?php
                    foreach ($daftar_matkul as $matkul) {
                        echo "<option value='$matkul'>$matkul</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nilai">Nilai:</label>
                <input type="number" id="nilai" name="nilai" min="0" max="100" required>
            </div>
            <input type="submit" value="Submit" align="center">
        </form>
    </div>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
<div align="center" style="margin-top: 20px;">
    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">Kembali</a>
</div>
<?php endif; ?>
    
    <?php echo $hasil_output; ?>
</body>
</html>

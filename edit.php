<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa Magang</title>
</head>

<body>
    <h1>Edit Data Mahasiswa Magang</h1>

    <?php
    function getDataMahasiswa()
    {
        $file = 'data_mahasiswa.json';
        $data = file_get_contents($file);
        return json_decode($data, true);
    }

    function saveDataMahasiswa($data)
    {
        $file = 'data_mahasiswa.json';
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
        $id = $_POST["id"];

        $mahasiswa = getDataMahasiswa();

        foreach ($mahasiswa as &$data) {
            if ($data["NIM"] == $id) {
                foreach ($_POST as $key => $value) {
                    if ($key != "id") {
                        $data[$key] = $value;
                    }
                }
                break;
            }
        }

        saveDataMahasiswa($mahasiswa);

        header("Location: index.php");
        exit();
    }

    if (!isset($_GET['id'])) {
        echo "<p>Invalid ID</p>";
    } else {
        $id = $_GET['id'];
        $mahasiswa = getDataMahasiswa();
        $selectedMahasiswa = null;

        foreach ($mahasiswa as $mhs) {
            if ($mhs["NIM"] == $id) {
                $selectedMahasiswa = $mhs;
                break;
            }
        }

        if ($selectedMahasiswa == null) {
            echo "<p>Data not found</p>";
        } else {
    ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="NIM">NIM:</label>
                <input type="text" id="NIM" name="NIM" value="<?php echo $selectedMahasiswa['NIM']; ?>"><br>
                <label for="NAMA_LENGKAP">Nama Lengkap:</label>
                <input type="text" id="NAMA_LENGKAP" name="NAMA_LENGKAP" value="<?php echo $selectedMahasiswa['NAMA_LENGKAP']; ?>"><br>
                <label for="PRODI">Prodi:</label>
                <input type="text" id="PRODI" name="PRODI" value="<?php echo $selectedMahasiswa['PRODI']; ?>"><br>
                <label for="PRODI">Prodi:</label>
                <input type="text" id="PRODI" name="PRODI" value="<?php echo $selectedMahasiswa['PRODI']; ?>"><br>
                <label for="DOSWAL">Doswal:</label>
                <input type="text" id="DOSWAL" name="DOSWAL" value="<?php echo $selectedMahasiswa['DOSWAL']; ?>"><br>
                <label for="KELAS">Kelas:</label>
                <input type="text" id="KELAS" name="KELAS" value="<?php echo $selectedMahasiswa['KELAS']; ?>"><br>
                <label for="PERUSAHAAN_MAGANG">Perusahaan Magang:</label>
                <input type="text" id="PERUSAHAAN_MAGANG" name="PERUSAHAAN_MAGANG" value="<?php echo $selectedMahasiswa['PERUSAHAAN_MAGANG']; ?>"><br>
                <label for="BIDANG_KERJA">Bidang Kerja:</label>
                <input type="text" id="BIDANG_KERJA" name="BIDANG_KERJA" value="<?php echo $selectedMahasiswa['BIDANG_KERJA']; ?>"><br>
                <label for="TGL_MULAI">Tanggal Mulai:</label>
                <input type="date" id="TGL_MULAI" name="TGL_MULAI" value="<?php echo $selectedMahasiswa['TGL_MULAI']; ?>"><br>
                <label for="TGL_SELESAI">Tanggal Selesai:</label>
                <input type="date" id="TGL_SELESAI" name="TGL_SELESAI" value="<?php echo $selectedMahasiswa['TGL_SELESAI']; ?>"><br>
                <label for="KATEGORI_MAGANG">Kategori Magang:</label>
                <input type="text" id="KATEGORI_MAGANG" name="KATEGORI_MAGANG" value="<?php echo $selectedMahasiswa['KATEGORI_MAGANG']; ?>"><br>
                <label for="ASSIGNED_PBB_AKADEMIK">Assigned PBB Akademik:</label>
                <input type="text" id="ASSIGNED_PBB_AKADEMIK" name="ASSIGNED_PBB_AKADEMIK" value="<?php echo $selectedMahasiswa['ASSIGNED_PBB_AKADEMIK']; ?>"><br>
                <label for="Jml_SKS_Lulus">Jumlah SKS Lulus:</label>
                <input type="text" id="Jml_SKS_Lulus" name="Jml_SKS_Lulus" value="<?php echo $selectedMahasiswa['Jml_SKS_Lulus']; ?>"><br>
                <label for="EPrT_Terpenuhi">EPrT Terpenuhi:</label>
                <input type="text" id="EPrT_Terpenuhi" name="EPrT_Terpenuhi" value="<?php echo $selectedMahasiswa['EPrT_Terpenuhi']; ?>"><br>
                <label for="Skor_EPrT">Skor EPrT:</label>
                <input type="text" id="Skor_EPrT" name="Skor_EPrT" value="<?php echo $selectedMahasiswa['Skor_EPrT']; ?>"><br>
                <label for="Tgl_Tes_EPrT">Tanggal Tes EPrT:</label>
                <input type="date" id="Tgl_Tes_EPrT" name="Tgl_Tes_EPrT" value="<?php echo $selectedMahasiswa['Tgl_Tes_EPrT']; ?>"><br>
                <label for="TAK_Terpenuhi">TAK Terpenuhi:</label>
                <input type="text" id="TAK_Terpenuhi" name="TAK_Terpenuhi" value="<?php echo $selectedMahasiswa['TAK_Terpenuhi']; ?>"><br>
                <label for="Skor_TAK">Skor TAK:</label>
                <input type="text" id="Skor_TAK" name="Skor_TAK" value="<?php echo $selectedMahasiswa['Skor_TAK']; ?>"><br>
                <br><br>
                <input type="submit" value="Simpan Perubahan">
            </form>
    <?php
        }
    }
    ?>
</body>

</html>

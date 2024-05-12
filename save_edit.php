<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $doswal = $_POST['doswal'];
    $kelas = $_POST['kelas'];
    $perusahaan_magang = $_POST['perusahaan_magang'];
    $bidang_kerja = $_POST['bidang_kerja'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $kategori_magang = $_POST['kategori_magang'];
    $assigned_pbb_akademik = $_POST['assigned_pbb_akademik'];
    $jml_sks_lulus = $_POST['jml_sks_lulus'];
    $eprt_terpenuhi = $_POST['eprt_terpenuhi'];
    $skor_eprt = $_POST['skor_eprt'];
    $tgl_tes_eprt = $_POST['tgl_tes_eprt'];
    $tak_terpenuhi = $_POST['tak_terpenuhi'];
    $skor_tak = $_POST['skor_tak'];

    $jsonString = file_get_contents('data_mahasiswa.json');
    $magang = json_decode($jsonString, true);

    $magang[$id]['nim'] = $nim;
    $magang[$id]['nama'] = $nama;
    $magang[$id]['prodi'] = $prodi;
    $magang[$id]['doswal'] = $doswal;
    $magang[$id]['kelas'] = $kelas;
    $magang[$id]['perusahaan_magang'] = $perusahaan_magang;
    $magang[$id]['bidang_kerja'] = $bidang_kerja;
    $magang[$id]['tgl_mulai'] = $tgl_mulai;
    $magang[$id]['tgl_selesai'] = $tgl_selesai;
    $magang[$id]['kategori_magang'] = $kategori_magang;
    $magang[$id]['assigned_pbb_akademik'] = $assigned_pbb_akademik;
    $magang[$id]['jml_sks_lulus'] = $jml_sks_lulus;
    $magang[$id]['eprt_terpenuhi'] = $eprt_terpenuhi;
    $magang[$id]['skor_eprt'] = $skor_eprt;
    $magang[$id]['tgl_tes_eprt'] = $tgl_tes_eprt;
    $magang[$id]['tak_terpenuhi'] = $tak_terpenuhi;
    $magang[$id]['skor_tak'] = $skor_tak;

    $updatedJsonString = json_encode($magang);
    file_put_contents('data_mahasiswa.json', $updatedJsonString);

    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>

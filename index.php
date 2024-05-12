<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pencarian Magang</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        th,
        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Daftar Nama Mahasiswa Magang Fakultas Ilmu Terapan</h1>

    <table border="1" cellspacing="0" id="magangTable">
        <thead>
            <tr>
                <th>NIM</th>
                <th>NAMA LENGKAP</th>
                <th>PRODI</th>
                <th>DOSWAL</th>
                <th>KELAS</th>
                <th>PERUSAHAAN MAGANG</th>
                <th>BIDANG KERJA</th>
                <th>TGL MULAI</th>
                <th>TGL SELESAI</th>
                <th>KATEGORI MAGANG</th>
                <th>ASSIGNED PBB AKADEMIK</th>
                <th>Jml SKS Lulus</th>
                <th>EPrT Terpenuhi?</th>
                <th>Skor EPrT</th>
                <th>Tgl Tes EPrT</th>
                <th>TAK Terpenuhi?</th>
                <th>Skor TAK</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            function fetchAndDisplayMagang() {
                $.getJSON("data_mahasiswa.json", function(data) {
                    $("#magangTable tbody").empty();

                    $.each(data, function(index, magang) {
                        var newRow = $("<tr>");
                        newRow.append("<td>" + magang.NIM + "</td>");
                        newRow.append("<td>" + magang.NAMA_LENGKAP + "</td>");
                        newRow.append("<td>" + magang.PRODI + "</td>");
                        newRow.append("<td>" + magang.DOSWAL + "</td>");
                        newRow.append("<td>" + magang.KELAS + "</td>");
                        newRow.append("<td>" + magang.PERUSAHAAN_MAGANG + "</td>");
                        newRow.append("<td>" + magang.BIDANG_KERJA + "</td>");
                        newRow.append("<td>" + magang.TGL_MULAI + "</td>");
                        newRow.append("<td>" + magang.TGL_SELESAI + "</td>");
                        newRow.append("<td>" + magang.KATEGORI_MAGANG + "</td>");
                        newRow.append("<td>" + magang.ASSIGNED_PBB_AKADEMIK + "</td>");
                        newRow.append("<td>" + magang.Jml_SKS_Lulus + "</td>");
                        newRow.append("<td>" + magang.EPrT_Terpenuhi + "</td>");
                        newRow.append("<td>" + magang.Skor_EPrT + "</td>");
                        newRow.append("<td>" + magang.Tgl_Tes_EPrT + "</td>");
                        newRow.append("<td>" + magang.TAK_Terpenuhi + "</td>");
                        newRow.append("<td>" + magang.Skor_TAK + "</td>");
                        newRow.append("<td><button class='edit-btn' data-id='" + magang.NIM + "'>Edit</button></td>");
                        $("#magangTable tbody").append(newRow);
                    });
                });
            }

            fetchAndDisplayMagang();

            $(document).on("click", ".edit-btn", function() {
                var id = $(this).data("id");
                window.location.href = "edit.php?id=" + id;
            });
        });
    </script>
</body>

</html>

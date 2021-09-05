<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
    <title>Kelas</title>
</head>

<body>
    <a href="../Views/View_kelas.php">Kelas</a>
    <a href="../Views/View_pembayaran.php">Pembayaran</a>
    <a href="../Views/View_petugas.php">Petugas</a>
    <a href="../Views/View_siswa.php">Siswa</a>
    <a href="../Views/View_spp.php">Spp</a>
    <br>
    <?php

    include '../Controllers/Controller_kelas.php';
    // Membuat Object dari Class kelas
    $kelas = new Controller_kelas();
    $GetKelas = $kelas->GetData_All();

    // untuk mengecek di object $kelas ada berapa banyak Property
    //echo var_dump($kelas);
    ?>

    <br>
    <h1>OOP - Class, Object, Property, Method With <u>MVC</u></h1>
    <h2>CRUD and CSRF</h2>
    <h3>Table kelas</h3>
    <h3><a href="View_post_kelas.php">Add Data</a></h3>


    <table border="1">
        <tr>
            <th>No</th>
            <th>ID Kelas</th>
            <th>Nama Kelas</th>
            <th>Kompetensi Keahlian</th>
        </tr>
        <?php
        // Decision validation variabel
        if (isset($GetKelas)) {
            $no = 1;
            foreach ($GetKelas as $Get) {
        ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $Get['id_kelas']; ?></td>
                    <td><?php echo $Get['nama_kelas']; ?></td>
                    <td><?php echo $Get['kompetensi_keahlian']; ?></td>
                    <td>
                        <a class="btn btn-warning" href="../Views/View_put_kelas.php?id_kelas=<?php echo base64_encode($Get['id_kelas']) ?>">view</a>
                        <a class="btn btn-danger" onclick="konfirmasi(<?php echo $Get['id_kelas'] ?>)">Delete</a>

                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
    <script>
        function konfirmasi(id_kelas) {
            if (window.confirm("Apakah anda ingin menghapus data ini?")) {
                window.location.href = '../Config/Routes.php?function=delete_kelas&id_kelas=<?php echo base64_encode($Get['id_kelas']) ?>';
            };
        }
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>SPP</title>
</head>

<body>
    <a href="../Views/View_kelas.php">Kelas</a>
    <a href="../Views/View_pembayaran.php">Pembayaran</a>
    <a href="../Views/View_petugas.php">Petugas</a>
    <a href="../Views/View_siswa.php">Siswa</a>
    <a href="../Views/View_spp.php">Spp</a>
    <br>
    <!-- Page content-->
    <?php

    include '../Controllers/Controller_spp.php';
    // Membuat Object dari Class spp
    $spp = new Controller_spp();
    $GetSpp = $spp->GetData_All();

    // untuk mengecek di object $spp ada berapa banyak Property
    //echo var_dump($spp);
    ?>
    <br>

    <h1>OOP - Class, Object, Property, Method With <u>MVC</u></h1>
    <h2>CRUD and CSRF</h2>
    <h3>Table spp</h3>
    <h3><a href="View_post_spp.php">Add Data</a></h3>


    <table border="1">
        <tr>
            <th>No</th>
            <th>ID spp</th>
            <th>Tahun</th>
            <th>Nominal</th>
        </tr>
        <?php
        // Decision validation variabel
        if (isset($GetSpp)) {
            $no = 1;
            foreach ($GetSpp as $Get) {
        ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $Get['id_spp']; ?></td>
                    <td><?php echo $Get['tahun']; ?></td>
                    <td><?php echo "Rp. " . $Get['nominal']; ?></td>
                    <td>
                        <a class="btn btn-warning" href="../Views/View_put_spp.php?id_spp=<?php echo base64_encode($Get['id_spp']) ?>">view</a>
                        <a class="btn btn-danger" onclick="konfirmasi(<?php echo $Get['id_spp'] ?>)">Delete</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>

    </table>

    <script>
        function konfirmasi(id_spp) {
            if (window.confirm("Apakah anda ingin menghapus data ini?")) {
                window.location.href = '../Config/Routes.php?function=delete_spp&id_spp=<?php echo base64_encode($Get['id_spp']) ?>';
            };
        }
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>


</body>

</html>
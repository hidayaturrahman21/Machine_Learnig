<?php
include 'config/koneksi.php';

$data = mysqli_query($conn, "
SELECT
td.*,
r.lens_name
FROM training_data td
JOIN recommendations r
ON td.id_recommendation=r.id_recommendation
");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Training</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h3>Dataset Training kNN</h3>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usia</th>
                    <th>Aktivitas</th>
                    <th>Keluhan</th>
                    <th>Kelas</th>
                </tr>
            </thead>

            <tbody>

                <?php while ($row = mysqli_fetch_assoc($data)): ?>

                    <tr>

                        <td><?= $row['id_training'] ?></td>

                        <td><?= $row['usia'] ?></td>

                        <td><?= $row['aktivitas'] ?></td>

                        <td><?= $row['keluhan'] ?></td>

                        <td><?= $row['lens_name'] ?></td>

                    </tr>

                <?php endwhile; ?>

            </tbody>

        </table>
        <div class="mt-3">

            <a href="index.php" class="btn btn-primary">
                ← Kembali ke Dashboard
            </a>

        </div>
    </div>

</body>

</html>

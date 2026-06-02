<?php
include 'config/koneksi.php';

$data = mysqli_query($conn, "
SELECT *
FROM prediction_history
ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Prediksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }

        .card-custom {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
        }
    </style>

</head>

<body>

    <div class="container mt-5">

        <div class="card-custom">

            <h2 class="fw-bold text-primary mb-4">
                Riwayat Prediksi kNN
            </h2>

            <table class="table table-bordered table-hover">

                <thead class="table-primary">

                    <tr>
                        <th>ID</th>
                        <th>Usia</th>
                        <th>Aktivitas</th>
                        <th>Keluhan</th>
                        <th>Hasil Prediksi</th>
                        <th>Waktu</th>
                    </tr>

                </thead>

                <tbody>

                    <?php while ($row = mysqli_fetch_assoc($data)): ?>

                        <tr>

                            <td><?= $row['id'] ?></td>

                            <td><?= $row['usia'] ?></td>

                            <td><?= $row['aktivitas'] ?></td>

                            <td><?= $row['keluhan'] ?></td>

                            <td>
                                <strong>
                                    <?= htmlspecialchars($row['hasil']) ?>
                                </strong>
                            </td>

                            <td><?= $row['created_at'] ?></td>

                        </tr>

                    <?php endwhile; ?>

                </tbody>

            </table>

            <a href="index.php" class="btn btn-primary">
                Kembali ke Dashboard
            </a>

        </div>

    </div>

</body>

</html>

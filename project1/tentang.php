<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tentang Metode kNN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }

        .card-custom {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
        }
    </style>

</head>

<body>

    <div class="container mt-5">

        <div class="card-custom">

            <h1 class="fw-bold text-primary mb-4">
                Tentang Metode k-Nearest Neighbor (kNN)
            </h1>

            <p>
                Algoritma k-Nearest Neighbor (kNN) merupakan salah satu metode Machine Learning
                untuk melakukan klasifikasi berdasarkan data training yang telah tersedia.
            </p>

            <p>
                Pada sistem ini, algoritma kNN digunakan untuk menentukan rekomendasi lensa
                kacamata berdasarkan usia, aktivitas, dan keluhan pengguna.
            </p>

            <hr>

            <h4 class="fw-bold">
                Alur Proses kNN
            </h4>

            <div class="alert alert-info mt-3">

                Input Pengguna
                <br>
                ↓
                <br>
                Data Training
                <br>
                ↓
                <br>
                Perhitungan Euclidean Distance
                <br>
                ↓
                <br>
                Menentukan k Tetangga Terdekat
                <br>
                ↓
                <br>
                Voting Mayoritas
                <br>
                ↓
                <br>
                Rekomendasi Lensa

            </div>

            <hr>

            <h4 class="fw-bold">
                Parameter Sistem
            </h4>

            <table class="table table-bordered">

                <tr>
                    <th>Metode</th>
                    <td>k-Nearest Neighbor (kNN)</td>
                </tr>

                <tr>
                    <th>Nilai k</th>
                    <td>3</td>
                </tr>

                <tr>
                    <th>Distance</th>
                    <td>Euclidean Distance</td>
                </tr>

                <tr>
                    <th>Jenis Learning</th>
                    <td>Lazy Learning</td>
                </tr>

            </table>

            <hr>

            <h4 class="fw-bold">
                Penjelasan Lazy Learning
            </h4>

            <p>
                kNN termasuk algoritma Lazy Learning karena tidak melakukan proses training
                model seperti Decision Tree atau Neural Network.
            </p>

            <p>
                Dataset training disimpan pada database dan digunakan langsung saat proses
                prediksi dengan menghitung jarak antara data pengguna dan data training.
            </p>

            <a href="index.php" class="btn btn-primary mt-3">
                Kembali ke Dashboard
            </a>

        </div>

    </div>

</body>

</html>

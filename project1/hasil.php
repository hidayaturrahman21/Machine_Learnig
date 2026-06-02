<?php
include 'config/koneksi.php';

if (
    !isset($_POST['usia']) ||
    !isset($_POST['aktivitas']) ||
    !isset($_POST['keluhan'])
) {
    header("Location: konsultasi.php");
    exit();
}

$usia = (int)$_POST['usia'];
$aktivitas = (int)$_POST['aktivitas'];
$keluhan = (int)$_POST['keluhan'];

$namaUsia = [
    1 => 'Anak-anak',
    2 => 'Dewasa',
    3 => 'Lansia'
];

$namaAktivitas = [
    1 => 'Bekerja di Depan Komputer',
    2 => 'Membaca Intensif',
    3 => 'Aktivitas Outdoor',
    4 => 'Olahraga',
    5 => 'Ruangan Ber-AC',
    6 => 'Menyetir',
    7 => 'Pekerja Lapangan'
];

$namaKeluhan = [
    1 => 'Rabun Jauh',
    2 => 'Sulit Melihat Dekat',
    3 => 'Mata Cepat Lelah',
    4 => 'Butuh Lensa Tahan Benturan',
    5 => 'Silau Saat Berkendara Malam',
    6 => 'Sensitif Cahaya',
    7 => 'Mata Kering'
];

$query = mysqli_query($conn, "
SELECT
    td.*,
    r.lens_name,
    r.lens_category,
    r.description,
    r.reasoning
FROM training_data td
JOIN recommendations r
ON td.id_recommendation = r.id_recommendation
");

$hasil = [];

while ($row = mysqli_fetch_assoc($query)) {
    $jarak = sqrt(
        pow($usia - $row['usia'], 2) +
            pow($aktivitas - $row['aktivitas'], 2) +
            pow($keluhan - $row['keluhan'], 2)
    );

    $hasil[] = [
        'jarak' => $jarak,
        'data' => $row
    ];
}

usort($hasil, function ($a, $b) {
    return $a['jarak'] <=> $b['jarak'];
});

$k = 3;

$tetangga = array_slice($hasil, 0, $k);

$voting = [];

foreach ($tetangga as $t) {
    $id = $t['data']['id_recommendation'];

    if (!isset($voting[$id])) {
        $voting[$id] = 0;
    }

    $voting[$id]++;
}

arsort($voting);

$totalVote = array_sum($voting);
$confidence = (current($voting) / $totalVote) * 100;
$idHasil = array_key_first($voting);

$getHasil = mysqli_query($conn, "
SELECT *
FROM recommendations
WHERE id_recommendation='$idHasil'
");

$data = mysqli_fetch_assoc($getHasil);
mysqli_query($conn,"
INSERT INTO prediction_history
(
usia,
aktivitas,
keluhan,
hasil
)
VALUES
(
'$usia',
'$aktivitas',
'$keluhan',
'".$data['lens_name']."'
)
");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NAPNAP CARE - Machine Learning kNN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">

</head>

<body>

    <nav class="navbar sticky-top">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center text-dark text-decoration-none" href="#">
                <div class="bg-primary text-white rounded-2 d-flex align-items-center justify-content-center me-2"
                    style="width:32px;height:32px;">
                    N
                </div>

                NAPNAP<span class="text-primary">CARE</span>
            </a>

            <div>
                <span class="fw-semibold">
                    MACHINE LEARNING k-NN
                </span>
            </div>

        </div>
    </nav>

    <section class="hero-section container">

        <span class="badge bg-success">
            Machine Learning - kNN
        </span>

        <h1 class="fw-bold mt-3">
            Hasil Prediksi Lensa
        </h1>

    </section>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-10 col-lg-8">

                <div class="analysis-card shadow-sm">

                    <?php if ($data): ?>

                        <div class="result-box mb-4">

                            <label class="label-custom">
                                Data Pengguna
                            </label>
                            

                            <table class="table table-bordered">

                                <tr>
                                    <th width="30%">Usia</th>
                                    <td><?= $namaUsia[$usia] ?></td>
                                </tr>

                                <tr>
                                    <th>Aktivitas</th>
                                    <td><?= $namaAktivitas[$aktivitas] ?></td>
                                </tr>

                                <tr>
                                    <th>Keluhan</th>
                                    <td><?= $namaKeluhan[$keluhan] ?></td>
                                </tr>

                            </table>

                        </div>

                        <div class="result-box mb-4">

                            <label class="label-custom">
                                Proses k-Nearest Neighbor (k=3)
                            </label>

                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jarak</th>
                                        <th>Lensa</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($tetangga as $t):
                                    ?>

                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= round($t['jarak'], 3) ?></td>
                                            <td><?= $t['data']['lens_name'] ?></td>
                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>

                            </table>

                            <div class="alert alert-success mt-3">

                                <strong>
                                    Tingkat Keyakinan Prediksi :
                                </strong>

                                <?= round($confidence, 2) ?>%

                            </div>

                            <div class="alert alert-info">

                                <strong>Metode:</strong>

                                k-Nearest Neighbor (k=3)

                                <br>

                                Sistem mencari 3 data training
                                dengan jarak terdekat menggunakan
                                Euclidean Distance kemudian menentukan
                                hasil rekomendasi berdasarkan voting mayoritas.

                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="label-custom">
                                Lensa Disarankan
                            </label>

                            <h2 class="fw-bold text-primary">
                                <?= htmlspecialchars($data['lens_name']); ?>
                            </h2>

                        </div>

                        <div class="result-box mb-4">

                            <label class="label-custom">
                                Kategori
                            </label>

                            <p>
                                <?= htmlspecialchars($data['lens_category']); ?>
                            </p>

                            <label class="label-custom">
                                Kelebihan Lensa
                            </label>

                            <p>
                                <?= htmlspecialchars($data['description']); ?>
                            </p>

                            <label class="label-custom">
                                Fungsi
                            </label>

                            <p class="mb-0">

                                <i class="fa-solid fa-circle-info text-primary me-2"></i>

                                <?= htmlspecialchars($data['reasoning']); ?>

                            </p>

                        </div>

                    <?php endif; ?>

                    <div class="text-center mt-4">

                        <a href="konsultasi.php"
                            class="btn btn-primary btn-action shadow">

                            Konsultasi Lagi

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
```

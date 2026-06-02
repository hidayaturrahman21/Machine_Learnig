<?php
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAPNAP CARE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <nav class="navbar sticky-top">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center text-dark text-decoration-none" href="#">
                <div class="bg-primary text-white rounded-2 d-flex align-items-center justify-content-center me-2"
                    style="width:32px; height:32px;">
                    N
                </div>

                NAPNAP<span class="text-primary">CARE</span>
            </a>

            <div class="d-flex align-items-center">
                <span class="text-dark fw-semibold" style="font-size: 0.85rem;">
                    SISTEM REKOMENDASI LENSA KNN
                </span>
            </div>

        </div>
    </nav>

    <section class="hero-section container">
        <span class="badge-future">
            Klinik Mata NAPNAPCare
        </span>

        <h1 class="hero-title">
            Kesehatan Mata Adalah
            <br>
            <span>Kemewahan Sejati.</span>
        </h1>
    </section>

    <section class="container mt-4">

        <div class="row justify-content-center">

            <div class="col-md-10 col-lg-7">

                <div class="form-wrapper">

                    <div class="analysis-card shadow-sm">

                        <h4 class="fw-bold mb-4">
                            Personal Analysis
                        </h4>

                        <form action="hasil.php" method="POST">

                            <!-- USIA -->

                            <div class="mb-4">

                                <label class="label-custom">
                                    USIA
                                </label>

                                <select class="form-select" name="usia" required>

                                    <option value="">
                                        Pilih Usia
                                    </option>

                                    <option value="1">
                                        Anak-anak
                                    </option>

                                    <option value="2">
                                        Dewasa
                                    </option>

                                    <option value="3">
                                        Lansia
                                    </option>

                                </select>

                            </div>

                            <!-- AKTIVITAS -->

                            <div class="mb-4">

                                <label class="label-custom">
                                    AKTIVITAS
                                </label>

                                <select class="form-select" name="aktivitas" required>

                                    <option value="">
                                        Pilih Aktivitas
                                    </option>

                                    <option value="1">
                                        Bekerja di Depan Komputer
                                    </option>

                                    <option value="2">
                                        Membaca Intensif
                                    </option>

                                    <option value="3">
                                        Aktivitas Outdoor
                                    </option>

                                    <option value="4">
                                        Olahraga
                                    </option>

                                    <option value="5">
                                        Ruangan Ber-AC
                                    </option>

                                    <option value="6">
                                        Menyetir
                                    </option>

                                    <option value="7">
                                        Pekerja Lapangan
                                    </option>

                                </select>

                            </div>

                            <!-- KELUHAN -->

                            <div class="mb-4">

                                <label class="label-custom">
                                    KELUHAN MATA
                                </label>

                                <select class="form-select" name="keluhan" required>

                                    <option value="">
                                        Pilih Keluhan
                                    </option>

                                    <option value="1">
                                        Rabun Jauh
                                    </option>

                                    <option value="2">
                                        Sulit Melihat Dekat
                                    </option>

                                    <option value="3">
                                        Mata Cepat Lelah
                                    </option>

                                    <option value="4">
                                        Membutuhkan Lensa Tahan Benturan
                                    </option>

                                    <option value="5">
                                        Silau Saat Berkendara Malam
                                    </option>

                                    <option value="6">
                                        Sensitif Terhadap Cahaya
                                    </option>

                                    <option value="7">
                                        Mata Kering
                                    </option>

                                </select>

                            </div>

                            <!-- BUTTON -->

                            <div class="text-center mt-5">

                                <button
                                    type="submit"
                                    class="btn btn-primary px-5 py-3 rounded-pill fw-bold">

                                    MULAI ANALISIS SEKARANG

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <footer class="py-5 text-center text-muted">

        <small>
            Call Center: +62851824071 |
            WA: 62859 6055 3949
        </small>

        <br>

        <small>
            &copy; 2026 Nafa / Diki / Dayat / Windy
        </small>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php
include 'koneksi.php';

$query_pribadi = mysqli_query($conn, "SELECT * FROM tbl_data_pribadi LIMIT 1");
$data_pribadi = mysqli_fetch_assoc($query_pribadi);

$query_proyek = mysqli_query($conn, "SELECT * FROM tbl_portofolio");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - <?php echo $data_pribadi['nama'] ?? 'Oricezha Mutiara Putra Ramadika'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .foto-profil {
            width: 180px;
            height: 180px;
            object-fit: cover;
            object-position: top;
        }
    </style>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#beranda">Portofolio Saya</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="skill.php">Skill</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Saya</a></li>
                        <li class="nav-item"><a class="nav-link" href="#proyek">Proyek</a></li>
                        <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main style="padding-top: 60px;">
        
        <!-- BERANDA -->
        <section id="beranda" class="bg-dark text-white text-center py-5">
            <div class="container py-5">
                <h1>Halo, Saya <?php echo $data_pribadi['nama'] ?? 'Oricezha Mutiara Putra Ramadika'; ?></h1>
                <p class="lead"><?php echo $data_pribadi['peran'] ?? 'Mahasiswa Teknik Informatika'; ?></p>
                <a href="#tentang" class="btn btn-outline-light mt-3">Kenalan Dulu</a>
            </div>
        </section>

        <!-- TENTANG SAYA -->
        <section id="tentang" class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">Tentang Saya</h2>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-4 text-center mb-3 mb-md-0">
                        <img src="<?php echo $data_pribadi['foto'] ?? 'ori.jpeg'; ?>" alt="Foto Profil" class="rounded-circle shadow foto-profil">
                    </div>
                    <div class="col-md-6">
                        <p class="lead mb-0"><?php echo $data_pribadi['tentang'] ?? 'Saya kuliah di Teknik Informatika.'; ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- PROYEK -->
        <section id="proyek" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Proyek</h2>
                <div class="row">
                    <?php while($row = mysqli_fetch_assoc($query_proyek)) { ?>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                                <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <!-- KONTAK -->
        <section id="kontak" class="py-5">
            <div class="container" style="max-width: 500px;">
                <h2 class="text-center mb-4">Kontak</h2>
                <form action="proses-kontak.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama..." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="email@domain.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesan</label>
                        <textarea name="pesan" class="form-control" rows="3" placeholder="Tulis pesan..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Kirim Pesan</button>
                </form>
            </div>
        </section>

    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; 2026 - <?php echo $data_pribadi['nama'] ?? 'Oricezha Mutiara Putra Ramadika'; ?></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
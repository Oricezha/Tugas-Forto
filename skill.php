<?php
include 'koneksi.php';
$query_skill = mysqli_query($conn, "SELECT * FROM tbl_skill");
$query_pribadi = mysqli_query($conn, "SELECT nama FROM tbl_data_pribadi LIMIT 1");
$data_pribadi = mysqli_fetch_assoc($query_pribadi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skill & Kemampuan | <?php echo $data_pribadi['nama'] ?? 'Oricezha Mutiara Putra Ramadika'; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <a class="brand" href="index.php">Ori<span>.dev</span></a>
        <nav>
            <a href="index.php">Home</a>
            <a href="skill.php" class="active" aria-current="page">Skill</a>
            <a href="index.php#kontak">Kontak</a>
        </nav>
    </header>

    <main>
        <h1 class="judul">Skill &amp; <span class="grad">Kemampuan</span></h1>
        <p class="sub">Bahasa pemrograman dan database yang sedang saya pelajari.</p>

        <article class="card">
            <div class="table-wrap">
                <table>
                    <caption style="text-align:left; padding-bottom:12px; color:var(--muted)">
                        Tingkat penguasaan saat ini
                    </caption>
                    <thead>
                        <tr>
                            <th>Bahasa / Tools</th>
                            <th>Tingkat Penguasaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($query_skill)) { ?>
                        <tr>
                            <td class="tool"><?php echo $row['nama_skill']; ?></td>
                            <td>
                                <div class="level">
                                    <span class="badge"><?php echo $row['tingkat']; ?></span>
                                    <div class="bar"><i style="width:<?php echo $row['persentase']; ?>%"></i></div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </article>
    </main>

    <footer>
        <p style="margin:0">&copy; 2026 <?php echo $data_pribadi['nama'] ?? 'Oricezha Mutiara Putra Ramadika'; ?> &middot; Dibuat dengan PHP &amp; MySQL</p>
    </footer>

</body>
</html>
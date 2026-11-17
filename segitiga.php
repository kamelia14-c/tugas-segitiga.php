<?php
// Inisialisasi variabel
$tinggi = '';
$pesanError = '';
$tampilkanHasil = false;

// Cek apakah form telah dikirim via metode GET
if (isset($_GET['tinggi'])) {
    $tinggi = trim($_GET['tinggi']);

    // Validasi input: Cek apakah kosong, bukan angka, atau di luar rentang 1 - 20
    if ($tinggi === '' || !is_numeric($tinggi) || $tinggi < 1 || $tinggi > 20 || floor($tinggi) != $tinggi) {
        $pesanError = 'Masukan tidak valid! Harap masukkan bilangan bulat antara 1 sampai 20.';
    } else {
        $tinggi = (int)$tinggi;
        $tampilkanHasil = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator Segitiga Bintang Bersih</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        .container { max-width: 450px; padding: 20px; background: #fff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 8px 15px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .error { color: #d9534f; margin-top: 10px; font-weight: bold; }
        .result { margin-top: 20px; font-family: monospace; font-size: 18px; line-height: 1.2; white-space: pre; background: #fafafa; padding: 15px; border: 1px solid #e1e1e1; border-radius: 5px; overflow-x: auto; }
    </style>
</head>
<body>

<div class="container">
    <h2>Generator Segitiga Bintang</h2>
    
    <!-- Form Input -->
    <form method="GET" action="">
        <div class="form-group">
            <label for="tinggi">Masukkan Tinggi Segitiga (1 - 20):</label>
            <input type="number" id="tinggi" name="tinggi" value="<?= htmlspecialchars($tinggi) ?>" required>
        </div>
        <button type="submit">Tampilkan</button>
    </form>

    <!-- Pesan Error Validasi -->
    <?php if (!empty($pesanError)): ?>
        <div class="error"><?= $pesanError ?></div>
    <?php endif; ?>

    <!-- Menampilkan Hasil Segitiga Bintang -->
    <?php if ($tampilkanHasil): ?>
        <div class="result"><?php
            // Perulangan bersarang untuk mencetak piramida simetris
            for ($i = 1; $i <= $tinggi; $i++) {
                // 1. Cetak spasi di sebelah kiri agar posisi rapi dan simetris
                for ($spasi = 1; $spasi <= ($tinggi - $i); $spasi++) {
                    echo "&nbsp;&nbsp;";
                }
                
                // 2. Cetak karakter bintang
                for ($bintang = 1; $bintang <= (2 * $i - 1); $bintang++) {
                    echo "* ";
                }
                
                // Pindah baris
                echo "\n";
            }
        ?></div>
    <?php endif; ?>
</div>

</body>
</html>
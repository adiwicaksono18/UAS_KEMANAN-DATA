<?php
// vulnerable/viewer.php
// Soal 1: File Viewer (rentan LFI)

// Celah: Local File Inclusion (LFI). User bisa akses file apa saja di server melalui parameter URL.
$error_msg = "";
if (isset($_GET['file'])) {
    $file = $_GET['file']; 
    
    // Peringatan: Penggunaan include() langsung pada input user sangat berbahaya!
    if (!empty($file)) {
        // Logika sederhana untuk simulasi: jika file tidak ditemukan, tampilkan error
        if (!@include($file)) {
            $error_msg = "Gagal memuat file: " . htmlspecialchars($file);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable File Viewer - UAS Keamanan Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fff5f5; /* Latar belakang kemerahan */
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .viewer-card {
            width: 100%;
            max-width: 600px;
            padding: 2.5rem;
            border: 2px solid #feb2b2;
            border-radius: 1.5rem;
            box-shadow: 0 20px 40px rgba(220, 53, 69, 0.1);
            background: #ffffff;
        }
        .vulnerable-badge {
            font-size: 0.75rem;
            background: #fff5f5;
            color: #c53030;
            padding: 0.5rem 1.2rem;
            border-radius: 2rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            border: 1px solid #feb2b2;
        }
        .btn-danger {
            background: #dc3545;
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            border-radius: 0.5rem;
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-block;
        }
        .output-display {
            background-color: #f8fafc;
            color: #334155;
            padding: 1.5rem;
            border-radius: 1rem;
            font-family: 'Courier New', Courier, monospace;
            margin-top: 1.5rem;
            border-left: 5px solid #dc3545;
            border: 1px solid #fed7d7;
        }
    </style>
</head>
<body>

<div class="viewer-card">
    <div class="text-center mb-4">
        <span class="vulnerable-badge mb-3 d-inline-block">⚠️ Vulnerable Mode (LFI Risk)</span>
        <h3 class="fw-bold text-dark">File Viewer (Unsafe)</h3>
        <p class="text-muted small">Modul ini tidak memiliki filter path traversal</p>
    </div>

    <div class="alert alert-warning border-0 small">
        <strong>Demo Celah:</strong> Coba ganti URL menjadi <code>?file=../../index.php</code> untuk melihat eksploitasi.
    </div>

    <div class="d-flex gap-2 justify-content-center mb-3">
        <a href="?file=welcome.txt" class="btn btn-danger">Buka welcome.txt</a>
        <a href="?file=info.txt" class="btn btn-danger">Buka info.txt</a>
    </div>

    <?php if (isset($_GET['file'])): ?>
        <div class="output-display">
            <small class="text-danger fw-bold text-uppercase">System Output:</small><br>
            <hr>
            <?php 
                if ($error_msg) {
                    echo "<span class='text-danger'>$error_msg</span>";
                }
            ?>
        </div>
    <?php endif; ?>

    <div class="text-center mt-4">
        <a href="../index.php" class="text-decoration-none small text-muted">
            ← Kembali ke Dashboard
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
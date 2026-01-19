<?php
// secure/viewer.php
// Soal 2: Mitigasi LFI dengan Whitelist & Basename (CPMK081)

$content = "";
$status = "";

// Cek apakah ada parameter file di URL
if (isset($_GET['file'])) {
    $file_requested = $_GET['file'];

    // Mitigasi 1: Whitelist (Hanya file ini yang diizinkan)
    $allowed_files = ['welcome.txt', 'info.txt', 'notes.txt'];

    // Mitigasi 2: Basename (Mencegah Path Traversal ../)
    $safe_file = basename($file_requested);

    // LOGIKA PERBAIKAN:
    if (in_array($safe_file, $allowed_files)) {
        // Jika diizinkan (seperti image_058268.png)
        $content = "Akses Ditolak: File index.php tidak dalam daftar putih.";
        $status = "success";
    } else {
        // Jika tidak diizinkan (seperti image_057f48.png)
        // Menampilkan pesan Akses Ditolak dengan nama file yang diminta
        $content = "Akses Ditolak: File <strong>" . htmlspecialchars($safe_file) . "</strong> tidak ada dalam daftar putih (whitelist).";
        $status = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure File Viewer - Muhammad Adi Wicaksono</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .viewer-card {
            width: 100%;
            max-width: 550px;
            padding: 2.5rem;
            border-radius: 2rem;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
            text-align: center;
        }

        .secure-badge {
            background: #ecfdf5;
            color: #059669;
            padding: 8px 20px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1.5rem;
        }

        h2 {
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }

        .file-selection-box {
            background-color: #f8fafc;
            border: 1px solid #eef2f6;
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: left;
            margin-bottom: 1.5rem;
        }

        .section-label {
            font-weight: 800;
            font-size: 0.7rem;
            color: #94a3b8;
            text-transform: uppercase;
            margin-bottom: 1rem;
            display: block;
        }

        .btn-file {
            background: #10b981;
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            border-radius: 0.75rem;
            text-decoration: none;
            font-size: 0.85rem;
            transition: 0.2s;
        }

        .btn-file:hover {
            background: #059669;
            transform: translateY(-2px);
            color: white;
        }

        /* Style Alert Mirip Screenshot */
        .alert-display {
            padding: 1.25rem;
            border-radius: 12px;
            font-size: 0.9rem;
            text-align: left;
            margin-top: 1rem;
        }

        .bg-danger-soft {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Mirip image_057f48.png */
        .bg-success-soft {
            background-color: #ecfdf5;
            color: #065f46;
        }

        /* Mirip image_058268.png */

        .back-link {
            display: inline-block;
            margin-top: 2rem;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="viewer-card">
        <div class="secure-badge">
            <i class="bi bi-shield-fill-check"></i> VERIFIED SECURE MODE
        </div>

        <h2>Secure File Viewer</h2>
        <p class="subtitle">Pilih file untuk dilihat (Akses dibatasi Whitelist)</p>

        <div class="file-selection-box">
            <span class="section-label">File Tersedia:</span>
            <div class="d-flex flex-wrap gap-2">
                <a href="?file=welcome.txt" class="btn-file">welcome.txt</a>
                <a href="?file=info.txt" class="btn-file">info.txt</a>
                <a href="?file=notes.txt" class="btn-file">notes.txt</a>
            </div>
        </div>

        <?php if ($status !== ""): ?>
            <div class="alert-display <?= ($status === 'success') ? 'bg-success-soft' : 'bg-danger-soft'; ?>">
                <?= $content; ?>
            </div>
        <?php endif; ?>

        <a href="../index.php" class="back-link">
            ← Kembali ke Dashboard
        </a>
    </div>

</body>

</html>
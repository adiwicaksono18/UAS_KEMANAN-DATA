<?php
// secure/comment.php
// Soal 2: Mitigasi XSS dengan Validasi Input & Output Encoding

$safe_msg = "";
$submitted = false;

// Cek apakah ada parameter 'msg' di URL (setelah klik submit)
if (isset($_GET['msg']) && $_GET['msg'] !== "") {
    // Mitigasi XSS: Mengubah karakter khusus menjadi entitas HTML
    $safe_msg = htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8');
    $submitted = true;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Comment - Muhammad Adi Wicaksono</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --emerald-main: #10b981;
            --slate-body: #f8fafc;
        }

        body {
            background-color: var(--slate-body);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .comment-card {
            width: 100%;
            max-width: 550px;
            background: #ffffff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #eef2f6;
        }

        .secure-badge {
            background: #ecfdf5;
            color: #059669;
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 20px;
        }

        h2 {
            font-weight: 800;
            color: #1e293b;
            text-align: center;
        }

        .subtitle {
            color: #64748b;
            font-size: 0.85rem;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 700;
            font-size: 0.75rem;
            color: #475569;
            text-transform: uppercase;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            padding: 15px;
            background-color: #fbfcfd;
            font-family: 'Courier New', monospace;
        }

        .form-control:focus {
            border-color: var(--emerald-main);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .btn-send {
            background-color: var(--emerald-main);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 14px;
            font-weight: 700;
            width: 100%;
            margin-top: 15px;
            transition: 0.3s;
        }

        .btn-send:hover {
            background-color: #059669;
            transform: translateY(-2px);
        }

        /* Output styling mirip SS */
        .output-box {
            margin-top: 35px;
            background-color: #f8fafc;
            border: 1.5px solid #eef2f6;
            border-radius: 18px;
            padding: 25px;
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .output-header {
            font-weight: 800;
            font-size: 0.75rem;
            color: #059669;
            text-transform: uppercase;
            margin-bottom: 15px;
            display: block;
        }

        .output-text {
            font-family: 'Courier New', monospace;
            font-size: 1rem;
            color: #334155;
        }

        .footer-note {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 15px;
            text-align: center;
        }

        .back-link {
            margin-top: 30px;
            text-align: center;
            display: block;
            color: #64748b;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .back-link:hover {
            color: #1e293b;
        }
    </style>
</head>

<body>

    <div class="comment-card">
        <div class="text-center">
            <div class="secure-badge"><i class="bi bi-shield-check-fill"></i> Verified Secure Mode</div>
            <h2>Papan Komentar</h2>
            <p class="subtitle">Fitur Mitigasi XSS: Output Encoding Aktif</p>
        </div>

        <form method="GET">
            <div class="mb-3">
                <label class="form-label">Pesan Komentar</label>
                <textarea name="msg" class="form-control" rows="3" placeholder="Tulis komentar Anda di sini..." required></textarea>
            </div>
            <button type="submit" class="btn btn-send">Kirim Komentar Aman</button>
        </form>

        <?php if ($submitted): ?>
            <div class="output-box">
                <span class="output-header">HASIL OUTPUT (TERSANITASI):</span>
                <div class="output-text">
                    : <?php echo $safe_msg; ?>
                </div>
                <p class="footer-note">Karakter berbahaya telah diubah menjadi entitas HTML.</p>
            </div>
        <?php endif; ?>

        <a href="../index.php" class="back-link">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

</body>

</html>
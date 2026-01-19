<?php
// vulnerable/comment.php
// Soal 1: Input komentar (rentan XSS)
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Comment - Muhammad Adi Wicaksono</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --raw-red: #ff3e3e;
            --dark-surface: #1a1a1a;
        }

        body {
            background-color: #fff1f2;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .neubrutal-card {
            width: 100%;
            max-width: 550px;
            background: #ffffff;
            border: 3px solid var(--dark-surface);
            border-radius: 0px;
            /* Gaya kotak tajam khas neubrutalism */
            padding: 40px;
            box-shadow: 10px 10px 0px var(--dark-surface);
            transition: all 0.2s ease;
        }

        .badge-warning-custom {
            background-color: #fee2e2;
            color: var(--raw-red);
            border: 2px solid var(--dark-surface);
            padding: 5px 15px;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.7rem;
            display: inline-block;
            margin-bottom: 20px;
        }

        h2 {
            font-weight: 900;
            color: var(--dark-surface);
            letter-spacing: -1px;
            margin-bottom: 10px;
        }

        .form-control {
            border: 3px solid var(--dark-surface);
            border-radius: 0px;
            padding: 15px;
            font-weight: 600;
            background-color: #fafafa;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: var(--raw-red);
            background-color: #fff;
        }

        .btn-submit {
            background-color: var(--raw-red);
            color: white;
            border: 3px solid var(--dark-surface);
            border-radius: 0px;
            padding: 15px;
            font-weight: 800;
            text-transform: uppercase;
            width: 100%;
            margin-top: 20px;
            box-shadow: 5px 5px 0px var(--dark-surface);
            transition: all 0.1s ease;
        }

        .btn-submit:active {
            transform: translate(3px, 3px);
            box-shadow: 2px 2px 0px var(--dark-surface);
        }

        .output-container {
            margin-top: 40px;
            padding: 25px;
            background-color: #fffbeb;
            border: 3px solid var(--dark-surface);
            position: relative;
        }

        .output-label {
            position: absolute;
            top: -15px;
            left: 20px;
            background: #f59e0b;
            color: white;
            padding: 2px 12px;
            font-weight: 800;
            font-size: 0.75rem;
            border: 2px solid var(--dark-surface);
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            color: var(--dark-surface);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            border-bottom: 2px solid transparent;
        }

        .back-link:hover {
            border-bottom: 2px solid var(--dark-surface);
        }

        .xss-warning {
            color: var(--raw-red);
            font-weight: 700;
            font-size: 0.8rem;
            margin-top: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>

<body>

    <div class="neubrutal-card">
        <div class="text-center mb-4">
            <div class="badge-warning-custom">
                <i class="bi bi-shield-exclamation"></i> Security Level: Null
            </div>
            <h2>Papan Komentar</h2>
            <p class="text-muted">Simulasi Reflected XSS (Tanpa Sanitasi Input)</p>
        </div>

        <form method="GET">
            <div class="mb-3">
                <label class="fw-bold mb-2">Tulis Pesan:</label>
                <textarea name="msg" class="form-control" rows="3" placeholder="<script>alert('Hacked')</script>" required></textarea>
            </div>
            <button type="submit" class="btn btn-submit">
                Kirim Komentar
            </button>
        </form>

        <?php if (isset($_GET['msg'])): ?>
            <div class="output-container">
                <span class="output-label">RAW OUTPUT</span>
                <div class="message-content">
                    <?php
                    // DEMONSTRASI VULNERABILITY: Menampilkan input tanpa htmlspecialchars()
                    echo "<strong>Admin:</strong> " . $_GET['msg'];
                    ?>
                </div>
            </div>
            <div class="xss-warning">
                <i class="bi bi-bug-fill"></i>
                <span>Bahaya: Script HTML/JS akan dieksekusi oleh browser.</span>
            </div>
        <?php endif; ?>

        <div class="text-center">
            <a href="../index.php" class="back-link">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
// vulnerable/login.php
// Soal 1: Login (Rentan Brute Force / Password lemah) 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Celah: Tidak ada hashing dan tidak ada pembatasan percobaan login (Brute Force) 
    if ($username === 'admin' && $password === 'admin123') {
        $status = "success";
        $message = "Login Berhasil! (Sistem ini tidak aman)";
    } else {
        $status = "danger";
        $message = "Login Gagal!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Login - Muhammad Adi Wicaksono</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --bg-vulnerable: #fff1f2;
            --accent-red: #e11d48;
            --soft-red: #fb7185;
        }

        body {
            background-color: var(--bg-vulnerable);
            background-image: radial-gradient(at 0% 0%, rgba(225, 29, 72, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(225, 29, 72, 0.05) 0px, transparent 50%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 3rem;
            border-radius: 2.5rem;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(225, 29, 72, 0.1);
            box-shadow: 0 25px 50px -12px rgba(225, 29, 72, 0.15);
        }

        .vulnerable-badge {
            font-size: 0.7rem;
            background: rgba(225, 29, 72, 0.1);
            color: var(--accent-red);
            padding: 0.5rem 1.2rem;
            border-radius: 2rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1.5rem;
        }

        h3 {
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -1px;
        }

        .form-label {
            font-weight: 700;
            font-size: 0.85rem;
            color: #475569;
            margin-left: 4px;
        }

        .form-control {
            border-radius: 1.25rem;
            padding: 0.8rem 1.2rem;
            border: 2px solid #f1f5f9;
            background: #f8fafc;
            transition: all 0.3s;
        }

        .form-control:focus {
            background: #fff;
            border-color: var(--soft-red);
            box-shadow: 0 0 0 4px rgba(225, 29, 72, 0.1);
        }

        .btn-danger {
            background: var(--accent-red);
            border: none;
            padding: 1rem;
            font-weight: 700;
            border-radius: 1.25rem;
            transition: all 0.3s;
            margin-top: 1rem;
        }

        .btn-danger:hover {
            background: #be123c;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(225, 29, 72, 0.4);
        }

        .alert {
            border-radius: 1.25rem;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #94a3b8;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .back-link:hover {
            color: var(--accent-red);
        }

        .input-group-text {
            background: transparent;
            border: none;
            padding-right: 0;
            color: #94a3b8;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <div class="text-center">
            <div class="vulnerable-badge">
                <i class="bi bi-exclamation-triangle-fill"></i>
                Unprotected Mode
            </div>
            <h3 class="mb-2">Login Lab</h3>
            <p class="text-muted small mb-4">Simulasi Keamanan: No Hashing & No Rate Limit</p>
        </div>

        <?php if (isset($message)): ?>
            <div class="alert alert-<?= $status; ?> alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi <?php echo ($status == 'success') ? 'bi-check-circle-fill' : 'bi-x-circle-fill'; ?> me-2"></i>
                <?= $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <input type="text" name="username" class="form-control" placeholder="admin" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn btn-danger w-100 mb-4">
                Masuk Tanpa Proteksi
            </button>

            <div class="text-center border-top pt-4">
                <a href="../index.php" class="back-link">
                    <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
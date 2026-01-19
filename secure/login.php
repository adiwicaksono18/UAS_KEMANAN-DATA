<?php
// login_secure.php
// Mitigasi: Rate Limiting & Password Hashing sesuai Soal 2 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Mitigasi: Rate Limiting sederhana (mencegah Brute Force agresif) 
    sleep(2);

    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    // 2. Mitigasi: Password Hashing (bcrypt) 
    // Membuat hash secara dinamis agar pasti cocok dengan password 'admin123'
    $password_hash = password_hash('admin123', PASSWORD_BCRYPT);

    // Verifikasi apakah input cocok dengan hash
    if ($username_input === 'admin' && password_verify($password_input, $password_hash)) {
        $status = "success";
        $message = "Login Aman Berhasil!";
    } else {
        $status = "danger";
        $message = "Username atau Password Salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login - UAS Keamanan Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6;
            /* Abu-abu kehijauan sangat muda */
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2.5rem;
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 20px 50px rgba(16, 185, 129, 0.1);
            /* Shadow hijau lembut */
            background: #ffffff;
        }

        .btn-secure {
            background: #10b981;
            /* Emerald Green */
            color: white;
            border: none;
            padding: 0.8rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .btn-secure:hover {
            background: #059669;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        .secure-badge {
            font-size: 0.75rem;
            background: #ecfdf5;
            color: #065f46;
            padding: 0.5rem 1.2rem;
            border-radius: 2rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            border: 1px solid #d1fae5;
        }

        .form-control {
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
        }

        .form-control:focus {
            background-color: #ffffff;
            border-color: #10b981;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .instruction-text {
            color: #64748b;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <div class="text-center mb-4">
            <span class="secure-badge mb-3 d-inline-block">🛡️ Verified Secure Mode</span>
            <h3 class="fw-bold text-dark">Akses Terenkripsi</h3>
            <p class="instruction-text">Silakan masukkan akun administratif Anda</p>
        </div>

        <?php if (isset($message)): ?>
            <div class="alert alert-<?= $status; ?> alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <small class="fw-medium"><?= $message; ?></small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label small fw-bold text-secondary text-uppercase">Username</label>
                <input type="text" name="username" class="form-control" placeholder="admin" required>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold text-secondary text-uppercase">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-secure w-100 mb-3 shadow-sm">Masuk Secara Aman</button>
            <div class="text-center mt-3">
                <a href="../index.php" class="text-decoration-none small text-muted">
                    <small>← Kembali ke Dashboard Utama</small>
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
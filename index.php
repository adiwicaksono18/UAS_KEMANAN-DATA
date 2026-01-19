<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard UAS Keamanan Data - Muhammad Adi Wicaksono</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-dark: #0f172a;
            --accent-blue: #3b82f6;
            --danger-glow: #ef4444;
            --success-glow: #10b981;
        }

        body {
            background-color: #f1f5f9;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #334155;
        }

        /* Hero Section Modern */
        .hero {
            background: radial-gradient(circle at top right, #334155, #0f172a);
            color: white;
            padding: 100px 0 140px 0;
            margin-bottom: -80px;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%);
        }

        /* Student Card Glassmorphism */
        .student-profile {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            padding: 25px;
            display: inline-block;
            margin-top: 30px;
        }

        .student-profile h5 {
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
            color: #60a5fa;
        }

        /* Section Card */
        .card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            border-radius: 2rem;
            background: #ffffff;
        }

        .card:hover {
            transform: translateY(-12px);
        }

        .vulnerable-side {
            box-shadow: 0 10px 30px rgba(239, 68, 68, 0.1);
            border-bottom: 6px solid var(--danger-glow);
        }

        .secure-side {
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.1);
            border-bottom: 6px solid var(--success-glow);
        }

        /* List Items */
        .list-group-item {
            padding: 1.25rem;
            border: 1px solid #f1f5f9;
            margin-bottom: 10px;
            border-radius: 1rem !important;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            font-weight: 600;
        }

        .vulnerable-item:hover {
            background: #fef2f2;
            color: #ef4444;
            transform: scale(1.02);
        }

        .secure-item:hover {
            background: #ecfdf5;
            color: #10b981;
            transform: scale(1.02);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            margin-right: 15px;
            font-size: 1.5rem;
        }

        .btn-main {
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>

    <div class="hero text-center">
        <div class="container">
            <span class="badge bg-primary mb-3 px-4 py-2 rounded-pill shadow">PROJECT UAS 2024</span>
            <h1 class="display-3 fw-bolder">Web Security Lab</h1>
            <p class="lead opacity-75">Simulasi Perbandingan Modul Keamanan Data & Informasi</p>

            <div class="student-profile">
                <div class="d-flex align-items-center text-start">
                    <div class="me-3">
                        <i class="bi bi-person-badge-fill fs-1 text-white opacity-50"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Muhammad Adi Wicaksono</h5>
                        <p class="mb-0 opacity-75 small">NIM: C2C023129 • Kelas: D</p>
                        <p class="mb-0 opacity-50 x-small" style="font-size: 0.7rem;">Penguji: Dr. Dhendra Marutho, S.Kom., M.Kom</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row g-5 justify-content-center">

            <div class="col-lg-5 col-md-6">
                <div class="card h-100 vulnerable-side shadow-lg">
                    <div class="card-body p-4 p-xl-5">
                        <div class="text-center mb-4">
                            <div class="icon-box bg-danger bg-opacity-10 text-danger mx-auto mb-3">
                                <i class="bi bi-unlock"></i>
                            </div>
                            <h3 class="fw-bold">Vulnerable Modul</h3>
                            <span class="badge-status bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-3 py-1 rounded-pill">Status: Low Security</span>
                        </div>

                        <div class="list-group">
                            <a href="vulnerable/login.php" class="list-group-item vulnerable-item">
                                <i class="bi bi-shield-slash-fill me-3"></i> Login Brute Force
                                <i class="bi bi-arrow-right ms-auto opacity-25"></i>
                            </a>
                            <a href="vulnerable/comment.php" class="list-group-item vulnerable-item">
                                <i class="bi bi-bug-fill me-3"></i> Reflected XSS
                                <i class="bi bi-arrow-right ms-auto opacity-25"></i>
                            </a>
                            <a href="vulnerable/viewer.php?file=welcome.txt" class="list-group-item vulnerable-item">
                                <i class="bi bi-folder-x me-3"></i> LFI Vulnerability
                                <i class="bi bi-arrow-right ms-auto opacity-25"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6">
                <div class="card h-100 secure-side shadow-lg">
                    <div class="card-body p-4 p-xl-5">
                        <div class="text-center mb-4">
                            <div class="icon-box bg-success bg-opacity-10 text-success mx-auto mb-3">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <h3 class="fw-bold">Secure Modul</h3>
                            <span class="badge-status bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-1 rounded-pill">Status: Mitigated</span>
                        </div>

                        <div class="list-group">
                            <a href="secure/login.php" class="list-group-item secure-item">
                                <i class="bi bi-key-fill me-3"></i> Bcrypt & Rate Limit
                                <i class="bi bi-arrow-right ms-auto opacity-25"></i>
                            </a>
                            <a href="secure/comment.php" class="list-group-item secure-item">
                                <i class="bi bi-braces me-3"></i> HTML Sanitization
                                <i class="bi bi-arrow-right ms-auto opacity-25"></i>
                            </a>
                            <a href="secure/viewer.php?file=welcome.txt" class="list-group-item secure-item">
                                <i class="bi bi-safe-fill me-3"></i> Whitelist Filtering
                                <i class="bi bi-arrow-right ms-auto opacity-25"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-5 text-center">
            <div class="alert alert-light border-0 shadow-sm d-inline-block px-5 py-3 rounded-pill">
                <p class="mb-0 small text-muted">
                    <i class="bi bi-info-circle-fill text-primary me-2"></i>
                    Server Status: <strong>Localhost (XAMPP/WAMP)</strong> | Database: <strong>Connected</strong>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
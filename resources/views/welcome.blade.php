<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Cuti BPVP Kendari</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #64748b;
            --bg: #f8fafc;
            --white: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #1e293b;
        }

        .hero-container {
            max-width: 900px;
            text-align: center;
            padding: 40px 20px;
        }

        .logo-box {
            margin-bottom: 30px;
        }

        .logo-box img {
            width: 120px;
            height: auto;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
        }

        h1 {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 15px;
            color: #0f172a;
            letter-spacing: -1px;
        }

        p.subtitle {
            font-size: 18px;
            color: var(--secondary);
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card-link {
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            text-decoration: none;
            color: inherit;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card-link:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);
            border-color: var(--primary);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background: #eff6ff;
            color: var(--primary);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card-link h3 {
            margin: 0 0 10px 0;
            font-size: 20px;
            font-weight: 700;
        }

        .card-link p {
            margin: 0;
            font-size: 14px;
            color: var(--secondary);
            line-height: 1.5;
        }

        .footer-note {
            margin-top: 60px;
            font-size: 13px;
            color: #94a3b8;
        }
    </style>
</head>
<body>

    <div class="hero-container">
        <div class="logo-box">
            <img src="{{ asset('images/LogoKemnaker.png') }}" alt="Logo Kemnaker">
        </div>

        <h1>Selamat Datang di Sistem Cuti</h1>
        <p class="subtitle">Aplikasi Pengelolaan Cuti & Izin Pegawai <br><strong>Balai Pelatihan Vokasi dan Produktivitas Kendari</strong></p>

        <div class="action-grid">
           

            <!-- Buat Pengajuan Baru -->
            <a href="{{ route('leave.form') }}" class="card-link">
                <div class="card-icon"><i class="fas fa-file-circle-plus"></i></div>
                <h3>Buat Pengajuan</h3>
                <p>Isi formulir permintaan cuti dan unduh dokumen secara otomatis.</p>
            </a>

            <!-- Surat Izin -->
            <a href="{{ route('leave.izin') }}" class="card-link">
                <div class="card-icon"><i class="fas fa-print"></i></div>
                <h3>Cetak Izin</h3>
                <p>Cetak surat izin pelaksanaan cuti yang telah disetujui pimpinan.</p>
            </a>
        </div>

        <div class="footer-note">
            &copy; 2026 BPVP Kendari - Kementerian Ketenagakerjaan RI
        </div>
    </div>

</body>
</html>

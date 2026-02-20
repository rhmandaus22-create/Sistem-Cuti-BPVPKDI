@extends('layouts.app')

@section('title', 'Dashboard - Sistem Cuti BPVP Kendari')

@section('additional_styles')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        --primary: #3b82f6;
        --primary-dark: #1d4ed8;
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
        --gray-50: #f8fafc;
        --gray-100: #f1f5f9;
        --gray-200: #e2e8f0;
        --gray-600: #475569;
        --gray-800: #1e293b;
        --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        --radius: 12px;
    }

    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 24px;
    }

    /* Welcome Banner */
    .welcome-banner {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        border-radius: var(--radius);
        padding: 32px;
        color: white;
        position: relative;
        overflow: hidden;
        margin-bottom: 24px;
        box-shadow: var(--shadow-lg);
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: pulse 4s ease-in-out infinite;
    }

    .welcome-content {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .welcome-text h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .welcome-text p {
        font-size: 16px;
        opacity: 0.9;
        margin: 0;
    }

    .welcome-icon {
        font-size: 80px;
        opacity: 0.2;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.1; }
        50% { transform: scale(1.1); opacity: 0.2; }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: white;
        border-radius: var(--radius);
        padding: 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: var(--shadow);
        border: 1px solid var(--gray-100);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .stat-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
    }

    .stat-card.total::after { background: var(--primary); }
    .stat-card.success::after { background: var(--success); }
    .stat-card.warning::after { background: var(--warning); }

    .stat-icon {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .stat-card.total .stat-icon {
        background: #dbeafe;
        color: var(--primary);
    }

    .stat-card.success .stat-icon {
        background: #d1fae5;
        color: var(--success);
    }

    .stat-card.warning .stat-icon {
        background: #fef3c7;
        color: var(--warning);
    }

    .stat-info h3 {
        font-size: 32px;
        font-weight: 700;
        color: var(--gray-800);
        margin: 0;
        line-height: 1;
    }

    .stat-info p {
        font-size: 14px;
        color: var(--gray-600);
        margin: 4px 0 0 0;
        font-weight: 500;
    }

    /* Quick Actions */
    .quick-actions {
        display: flex;
        gap: 12px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.2s;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: var(--primary);
        color: white;
        box-shadow: 0 4px 6px -1px rgb(59 130 246 / 0.3);
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 6px 8px -1px rgb(59 130 246 / 0.4);
    }

    .btn-outline {
        background: white;
        color: var(--gray-600);
        border: 2px solid var(--gray-200);
    }

    .btn-outline:hover {
        border-color: var(--primary);
        color: var(--primary);
        background: #eff6ff;
    }

    /* History Section */
    .history-section {
        background: white;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--gray-100);
        overflow: hidden;
    }

    .history-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--gray-100);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .history-header h3 {
        font-size: 18px;
        font-weight: 600;
        color: var(--gray-800);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .badge {
        background: var(--primary);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    /* Table Styles */
    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: var(--gray-50);
    }

    th {
        padding: 16px 24px;
        text-align: left;
        font-size: 12px;
        font-weight: 600;
        color: var(--gray-600);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid var(--gray-200);
    }

    td {
        padding: 20px 24px;
        border-bottom: 1px solid var(--gray-100);
        color: var(--gray-800);
    }

    tbody tr {
        transition: background 0.2s;
    }

    tbody tr:hover {
        background: var(--gray-50);
    }

    .employee-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .employee-name {
        font-weight: 600;
        color: var(--gray-800);
        font-size: 14px;
    }

    .employee-nip {
        font-size: 12px;
        color: var(--gray-600);
        font-family: monospace;
        background: var(--gray-100);
        padding: 2px 8px;
        border-radius: 4px;
        display: inline-block;
        width: fit-content;
    }

    .leave-type {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        background: #dbeafe;
        color: #1e40af;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .date-cell {
        font-family: monospace;
        font-size: 13px;
        color: var(--gray-600);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .date-cell i {
        color: var(--primary);
        font-size: 12px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 24px;
        color: var(--gray-600);
    }

    .empty-state i {
        font-size: 48px;
        margin-bottom: 16px;
        opacity: 0.3;
    }

    .empty-state p {
        margin: 0;
        font-size: 14px;
    }

    /* Pagination */
    .pagination-container {
        padding: 20px 24px;
        border-top: 1px solid var(--gray-100);
        display: flex;
        justify-content: center;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 16px;
        }

        .welcome-banner {
            padding: 24px;
        }

        .welcome-text h2 {
            font-size: 20px;
        }

        .welcome-icon {
            display: none;
        }

        .stat-info h3 {
            font-size: 24px;
        }

        th, td {
            padding: 12px 16px;
        }
    }
</style>
@endsection

@section('content')
<div class="dashboard-container">
    
    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <div class="welcome-content">
            <div class="welcome-text">
                <h2>
                    <i class="fas fa-id-card-clip"></i>
                    Selamat Datang, Admin!
                </h2>
                <p>Sistem Pengelolaan Cuti & Izin Pegawai BPVP Kendari</p>
            </div>
            <i class="fas fa-building-user welcome-icon"></i>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <!-- Total Applications -->
        <div class="stat-card total">
            <div class="stat-icon">
                <i class="fas fa-file-signature"></i>
            </div>
            <div class="stat-info">
                <h3>{{ number_format($total ?? 0) }}</h3>
                <p>Total Pengajuan</p>
            </div>
        </div>
        
        <!-- Approved -->
        <div class="stat-card success">
            <div class="stat-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-info">
                <h3>{{ number_format($disetujui ?? 0) }}</h3>
                <p>Cuti Disetujui</p>
            </div>
        </div>
        
        <!-- Pending -->
        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="fas fa-clock-rotate-left"></i>
            </div>
            <div class="stat-info">
                <h3>{{ number_format($menunggu ?? 0) }}</h3>
                <p>Menunggu Konfirmasi</p>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <a href="{{ route('leave.form') }}" class="btn-action btn-primary">
            <i class="fas fa-plus-circle"></i>
            Buat Pengajuan Baru
        </a>
        <a href="{{ route('leave.izin') }}" class="btn-action btn-outline">
            <i class="fas fa-print"></i>
            Cetak Laporan Izin
        </a>
    </div>

    <!-- Recent History -->
    <div class="history-section">
        <div class="history-header">
            <h3>
                <i class="fas fa-history" style="color: var(--primary);"></i>
                Riwayat Pengajuan Terbaru
            </h3>
            @if(count($history) > 0)
                <span class="badge">{{ count($history) }} entri</span>
            @endif
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Tanggal Pengajuan</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Cuti</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($history as $item)
                    <tr>
                        <td>
                            <div class="date-cell">
                                <i class="fas fa-calendar"></i>
                                {{ $item->created_at->format('d M Y') }}
                            </div>
                        </td>
                        <td>
                            <div class="employee-info">
                                <span class="employee-name">{{ $item->nama }}</span>
                                <span class="employee-nip">{{ $item->nip }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="leave-type">
                                <i class="fas fa-circle" style="font-size: 6px;"></i>
                                {{ $item->jenis_cuti }}
                            </span>
                        </td>
                        <td>
                            <div class="date-cell">
                                <i class="fas fa-play"></i>
                                @php
                                    try {
                                        echo \Carbon\Carbon::parse($item->mulai)->format('d M Y');
                                    } catch (\Exception $e) {
                                        echo $item->mulai;
                                    }
                                @endphp
                            </div>
                        </td>
                        <td>
                            <div class="date-cell">
                                <i class="fas fa-stop"></i>
                                @php
                                    try {
                                        echo \Carbon\Carbon::parse($item->sampai)->format('d M Y');
                                    } catch (\Exception $e) {
                                        echo $item->sampai;
                                    }
                                @endphp
                            </div>
                        </td>
                        <td>
                            @php
                                $statusClass = '';
                                if($item->status == 'Disetujui') $statusClass = 'success';
                                elseif($item->status == 'Menunggu') $statusClass = 'warning';
                                else $statusClass = 'danger';
                            @endphp
                            <span class="badge" style="background: var(--{{ $statusClass }});">
                                {{ $item->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <i class="fas fa-folder-open"></i>
                                <p>Belum ada riwayat pengajuan cuti</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($history->hasPages())
        <div class="pagination-container">
            {{ $history->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
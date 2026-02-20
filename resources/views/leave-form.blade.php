@extends('layouts.app')

@section('title', 'Generator Cuti BPVP Kendari - Professional View')

@section('additional_styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* --- LAYOUT UTAMA --- */
        body {
            background-color: #f3f4f6;
            font-family: 'Inter', sans-serif;
            color: #111827;
            margin: 0; padding: 0;
            height: 100vh; overflow: hidden;
        }

        .app-container {
            display: grid;
            grid-template-columns: 400px 1fr;
            height: 100vh;
        }

        /* --- SISI KIRI: FORM INPUT --- */
        .form-side {
            background: white;
            padding: 20px;
            overflow-y: auto;
            border-right: 1px solid #e5e7eb;
            box-shadow: 4px 0 15px rgba(0,0,0,0.02);
            z-index: 10;
        }

        .form-header { 
            border-bottom: 3px solid #059669; 
            padding-bottom: 10px; margin-bottom: 20px; 
        }
        .form-header h2 { font-size: 18px; color: #111827; margin: 0; font-weight: 700; }
        
        .section-label {
            background: #ecfdf5; color: #059669;
            padding: 8px 10px; font-weight: 700; font-size: 11px; text-transform: uppercase;
            margin: 15px 0 10px 0; border-radius: 4px; border-left: 4px solid #059669;
        }

        .input-group { margin-bottom: 10px; }
        .input-group label { display: block; font-size: 11px; font-weight: 600; margin-bottom: 3px; color: #4b5563; }
        .input-group input, .input-group select, .input-group textarea {
            width: 100%; padding: 8px; border: 1px solid #d1d5db;
            border-radius: 4px; font-size: 12px; box-sizing: border-box;
            transition: all 0.2s;
        }
        .input-group input:focus { border-color: #059669; outline: none; box-shadow: 0 0 0 2px rgba(5, 150, 105, 0.1); }
        
        .row-2 { display: flex; gap: 10px; }
        .row-2 > div { flex: 1; }

        /* --- SISI KANAN: PREVIEW --- */
        .preview-side {
            background: #525659;
            padding: 40px;
            overflow-y: auto;
            display: flex; flex-direction: column; align-items: center;
        }

        /* Tombol Download */
        .btn-download {
            position: fixed; bottom: 30px; right: 40px;
            padding: 12px 25px; background: #27ae60; color: white;
            border: none; border-radius: 50px; font-weight: bold; font-size: 14px;
            cursor: pointer; box-shadow: 0 4px 15px rgba(0,0,0,0.4);
            display: flex; align-items: center; gap: 8px; z-index: 100;
            transition: transform 0.2s;
        }
        .btn-download:hover { transform: translateY(-3px); background: #219150; }

        /* --- KERTAS KERJA (A4) --- */
        .paper {
            width: 210mm; 
            min-height: 297mm;
            background: white; 
            padding: 10mm 15mm;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            box-sizing: border-box;
            position: relative;
            margin-bottom: 50px;
        }

        /* --- STYLE DOKUMEN --- */
        .doc-body {
            font-family: "Times New Roman", Times, serif;
            font-size: 10.5pt;
            color: #000;
            line-height: 1.15;
        }

        /* Tabel Utama */
        table.main-table { width: 100%; border-collapse: collapse; margin-bottom: 4px; }
        table.main-table td { border: 1px solid black; padding: 2px 4px; vertical-align: top; }
        
        /* Helper Classes */
        .no-border { border: none !important; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        .underline { text-decoration: underline; }
        .v-bottom { vertical-align: bottom !important; }
        .v-middle { vertical-align: middle !important; }
        
        .check-mark { font-family: DejaVu Sans, sans-serif; font-size: 12px; }

        /* Tinggi Baris Khusus */
        .empty-row { height: 25px; }
        .sign-row { height: 85px; }

        @media (max-width: 1200px) {
            .app-container { grid-template-columns: 1fr; }
            .form-side { height: auto; border-right: none; }
            .preview-side { padding: 20px 10px; }
            .paper { width: 100%; transform: scale(1); padding: 5mm; }
        }
    </style>
@endsection

@section('content')
<div class="app-container">
    
    <!-- PANEL INPUT -->
    <div class="form-side">
        <div class="form-header">
            <h2>Input Data Cuti</h2>
        </div>

        <form action="{{ route('leave.form.submit') }}" method="POST">
            @csrf
            <div class="section-label">1. Header Surat</div>
            <div class="input-group"><label>Tempat & Tanggal</label><input type="text" name="tgl_surat" id="in_tgl_surat" value="Kendari, 12 Februari 2026" oninput="sync()"></div>
            <div class="input-group"><label>Nomor Surat</label><input type="text" name="nomor_surat" id="in_nomor" value="2.13/291/KP. 12.00/II/2026" oninput="sync()"></div>

            <div class="section-label">I. Data Pegawai</div>
            <div class="input-group"><label>Nama Pegawai</label><input type="text" name="nama" id="in_nama" value="Harisma Dewi, S.Pd." oninput="sync()"></div>
            <div class="input-group"><label>NIP</label><input type="text" name="nip" id="in_nip" value="19870218 201902 2 002" oninput="sync()"></div>
            <div class="row-2">
                <div class="input-group"><label>Pangkat/Gol</label><input type="text" id="in_pangkat" value="Penata Muda Tk. I III/b" oninput="sync()"></div>
                <div class="input-group"><label>Masa Kerja</label><input type="text" id="in_masa" value="07 Tahun, 00 Bulan" oninput="sync()"></div>
            </div>
            <div class="input-group"><label>Jabatan</label><input type="text" name="jabatan" id="in_jabatan" value="Instruktur Ahli Pertama Kej. Garmen Apparel" oninput="sync()"></div>
            <div class="input-group"><label>Unit Kerja</label><input type="text" id="in_unit" value="Balai Pelatihan Vokasi Dan Produktivitas Kendari" oninput="sync()"></div>

            <div class="section-label">II & III. Jenis & Alasan</div>
            <div class="input-group">
                <label>Jenis Cuti (Checklist)</label>
                <select id="in_jenis" onchange="sync()">
                    <option value="1">Cuti Tahunan</option>
                    <option value="2">Cuti Besar</option>
                    <option value="3">Cuti Sakit</option>
                    <option value="4">Cuti Melahirkan</option>
                    <option value="5">Cuti Alasan Penting</option>
                    <option value="6">Cuti Luar Tanggungan</option>
                </select>
                <input type="hidden" name="jenis_cuti_text" id="in_jenis_text" value="Cuti Tahunan">
            </div>
            <div class="input-group"><label>Alasan Cuti</label><textarea name="alasan" id="in_alasan" rows="2" oninput="sync()">Melaksanakan Cuti Tahunan</textarea></div>

            <div class="section-label">IV. Lamanya Cuti</div>
            <div class="input-group"><label>Durasi</label><input type="text" id="in_durasi" value="01 (satu)" oninput="sync()"></div>
            <div class="row-2">
                <div class="input-group"><label>Mulai</label><input type="date" name="mulai" id="in_mulai" value="2026-02-12" oninput="sync()"></div>
                <div class="input-group"><label>Sampai</label><input type="date" name="sampai" id="in_sampai" value="2026-02-12" oninput="sync()"></div>
            </div>

            <div class="section-label">V. Catatan Cuti</div>
            <div class="row-2">
                <div class="input-group"><label>Sisa N-2</label><input type="text" id="in_n2" value="0" oninput="sync()"></div>
                <div class="input-group"><label>Tahun N-2</label><input type="text" id="in_n2_ket" value="2024" oninput="sync()"></div>
            </div>
            <div class="row-2">
                <div class="input-group"><label>Sisa N-1</label><input type="text" id="in_n1" value="0" oninput="sync()"></div>
                <div class="input-group"><label>Tahun N-1</label><input type="text" id="in_n1_ket" value="2025" oninput="sync()"></div>
            </div>
            <div class="row-2">
                <div class="input-group"><label>Sisa N</label><input type="text" id="in_n" value="12" oninput="sync()"></div>
                <div class="input-group"><label>Tahun N</label><input type="text" id="in_tahun_now" value="2026" oninput="sync()"></div>
            </div>

            <div class="section-label">VI. Alamat & Kontak</div>
            <div class="input-group"><label>Alamat Lengkap</label><textarea id="in_alamat" rows="2" oninput="sync()">Kota Kendari, Sulawesi Tenggara</textarea></div>
            <div class="input-group"><label>No. Telepon</label><input type="text" id="in_telp" value="0812-8228-5877" oninput="sync()"></div>

            <div class="section-label">Pejabat Penandatangan</div>
            <div class="input-group"><label>Nama Atasan</label><input type="text" id="in_atasan_nama" value="Anshari, S.Sos., M.Ak." oninput="sync()"></div>
            <div class="input-group"><label>NIP Atasan</label><input type="text" id="in_atasan_nip" value="19770731 200312 1 007" oninput="sync()"></div>
            <div class="input-group"><label>Nama Kepala</label><input type="text" id="in_kepala_nama" value="Amran, S.T" oninput="sync()"></div>
            <div class="input-group"><label>NIP Kepala</label><input type="text" id="in_kepala_nip" value="19830312 200901 1 014" oninput="sync()"></div>
            
            <div class="section-label">Aksi Simpan</div>
            <button type="submit" style="width: 100%; background: #059669; color: white; border: none; padding: 12px; border-radius: 6px; font-weight: 700; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; margin-top: 10px;">
                <i class="fas fa-paper-plane"></i> AJUKAN CUTI
            </button>
        </form>
    </div>

    <!-- PREVIEW AREA -->
    <div class="preview-side">
        <button class="btn-download" onclick="downloadWord()">
            <span>📥</span> UNDUH FILE WORD (DOC)
        </button>
        
        <div id="doc_content" class="paper">
            <div class="doc-body">
                
                <!-- HEADER KANAN (DIGANTI DENGAN TABEL AGAR POSISI DI WORD BENAR) -->
                <table style="width: 100%; border: none; margin-bottom: 10px;">
                    <tr>
                        <td class="no-border" style="width: 75%;"></td> <!-- Spasi Kosong Kiri -->
                        <td class="no-border" style="width: 45%;">
                            <span id="v_tgl_surat">Kendari, 12 Februari 2026</span><br>
                            Yth. Kepala BPVP Kendari<br>
                            Di<br>
                            <span style="padding-left: 20px;">Kendari</span>
                        </td>
                    </tr>
                </table>

                <!-- JUDUL -->
                <div class="text-center" style="margin-bottom: 8px;">
                    <span class="font-bold">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</span><br>
                    Nomor : <span id="v_nomor">2.13/291/KP. 12.00/II/2026</span>
                </div>

                <!-- I. DATA PEGAWAI -->
                <table class="main-table">
                    <tr><td colspan="4" class="font-bold">I. DATA PEGAWAI</td></tr>
                    <tr>
                        <td width="15%">Nama</td>
                        <td width="35%"><span id="v_nama"></span></td>
                        <td width="15%">NIP</td>
                        <td width="35%"><span id="v_nip"></span></td>
                    </tr>
                    <tr>
                        <td>Pangkat/Gol</td>
                        <td><span id="v_pangkat"></span></td>
                        <td>Masa Kerja</td>
                        <td><span id="v_masa"></span></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td><span id="v_jabatan"></span></td>
                        <td colspan="2" class="no-border" style="border-left: 1px solid black !important;"></td> 
                    </tr>
                    <tr>
                        <td>Unit Kerja</td>
                        <td colspan="3"><span id="v_unit"></span></td>
                    </tr>
                </table>

                <!-- II. JENIS CUTI -->
                <table class="main-table">
                    <tr><td colspan="4" class="font-bold">II. JENIS CUTI YANG DIAMBIL</td></tr>
                    <tr>
                        <td width="40%">1. Cuti Tahunan</td>
                        <td width="10%" class="text-center check-mark"><span id="chk_1"></span></td>
                        <td width="40%">2. Cuti Besar</td>
                        <td width="10%" class="text-center check-mark"><span id="chk_2"></span></td>
                    </tr>
                    <tr>
                        <td>3. Cuti Sakit</td>
                        <td class="text-center check-mark"><span id="chk_3"></span></td>
                        <td>4. Cuti Melahirkan</td>
                        <td class="text-center check-mark"><span id="chk_4"></span></td>
                    </tr>
                    <tr>
                        <td>5. Cuti Karena Alasan Penting</td>
                        <td class="text-center check-mark"><span id="chk_5"></span></td>
                        <td>6. Cuti Di Luar Tanggungan Negara</td>
                        <td class="text-center check-mark"><span id="chk_6"></span></td>
                    </tr>
                </table>

                <!-- III. ALASAN CUTI -->
                <table class="main-table">
                    <tr><td class="font-bold">III. ALASAN CUTI</td></tr>
                    <tr><td style="height: 25px;"><span id="v_alasan"></span></td></tr>
                </table>

                <!-- IV. LAMANYA CUTI -->
                <table class="main-table">
                    <tr><td colspan="6" class="font-bold">IV. LAMANYA CUTI</td></tr>
                    <tr>
                        <td width="12%">Selama</td>
                        <td width="20%"><span id="v_durasi"></span> (hari/bulan/tahun)</td>
                        <td width="13%">Mulai tanggal</td>
                        <td width="20%"><span id="v_mulai"></span></td>
                        <td width="5%" class="text-center">s.d</td>
                        <td width="30%"><span id="v_sampai"></span></td>
                    </tr>
                </table>

                <!-- V. CATATAN CUTI (STRUKTUR TUNGGAL - GARIS PRESISI) -->
                <table class="main-table" style="border: 1px solid black;">
                    <!-- Header -->
                    <tr><td colspan="5" class="font-bold">V. CATATAN CUTI</td></tr>
                    
                    <!-- Baris 1: Judul Cuti Tahunan & Cuti Besar -->
                    <tr>
                        <!-- Col 1 & 2 (Tahun & Sisa) digabung untuk Judul -->
                        <td colspan="2" style="width: 30%;">1. CUTI TAHUNAN</td>
                        <!-- Col 3 (Keterangan) dipakai untuk Checkbox -->
                        <td class="text-center check-mark" style="width: 25%;"><span id="chk_sub_1"></span></td>
                        <!-- Col 4 -->
                        <td style="width: 35%;">2. CUTI BESAR</td>
                        <!-- Col 5 -->
                        <td style="width: 10%;"><span id="chk_2"></span></td>
                    </tr>

                    <!-- Baris 2: Header Kecil & Cuti Sakit -->
                    <tr class="text-center">
                        <td>Tahun</td>
                        <td>Sisa</td>
                        <td>Keterangan</td>
                        <td class="text-left" style="text-align: left; padding-left: 4px;">3. CUTI SAKIT</td>
                        <td><span id="chk_3"></span></td>
                    </tr>

                    <!-- Baris 3: N-2 & Cuti Melahirkan -->
                    <tr>
                        <td>N-2</td>
                        <td class="text-center"><span id="v_n2"></span></td>
                        <td><span id="v_n2_ket"></span></td>
                        <td>4. CUTI MELAHIRKAN</td>
                        <td class="text-center check-mark"><span id="chk_4"></span></td>
                    </tr>

                    <!-- Baris 4: N-1 & Cuti Alasan Penting -->
                    <tr>
                        <td>N-1</td>
                        <td class="text-center"><span id="v_n1"></span></td>
                        <td><span id="v_n1_ket"></span></td>
                        <td>5. CUTI KARENA ALASAN PENTING</td>
                        <td class="text-center check-mark"><span id="chk_5"></span></td>
                    </tr>

                    <!-- Baris 5: N & Cuti Luar Tanggungan -->
                    <tr>
                        <td>N</td>
                        <td class="text-center"><span id="v_n"></span></td>
                        <td><span id="v_tahun_now"></span></td>
                        <td>6. CUTI DI LUAR TANGGUNGAN NEGARA</td>
                        <td class="text-center check-mark"><span id="chk_6"></span></td>
                    </tr>
                </table>

                <!-- VI. ALAMAT -->
                <table class="main-table">
                    <tr><td colspan="3" class="font-bold">VI. ALAMAT SELAMA MENJALANKAN CUTI</td></tr>
                    <tr>
                        <td width="55%" rowspan="2" style="vertical-align: top; height: 85px;">
                            <span id="v_alamat"></span>
                        </td>
                        <td width="10%" style="border-bottom: 1px solid black;">Telp.</td>
                        <td width="35%" style="border-bottom: 1px solid black;"><span id="v_telp"></span></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center v-bottom">
                            Hormat saya,<br><br><br>
                            <span class="font-bold underline"><span id="v_nama_sign"></span></span><br>
                            NIP <span id="v_nip_sign"></span>
                        </td>
                    </tr>
                </table>

                <!-- VII. PERTIMBANGAN ATASAN -->
                <table class="main-table">
                    <tr><td colspan="4" class="font-bold">VII. PERTIMBANGAN ATASAN LANGSUNG</td></tr>
                    <tr class="text-center">
                        <td width="20%">DISETUJUI</td>
                        <td width="20%">PERUBAHAN</td>
                        <td width="20%">DITANGGUHKAN</td>
                        <td width="40%">TIDAK DISETUJUI</td>
                    </tr>
                    <tr>
                        <td class="empty-row"></td>
                        <td class="empty-row"></td>
                        <td class="empty-row"></td>
                        <td class="empty-row"></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="sign-row"></td>
                        <td class="v-bottom text-center">
                            <br><br><br>
                            <span class="font-bold underline"><span id="v_atasan_nama"></span></span><br>
                            NIP <span id="v_atasan_nip"></span>
                        </td>
                    </tr>
                </table>

                <!-- VIII. KEPUTUSAN PEJABAT -->
                <table class="main-table">
                    <tr><td colspan="4" class="font-bold">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI</td></tr>
                    <tr class="text-center">
                        <td width="20%">DISETUJUI</td>
                        <td width="20%">PERUBAHAN</td>
                        <td width="20%">DITANGGUHKAN</td>
                        <td width="40%">TIDAK DISETUJUI</td>
                    </tr>
                    <tr>
                        <td class="empty-row"></td>
                        <td class="empty-row"></td>
                        <td class="empty-row"></td>
                        <td class="empty-row"></td> 
                    </tr>
                    <tr>
                        <td colspan="3" class="sign-row"></td>
                        <td class="v-bottom text-center">
                            <br><br><br>
                            <span class="font-bold underline"><span id="v_kepala_nama"></span></span><br>
                            NIP <span id="v_kepala_nip"></span>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function formatDateIndo(dateStr) {
        if (!dateStr) return "";
        const date = new Date(dateStr);
        if (isNaN(date.getTime())) return dateStr;
        
        const months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        
        return date.getDate() + " " + months[date.getMonth()] + " " + date.getFullYear();
    }

    function sync() {
        // Mapping Input -> Preview
        const map = {
            'v_tgl_surat': 'in_tgl_surat',
            'v_nomor': 'in_nomor',
            'v_nama': 'in_nama', 'v_nama_sign': 'in_nama',
            'v_nip': 'in_nip', 'v_nip_sign': 'in_nip',
            'v_pangkat': 'in_pangkat',
            'v_masa': 'in_masa',
            'v_jabatan': 'in_jabatan',
            'v_unit': 'in_unit',
            'v_alasan': 'in_alasan',
            'v_durasi': 'in_durasi',
            'v_n2': 'in_n2', 'v_n2_ket': 'in_n2_ket',
            'v_n1': 'in_n1', 'v_n1_ket': 'in_n1_ket',
            'v_n': 'in_n', 'v_tahun_now': 'in_tahun_now',
            'v_alamat': 'in_alamat',
            'v_telp': 'in_telp',
            'v_atasan_nama': 'in_atasan_nama', 'v_atasan_nip': 'in_atasan_nip',
            'v_kepala_nama': 'in_kepala_nama', 'v_kepala_nip': 'in_kepala_nip'
        };

        for (let vid in map) {
            let el = document.getElementById(map[vid]);
            if(el) document.getElementById(vid).innerText = el.value;
        }

        // Handle Dates specifically for Indonesian format in preview
        document.getElementById('v_mulai').innerText = formatDateIndo(document.getElementById('in_mulai').value);
        document.getElementById('v_sampai').innerText = formatDateIndo(document.getElementById('in_sampai').value);

        // Checklist Logic
        let jenisSelect = document.getElementById('in_jenis');
        let jenis = jenisSelect.value;
        let jenisText = jenisSelect.options[jenisSelect.selectedIndex].text;
        
        // Simpan teks ke hidden input untuk database
        document.getElementById('in_jenis_text').value = jenisText;

        for(let i=1; i<=6; i++) document.getElementById('chk_'+i).innerText = "";
        document.getElementById('chk_sub_1').innerText = "";
        
        document.getElementById('chk_'+jenis).innerText = "√";
        if(jenis == "1") document.getElementById('chk_sub_1').innerText = "√";
    }

    function downloadWord() {
        var content = document.getElementById('doc_content').innerHTML;
        
        // CSS Inline untuk Word agar 1 Halaman & Layout Presisi
        var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
            "xmlns:w='urn:schemas-microsoft-com:office:word' "+
            "xmlns='http://www.w3.org/TR/REC-html40'>"+
            "<head><meta charset='utf-8'><title>Formulir Cuti</title>"+
            "<style>"+
            /* Margin Sempit agar muat 1 halaman */
            "@page Section1 {size:210mm 297mm; margin:8mm 10mm 8mm 10mm; mso-page-orientation: portrait;}"+
            "div.Section1 {page:Section1;}"+
            "body { font-family: 'Times New Roman', serif; font-size: 10pt; }"+
            "table { border-collapse: collapse; width: 100%; margin-bottom: 2px; }"+
            "td { border: 1px solid black; padding: 2px 3px; vertical-align: top; }"+
            ".no-border { border: none !important; }"+
            ".text-center { text-align: center; }"+
            ".font-bold { font-weight: bold; }"+
            ".underline { text-decoration: underline; }"+
            ".v-bottom { vertical-align: bottom; }"+
            /* Pastikan tinggi baris sesuai */
            ".empty-row { height: 25px; }"+
            ".sign-row { height: 85px; }"+
            "</style></head><body><div class='Section1'>";
            
        var footer = "</div></body></html>";
        var sourceHTML = header + content + footer;

        var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        var fileDownload = document.createElement("a");
        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = 'Formulir_Cuti_BPVP.doc';
        fileDownload.click();
        document.body.removeChild(fileDownload);
    }

    window.onload = sync;
</script>
@endsection


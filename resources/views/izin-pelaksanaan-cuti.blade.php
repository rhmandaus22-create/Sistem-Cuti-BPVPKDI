@extends('layouts.app')

@section('title', 'Surat Izin Pelaksanaan Cuti')

@section('additional_styles')
    <style>
        body { background: #e0e0e0; font-family: "Times New Roman", Times, serif; }
        .container {
            width: 210mm;
            min-height: 297mm;
            background: white;
            padding: 1.5cm 2cm;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            box-sizing: border-box;
        }
        
        .btn-download {
            position: fixed;
            bottom: 30px;
            right: 30px;
            padding: 15px 30px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            z-index: 2000;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Styling Tabel */
        table { width: 100%; border-collapse: collapse; border: none; }
        td { vertical-align: top; font-size: 11pt; line-height: 1.2; }

        .kop-border { border-bottom: 2.5pt solid black; }
        .kop-border-thin { border-bottom: 1pt solid black; margin-top: 2px; margin-bottom: 15px; }

        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        
        /* Layout khusus untuk poin-poin agar tidak berantakan */
        .list-table td { padding-bottom: 5px; }
        .data-pegawai td { padding-bottom: 2px; }
    </style>
@endsection

@section('content')
    <button class="btn-download" onclick="exportHTML()">📥 UNDUH FILE WORD (DOC) </button>

    <div id="content" class="container">
        <!-- KOP SURAT - Menggunakan tabel fixed width untuk menjaga logo -->
        <table class="kop-border">
            <tr>
                <td width="80" align="center" style="padding-bottom: 10px;">
                    <!-- Atribut width dan height di sini sangat penting untuk Word -->
                    <img src="{{ asset('images/LogoKemnaker.png') }}" width="75" height="85" style="display:block;">
                </td>
                <td class="text-center" style="padding-bottom: 10px;">
                    <div style="font-size: 12pt; font-weight: bold;">KEMENTERIAN KETENAGAKERJAAN REPUBLIK INDONESIA</div>
                    <div style="font-size: 12pt; font-weight: bold;">DIREKTORAT JENDERAL</div>
                    <div style="font-size: 12pt; font-weight: bold;">PEMBINAAN PELATIHAN VOKASI DAN PRODUKTIVITAS</div>
                    <div style="font-size: 14pt; font-weight: bold;">BALAI PELATIHAN VOKASI DAN PRODUKTIVITAS KENDARI</div>
                    <div style="font-size: 8pt; margin-top: 2px;">Jl. D.I Panjaitan No.225 Kendari, Telp (0401) 3193364 Fax. (0401) 3190427</div>
                    <div style="font-size: 8pt;">email : <span style="color:blue; text-decoration:underline;">blkkendari@yahoo.com</span> Laman: http://www.naker.go.id</div>
                </td>
            </tr>
        </table>
        <div class="kop-border-thin"></div>

        <!-- TANGGAL -->
        <table style="margin-bottom: 20px;">
            <tr><td class="text-right">12 Februari 2026</td></tr>
        </table>

        <!-- JUDUL -->
        <div class="text-center font-bold" style="text-decoration: underline; font-size: 11pt;">IZIN PELAKSANAAN CUTI TAHUNAN</div>
        <div class="text-center" style="margin-bottom: 25px; font-size: 11pt;">Nomor : .....</div>

        <!-- POIN 1 -->
        <table class="list-table">
            <tr>
                <td width="25">1.</td>
                <td align="justify">Diberikan izin sementara untuk melaksanakan cuti tahunan kepada Pegawai Negeri Sipil;</td>
            </tr>
        </table>

        <!-- DATA PEGAWAI -->
        <table class="data-pegawai" style="margin-left: 25px; margin-bottom: 15px;">
            <tr>
                <td width="150">Nama</td>
                <td width="15">:</td>
                <td class="font-bold">.....</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td>.....</td>
            </tr>
            <tr>
                <td>Pangkat/Gol. Ruang</td>
                <td>:</td>
                <td>.....</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>.....</td>
            </tr>
            <tr>
                <td>Unit Kerja</td>
                <td>:</td>
                <td>Balai Pelatihan Vokasi dan Produktivitas Kendari</td>
            </tr>
        </table>

        <!-- KETENTUAN TANGGAL -->
        <div style="margin-bottom: 10px;">
            Selama 01 (Satu) hari kerja terhitung tanggal 12 Februari 2026, dengan ketentuan sebagai berikut:
        </div>

        <!-- SUB-POIN a & b -->
        <table class="list-table" style="margin-left: 25px;">
            <tr>
                <td width="25">a.</td>
                <td align="justify">Sebelum menjalankan cuti tahunan wajib menyerahkan pekerjaannya kepada Atasan Langsungnya atau pejabat yang ditunjuk.</td>
            </tr>
            <tr>
                <td>b.</td>
                <td align="justify">Setelah menjalankan cuti tahunan melaporkan diri kepada Atasan Langsungnya dan bekerja kembali sebagaimana mestinya.</td>
            </tr>
        </table>

        <!-- POIN 2 -->
        <table class="list-table" style="margin-top: 15px;">
            <tr>
                <td width="25">2.</td>
                <td align="justify">Demikian izin sementara melaksanakan cuti tahunan ini dibuat untuk dipergunakan sebagaimana mestinya.</td>
            </tr>
        </table>

        <!-- TANDA TANGAN -->
        <table style="margin-top: 30px;">
            <tr>
                <td width="60%"></td>
                <td width="40%" class="text-center">
                    Kepala,<br><br><br><br><br>
                    <span class="font-bold">Amran, S.T</span><br>
                    NIP 19830312 200901 1 014
                </td>
            </tr>
        </table>

        <!-- TEMBUSAN -->
        <div style="margin-top: 50px;">
            <div class="font-bold" style="text-decoration: underline; font-size: 10pt;">TEMBUSAN :</div>
            <table style="font-size: 10pt; margin-top: 5px;">
                <tr><td width="20">1.</td><td>Kepala Biro Organisasi dan SDM Aparatur Sekretariat Jenderal Kemnaker RI di Jakarta</td></tr>
                <tr><td>2.</td><td>Sekretaris Direktorat Jenderal Binalattas di Jakarta</td></tr>
                <tr><td>3.</td><td>Arsip</td></tr>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function exportHTML() {
            var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
                         "xmlns:w='urn:schemas-microsoft-com:office:word' "+
                         "xmlns='http://www.w3.org/TR/REC-html40'>"+
                         "<head><meta charset='utf-8'><title>Surat Izin Cuti</title>"+
                         "<style>"+
                         "@page Section1 {size:210mm 297mm; margin:1.5cm 2cm 1.5cm 2cm; mso-header-margin:35.4pt; mso-footer-margin:35.4pt; mso-paper-source:0;}"+
                         "div.Section1 {page:Section1;}"+
                         "body {font-family: 'Times New Roman', serif; font-size: 11pt; color: black;}"+
                         "table {width: 100%; border-collapse: collapse;}"+
                         "td {vertical-align: top;}"+
                         "img {display: inline-block;}"+
                         ".text-center {text-align: center;}"+
                         ".text-right {text-align: right;}"+
                         ".font-bold {font-weight: bold;}"+
                         ".kop-border {border-bottom: 2.25pt solid black;}"+
                         "</style></head><body><div class='Section1'>";
                         
            var footer = "</div></body></html>";
            var content = document.getElementById("content").innerHTML;
            
            // Konversi source
            var sourceHTML = header + content + footer;
            
            var blob = new Blob(['\ufeff', sourceHTML], { type: 'application/msword' });
            var url = URL.createObjectURL(blob);
            var link = document.createElement("a");
            link.href = url;
            link.download = 'Surat_Izin_Cuti_Fix.doc';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
@endsection
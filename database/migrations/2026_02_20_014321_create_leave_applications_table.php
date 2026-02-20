<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leave_applications', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('nama');
            $blueprint->string('nip');
            $blueprint->string('jabatan');
            $blueprint->string('jenis_cuti');
            $blueprint->text('alasan');
            $blueprint->string('mulai');
            $blueprint->string('sampai');
            $blueprint->string('status')->default('Menunggu'); // Menunggu, Disetujui, Ditolak
            $blueprint->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leave_applications');
    }
};

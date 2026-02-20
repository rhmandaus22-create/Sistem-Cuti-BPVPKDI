<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'jenis_cuti',
        'alasan',
        'mulai',
        'sampai',
        'status',
    ];
}

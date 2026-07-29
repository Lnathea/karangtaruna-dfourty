<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'rt_rw',
        'jabatan',
        'urutan_jabatan',
        'status',
        'sumber',
        'tanggal_bergabung',
        'foto',
        'catatan',
    ];

    protected $casts = [
        'tanggal_bergabung' => 'date',
    ];

    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }
}

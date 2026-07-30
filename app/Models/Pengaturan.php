<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $fillable = [
        'deskripsi_organisasi',
        'visi',
        'misi',
        'alamat',
        'instagram_url',
        'tiktok_url',
        'email_kontak',
        'whatsapp',
    ];

    public static function current(): self
    {
        return static::firstOrCreate([], [
            'deskripsi_organisasi' => "D'Fourty adalah organisasi kepemudaan RW 040 Perumahan Panorama Wanasari, Cibitung, Bekasi.",
            'visi' => 'Menjadi wadah pemuda-pemudi RW 040 yang solid, kreatif, dan aktif berkontribusi bagi kemajuan lingkungan serta kesejahteraan warga.',
            'misi' => "Menghimpun dan mengembangkan potensi pemuda-pemudi RW 040.\nMenyelenggarakan kegiatan sosial, olahraga, dan seni budaya secara rutin.\nMendorong gotong royong dan kepedulian terhadap lingkungan.\nMenjadi jembatan komunikasi antara pemuda dan pengurus RT/RW.",
            'alamat' => 'Perumahan Panorama Wanasari, Cibitung, Bekasi, Jawa Barat',
        ]);
    }
}

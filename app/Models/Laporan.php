<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'judul',
        'detail',
        'user_id',
        'status',
        'alasan_ditolak',
        'tanggal_diterima',
        'user_master_id',
        'detail_perbaikan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function penanggungjawab()
    {
        return $this->belongsTo(User::class, 'user_master_id');
    }
    
    public function getConvertedIdAttribute()
    {
        return str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }
}

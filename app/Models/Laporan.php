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
        'user_master_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function penanggungjawab()
    {
        return $this->belongsTo(User::class, 'user_master_id');
    }

    public function sarans()
    {
        return $this->hasMany(Saran::class, 'saran_id');
    }
}

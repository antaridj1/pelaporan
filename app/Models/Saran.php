<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail',
        'user_id',
        'laporan_id'
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'saran_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

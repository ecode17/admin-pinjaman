<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjaman';
    protected $primaryKey = 'id_pinjaman';
    
    public $timestamps = false;

    protected $fillable = [
        'id_nasabah', 'id_jenis_pinjaman', 'total_pinjaman', 'tenor', 'nominal_angsuran'
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }

    public function jenisPinjaman()
    {
        return $this->belongsTo(JenisPinjaman::class, 'id_jenis_pinjaman');
    }
}

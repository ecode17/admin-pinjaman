<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPinjaman extends Model
{
    protected $table = 'jenis_pinjaman';
    protected $primaryKey = 'id_jenis_pinjaman';

    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class, 'id_jenis_pinjaman');
    }
}

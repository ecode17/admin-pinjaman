<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $table = 'nasabah';
    protected $primaryKey = 'id_nasabah';

    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class, 'id_nasabah');
    }
}

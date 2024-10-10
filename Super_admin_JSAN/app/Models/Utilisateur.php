<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function tpi()
    {
        return $this->belongsTo(Tpi::class, 'tpi_id');
    }
}

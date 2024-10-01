<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tpi extends Model
{
    protected $table = 'tpi';

    public function CourAppel()
    {
        return $this->belongsTo(CourAppel::class, 'cour_appel_id');
    }
}
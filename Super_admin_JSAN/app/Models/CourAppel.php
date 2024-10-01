<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourAppel extends Model
{
    protected $table = 'cour_appel';
    public function tpi(){
        return $this->hasMany(Tpi::class, 'cour_appel_id');
    }
}

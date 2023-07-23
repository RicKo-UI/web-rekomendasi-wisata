<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    public function jeniswisata() 
    { 
        return $this->belongsTo(Jeniswisata::class);
    }
}

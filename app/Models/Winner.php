<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){ //inverse relation
        return $this->belongsTo(User::class);
    }

}

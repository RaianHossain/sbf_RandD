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

    public function bid(){ //inverse relation
        return $this->belongsTo(Bid::class);
    }

    public function hist()
    {
        return $this->hasOne(IssueResolveHistory::class, 'winner_id');
    }

}

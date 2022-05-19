<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueResolveHistory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'issue_resolve_histories';

    public function winner()
    {
        return $this->belongsTo(Winner::class);
    }
}

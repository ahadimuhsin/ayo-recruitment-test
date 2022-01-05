<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scorer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "scorers";
    protected $guarded = [];

    public function match()
    {
        return $this->belongsTo(Matches::class, 'match_id', 'id');
    }
}

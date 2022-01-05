<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "reports";
    protected $guarded = [];

    public function home_team()
    {
        return $this->belongsTo(Team::class, 'home_team_id', 'id');
    }

    public function away_team()
    {
        return $this->belongsTo(Team::class, 'away_team_id', 'id');
    }

    public function match()
    {
        return $this->belongsTo(Matches::class, 'match_id', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "teams";
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function players()
    {
        return $this->hasMany(Player::class, 'team_id', 'id');
    }
}

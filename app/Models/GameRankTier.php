<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameRankTier extends Model
{
    protected $fillable = ['game_rank_category_id', 'tier', 'stars_required', 'price'];

    public function rankCategory()
    {
        return $this->belongsTo(GameRankCategory::class, 'game_rank_category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameRankTier extends Model
{
    protected $fillable = [
        'game_rank_category_id',
        'tier',
        'progress_target',
        'display_order'
    ];

    public function rankCategory()
    {
        return $this->belongsTo(GameRankCategory::class, 'game_rank_category_id');
    }

    public function tierDetails()
    {
        return $this->hasMany(GameRankTierDetail::class, 'game_rank_tier_id');
    }
}

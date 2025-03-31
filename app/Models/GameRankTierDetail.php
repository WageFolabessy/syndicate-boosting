<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameRankTierDetail extends Model
{
    protected $fillable = [
        'game_rank_tier_id',
        'star_number',
        'price',
        'display_order'
    ];

    public function tier()
    {
        return $this->belongsTo(GameRankTier::class, 'game_rank_tier_id');
    }
}

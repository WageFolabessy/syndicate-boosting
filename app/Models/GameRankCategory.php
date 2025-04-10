<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameRankCategory extends Model
{
    protected $fillable = [
        'game_id',
        'name',
        'image',
        'system_type',
        'display_order'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function rankTiers()
    {
        return $this->hasMany(GameRankTier::class, 'game_rank_category_id');
    }
}

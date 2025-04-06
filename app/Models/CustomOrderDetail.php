<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomOrderDetail extends Model
{
    protected $fillable = [
        'transaction_id',
        'current_game_rank_category_id',
        'current_game_rank_tier_id',
        'current_game_rank_tier_detail_id',
        'desired_game_rank_category_id',
        'desired_game_rank_tier_id',
        'desired_game_rank_tier_detail_id',
        'server',
        'login',
        'note',
        'customer_name',
        'customer_contact',
        'username',
        'password',
        'price',
        'status',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function gameRankCategory()
    {
        return $this->belongsTo(GameRankCategory::class, 'game_rank_category_id');
    }

    public function gameRankTier()
    {
        return $this->belongsTo(GameRankTier::class, 'game_rank_tier_id');
    }

    public function gameRankTierDetail()
    {
        return $this->belongsTo(GameRankTierDetail::class, 'game_rank_tier_detail_id');
    }

    public function currentGameRankCategory()
    {
        return $this->belongsTo(GameRankCategory::class, 'current_game_rank_category_id');
    }

    public function currentGameRankTier()
    {
        return $this->belongsTo(GameRankTier::class, 'current_game_rank_tier_id');
    }

    public function currentGameRankTierDetail()
    {
        return $this->belongsTo(GameRankTierDetail::class, 'current_game_rank_tier_detail_id');
    }

    public function desiredGameRankCategory()
    {
        return $this->belongsTo(GameRankCategory::class, 'desired_game_rank_category_id');
    }

    public function desiredGameRankTier()
    {
        return $this->belongsTo(GameRankTier::class, 'desired_game_rank_tier_id');
    }

    public function desiredGameRankTierDetail()
    {
        return $this->belongsTo(GameRankTierDetail::class, 'desired_game_rank_tier_detail_id');
    }
}

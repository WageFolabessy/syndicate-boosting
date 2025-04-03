<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomOrderDetail extends Model
{
    protected $fillable = [
        'transaction_id',
        'game_rank_category_id',
        'game_rank_tier_id',
        'game_rank_tier_detail_id',
        'server',
        'login',
        'note',
        'customer_name',
        'customer_contact',
        'username',
        'password',
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
}

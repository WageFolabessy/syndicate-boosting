<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameAccount extends Model
{
    protected $fillable = [
        'game_id', 'account_name', 'description', 'features',
        'sale_price', 'original_price', 'image', 'level', 'account_age'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable', 'transactionable_type', 'transactionable_id');
    }

    public function labels()
    {
        return $this->morphToMany(Label::class, 'labelable', 'labelables', 'labelable_id', 'label_id');
    }
}

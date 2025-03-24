<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoostingService extends Model
{
    protected $fillable = ['game_id', 'service_type', 'description', 'original_price', 'sale_price', 'image'];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    // Relasi polymorphic ke transaksi
    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable', 'transactionable_type', 'transactionable_id');
    }

    public function labels()
    {
        return $this->morphToMany(Label::class, 'labelable', 'labelables', 'labelable_id', 'label_id');
    }
}

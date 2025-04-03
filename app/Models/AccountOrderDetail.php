<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountOrderDetail extends Model
{
    protected $fillable = [
        'transaction_id',
        'game_account_id',
        'customer_name',
        'customer_contact',
        'price',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function gameAccount()
    {
        return $this->belongsTo(GameAccount::class, 'game_account_id');
    }
}

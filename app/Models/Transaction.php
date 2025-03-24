<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_number', 'transactionable_id', 'transactionable_type',
        'customer_name', 'customer_contact', 'status'
    ];

    public function transactionable()
    {
        return $this->morphTo(__FUNCTION__, 'transactionable_type', 'transactionable_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'transaction_id');
    }
    
    public function review()
    {
        return $this->hasOne(Review::class, 'transaction_id');
    }
}

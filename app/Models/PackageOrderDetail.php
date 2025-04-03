<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageOrderDetail extends Model
{
    protected $fillable = [
        'transaction_id',
        'boosting_service_id',
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

    public function boostingService()
    {
        return $this->belongsTo(BoostingService::class, 'boosting_service_id');
    }
}

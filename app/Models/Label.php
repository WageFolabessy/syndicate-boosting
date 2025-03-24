<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = ['name'];

    public function games()
    {
        return $this->morphedByMany(Game::class, 'labelable', 'labelables', 'label_id', 'labelable_id');
    }

    public function boostingServices()
    {
        return $this->morphedByMany(BoostingService::class, 'labelable', 'labelables', 'label_id', 'labelable_id');
    }

    public function gameAccounts()
    {
        return $this->morphedByMany(GameAccount::class, 'labelable', 'labelables', 'label_id', 'labelable_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name', 'genre', 'developer', 'description', 'image'];

    public function rankCategories()
    {
        return $this->hasMany(GameRankCategory::class, 'game_id');
    }

    public function boostingServices()
    {
        return $this->hasMany(BoostingService::class, 'game_id');
    }

    public function gameAccounts()
    {
        return $this->hasMany(GameAccount::class, 'game_id');
    }

    public function labels()
    {
        return $this->morphToMany(Label::class, 'labelable', 'labelables', 'labelable_id', 'label_id');
    }
}

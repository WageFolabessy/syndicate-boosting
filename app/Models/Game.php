<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Game extends Model
{
    protected $fillable = [
        'name',
        'genre',
        'developer',
        'description',
        'image'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($game) {
            $game->slug = self::generateSlug($game->name);
        });

        static::updating(function ($game) {
            if ($game->isDirty('name')) {
                $game->slug = self::generateSlug($game->name);
            }
        });
    }

    private static function generateSlug($name)
    {
        $slug = Str::slug($name);

        $count = game::whereRaw("slug RLIKE '^{$slug}(.[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }
}

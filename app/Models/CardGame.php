<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardGame extends Model
{
    use HasFactory;

    protected $table = 'card_games';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cardGame) {
            // Get the last created game with the 'name' starting with 'game'
            $lastGame = static::where('name', 'like', 'game%')
                ->latest('id')
                ->first();

            // Increment the 'name' attribute based on the last game's name
            if ($lastGame) {
                $lastGameNumber = (int) substr($lastGame->name, 4); // Extract the number from the 'gameX' format
                $cardGame->name = 'game' . ($lastGameNumber + 1);
            } else {
                $cardGame->name = 'game1'; // No previous game found, start with 'game1'
            }
        });
    }

    protected $fillable = [
        'deck'
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}

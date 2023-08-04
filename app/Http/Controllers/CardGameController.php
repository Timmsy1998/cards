<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CardGame;

class CardGameController extends Controller
{
    private $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
    private $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King', 'Ace'];

    public function index()
    {
        $cardGameId = session('card_game_id');

        if ($cardGameId) {
            $cardGame = CardGame::findOrFail($cardGameId);
            $deckData = json_decode($cardGame->deck, true);

            // Divide the deck into 4 equal parts for each player
            $players = [];
            $chunkSize = count($deckData) / 4;
            for ($i = 1; $i <= 4; $i++) {
                $players[$i] = array_splice($deckData, 0, $chunkSize);
            }
        } else {
            $players = [];
        }

        // Return the welcome view with the dealt cards for each player
        return view('welcome', ['players' => $players]);
    }

    public function shuffle()
    {
        $deck = $this->getShuffledDeck();

        // Create a new CardGame record in the card_games table to store the shuffled deck
        $cardGame = CardGame::create([
            'deck' => json_encode($deck),
        ]);

        // Redirect to the welcome view with the card_game_id
        return redirect('/')->with('card_game_id', $cardGame->id);
    }

    public function deal()
    {
        // Get the card_game_id from the session
        $cardGameId = session('card_game_id');

        // Retrieve the card game from the database using the CardGame model
        $cardGame = CardGame::findOrFail($cardGameId);

        // Retrieve the deck data from the card game model
        $deckData = json_decode($cardGame->deck, true);

        // Divide the deck into 4 equal parts for each player
        $players = [];
        $chunkSize = count($deckData) / 4;
        for ($i = 1; $i <= 4; $i++) {
            $players[$i] = array_splice($deckData, 0, $chunkSize);
        }

        // Return the welcome view with the dealt cards for each player
        return view('welcome', ['players' => $players]);
    }

    private function getShuffledDeck()
    {
        $deck = [];
        foreach ($this->suits as $suit) {
            foreach ($this->values as $value) {
                $deck[] = ['suit' => $suit, 'value' => $value];
            }
        }
        shuffle($deck);
        return $deck;
    }
}

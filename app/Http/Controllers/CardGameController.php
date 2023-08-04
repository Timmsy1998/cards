<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardGameController extends Controller
{
    private $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
    private $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King', 'Ace'];

    public function index()
    {
        // Return the welcome view
        return view('welcome', ['players' => []]);
    }

    public function shuffle()
    {
        $deck = $this->getShuffledDeck();
        // Store the shuffled deck in the session or database if you want to preserve it
        // For simplicity, we'll just pass the deck directly to the view in this example
        return view('welcome', ['players' => [], 'deck' => $deck]);
    }

    public function deal(Request $request)
    {
        $deck = $request->session()->get('deck');
        if (!$deck) {
            // If the deck is not shuffled, redirect to the homepage or shuffle it again
            return redirect('/');
        }

        // Divide the deck into 4 equal parts for each player
        $players = [];
        $chunkSize = count($deck) / 4;
        for ($i = 1; $i <= 4; $i++) {
            $players[$i] = array_splice($deck, 0, $chunkSize);
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

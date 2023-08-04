<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Card Game App</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card text-center">
                    <div class="card-body">
                        <h1 class="card-title">Card Game App</h1>
                        <form method="post" action="{{ route('shuffle') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Shuffle Cards</button>
                        </form>
                        <form method="post" action="{{ route('deal') }}">
                            @csrf
                            <button type="submit" class="btn btn-success">Deal Cards</button>
                        </form>
                        <div class="row mt-3">
                            @foreach ($players as $player => $cards)
                                <div class="col-md-6">
                                    <h3>Player {{ $player }}</h3>
                                    @foreach ($cards as $card)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $card['value'] }}</h5>
                                                <p class="card-text">{{ $card['suit'] }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

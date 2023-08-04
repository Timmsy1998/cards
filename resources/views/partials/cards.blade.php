@foreach ($cards as $card)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $card['value'] }}</h5>
            <p class="card-text">{{ $card['suit'] }}</p>
        </div>
    </div>
@endforeach

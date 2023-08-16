@extends('layouts.index')

@section('content')
    <div class="infoHolder d-flex align-items-center justify-content-around">
        <img height="500px" src={{ $book->img }} alt="">
        <div class="textHolder">
            <h3><b class="text-darkBrown">Name: </b>{{ $book->title }}</h3>
            <h3><b class="text-darkBrown">Author: </b>{{ $book->author }}</h3>
            <h3><b class="text-darkBrown">Summary: </b>{{ $book->summary }}</h3>
            <h3><b class="text-darkBrown">Price: </b>{{ $book->price }}$</h3>
            <h3><b class="text-darkBrown">Stock Left:</b> {{ $book->stock }}</h3>
            @if ($book->stock === 0)
                <button class="btn btn-secondary rounded-pill mt-2 disabled">Out of Stock</button>
            @else
                <form action={{ route('about.add', $book) }} method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-darkBrown rounded-pill mt-2" type="submit">ADD TO BASKET</button>
                </form>
            @endif
        </div>
    </div>
@endsection

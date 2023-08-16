@extends('layouts.index')

@section('content')
    <h1 class="text-darkBrown text-center">ABOUT</h1>
    @if (count($books) !== 0)
        <table class="table table-lightBrown">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Add to Basket</th>
                    <th scope="col">Remove from Basket</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th>
                            <img class="bookImg" src={{ $book->img }} alt="">
                            {{ $book->title }}
                        </th>
                        <td valign="middle">
                            {{ $book->price }}$
                        </td>
                        <td valign="middle">
                            {{ $book->stock }}
                        </td>
                        <td valign="middle">
                            @if ($book->stock === 0)
                                <button class="btn btn-secondary rounded-pill disabled">Out of Stock</button>
                            @else
                                <form action={{ route('about.add', $book) }} method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-darkBrown rounded-pill" type="submit">ADD TO BASKET</button>
                                </form>
                            @endif
                        </td>
                        <td valign="middle">
                            <form action={{ route('about.remove', $book) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger rounded-pill" type="submit">Remove Item</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

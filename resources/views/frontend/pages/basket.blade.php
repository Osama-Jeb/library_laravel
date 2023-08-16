@extends('layouts.index')

@section('content')
    <h1 class="text-darkBrown text-center">USER BASKET PAGE</h1>

    @if (count($baskets) !== 0)
        <table class="table table-lightBrown">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Add Item</th>
                    <th scope="col">Remove Item</th>
                    <th scope="col">Delete From Basket</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($baskets as $basket)
                    <tr>
                        <th>
                            {{ $basket->title }}
                        </th>
                        <td valign="middle">
                            {{ $basket->number }}
                        </td>
                        <td valign="middle">
                            {{ $basket->number * $basket->price }}$
                        </td>
                        <td valign="middle">
                            <form action={{ route('basket.add', $basket) }} method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-darkBrown rounded-pill" type="submit">Add</button>
                            </form>
                        </td>
                        <td valign="middle">
                            <form action={{ route('basket.remove', $basket) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning rounded-pill" type="submit">Remove</button>
                            </form>
                        </td>
                        <td valign="middle">
                            <form action={{ route('basket.delete', $basket) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-red rounded-pill" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

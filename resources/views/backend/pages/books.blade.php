@extends('layouts.index')

@section('content')
    <h1 class="text-darkBrown text-center">BOOKS ADMIN</h1>
    @include('backend.partials.books.create_modal')

    <table class="table table-lightBrown">
        <thead>
            <tr class="text-center">
                <th scope="col" class="fs-4 text-darkBrown">Cover</th>
                <th scope="col" class="fs-4 text-darkBrown">Title</th>
                <th scope="col" class="fs-4 text-darkBrown ">Info</th>
                <th scope="col" class="fs-4 text-darkBrown">Update</th>
                <th scope="col" class="fs-4 text-darkBrown">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <th valign="middle" class="d-flex flex-column align-items-center gap-1">
                        <img height="150px" src={{ asset('/storage/images/' . $book->img) }} alt="">
                        {{-- <form action={{ route('books.download', $book) }} method="POST">
                            @csrf
                            <button class="btn btn-darkBrown" type="submit">Download Cover</button>
                        </form> --}}
                        <a href={{asset("storage/images/" . $book->img)}} download="{{$book->title}}">Nassim Download</a>
                        <a href={{route("book.download", $book)}}>Ayoub Download</a>
                    </th>
                    <td valign="middle" class="text-center">
                        <h4 class="fw-bold fs-4">{{ $book->title }}</h4>

                    </td>
                    <td valign="middle" class="text-center">
                        @include('backend.partials.books.show_modal')
                    </td>
                    <td valign="middle" class="text-center">
                        @include('backend.partials.books.edit_modal')
                    </td>
                    <td valign="middle" class="text-center">
                        <form action={{ route('books.delete', $book) }} method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-red rounded-pill" type="submit">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

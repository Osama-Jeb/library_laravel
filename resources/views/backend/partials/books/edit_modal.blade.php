<!-- Button trigger modal -->
<button type="button" class="btn btn-green text-light rounded-pill" data-bs-toggle="modal"
    data-bs-target="#edit{{ $book->id }}">
    <i class="bi bi-pencil-square"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="edit{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-lightBrown">
            <div class="modal-header">
                <h1 class="modal-title fs-4 text-darkBrown fw-bold" id="exampleModalLabel">Update Book Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="formHolder">
                    <form action={{ route('books.update', $book) }} method="POST"  enctype="multipart/form-data">
                        @csrf
                        {{-- @method("PUT") --}}
                        <div>
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
                                required>
                        </div>
                        <div>
                            <label for="author">author</label>
                            <input type="text" name="author" id="author"
                                value="{{ old('author', $book->author) }}" required>
                        </div>
                        <div>
                            <label for="summary">summary</label>
                            <textarea type="text" name="summary" id="summary" required>{{ old('title', $book->summary) }}</textarea>
                        </div>
                        <div>
                            <label for="img">img</label>
                            <input type="file" name="img" id="img">
                        </div>
                        <div>
                            <label for="price">price</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $book->price) }}"
                                required>
                        </div>
                        <div>
                            <label for="stock">stock</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', $book->stock) }}"
                                required>
                        </div>
                        <button class="btn btn-darkBrown mt-1 rounded-pill" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

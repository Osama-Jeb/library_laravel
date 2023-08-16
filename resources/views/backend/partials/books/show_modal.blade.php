<!-- Button trigger modal -->
<button type="button" class="btn btn-brown text-light rounded-pill" data-bs-toggle="modal"
    data-bs-target="#show{{ $book->id }}">
    <i class="bi bi-info-circle-fill"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="show{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-lightBrown">
            <div class="modal-header">
                <h3 class="modal-title fw-bold text-darkBrown text-uppercase" id="exampleModalLabel">{{ $book->title }}
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1>By: {{ $book->author }}</h1>
                <h4 class="fw-bold">Summary: </h4>
                <p> {{ $book->summary }}</p>
                <p><b>Price:</b> {{ $book->price }}$</p>
                <p><b>Stock:</b> {{ $book->stock }} Left</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

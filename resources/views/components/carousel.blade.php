<div class="carou d-flex align-items-center justify-content-center">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @for ($i = count($books) - 3; $i < count($books); $i++)
                <div class="carousel-item {{ $i === count($books) - 3 ? 'active' : '' }}" data-bs-interval="3000">
                    <div class="d-flex flex-column align-items-center">
                        <div class="d-flex">
                            <img src="{{ $books[$i]->img }}" alt="...">
                        </div>
                        <button class="btn btn-darkBrown rounded-pill mt-1">
                            <a class="text-decoration-none text-white" href={{ route('home.show', $books[$i]) }}>More
                                Info</a>
                        </button>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-darkBrown" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-darkBrown" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>

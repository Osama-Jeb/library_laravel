@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h4 class="lead"><b>{{ $message }}</b></h4>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h4 class="lead"><b>{{ $message }}</b></h4>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h4 class="lead"><b>{{ $message }}</b></h4>
    </div>
@endif

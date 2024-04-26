@extends('layouts.app')

@section('title', 'Note Details')
@push('style')
<style>
.carousel-controls-left {
    position: absolute;
    top: 50%;
    left: 5%;
    right: 0;
    transform: translateY(-50%);
}
.carousel-controls-right {
    position: absolute;
    top: 50%;
    left: 0;
    right: 5%;
    transform: translateY(-50%);
}
.bgWhite {
    background-color: #F9F9F9;
}

.reamMore {
    color: #8D008C;
    text-decoration: none;
}

.reamMore:hover {
    color: #aa05aa;
}

.kavoon {
    font-family: 'Kavoon', cursive;
}
</style>
@endpush
@section('content')
<div class="container" style="margin-top: 40px">
    <div class="row">
        <div class="col-12 text-white">
            <h1 class="kavoon">Note</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
            $total = count($slides);
            ?>
        <div class="col-12">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

                {{-- <div class="carousel-indicators">
                        @for ($i = 0; $i < $total; $i++)
                            <button type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide-to="{{ $i }}" class="active" aria-current="true"
                aria-label="Slide {{ $i + 1 }}"></button>
                @endfor
            </div> --}}

            <div class="carousel-inner">
                @foreach ($slides as $key => $slide)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="max-height:700px;"
                    data-bs-interval="10000">
                    <img src="{{ asset($slide) }}" class="d-block w-100" alt="Slide {{ $key + 1 }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-white fw-bolder">
                            < {{ $key + 1 }} of {{ $total }}>
                        </h3>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="carousel-controls-left text-center">
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev"
                    style="background-color: rgba(255, 255, 255, 0.3); border: none; border-radius: 50%;width: 50px; height: 50px;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
            </div>
            <div class="carousel-controls-right text-center">
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next"
                    style="background-color: rgba(255, 255, 255, 0.3); border: none; border-radius: 50%;width: 50px; height: 50px;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        {{-- <h3 class="text-white text-center mt-2 fw-bolder">
                    < 1 of 12>
                </h3> --}}

    </div>
</div>
</div>
@endsection
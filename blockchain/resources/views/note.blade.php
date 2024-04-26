@extends('layouts.app')

@section('title', 'Note')
@push('style')
    <style>
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
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-white">
                <h1 class="kavoon">Note</h1>
            </div>
        </div>
    </div>

    <div class="container " style="height: 1vh">

        <?php
        $count = 1;
        ?>

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-1 bgWhite rounded p-3 mb-5">
            @foreach ($notes as $note)
                <div class="col pb-3">
                    <div class="card rounded">
                        <img src="{{ asset('images/note.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Module {{ $count++ }} - {{ $note }}</h5>
                            {{-- <p class="card-text">This is a longer card with supporting </p> --}}
                            <a href="{{ route('note.detail', $count++) }}" class="reamMore fw-bold float-end me-md-2">READ
                                NOW</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach ($notes as $note)
                <div class="col pb-3">
                    <div class="card rounded">
                        <img src="{{ asset('images/note.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Module {{ $count++ }} - {{ $note }}</h5>
                            {{-- <p class="card-text">This is a longer card with supporting </p> --}}
                            <a href="{{ route('note.detail', $count++) }}" class="reamMore fw-bold float-end me-md-2">READ
                                NOW</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection

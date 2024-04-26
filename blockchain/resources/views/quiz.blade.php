@extends('layouts.app')

@section('title', 'Quiz')
@push('style')
    <style>
        .restart-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            color: white;
            text-decoration: none;
        }

        .restart-btn:hover {
            color: white;
            text-decoration: none;
        }

        textarea {
            resize: none;
        }

        .bgLight {
            background: #D9D9D9;
        }

        .clear-div {
            clear: both;
        }

        .hideElement {
            display: none;
        }

        .circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            /* the magic */
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            text-align: center;
            color: white;
            margin: 35% auto 40px;
            /* top | right | bottom | left */
        }

        .bgWhite {
            background-color: #D9D9D9;
        }

        .bgGreen {
            background-color: green;
        }

        .circle .black {
            color: black;
            line-height: 60px;
        }

        .bgLight .question {
            background-color: #FFFFFF;
            width: 95%;
            margin: auto;
            text-align: center;
            border-radius: 10px;
        }

        .question p {
            padding: 10px;
        }

        .bgLight .test {
            margin: auto;
        }

        .bgLight .reviewBtn {
            background-color: #A78295;
            border: none;
        }

        .bgLight .retakeBtn {
            border: 1px solid #A78295;
            ;
        }

        .reviewBtn,
        .retakeBtn {
            height: 30px;
            line-height: 15px;
        }


        .line {
            position: absolute;
            top: 110%;
            left: 50%;
            width: 5px;
            height: 230%;
            background-color: #FFFFFF;
        }
    </style>
@endpush
@section('content')
    <div class="container">

        <?php
        $totalQuiz = count($questions);
        ?>
        @foreach ($questions as $key => $question)
            <?php
            $showLine = true;
            if ($totalQuiz == $key + 1) {
                $showLine = false;
            }
            ?>
            @include('components.quiz_question', ['question' => $question, 'showLine' => $showLine])
        @endforeach
    </div>

    <a href="{{ route('quiz.clear') }}" class="restart-btn"><i class="fa-solid fa-arrow-rotate-left"></i>&nbsp; Clear</a>
@endsection

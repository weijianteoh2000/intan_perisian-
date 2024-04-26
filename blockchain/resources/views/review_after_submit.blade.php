@extends('layouts.app')

@section('title', 'Quiz review_after_submit')
@push('style')
    <style>
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

        .bgWhite2 {
            background-color: #FFFFFF;
        }

        .bgGreen {
            background-color: green;
        }

        .bgRed {
            background-color: red;
        }

        .circle .black {
            color: black;
            line-height: 60px;
        }

        .faWhite {
            color: white;
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
            padding: 15px;
        }

        .bgLight .test {
            margin: auto;
        }

        .bgLight .reviewBtn {
            background-color: #A78295;
            border: none;
        }

        .txtGreen {
            color: green;
        }

        .submitBtn {
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
            top: 115%;
            left: 50%;
            width: 5px;
            height: 210%;
            background-color: #D9D9D9;
        }

        /* THIS (line2) STYLE IS USED WHEN CROSS-ICON DISPLAY */
        .line2 {
            position: absolute;
            top: 115%;
            left: 50%;
            width: 5px;
            height: 275%;
            background-color: #D9D9D9;
        }

        .list {
            list-style-type: none;
        }

        .fa-solid.fa-circle {
            color: #ffffff;
        }
    </style>
@endpush
@section('content')
    <div class="container bgWhite2 rounded">

        <div class="row">
            <div class="col-6 mt-3">
                <h3 class="fw-bold ms-5">Quiz #1</h3>
            </div>
        </div>



        <?php
        $totalQuiz = count($questions);
        ?>
        @foreach ($questions as $key => $question)
            <div class="row mt-3 quiz" id="questions">
                <div class="col-md-2">
                    <div style="position: relative;">
                        @if ($question['answer'])
                            <div class="circle bgGreen">
                                <i class="fa-solid fa-circle-check fa-2x black"></i>
                            </div>
                        @else
                            <div class="circle bgRed">
                                <i class="fa-solid fa-x fa-2x faWhite"></i>
                            </div>
                        @endif

                        @if ($key + 1 < $totalQuiz)
                            <div @class([
                                'rounded',
                                'line' => $question['answer'],
                                'line2' => !$question['answer'],
                            ])></div>
                        @endif
                    </div>
                </div>
                <div class="col-md-8 bgLight rounded">
                    <h4 class="mt-2 fw-normal">Question #{{ $question['quiz_id'] }}</h4>
                    <div class="mb-3 question ">
                        <p> {{ $question['question'] }} </p>
                    </div>

                    <div class="row test mb-4">
                        <div class="col-6">
                            <span @class([
                                'ms-sm-4 ms-md-4 ms-lg-4',
                                'txtGreen' =>
                                    $question['correct_answer'] == 'a' &&
                                    $question['correct_answer'] == $question['given_answer'],
                                'text-danger' =>
                                    $question['given_answer'] == 'a' &&
                                    $question['correct_answer'] != $question['given_answer'],
                            ])>
                                a. {{ $question['a'] }} </span>
                        </div>
                        <div class="col-6">
                            <span @class([
                                'ms-sm-4 ms-md-4 ms-lg-4',
                                'txtGreen' =>
                                    $question['correct_answer'] == 'b' &&
                                    $question['correct_answer'] == $question['given_answer'],
                                'text-danger' =>
                                    $question['given_answer'] == 'b' &&
                                    $question['correct_answer'] != $question['given_answer'],
                            ])> b. {{ $question['b'] }} </span>
                        </div>
                        <div class="col-6">
                            <span @class([
                                'ms-sm-4 ms-md-4 ms-lg-4',
                                'txtGreen' =>
                                    $question['correct_answer'] == 'c' &&
                                    $question['correct_answer'] == $question['given_answer'],
                                'text-danger' =>
                                    $question['given_answer'] == 'c' &&
                                    $question['correct_answer'] != $question['given_answer'],
                            ])> c. {{ $question['c'] }} </span> <br>
                        </div>
                        <div class="col-6">
                            <span @class([
                                'ms-sm-4 ms-md-4 ms-lg-4',
                                'txtGreen' =>
                                    $question['correct_answer'] == 'd' &&
                                    $question['correct_answer'] == $question['given_answer'],
                                'text-danger' =>
                                    $question['given_answer'] == 'd' &&
                                    $question['correct_answer'] != $question['given_answer'],
                            ])> d. {{ $question['d'] }} </span>
                        </div>
                        @if ($question['answer'] == 0)
                            <div class="col-6">
                                <p class="txtGreen text-end">Answer: {{ $question['correct_answer'] }}.
                                    {{ $question[$question['correct_answer']] }} </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col-12 mb-5">
                <a href="{{ route('quiz') }}" class="submitBtn btn btn-secondary float-end me-md-5"> &nbsp; Close &nbsp;
                </a>
            </div>
        </div>

    </div>
@endsection

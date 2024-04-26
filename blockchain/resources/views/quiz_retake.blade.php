@extends('layouts.app')

@section('title', 'Quiz Start')
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
            padding: 15px;
        }

        .bgLight .test {
            margin: auto;
        }

        .bgLight .reviewBtn {
            background-color: #A78295;
            border: none;
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
            height: 300%;
            /* background-color: #FFFFFF; */
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
                <h3 class="fw-bold ms-5">Quiz #{{ $id }}</h3>
            </div>
            <div class="col-6 mt-3 text-end">
                <span class="text-end me-5">Time: <span id="timer">{{ $time }}<span></span>
            </div>
        </div>


        <form action="{{ route('quiz.submit') }}" method="get">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
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

                <div class="row mt-3 quiz" id="questions">
                    <div class="col-md-2">
                        <div style="position: relative;">
                            <div class="circle bgWhite"><i class="fa-solid fa-circle-check fa-2x black hideElement"></i>
                            </div>
                            @if ($showLine)
                                <div class="line rounded"></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8 bgLight rounded">
                        <h4 class="mt-2 fw-normal">Question #{{ $question['quiz_id'] }}</h4>
                        <div class="mb-3 question ">
                            <p> {{ $question['question'] }} </p>
                        </div>

                        <div class="row test mb-4">
                            <div class="col-12">
                                <div class="form-check ms-sm-4 ms-md-4 ms-lg-4">
                                    <input class="form-check-input" type="radio" name="q_{{ $question['quiz_id'] }}"
                                        value="a">
                                    <label class="form-check-label" for="flexRadioDefault1">a. {{ $question['a'] }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check ms-sm-4 ms-md-4 ms-lg-4">
                                    <input class="form-check-input" type="radio" name="q_{{ $question['quiz_id'] }}"
                                        value="b">
                                    <label class="form-check-label" for="flexRadioDefault1">b. {{ $question['b'] }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check ms-sm-4 ms-md-4 ms-lg-4">
                                    <input class="form-check-input" type="radio" name="q_{{ $question['quiz_id'] }}"
                                        value="c">
                                    <label class="form-check-label" for="flexRadioDefault1">c. {{ $question['c'] }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check ms-sm-4 ms-md-4 ms-lg-4">
                                    <input class="form-check-input" type="radio" name="q_{{ $question['quiz_id'] }}"
                                        value="d">
                                    <label class="form-check-label" for="flexRadioDefault1">d. {{ $question['d'] }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row">
                <div class="col-12 mb-5">
                    <button type="submit" class="submitBtn btn btn-secondary float-end me-md-5"> &nbsp; Submit &nbsp; </button>
                </div>
            </div>
        </form>

    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {

            var minute = {{ $time }}
            window.onload = function() {
                minute = minute - 1;
                var sec = 60;

                var myTimer = setInterval(function() {

                    document.getElementById("timer").innerHTML =
                        minute + " : " + sec;
                    sec--;

                    if (sec == 00) {
                        minute--;
                        sec = 59;

                        if (minute == 0) {

                            clearInterval(myTimer);
                            minute = '00';
                            sec = '00';
                            document.getElementById("timer").innerHTML = minute + " : " + sec;

                            //====== SET DISABLED CHECKBOX THAT ARE NOT CHECKED =======//
                            var radioButtons = document.querySelectorAll('.form-check-input');
                            for (var i = 0; i < radioButtons.length; i++) {
                                if (!radioButtons[i].checked) {
                                    radioButtons[i].disabled = true;
                                }
                            }

                        }
                    }
                }, 1000);
            };


        });
    </script>
@endsection

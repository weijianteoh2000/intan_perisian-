<div class="row mt-3 quiz" id="quiz_2">
    <div class="col-md-2">
        <div style="position: relative;">
            @if ($question['submitted'] == 0)
                <div class="circle bgWhite"><i class="fa-solid fa-circle-check fa-2x black hideElement"></i></div>
            @else
                <div class="circle bgGreen"><i class="fa-solid fa-circle-check fa-2x black"></i></div>
            @endif
            @if ($showLine)
                <div class="line rounded"></div>
            @endif
        </div>
    </div>
    <div class="col-md-7 bgLight rounded">
        <h3 class="mt-2 fw-normal">Quiz #{{ $question['quiz_id'] }}</h3>
        <div class="mb-3 question ">
            <p> {{ $question['question'] }} </p>
        </div>

        <div class="row test mb-4">
            <div class="col-md-6 mb-2">
                <i class="fa-regular fa-file-lines"></i> {{ $question['total_question'] }}
            </div>
            <div class="col-md-6 mb-2 text-end">
                <span class="me-2">
                    Mark:
                    @if ($question['obtained'])
                        {{ $question['obtained'] }}
                    @else
                        {{ $question['mark'] }}
                    @endif
                </span>
            </div>
            <div class="col-md-6">
                <i class="fa-regular fa-clock"></i> {{ $question['time'] }} Minutes
            </div>
            <div class="col-md-6 text-end">
                @if ($question['submitted'] == 0)
                    <a class="reviewBtn btn btn-primary"
                        href="{{ route('quiz.start', ['id' => $question['quiz_id'], 'time' => $question['time']]) }}">
                        Start
                        Quiz! </a>
                @else
                    <a class="reviewBtn btn btn-primary me-3" href="{{ route('quiz.review', $question['quiz_id']) }}">
                        Review </a>
                    <a class="retakeBtn btn btn-white"
                        href="{{ route('quiz.retake', ['id' => $question['quiz_id'], 'time' => $question['time']]) }}">
                        Retake
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

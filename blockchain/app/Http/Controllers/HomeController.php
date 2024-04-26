<?php

namespace App\Http\Controllers;

use App\Services\QuizService;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    function hash()
    {
        return view('');
    }
    function transaction()
    {
        return view('');
    }


    function test()
    {
        return view('');
    }


    function block()
    {
        return view('');
    }

    function blockchain()
    {

        return view('');
    }

    function distributed()
    {
        return view('');
    }

    function advance()
    {
        return view('');
    }

    function dataInsertion()
    {
        return view('');
    }
    function privateNetwork()
    {
        return view('');
    }

    function makeHashData(Request $request)
    {

        return response()->json(['nonce' => $nonceArr, 'data' => $dataArr, 'hashedData' => $hashed_data]);

        return response()->json(['nonce' => $nonceArr, 'data' => $dataArr, 'hashedData' => $hashed_data]);

    }

    function quiz()
    {

        return view('quiz', ["questions" => $questions]);
    }

    function quizStart($id, $time = 10)
    {

        return view('quiz_start', ["questions" => $questions, 'id' => $id, 'time' => $time]);
    }

    function quizRetake($id, $time = 10)
    {

        return view('quiz_retake', ["questions" => $questions, 'id' => $id, 'time' => $time]);
    }

    function quizSubmit(Request $request)
    {
        return redirect()->route('quiz.reviewAfterSubmit');
        return $this->reviewAfterSubmit($request->all());
    }

    function reviewAfterSubmit()
    {
        return view('review_after_submit', ["questions" => $questions]);
    }



    function quizReview($id)
    {

        return view('quiz_review', ["questions" => $questions]);
    }

    public function clearQuiz()
    {

        return redirect(route('quiz'));
    }

    function note()
    {

        return view('note', compact('notes'));
    }

    function noteDetail()
    {
        return view('note_detail', compact('slides'));
    }
}

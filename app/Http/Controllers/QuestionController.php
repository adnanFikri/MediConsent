<?php

namespace App\Http\Controllers;
use App\Models\question;
use App\Models\UserAnswer;
use Database\Factories\UserFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function add(Request $request)
    {
        $validate=$request->validate([
            'questions' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => '',
            'ans' => 'required',

        ]);
        $q =new question();
        $q->question=$request->questions;
        $q->a=$request->opa;
        $q->b=$request->opb;
        $q->c=$request->opc;
        $q->ans=$request->ans;
        $q->save();

        Session::put('successMessage' , "Question Successfully Added");
        return redirect('questions');
    }


    public function show()
    {
        $qs=question::all();
        return view('questions')->with(['questions'=>$qs]);
    }


    public function update(Request $request)
    {
        $validate=$request->validate([
            'question' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => 'required',
            'idQ' => 'required',

        ]);

        $q = question::find($request->idQ);

        $q->question = $request->question;
        $q->a   = $request->opa;
        $q->b   = $request->opb;
        $q->c   = $request->opc;

        $q->save();

        Session::put('successMessage' , "Question Successfully Updated");
        return redirect('questions');
    }


    public function delete(Request $request)
    {

        question::where('id',$request->id)->delete();
        Session::put('successMessage' , "Question Successfully Deleted");
        return redirect('questions');
    }


    public function checkTest(){
        $userId = Auth::user()->id;
        $userAnswer = UserAnswer::where('user_id', $userId)->count();
        if( $userAnswer >= 10){
            return view('start',['checkTest' => true]);
        }else{
            return view('start',['checkTest' => false]);
        }
    }


    public function startQuiz()
    {
        Session::put('nextq','1');
        Session::put('ansA','0');
        Session::put('ansB','0');
        Session::put('ansC','0');
        Session::put('points','0');

        $q = question::all()->first();

        return view('answerDesk')->with(['questions'=>$q]);
    }

    public function submitans(Request $request)
    {
        $nextq = Session::get('nextq');
        $points = Session::get('points');

        $questions = question::all();
        $questionA = question::find($nextq);
        $user = Auth::user();

        $validate = $request->validate([
            'ans' => 'required',
        ]);


        $answer = $request->selected_answer;
        $userAnswer = [
            'user_id' => $user->id,
            'question_id' => $questionA->id ,
            'answer' => $questionA->$answer
        ];
        UserAnswer::create($userAnswer);


        if($request->ans){
            $points += intval($request->ans);
        }
        $nextq += 1;

        Session::put('nextq', $nextq);
        Session::put('points',$points);

        $i = 0;

        foreach($questions as $question){
            $i++;

            if($questions->count() < $nextq){

                if($points > 10){
                    $user->points = 10;
                }else{
                    $user->points = $points;
                }

                if($points <= 3){
                    $user->type = 'Pragmatique';
                }elseif ($points >= 4 && $points <= 7) {
                    $user->type = 'Fondamentale';
                }else{
                    $user->type = 'Concernente';
                }

                $user->save();
                return view('end');
            }

            if($i==$nextq){
                return view('answerDesk')->with(['questions'=>$question]);
            }

        }
    }

}

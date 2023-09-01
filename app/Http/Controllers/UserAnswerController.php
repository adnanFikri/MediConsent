<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    public function userAnswers($userId)
    {
        $userAnswers = UserAnswer::where('user_id', $userId)->with('question')->get();
        $user = User::find($userId);

        return view('dashboard.userQuestions', ['userAnswers' => $userAnswers , 'user' => $user]);
    }

    public function deleteAnswer($userId)
    {
        $user = auth()->user();
        $user = User::find($userId);
        $user->forceFill([
            'type' => null,
            'points' => null,
        ]);

        UserAnswer::where('user_id', $userId)->delete();

        return redirect()->back();
    }
}

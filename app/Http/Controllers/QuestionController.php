<?php


namespace Gamify\Http\Controllers;

use Gamify\Events\QuestionAnswered;
use Gamify\Http\Requests\QuestionAnswerRequest;
use Gamify\Models\Question;
use Gamify\Models\QuestionChoice;
use Gamify\Models\User;
use Gamify\Models\UserResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class QuestionController extends Controller
{
    public function index(): View
    {
        /** @var User $user */
        $user = User::findOrFail(Auth::id());

        $questionsCount = Question::published()->count();
        $questionsCompletion = ($questionsCount > 0)
            ? round(($user->answeredQuestionsCount() / $questionsCount) * 100)
            : 0;

        return view('question.index', [
            'questions' => $user->pendingQuestions(),
            'next_level_name' => $user->nextLevel()->name,
            'points_to_next_level' => $user->pointsToNextLevel(),
            'percentage_to_next_level' => $user->nextLevelCompletionPercentage(),
            'answered_questions' => $user->answeredQuestionsCount(),
            'percentage_of_answered_questions' => $questionsCompletion,
        ]);
    }

    public function answer(QuestionAnswerRequest $request, Question $question): View
    {
        /** @var User $user */
        $user = User::findOrFail(Auth::id());

        abort_if($user->hasAnsweredQuestion($question), 404);

        abort_unless($question->isPublished() || $user->isAdmin(), 404);

        // Obtain how many points has its answer obtained
        $points = 0;
        $answerCorrectness = false;

        foreach ($request->choices as $answer) {
            /** @var QuestionChoice $choice */
            $choice = $question->choices()->find($answer);
            $points += $choice->score;
            $answerCorrectness = $answerCorrectness || $choice->isCorrect();
        }

        $user->answeredQuestions()->attach($question,
            UserResponse::asArray(
                score: $points,
                choices: $request->choices,
            )
        );

        // Trigger an event that will update XP, badges...
        QuestionAnswered::dispatch($user, $question, $points, $answerCorrectness);

        return view('question.show')
            ->with('question', $question)
            ->with('response', $user->getResponseForQuestion($question));
    }

    public function show(Question $question): View
    {
        /** @var User $user */
        $user = User::findOrFail(Auth::id());

        abort_unless($question->isPublished() || $user->isAdmin(), 404);

        $response = $user->getResponseForQuestion($question);

        return view('question.show')
            ->with('question', $question)
            ->with('response', $response);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\TestRepositoryEloquent;
use App\Repositories\Eloquent\GroupRepositoryEloquent;
use App\Repositories\Eloquent\UserTestRepositoryEloquent;
use App\Repositories\Eloquent\QuestionRepositoryEloquent;
use Auth;
use Session;
use Exception;

class SelectionTestController extends Controller
{
    protected $testRepository;
    protected $groupRepository;
    protected $userTestRepository;
    protected $questionRepository;
    /**
     * Create a new authentication controller instance.
     *
     * @param TestRepositoryEloquent     $test     the test repository
     * @param GroupRepositoryEloquent    $group    the group repository
     * @param UserTestRepositoryEloquent $userTest the usertest repository
     * @param QuestionRepositoryEloquent $question the question repository
     *
     * @return void
     */
    public function __construct(TestRepositoryEloquent $test, GroupRepositoryEloquent $group, UserTestRepositoryEloquent $userTest, QuestionRepositoryEloquent $question)
    {
        $this->testRepository= $test;
        $this->groupRepository= $group;
        $this->userTestRepository = $userTest;
        $this->questionRepository = $question;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSelect()
    {
        $groups= $this->groupRepository->with('test')->all();
        $tests = $this->testRepository->all();
        return view('frontend.tests.selection', compact('groups'), compact('tests'));
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param int $id id
      *
      * @return \Illuminate\Http\Response
      */
    public function getExercise($id)
    {
        $questions = $this->questionRepository->with('test')->findByField('test_id', $id)->all();
        return view('frontend.tests.exercise', compact('questions', 'id'));
    }
        /**
          * Store a newly created resource in storage.
          *
          * @param \Illuminate\Http\QuestionRequest $request Question request
          * @param int                              $id      id
          *
          * @return \Illuminate\Http\Response
          */
    public function postExercise(QuestionRequest $request, $id)
    {
        $data=$request->all();
        $arrayAnswer = $data['answer'];
        $arrayQuestion = $data['answer_question'];
        $score = Question::scores($arrayAnswer, $arrayQuestion);
        try {
            $data['test_scores'] = $score;
            $data['user_id']=Auth::user()->id;
            $data['test_id'] = $id;
             $this->userTestRepository->create($data);
            Session::flash('success', trans('uesr.test.finish_test'));
            return view('frontend.tests.result', compact('score'));
        } catch (Exception $e) {
            Session::flash('danger', trans('user.test.not_finish_test'));
            return redirect()->route('test.exercise', $data['test_id']);
        }
    }
}

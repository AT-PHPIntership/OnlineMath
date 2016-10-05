<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\QuestionRequest;
use App\Models\TestLesson;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\LessonRepositoryEloquent;
use App\Repositories\Eloquent\GroupRepositoryEloquent;
use App\Repositories\Eloquent\TestLessonRepositoryEloquent;
use Auth;
use Session;
use Exception;

class LearnMathController extends Controller
{
    protected $lessonRepository;
    protected $groupRepository;
    protected $testLessonRepository;
    /**
     * Create a new authentication controller instance.
     *
     * @param LessonRepositoryEloquent     $lesson     the lesson repository
     * @param GroupRepositoryEloquent      $group      the group repository
     * @param TestLessonRepositoryEloquent $testLesson the testLesson repository
     *
     * @return void
     */
    public function __construct(LessonRepositoryEloquent $lesson, GroupRepositoryEloquent $group, TestLessonRepositoryEloquent $testLesson)
    {
        $this->lessonRepository= $lesson;
        $this->groupRepository= $group;
        $this->testLessonRepository = $testLesson;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getlesson()
    {
        $groups= $this->groupRepository->with('lesson')->all();
        $lessons = $this->lessonRepository->all();
        return view('frontend.learns.choiceLesson', compact('groups'), compact('lessons'));
    }

     /**
       * Store a newly created resource in storage.
       *
       * @param int $id id
       *
       * @return \Illuminate\Http\Response
       */
    public function gettestLesson($id)
    {
        $testLessons = $this->testLessonRepository->with('lesson')->findByField('lesson_id', $id)->all();
        return view('frontend.learns.learnMath', compact('testLessons', 'id'));
    }
          /**
            * Store a newly created resource in storage.
            *
            * @param \Illuminate\Http\Request $request Request
            *
            * @return \Illuminate\Http\Response
            */
    public function posttestLesson(Request $request)
    {
        $data=$request->all();
        $arrayAnswer = $data['answer'];
        $arrayQuestion = $data['answer_question'];
        $score = TestLesson::scores($arrayAnswer, $arrayQuestion);
        try {
            Session::flash('success', trans('user.learn.finish_learn'));
            return view('frontend.learns.result', compact('score'));
        } catch (Exception $e) {
            Session::flash('danger', trans('user.learn.not_finish_learn'));
            return redirect()->route('test.lesson');
        }
    }
}

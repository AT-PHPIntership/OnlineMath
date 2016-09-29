<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\QuestionRequest;
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
        return view('frontend.tests.selectiontest', compact('groups'), compact('tests'));
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
        return view('frontend.tests.exercise', compact('questions'), compact('id'));
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
        try {
            $data['user_id']=Auth::user()->id;
            $data['test_id'] = $id;
            $result = $this->userTestRepository->create($data);
            if ($result) {
                Session::flash('success', trans('uesr.test.finish_test'));
                return redirect()->route('question.exercise', $data['test_id']);
            } else {
                Session::flash('danger', trans('user.test.not_finish_test'));
                return redirect()->route('question.exercise', $data['test_id']);
            }
        } catch (Exception $e) {
            Session::flash('danger', trans('user.test.not_finish_test'));
            return redirect()->route('question.exercise', $data['test_id']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
      * Remove the specified resource from storage.
      *
      * @param int $id id
      *
      * @return \Illuminate\Http\Response
      */
    public function destroy($id)
    {

        try {
            $this->userRepository->find($id);
            $countusertests =  $this->userTestRepository->findByField('user_id', $id, ['id'])->count();
            $countlessondetails =  $this->lessonDetailRP->findByField('user_id', $id, ['id'])->count();
            if ($countusertests  || $countlessondetails) {
                  return redirect()->route('admin.user.index')
                                   ->withMessage(trans('lang_admin.user.error_delete_key'));
            } else {
                $result = $this->userRepository->delete($id);
                if ($result) {
                    Session::flash('success', trans('lang_admin.user.delete_success'));
                } else {
                    Session::flash('danger', trans('lang_admin.user.error_delete'));
                }
                return redirect()->route('admin.user.index')
                               ->withMessage(trans('lang_admin.user.error_delete'));
            }
        } catch (Exception $ex) {
            return redirect() -> route('admin.user.index');
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use App\Models\Test;
use App\Http\Requests\ExamRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\TestRepositoryEloquent;
use App\Repositories\Eloquent\GroupRepositoryEloquent;
use App\Repositories\Eloquent\UserTestRepositoryEloquent;
use App\Repositories\Eloquent\QuestionRepositoryEloquent;
use Session;
use Exception;

class TestController extends Controller
{

    protected $examRepository;
    protected $groupRepository;
    protected $userExamRepository;
    protected $questionRepository;


    /**
     * Create a new authentication controller instance.
     *
     * @param TestRepositoryEloquent     $exam     the exam repository
     * @param GroupRepositoryEloquent    $group    the group repository
     * @param UserTestRepositoryEloquent $userExam the userExam repository
     * @param QuestionRepositoryEloquent $question the question repository
     *
     * @return void
     */
    public function __construct(TestRepositoryEloquent $exam, GroupRepositoryEloquent $group, UserTestRepositoryEloquent $userExam, QuestionRepositoryEloquent $question)
    {
        $this->examRepository= $exam;
        $this->groupRepository= $group;
        $this->userExamRepository = $userExam;
        $this->questionRepository = $question;
    }
    /**
    * Displays datatables front end view
    *
    * @return \Illuminate\View\View
    */
    public function index()
    {
        // if( Request::ajax() ){
        //   return Datatables::of(Test::query())->make(true);
        // }
        return view('backend.exams.index');
    }

   /**
    * Process datatables ajax request.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function examData()
    {

        $exams = Test::select(['id', 'name', 'number_questions']);
        return Datatables::of($exams)
        ->addColumn('action', function () {
            return '<button class="asian-btn-del">Delete</button>';
        }) ->make(true);
    }

    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $groups=$this->groupRepository->all();
          return view('backend.exams.create', compact('groups'));
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param \Illuminate\Http\ExamRequest $request exam request
      *
      * @return \Illuminate\Http\Response
      */
    public function store(ExamRequest $request)
    {

        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameimage=time() . '_'.$data['image'] .'.'. $image->getClientOriginalExtension();
            $image->move(public_path(config('path.imagetest')), $nameimage);
            $data['name']= $nameimage;
            $result=$this->examRepository->create($data);
            if ($result) {
                Session::flash('success', trans('lang_admin.test.create_success'));
                return redirect()->route('admin.exam.create');
            } else {
                Session::flash('danger', trans('lang_admin.test.create_error'));
                return redirect()->route('admin.exam.create');
            }
        } else {
              $result=$this->examRepository->create($data);
              return redirect()->route('admin.exam.create');
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
    }
   /**
    * Update the specified resource in storage.
    *
    * @return \Illuminate\Http\Response
    */
    public function update()
    {
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
            $this->examRepository->find($id);
            $countUserExam =  $this->userExamRepository->findByField('test_id', $id, ['id'])->count();
            $countQuestion = $this->questionRepository->findByField('test_id', $id, ['id'])->count();
            if ($countUserExam  || $countQuestion) {
                  $response['isSuccess'] = \Config::get('common.UNSUCCESSFUL_FLAG');
            } else {
                $response['isSuccess'] =\Config::get('common.SUCCESSFUL_FLAG');
                $this->examRepository->delete($id);
            }
        } catch (Exception $ex) {
            $response['isSuccess'] = \Config::get('common.UNSUCCESSFUL_FLAG');
            ;
        }
        return \Response::json($response);
    }
}

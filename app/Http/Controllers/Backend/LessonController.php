<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LessonRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\LessonRepositoryEloquent;
use App\Repositories\Eloquent\GroupRepositoryEloquent;
use App\Repositories\Eloquent\CategoryLessonRepositoryEloquent;
use App\Models\Lesson;
use Yajra\Datatables\Datatables;
use Session;
use Exception;

class LessonController extends Controller
{

    protected $lessonRepository;
    protected $groupRepository;
    protected $categoryRepository;


    /**
     * Create a new authentication controller instance.
     *
     * @param LessonRepositoryEloquent     $lesson     the lesson repository
     * @param GroupRepositoryEloquent    $group    the group repository
     * @param CategoryLessonRepositoryEloquent $categoryLesson the categoryLesson repository
     *
     * @return void
     */
    public function __construct(LessonRepositoryEloquent $lesson, GroupRepositoryEloquent $group, CategoryLessonRepositoryEloquent $categoryLesson)
    {
        $this->lessonRepository= $lesson;
        $this->groupRepository= $group;
        $this->categoryRepository= $categoryLesson;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.lessons.index');
    }

       /**
    * Process datatables ajax request.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function lessonData()
    {
        $lessons = Lesson::select(['id', 'name','description','page','index']);
        return Datatables::of($lessons)
        ->addColumn('action', function ($item) {
            return '<a href="'.route("admin.lesson.edit", $item->id).'">edit</a>
                    <a href="'.route("admin.lesson.show", $item->id).'">Show</a>
                  <button class="asian-btn-del">Delete</button>';
        })->make(true);
    }
    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $groups = $this->groupRepository->all();
         $categories = $this->categoryRepository->all();
          return view('backend.lessons.create', compact('groups'), compact('categories'));
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param \Illuminate\Http\LessonRequest $request lesson request
      *
      * @return \Illuminate\Http\Response
      */
    public function store(LessonRequest $request)
    {

        $data = $request->all();
        $result=$this->lessonRepository->create($data);
        if ($result) {
            Session::flash('success', trans('lang_admin.lesson.create_success'));
            return redirect()->route('admin.lesson.index');
        } else {
            Session::flash('danger', trans('lang_admin.lesson.create_error'));
            return redirect()->route('admin.lesson.create');
        }
    }

    /**
   * Show the application lesson.
   *
   * @param int $id determine specific lesson
   *
   * @return \Illuminate\Http\Response
   */
    public function show($id)
    {
        $lesson = $this->lessonRepository->find($id);
        return view('backend.lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $lessons = $this->lessonRepository->find($id);
            $groups = $this->groupRepository->all();
            return view('backend.lessons.edit', compact('lessons'), compact('groups'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin.lesson.no_lesson'));
            return redirect() -> route('admin.lesson.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     *@param \Illuminate\Http\LessonRequest $request Lesson request
     * @param int                          $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(LessonRequest $request, $id)
    {
        $data = $request -> all();
        try {
            $lessons = $this->lessonRepository->find($id);

            if (!empty($lessons)) {
                $result= $this->lessonRepository->update($data, $id);
                if ($result) {
                    Session::flash('success', trans('lang_admin.lesson.edit_success'));
                    return redirect() -> route('admin.lesson.index');
                } else {
                    Session::flash('danger', trans('lang_admin.lesson.edit_fail'));
                    return redirect() -> route('admin.lesson.index');
                }
            }
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin.lesson.edit_fail'));
            return redirect() -> route('admin.lesson.index');
        }
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
             $this->lessonRepository->find($id);
                $response['isSuccess'] =\Config::get('common.SUCCESSFUL_FLAG');
                $this->lessonRepository->delete($id);
        } catch (Exception $ex) {
            $response['isSuccess'] = \Config::get('common.UNSUCCESSFUL_FLAG');
            ;
        }
         return \Response::json($response);
    }
}

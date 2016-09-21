<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\LessonDetailRepositoryEloquent;
use App\Repositories\Eloquent\UserTestRepositoryEloquent;
use Session;
use Exception;

class UserController extends Controller
{
    protected $userRepository;
    protected $userTestRepository;
    protected $lessonDetailRP;
    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent         $user         the user repository
     * @param LessonDetailRepositoryEloquent $lessondetail the lessondetail repository
     * @param UserTestRepositoryEloquent     $usertest     the usertest repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user, LessonDetailRepositoryEloquent $lessondetail, UserTestRepositoryEloquent $usertest)
    {
        $this->userRepository = $user;
        $this->userTestRepository = $usertest;
        $this->lessonDetailRP = $lessondetail;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= $this->userRepository->all();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
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

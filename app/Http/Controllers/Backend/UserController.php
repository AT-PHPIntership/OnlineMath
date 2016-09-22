<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\GroupRepositoryEloquent;
use App\Repositories\Eloquent\RoleRepositoryEloquent;
use App\Repositories\Eloquent\LessonDetailRepositoryEloquent;
use App\Repositories\Eloquent\UserTestRepositoryEloquent;
use Session;
use Exception;

class UserController extends Controller
{

    protected $userRepository;
    protected $groupRepository;
    protected $roleRepository;
    protected $userTestRepository;
    protected $lessonDetailRP;
    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent         $user         the user repository
     * @param GroupRepositoryEloquent        $group        the group repository
     * @param RoleRepositoryEloquent         $role         the role repository
     * @param UserTestRepositoryEloquent     $usertest     the usertest repository
     * @param LessonDetailRepositoryEloquent $lessondetail the lessondetail repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user, GroupRepositoryEloquent $group, RoleRepositoryEloquent $role, UserTestRepositoryEloquent $usertest, LessonDetailRepositoryEloquent $lessondetail)
    {
        $this->userRepository= $user;
        $this->groupRepository= $group;
        $this->roleRepository=$role;
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

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $groups=$this->groupRepository->all();
         $roles=$this->roleRepository->all();

          return view('backend.users.create', compact('groups'), compact('roles'));
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param \Illuminate\Http\UserRequest $request User request
      *
      * @return \Illuminate\Http\Response
      */
    public function store(UserRequest $request)
    {

        $data = $request->all();

        $data['password'] = bcrypt($request->password);
        $result=$this->userRepository->create($data);
        if ($result) {
            Session::flash('success', trans('lang_admin.user.create_success'));
            return redirect()->route('admin.user.index');
        } else {
            Session::flash('danger', trans('lang_admin.user.create_error'));
            return redirect()->route('admin.user.create');
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

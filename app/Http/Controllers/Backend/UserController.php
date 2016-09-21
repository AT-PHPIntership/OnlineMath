<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\GroupRepositoryEloquent;
use App\Repositories\Eloquent\RoleRepositoryEloquent;
use Session;

class UserController extends Controller
{
    protected $userrepo;
    protected $groupRepository;
    protected $roleRepository;
    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent  $user  the user repository
     * @param GroupRepositoryEloquent $group the user repository
     * @param RoleRepositoryEloquent  $role  the user repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user, GroupRepositoryEloquent $group, RoleRepositoryEloquent $role)
    {

        $this->userRepository= $user;
        $this->groupRepository= $group;
        $this->roleRepository=$role;
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
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}

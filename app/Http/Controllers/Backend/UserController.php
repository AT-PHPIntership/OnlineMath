<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use Session;

class UserController extends Controller
{
    protected $userRepository;
    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent $user the user repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user)
    {
        $this->userRepository = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->all();
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
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $users = $this->userRepository->find($id);
            return view('backend.users.edit', compact('users'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin.user.no_user'));
            return redirect()->route('admin.user.index');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request\UserRequest $request request
     * @param int                                  $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data             = $request->all();
        $data['role_id']  = config('common.ADMIN_ROLE_ID');
        $data['types_id'] = config('common.ADMIN_ROLE_ID');

        try {
            $users = $this->userRepository->find($id);
            if (!empty($users)) {
                $this->userRepository->update($data, $id);
                Session::flash('success', trans('lang_admin.user.edit_success'));
                return redirect() -> route('admin.user.index');
            }
        } catch (Exception $e) {
            Session::flash(trans('danger'), trans('lang_admin.user.edit_fail'));
            return redirect()->route('admin.user.index');
        }
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

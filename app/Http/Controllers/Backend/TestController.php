<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TestRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\TestRepositoryEloquent;
use App\Repositories\Eloquent\GroupRepositoryEloquent;
use Session;
use Exception;

class TestController extends Controller
{

    protected $testRepository;
    protected $groupRepository;

    /**
     * Create a new authentication controller instance.
     *
     * @param TestRepositoryEloquent  $test  the test repository
     * @param GroupRepositoryEloquent $group the group repository
     *
     * @return void
     */
    public function __construct(TestRepositoryEloquent $test, GroupRepositoryEloquent $group)
    {
        $this->testRepository= $test;
        $this->groupRepository= $group;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $groups=$this->groupRepository->all();
          return view('backend.tests.create', compact('groups'));
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param \Illuminate\Http\testRequest $request test request
      *
      * @return \Illuminate\Http\Response
      */
    public function store(TestRequest $request)
    {

        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameimage=time() . '_'.$data['image'] .'.'. $image->getClientOriginalExtension();
            $image->move(public_path(config('path.imagetest')), $nameimage);
            $data['name']= $nameimage;
            $result=$this->testRepository->create($data);
            if ($result) {
                Session::flash('success', trans('lang_admin.test.create_success'));
                return redirect()->route('admin.test.create');
            } else {
                Session::flash('danger', trans('lang_admin.test.create_error'));
                return redirect()->route('admin.test.create');
            }
        } else {
              $result=$this->testRepository->create($data);
              return redirect()->route('admin.test.create');
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
            $this->testRepository->find($id);
            $counttesttests =  $this->testTestRepository->findByField('test_id', $id, ['id'])->count();
            $countlessondetails =  $this->lessonDetailRP->findByField('test_id', $id, ['id'])->count();
            if ($counttesttests  || $countlessondetails) {
                  return redirect()->route('admin.test.index')
                                   ->withMessage(trans('lang_admin.test.error_delete_key'));
            } else {
                $result = $this->testRepository->delete($id);
                if ($result) {
                    Session::flash('success', trans('lang_admin.test.delete_success'));
                } else {
                    Session::flash('danger', trans('lang_admin.test.error_delete'));
                }
                return redirect()->route('admin.test.index')
                               ->withMessage(trans('lang_admin.test.error_delete'));
            }
        } catch (Exception $ex) {
            return redirect() -> route('admin.test.index');
        }
    }
}

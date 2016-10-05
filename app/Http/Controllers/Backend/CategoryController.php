<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\CategoryRepositoryEloquent;
use App\Repositories\Eloquent\BookRepositoryEloquent;
use App\Models\Category;
use Yajra\Datatables\Datatables;
use Session;
use Exception;

class CategoryController extends Controller
{

    protected $categoryRepository;
    protected $bookRepository;
    /**
     * Create a new authentication controller instance.
     *
     * @param CategoryRepositoryEloquent $category the category repository
     * @param BookRepositoryEloquent     $book     the book repository
     *
     * @return void
     */
    public function __construct(CategoryRepositoryEloquent $category, BookRepositoryEloquent $book)
    {
        $this->categoryRepository= $category;
        $this->bookRepository= $book;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.categories.index');
    }

       /**
    * Process datatables ajax request.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function categoryData()
    {
        $categories = Category::select(['id', 'name']);
        return Datatables::of($categories)
        ->addColumn('action', function ($item) {
            return '<a href="'.route("admin.category.edit", $item->id).'">edit</a>
                  <button class="asian-btn-del">Delete</button>';
        })->make(true);
    }
    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('backend.categories.create');
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param \Illuminate\Http\categoryRequest $request category request
      *
      * @return \Illuminate\Http\Response
      */
    public function store(CategoryRequest $request)
    {

        $data = $request->all();

        $result=$this->categoryRepository->create($data);
        if ($result) {
            Session::flash('success', trans('lang_admin.category.create_success'));
            return redirect()->route('admin.category.index');
        } else {
            Session::flash('danger', trans('lang_admin.category.create_error'));
            return redirect()->route('admin.category.create');
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
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
              $categories = $this->categoryRepository->find($id);
              return  view('backend.categories.edit', compact('categories'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin.category.no_category'));
            return redirect() -> route('admin.category.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     *@param \Illuminate\Http\UserRequest $request User request
     * @param int                          $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request -> all();
        try {
            $categories = $this->categoryRepository->find($id);

            if (!empty($categories)) {
                $result= $this->categoryRepository->update($data, $id);
                if ($result) {
                    Session::flash('success', trans('lang_admin.category.edit_success'));
                    return redirect() -> route('admin.category.index');
                } else {
                    Session::flash('danger', trans('lang_admin.category.edit_fail'));
                    return redirect() -> route('admin.category.index');
                }
            }
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin.category.edit_fail'));
            return redirect() -> route('admin.category.index');
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
             $this->categoryRepository->find($id);
             $countBook =  $this->bookRepository->findByField('category_id', $id, ['id'])->count();
            if ($countBook) {
                 $response['isSuccess'] = \Config::get('common.UNSUCCESSFUL_FLAG');
            } else {
                $response['isSuccess'] =\Config::get('common.SUCCESSFUL_FLAG');
                $this->categoryRepository->delete($id);
            }
        } catch (Exception $ex) {
            $response['isSuccess'] = \Config::get('common.UNSUCCESSFUL_FLAG');
            ;
        }
         return \Response::json($response);
    }
}

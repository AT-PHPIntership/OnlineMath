<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\BookRepositoryEloquent;
use Session;
use Exception;

class BookController extends Controller
{
    protected $bookRepository;
    protected $groupRepository;
    protected $categoryRepository;
    /**
     * Create a new authentication controller instance.
     *
     * @param BookRepositoryEloquent $book the book repository
     *
     * @return void
     */
    public function __construct(BookRepositoryEloquent $book)
    {
        $this->bookRepository = $book;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books= $this->bookRepository->all();
        return view('backend.books.index', compact('books'));
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
      * @return \Illuminate\Http\Response
      */
    public function destroy()
    {
    }
}

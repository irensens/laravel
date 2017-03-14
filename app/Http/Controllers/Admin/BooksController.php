<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Books;
use App\Http\Requests\CreateBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Catalogs;
use App\User;


class BooksController extends Controller {

	/**
	 * Display a listing of books
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $books = Books::with("catalogs")->with("user")->get();

		return view('admin.books.index', compact('books'));
	}

	/**
	 * Show the form for creating a new books
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $catalogs = Catalogs::pluck("name", "id")->prepend('Please select', null);
$user = User::pluck("name", "id")->prepend('Please select', null);

	    
        $showhide = Books::$showhide;

	    return view('admin.books.create', compact("catalogs", "user", "showhide"));
	}

	/**
	 * Store a newly created books in storage.
	 *
     * @param CreateBooksRequest|Request $request
	 */
	public function store(CreateBooksRequest $request)
	{
	    $request = $this->saveFiles($request);
		Books::create($request->all());

		return redirect()->route(config('quickadmin.route').'.books.index');
	}

	/**
	 * Show the form for editing the specified books.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$books = Books::find($id);
	    $catalogs = Catalogs::pluck("name", "id")->prepend('Please select', null);
$user = User::pluck("name", "id")->prepend('Please select', null);

	    
        $showhide = Books::$showhide;

		return view('admin.books.edit', compact('books', "catalogs", "user", "showhide"));
	}

	/**
	 * Update the specified books in storage.
     * @param UpdateBooksRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateBooksRequest $request)
	{
		$books = Books::findOrFail($id);

        $request = $this->saveFiles($request);

		$books->update($request->all());

		return redirect()->route(config('quickadmin.route').'.books.index');
	}

	/**
	 * Remove the specified books from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Books::destroy($id);

		return redirect()->route(config('quickadmin.route').'.books.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Books::destroy($toDelete);
        } else {
            Books::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.books.index');
    }

}

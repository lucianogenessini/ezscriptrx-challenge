<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\AuthorStoreRequest;
use App\Http\Requests\Author\AuthorUpdateRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    /**
     * Returns a list with all authors
     * 
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $authors = Author::select('*')
        ->paginate(15);
        return view('author.index', ['authors' => $authors]);
    }
    /**
     * Return view to create a new author
     * 
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view('author.create');
    }

    /**
     * Create a new author
     * 
     * @param AuthorStoreRequest $request
     * 
     * @return RedirectResponse
     */
    public function store(AuthorStoreRequest $request): RedirectResponse
    {
        Author::storeOrUpdate($request->name, $request->lastName);
        return redirect('/author');
    }

    /**
     * Returns the view to edit an author
     * 
     * @param Author $author
     * 
     * @return \Illuminate\View\View
     */
    public function edit(Author $author): \Illuminate\View\View
    {
        return view('author.update', ['author' => $author]);   
    }

    /**
     * Update an author
     * 
     * @param AuthorUpdateRequest $request
     * @param Author $author
     * 
     * @return RedirectResponse
     */
    public function update(AuthorUpdateRequest $request, Author $author): RedirectResponse
    {
        $author->update([
            'name' => $request->name,
            'last_name' => $request->lastName,
        ]);

        return redirect('/author');
    }

    /**
     * delete an author
     * 
     * @param Author $author
     * 
     * @return RedirectResponse
     */
    public function destroy(Author $author): RedirectResponse
    {
        $author->delete();
        return redirect('/author');
    }
}
